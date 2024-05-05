<?php

namespace App\Http\Livewire\Renting;

use App\Facades\RentingService;
use Livewire\Component;

class CartCounter extends Component
{
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->count = RentingService::itemsCount();
    }

    public function render()
    {
        return view('livewire.renting.cart-counter');
    }

    public function updateCount()
    {
        $this->count = RentingService::itemsCount();
    }
}
