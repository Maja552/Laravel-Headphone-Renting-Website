<?php

namespace App\Http\Livewire\Availableunits\Actions;

use App\Facades\RentingService;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RentAction extends Action
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('availableunits.actions.rent');
    }

    public $icon = 'shopping-cart';

    public function handle($model, View $view)
    {
        RentingService::add($model->id);
        redirect()->route('renting.index');
    }
}
