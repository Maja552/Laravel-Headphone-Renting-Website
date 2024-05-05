<?php

namespace App\Http\Livewire\Rents;

use App\Http\Livewire\Form;
use App\Models\Rent;
use Illuminate\Support\Str;

class RentForm extends Form
{
    public string $tableName = 'rent';
    public string $tableNamePlural = 'rents';
    public string $className = Rent::class;
    public Rent $rent;

    public function rules() {
        return [
            'rent.totalPrice' => [
                'required',
                'gt:0',
                'numeric'
            ],
            'rent.startDate' => [
                'required',
                'date'
            ],
            'rent.endDate' => [
                'required',
                'date'
            ],
            'rent.requestDate' => [
                'required',
                'date'
            ],
            'rent.userId' => [
                'required',
                'numeric'
            ],
            'rent.description' => [ ],
            'rent.statusId' => [
                'required',
                'numeric'
            ],

            'rent.deliveryName' => [
                'required',
                'string'
            ],
            'rent.deliveryEmail' => [
                'required',
                'string'
            ],
            'rent.deliveryPhone' => [
                'required',
                'string'
            ],
            'rent.deliveryAddress' => [
                'required',
                'string'
            ],
        ];
    }

    public function validationAttributes() {
        return [
            'totalPrice' => Str::lower( __($this->tableNamePlural.'.attributes.totalPrice') ),
            'startDate' => Str::lower( __($this->tableNamePlural.'.attributes.startDate') ),
            'endDate' => Str::lower( __($this->tableNamePlural.'.attributes.endDate') ),
            'requestDate' => Str::lower( __($this->tableNamePlural.'.attributes.requestDate') ),
            'userId' => Str::lower( __($this->tableNamePlural.'.attributes.user') ),
            'description' => Str::lower( __($this->tableNamePlural.'.attributes.description') ),
            'statusId' => Str::lower( __($this->tableNamePlural.'.attributes.status') ),
            'deliveryName' => Str::lower( __($this->tableNamePlural.'.attributes.name') ),
            'deliveryEmail' => Str::lower( __($this->tableNamePlural.'.attributes.email') ),
            'deliveryPhone' => Str::lower( __($this->tableNamePlural.'.attributes.phone') ),
            'deliveryAddress' => Str::lower( __($this->tableNamePlural.'.attributes.address') ),
        ];
    }

    public function mount(Rent $rent, Bool $editMode) {
        $this->rent = $rent;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->rent);
    }
}
