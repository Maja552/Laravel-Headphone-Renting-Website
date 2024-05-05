<?php

namespace App\Http\Livewire\Headphones;

use App\Http\Livewire\TableView;
use App\Http\Utils;
use App\Models\Backtype;
use App\Models\Drivertechnology;
use App\Models\Fittype;
use App\Models\Manufacturer;
use LaravelViews\Facades\Header;

class HeadphonesTableView extends TableView
{
    public string $tableName = 'headphone';
    public string $tableNamePlural = 'headphones';
    public string $className = 'Headphone';

    public $searchBy = [
        'id',
        'name',
        'idManufacturer',
        'idDrivertechnology',
        'idFittype',
        'idBacktype',
        'releaseYear',
        'weight',
        'impedance',
        'driverSize',

        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function row($model): array {
        $fitName = FitType::where('id', $model->idFittype)->first()->name;
        $backName = BackType::where('id', $model->idBacktype)->first()->name;
        $driverName = DriverTechnology::where('id', $model->idDrivertechnology)->first()->name;

        return [
            $model->id,
            Manufacturer::where('id', $model->idManufacturer)->first()->name,
            $model->name,
            Utils::trans('fittypes.fittypes.'.strtolower($fitName), $fitName),
            Utils::trans('backtypes.backtypes.'.strtolower($backName), $backName),
            $model->releaseYear,
            $model->weight.'g',
            $model->impedance.'Ω',
            $model->sensitivity . '' . $model->sensitivityUnit,
            Utils::trans('drivertechnologies.drivertechnologies.'.strtolower($driverName), $driverName) . ' ' . $model->driverSize,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    public function headers(): array {
        return [
            Header::title(__($this->tableNamePlural.'.attributes.id'))->sortBy('id'),
            Header::title(__($this->tableNamePlural.'.attributes.idManufacturer'))->sortBy('idManufacturer'),
            Header::title(__($this->tableNamePlural.'.attributes.name'))->sortBy('name'),
            Header::title(__($this->tableNamePlural.'.attributes.idFittype'))->sortBy('idFittype'),
            Header::title(__($this->tableNamePlural.'.attributes.idBacktype'))->sortBy('idBacktype'),
            Header::title(__($this->tableNamePlural.'.attributes.releaseYear'))->sortBy('releaseYear'),
            Header::title(__($this->tableNamePlural.'.attributes.weight'))->sortBy('weight'),
            Header::title(__($this->tableNamePlural.'.attributes.impedance'))->sortBy('impedance'),
            Header::title(__($this->tableNamePlural.'.attributes.sensitivity'))->sortBy('sensitivity'),
            Header::title(__($this->tableNamePlural.'.attributes.idDrivertechnology'))->sortBy('idDrivertechnology'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at')
        ];
    }
}
