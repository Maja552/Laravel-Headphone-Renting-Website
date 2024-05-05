<?php

namespace App\Http\Livewire\Rentedunits;

use App\Http\Livewire\Actions\EditAction;
use App\Http\Livewire\Actions\RestoreAction;
use App\Http\Livewire\Actions\SoftDeletesAction;
use App\Http\Livewire\TableView;
use App\Models\Headphone;
use App\Models\Manufacturer;
use App\Models\Rent;
use App\Models\Unit;
use DateTime;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Facades\Header;

class RentedunitsTableView extends TableView
{
    public string $tableName = 'rentedunit';
    public string $tableNamePlural = 'rentedunits';
    public string $className = 'Rentedunit';

    public $searchBy = [
        'price',
        'idRent',
        'idUnit',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @throws \Exception
     */
    public function row($model): array {
        $price = $model->price;
        $rent = Rent::where('id', $model->idRent)->first();

        $datenow = new DateTime($rent->startDate);
        $dateend = new DateTime($rent->endDate);
        $interval = $datenow->diff($dateend);
        $interval = ($interval->days / 7.0);

        $price = $price * $interval;

        if(Auth::user()->isRegularUser()) {
            $unit = Unit::where('id', $model->idUnit)->first();
            $headphone = Headphone::where('id', $unit->idHeadphone )->first();

            return [
                $price . 'zł',
                Manufacturer::where('id', $headphone->idManufacturer )->first()->name . ' ' . $headphone->name,
            ];
        }

        return [
            $model->id,
            $price . 'zł',

            Rent::where('id', $model->idRent )->first(),
            Unit::where('id', $model->idUnit)->first(),

            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    public function headers(): array {
        if(Auth::user()->isRegularUser()) {
            return [
                Header::title(__('rentedunits.attributes.price'))->sortBy('price'),
                Header::title(__('rentedunits.attributes.headphone')),
            ];
        }

        return [
            Header::title(__('rentedunits.attributes.id'))->sortBy('id'),
            Header::title(__('rentedunits.attributes.price'))->sortBy('price'),
            Header::title(__('rentedunits.attributes.rent'))->sortBy('idRent'),
            Header::title(__('rentedunits.attributes.headphone')),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at')
        ];
    }

    public function actionsByRow() {
        return [
            new EditAction(
                $this->tableNamePlural.'.edit',
                __($this->tableNamePlural.'.actions.edit')
            ),
            new SoftDeletesAction($this->tableNamePlural),
            new RestoreAction($this->tableNamePlural)
        ];
    }
}
