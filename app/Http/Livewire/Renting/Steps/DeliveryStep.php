<?php

namespace App\Http\Livewire\Renting\Steps;

use App\Rules\PostalcodeRule;
use Illuminate\Support\Str;
use Spatie\LivewireWizard\Components\StepComponent;

class DeliveryStep extends StepComponent
{
    public string $name = '';
    public string $surname = '';
    public string $email = '';
    public string $phone = '';
    public string $street = '';
    public string $house_number = '';
    public string $apartment_number = '';
    public string $city = '';
    public string $postal_code = '';


    public function rules() {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
            ],
            'surname' => [
                'required',
                'string',
                'min:2',
            ],
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'string',
                'min:9',
                'max:9'
            ],
            'street' => [
                'required',
                'string',
                'min:2',
            ],
            'house_number' => [
                'required',
                'string',
                'min:1',
            ],
            'apartment_number' => [
                'string',
                'min:1',
            ],
            'city' => [
                'required',
                'string',
                'min:2',
            ],
            'postal_code' => [
                'required',
                new PostalcodeRule(),
                'min:2',
            ]
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('order_wizard.delivery.attributes.name')),
            'surname' => Str::lower(__('order_wizard.delivery.attributes.surname')),
            'email' => Str::lower(__('order_wizard.delivery.attributes.email')),
            'phone' => Str::lower(__('order_wizard.delivery.attributes.phone')),
            'street' => Str::lower(__('order_wizard.delivery.attributes.street')),
            'house_number' => Str::lower(__('order_wizard.delivery.attributes.house_number')),
            'apartment_number' => Str::lower(__('order_wizard.delivery.attributes.apartment_number')),
            'city' => Str::lower(__('order_wizard.delivery.attributes.city')),
            'postal_code' => Str::lower(__('order_wizard.delivery.attributes.postal_code')),
        ];
    }

    public function stepInfo(): array
    {
        return [
            'label' => __('order_wizard.delivery.title'),
            'icon' => 'location-marker',
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

    public function render()
    {
        return view('livewire.renting.delivery-step');
    }
}
