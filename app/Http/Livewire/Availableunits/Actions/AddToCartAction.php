<?php

namespace App\Http\Livewire\Availableunits\Actions;

use App\Facades\RentingService;
use App\Models\Headphone;
use App\Models\Manufacturer;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class AddToCartAction extends Action
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
    }

    public $icon = 'shopping-cart';

    public function handle($model, View $view)
    {
        RentingService::add($model->id);

        $headphone = Headphone::where('id', $model->idHeadphone )->first();
        $name = Manufacturer::where('id', $headphone->idManufacturer )->first()->name . ' ' . $headphone->name;

        $view->notification()->success(
            $title = __('translation.messages.successes.cart_title'),
            $description = __('availableunits.messages.successes.added_to_cart',
                ['name' => $name]
            )
        );
        $view->emit('cartUpdated');
    }
}
