<?php

namespace App\Http\Livewire\Renting\Steps;

use App\Events\RentedEvent;
use App\Facades\RentingService;
use App\Models\Rent;
use App\Models\Rentedunit;
use App\Models\Unit;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\LivewireWizard\Components\StepComponent;

class ConfirmRentStep extends StepComponent
{
    use Actions;

    public $rentedItems;

    public function mount()
    {
        $this->rentedItems = $this->state()->rentItems();
    }

    public function getItemsProperty()
    {
        return Unit::whereIn('id', array_keys($this->rentedItems))->get()->keyBy('id');
    }

    public function stepInfo(): array
    {
        return [
            'label' => __('order_wizard.confirm_rent.title'),
            'icon' => 'check',
        ];
    }

    public function submit()
    {
        $deliveryData = $this->state()->delivery();
        $startdate = $this->state()->startdate();
        $enddate = $this->state()->enddate();

        $rentedItemData = $this->rentedItems;

        $totalCost = $this->state()->totalCost();

        $order = DB::transaction(function () use ($rentedItemData, $deliveryData, $totalCost, $startdate, $enddate) {
            $address = $deliveryData["street"] . ' ' . $deliveryData["house_number"];
            if($deliveryData["apartment_number"] != null && strlen($deliveryData["apartment_number"]) > 0) {
                $address .= ' ' . $deliveryData["apartment_number"];
            }
            $address .= ', ' . $deliveryData["city"] . ' ' . $deliveryData["postal_code"];

            $order = Rent::create([
                'userId' => Auth::id(),
                'totalPrice' => $totalCost,
                'requestDate' => date("Y-m-d H:i:s"),
                'startDate' => $startdate,
                'endDate' => $enddate,
                'statusId' => 1,

                'deliveryName' => $deliveryData["name"] . ' ' . $deliveryData["surname"],
                'deliveryEmail' => $deliveryData["email"],
                'deliveryPhone' => $deliveryData["phone"],
                'deliveryAddress' => $address,

            ]);

            foreach($rentedItemData as $key => $item) {
                Rentedunit::create([
                    'price' => $item["price"],
                    'idRent' => $order->id,
                    'idUnit' => $key,
                ]);
            }

            return $order;
        });
        RentingService::clear();
        $this->emit('cartUpdated');
        $this->notification()->success(
            $title = __('order_wizard.confirm_rent.messages.successes.ordered.title'),
            $description = __('order_wizard.confirm_rent.messages.successes.ordered.description', [
                'total_cost' => number_format($totalCost, 2) . ' zł',
            ]),
        );
        RentedEvent::dispatch($order);
        $this->showStep('information-step');
    }

    public function render()
    {
        return view('livewire.renting.confirm-rent-step', [
            'delivery' => $this->state()->delivery(),
            'totalCost' => $this->state()->totalCost(),
            'enddate' => $this->state()->enddate(),
            'startdate' => $this->state()->startdate(),
        ]);
    }
}
