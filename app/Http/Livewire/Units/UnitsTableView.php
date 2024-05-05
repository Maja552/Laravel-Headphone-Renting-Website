<?php

namespace App\Http\Livewire\Units;

use App\Http\Livewire\Actions\EditAction;
use App\Http\Livewire\Actions\RestoreAction;
use App\Http\Livewire\Actions\SoftDeletesAction;
use App\Http\Livewire\TableView;
use App\Models\Headphone;
use App\Models\Manufacturer;
use App\Models\Unit;
use LaravelViews\Facades\Header;

class UnitsTableView extends TableView
{
    public string $tableName = 'unit';
    public string $tableNamePlural = 'units';
    public string $className = 'Unit';

    public $searchBy = [
        'id',
        'idHeadphone',
        'owner',
        'price',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function row($model): array {
        $headphone = Headphone::where('id', $model->idHeadphone)->first();
        $manufacturer = Manufacturer::where('id', $headphone->idManufacturer)->first();

        return [
            $model->id,
            $manufacturer->name . ' ' . $headphone->name,
            $model->owner,
            $model->price,
            $model->description,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    public function headers(): array {
        return [
            Header::title(__('units.attributes.id'))->sortBy('id'),
            Header::title(__('headphones.attributes.name'))->sortBy('idHeadphone'),
            Header::title(__('units.attributes.owner'))->sortBy('owner'),
            Header::title(__('units.attributes.price'))->sortBy('price'),
            Header::title(__('units.attributes.description'))->sortBy('description'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at')
        ];
    }

    public function actionsByRow() {
        return [
            new EditAction(
                'units.edit',
                __('units.actions.edit')
            ),
            new UnitSoftDeletesAction($this->tableNamePlural),
            new UnitRestoreAction($this->tableNamePlural)
        ];
    }

    public function softDeletes(int $id) {
        $result = call_user_func('App\Models\\'.$this->className.'::find', $id);
        $result->delete();

        $headphone = Headphone::where('id', $result->idHeadphone)->first();
        $manufacturer = Manufacturer::where('id', $headphone->idManufacturer)->first();

        $this->notification()->success(
            $title = __('translation.messages.successes.destroyed_title'),
            $description = __($this->tableNamePlural.'.messages.successes.destroyed', [
                'name' => $manufacturer->name . ' ' . $headphone->name
            ])
        );
    }

    public function restore(int $id) {
        $result = call_user_func('App\Models\\'.$this->className.'::withTrashed')->find($id);
        $result->restore();

        $headphone = Headphone::where('id', $result->idHeadphone)->first();
        $manufacturer = Manufacturer::where('id', $headphone->idManufacturer)->first();

        $this->notification()->success(
            $title = __('translation.messages.successes.restored_title'),
            $description = __($this->tableNamePlural.'.messages.successes.restored', [
                'name' => $manufacturer->name . ' ' . $headphone->name
            ])
        );
    }
}
