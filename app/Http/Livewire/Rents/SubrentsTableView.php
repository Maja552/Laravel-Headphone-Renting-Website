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
use App\Models\Rent;
use App\Models\Rentstatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Facades\Header;

class SubrentsTableView extends TableView
{
    public string $tableName = 'rent';
    public string $tableNamePlural = 'rents';
    public string $className = 'Rent';

    public $searchBy = [
        'totalPrice',
        'startDate',
        'endDate',
        'requestDate',
        'userId',
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
        $statusName = Utils::trans('rentstatuses.rentstatuses.'.strtolower($status), $status);

        if(Auth::user()->isRegularUser()) {
            return [
                $model->id,
                $model->totalPrice . 'zł',
                $model->startDate,
                $model->endDate,
                $model->requestDate,
                $statusName,
            ];
        }

        return [
            $model->id,
            $model->totalPrice . 'zł',
            $model->startDate,
            $model->endDate,
            $model->requestDate,
            User::find($model->userId)->name,
            $statusName,
            $model->description,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    public function headers(): array {
        if(Auth::user()->isRegularUser()) {
            return [
                Header::title(__('rents.attributes.number')),
                Header::title(__('rents.attributes.totalPrice')),
                Header::title(__('rents.attributes.startDate')),
                Header::title(__('rents.attributes.endDate')),
                Header::title(__('rents.attributes.requestDate')),
                Header::title(__('rents.attributes.status')),
            ];
        }

        return [
            Header::title(__('rents.attributes.id')),
            Header::title(__('rents.attributes.totalPrice')),
            Header::title(__('rents.attributes.startDate')),
            Header::title(__('rents.attributes.endDate')),
            Header::title(__('rents.attributes.requestDate')),
            Header::title(__('units.attributes.owner')),
            Header::title(__('rents.attributes.status')),
            Header::title(__('units.attributes.description')),
            Header::title(__('translation.attributes.created_at')),
            Header::title(__('translation.attributes.updated_at')),
            Header::title(__('translation.attributes.deleted_at'))
        ];
    }

    public function repository(): Builder {
        if(Auth::user()->isRegularUser())
        {
            return Rent::query()->where('userId', auth()->user()->id);
        }

        return Rent::query();
    }

    public function render()
    {
        $data = array_merge(
            $this->getRenderData(),
            [
                'view' => $this
            ]
        );

        return view("rents.subtable-view", $data);
    }
}
