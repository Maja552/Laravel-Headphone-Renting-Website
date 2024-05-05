<?php

namespace App\Http\Livewire\Actions;

use Illuminate\Database\Eloquent\Model;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class SoftDeletesAction extends Action
{
    public $title = '';
    public $tableName = '';
    public $icon = 'trash-2';

    public function __construct(?String $name = null) {
        parent::__construct();
        if($name !== null) {
            $this->tableName = $name;
        } else {
            $this->tableName = __('translation');
        }
        $this->title = __($this->tableName.'.actions.destroy');
    }

    protected function dialogTitle() : String {
        return __($this->tableName.'.dialogs.soft_deletes.title');
    }

    protected function dialogDescription(Model $model) : String {
        if($model->name === null) {
            return __($this->tableName.'.dialogs.soft_deletes.description', [
                'name' => $model
            ]);
        }

        return __($this->tableName.'.dialogs.soft_deletes.description', [
            'name' => $model->name
        ]);
    }

    public function handle($model, View $view) {
        $view->dialog()->confirm([
            'title' => $this->dialogTitle(),
            'description' => $this->dialogDescription($model),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'softDeletes',
                'params' => $model->id,
            ],
            'reject' => [
                'label' => __('translation.no'),
            ]
        ]);
    }

    public function renderIf($model, View $view) {
        return request()->user()->can('delete', $model);
    }
}
