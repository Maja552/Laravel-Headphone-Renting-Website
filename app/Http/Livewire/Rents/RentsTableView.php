<?php

namespace App\Http\Livewire\Rents;

use App\Http\Livewire\Actions\EditAction;
use App\Http\Livewire\Actions\RestoreAction;
use App\Http\Livewire\Actions\SoftDeletesAction;
use App\Http\Livewire\Filters\SoftDeletedFilter;
use App\Http\Livewire\Rents\Actions\ShowdeliveryAction;
use App\Http\Livewire\Rents\Filters\RentstatusFilter;
use App\Http\Livewire\TableView;
use App\Http\Utils;
use App\Models\Rentedunit;
use App\Models\Rentstatus;
use App\Models\User;
use DASPRiD\Enum\Exception\IllegalArgumentException;
use LaravelViews\Facades\Header;

class RentsTableView extends TableView
{
    public string $tableName = 'rent';
    public string $tableNamePlural = 'rents';
    public string $className = 'Rent';

    public $searchBy = [
        'totalPrice',
        'startDate',
        'endDate',
        'requestDate',
        'owner',
        'statusId',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected function filters() {
        return [
            new SoftDeletedFilter,
            new RentstatusFilter
        ];
    }

    protected function actionsByRow() {
        return [
            new EditAction(
                $this->tableNamePlural.'.edit',
                __($this->tableNamePlural.'.actions.edit')
            ),
            new SoftDeletesAction($this->tableNamePlural),
            new RestoreAction($this->tableNamePlural),
            new ShowdeliveryAction($this->tableNamePlural)
        ];
    }

    public function row($model): array {
        $status = Rentstatus::where('id', $model->statusId)->first()->name;
        return [
            $model->id,
            $model->totalPrice . 'zł',
            $model->startDate,
            $model->endDate,
            $model->requestDate,
            User::find($model->userId)->name,
            Utils::trans('rentstatuses.rentstatuses.'.strtolower($status), $status),
            $model->description,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    public function headers(): array {
        return [
            Header::title(__('rents.attributes.id'))->sortBy('id'),
            Header::title(__('rents.attributes.totalPrice'))->sortBy('totalPrice'),
            Header::title(__('rents.attributes.startDate'))->sortBy('startDate'),
            Header::title(__('rents.attributes.endDate'))->sortBy('endDate'),
            Header::title(__('rents.attributes.requestDate'))->sortBy('requestDate'),
            Header::title(__('units.attributes.owner'))->sortBy('owner'),
            Header::title(__('rents.attributes.status'))->sortBy('statusId'),
            Header::title(__('units.attributes.description'))->sortBy('description'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at')
        ];
    }

    public function render()
    {
        $data = array_merge(
            $this->getRenderData(),
            [
                'view' => $this
            ]
        );

        return view("rents.table-view", $data);
    }
}
