<?php

namespace App\Http\Livewire\Renting\Support;

use App\Facades\RentingService;
use App\Models\Unit;
use DateTime;
use Spatie\LivewireWizard\Support\State;

class RentingWizardState extends State
{
    public function delivery(): array {
        $deliveryStepState = $this->forStep('delivery-step');
        return [
            'name' => isset($deliveryStepState['name']) ? $deliveryStepState['name'] : '',
            'surname' => isset($deliveryStepState['surname']) ? $deliveryStepState['surname'] : '',
            'email' => isset($deliveryStepState['email']) ? $deliveryStepState['email'] : '',
            'phone' => isset($deliveryStepState['phone']) ? $deliveryStepState['phone'] : '',
            'street' => isset($deliveryStepState['street']) ? $deliveryStepState['street'] : '',
            'house_number' => isset($deliveryStepState['house_number']) ? $deliveryStepState['house_number'] : '',
            'apartment_number' => isset($deliveryStepState['apartment_number']) ? $deliveryStepState['apartment_number'] : '',
            'city' => isset($deliveryStepState['city']) ? $deliveryStepState['city'] : '',
            'postal_code' => isset($deliveryStepState['postal_code']) ? $deliveryStepState['postal_code'] : ''
        ];
    }

    public function startdate(): string {
        $informationStepState = $this->forStep('information-step');
        return $informationStepState['startdate'] ?? '';
    }

    public function enddate(): string {
        $informationStepState = $this->forStep('information-step');
        return $informationStepState['enddate'] ?? '';
    }

    public function rentItems(): array {
        $orderQty = RentingService::access();
        $units = Unit::whereIn('id', array_keys($orderQty))->get()->keyBy('id');
        $qtyAndCost = [];
        foreach ($orderQty as $id => $qty) {
            $qtyAndCost[$id] = [
                'price' => optional($units->get($id))->price
            ];
        }
        return $qtyAndCost;
    }

    public function totalQtyItems(): float {
        return count(RentingService::access());
    }

    public function totalCost(): float {
        $datenow = new DateTime($this->startdate());
        $dateend = new DateTime($this->enddate());
        $interval = $datenow->diff($dateend);
        $interval = ($interval->days / 7.0);

        $sum = 0.0;
        foreach ($this->rentItems() as $item) {
            $sum += $interval * $item['price'];
        }
        return $sum;
    }
}
