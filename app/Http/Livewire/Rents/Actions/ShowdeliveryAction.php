<?php

namespace App\Http\Livewire\Rents\Actions;

use Illuminate\Database\Eloquent\Model;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ShowdeliveryAction extends Action
{
    public $title = '';
    public $icon = 'truck';

    public function __construct(?String $name = null) {
        parent::__construct();
        $this->title = __('rents.actions.showdelivery');
    }

    protected function dialogTitle() : String {
        return __('rents.dialogs.showdelivery.title');
    }

    protected function dialogDescription(Model $model) : String {
        return __('rents.dialogs.showdelivery.description', [
            'name' => $model->deliveryName,
            'email' => $model->deliveryEmail,
            'phone' => $model->deliveryPhone,
            'address' => $model->deliveryAddress,
        ]);
    }

    public function handle($model, View $view) {
        $view->dialog()->show([
            'title' => $this->dialogTitle(),
            'description' => $this->dialogDescription($model),
            'icon' => 'info',
            'iconColor' => 'text-blue-500',
        ]);
    }

    public function renderIf($model, View $view) {
        return true;
        //return request()->user()->can('index', $model);
    }
}
