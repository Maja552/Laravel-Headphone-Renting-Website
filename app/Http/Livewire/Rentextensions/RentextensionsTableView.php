<?php

namespace App\Http\Livewire\Rentextensions;

use App\Http\Livewire\TableView;
use App\Models\Rent;
use LaravelViews\Facades\Header;

class RentextensionsTableView extends TableView
{
    public string $tableName = 'rentextension';
    public string $tableNamePlural = 'rentextensions';
    public string $className = 'Rentextension';

    public $searchBy = [
        'id',
        'requestDate',
        'oldEndDate',
        'newEndDate',
        'idRent',
        'price',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function row($model): array {
        return [
            $model->id,
            $model->requestDate,
            $model->oldEndDate,
            $model->newEndDate,
            Rent::where('id', $model->idRent)->first(),
            $model->price,
            $model->description,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    public function headers(): array {
        return [
            Header::title(__('rentextensions.attributes.id'))->sortBy('id'),
            Header::title(__('rentextensions.attributes.requestDate'))->sortBy('requestDate'),
            Header::title(__('rentextensions.attributes.oldEndDate'))->sortBy('oldEndDate'),
            Header::title(__('rentextensions.attributes.newEndDate'))->sortBy('newEndDate'),
            Header::title(__('rentextensions.attributes.rent'))->sortBy('idRent'),
            Header::title(__('rentextensions.attributes.price'))->sortBy('price'),
            Header::title(__('rentextensions.attributes.description'))->sortBy('description'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at')
        ];
    }
}
