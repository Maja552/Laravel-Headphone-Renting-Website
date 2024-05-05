<?php

namespace App\Http\Livewire\Renting\Steps;

use App\Facades\RentingService;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Str;
use Spatie\LivewireWizard\Components\StepComponent;
use WireUi\Traits\Actions;

class InformationStep extends StepComponent
{
    use Actions;

    public string $startdate;
    public string $enddate;
    public array $tabitems;

    public function rules()
    {
        return [
            'startdate' => [
                'required',
                'date'
            ],
            'enddate' => [
                'required',
                'date'
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
            'enddate' => Str::lower(__('order_wizard.renting.enddate')),
            'startdate' => Str::lower(__('order_wizard.renting.startdate')),
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
        $this->nextStep();
    }

    public function mount() {
        $this->tabitems = RentingService::access();
    }

    public function getItemsProperty() {
       // return Unit::whereIn('id', array_keys($this->tabitems))->get()->keyBy('id');
    }

    public function render() {
        return view('livewire.renting.information-step');
    }

    public function stepInfo(): array {
        return [
            'label' => __('order_wizard.renting.title'),
            'icon' => 'shopping-cart'
        ];
    }

    public function cancel(): void {
        RentingService::cancel();
        redirect()->route('availableunits.index');
    }

    public function remove(int|array $params)
    {
        if (is_array($params) && isset($params['id'], $params['confirmed'])) {
            $this->tabitems = RentingService::remove($params['id']);
            $this->emit('cartUpdated');
            return;
        }

        $unit = Unit::where('id', $params)->first();

        $this->dialog()->confirm([
            'title' => __('order_wizard.cart.dialogs.remove.title'),
            'description' => __('order_wizard.cart.dialogs.remove.description', [
                'name' => $unit->shortName()
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'remove',
                'params' => [
                    'id' => $params,
                    'confirmed' => 1,
                ]
            ],
            'reject' => [
                'label' => __('translation.no'),
            ],
        ]);
    }
}
