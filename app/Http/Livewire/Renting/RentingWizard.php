<?php

namespace App\Http\Livewire\Renting;

use App\Http\Livewire\Renting\Steps\ConfirmRentStep;
use App\Http\Livewire\Renting\Steps\DeliveryStep;
use App\Http\Livewire\Renting\Steps\InformationStep;
use App\Http\Livewire\Renting\Support\RentingWizardState;
use Spatie\LivewireWizard\Components\WizardComponent;

class RentingWizard extends WizardComponent
{

    public function steps(): array
    {
        return [
            InformationStep::class,
            DeliveryStep::class,
            ConfirmRentStep::class
        ];
    }

    /*
    public function initialState() : array {
        $user = Auth::user();
        return [
            'delivery-step' => [
                'name' => $user->name,
            ],
        ];
    }
    */

    public function stateClass(): string
    {
        return RentingWizardState::class;
    }
}
