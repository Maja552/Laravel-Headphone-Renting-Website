<?php

namespace App\Http\Livewire\Rentedunits;

use App\Http\Livewire\Form;
use App\Models\Rent;
use App\Models\Rentedunit;

class RentedunitForm extends Form
{
    public string $tableName = 'rentedunit';
    public string $tableNamePlural = 'rentedunits';
    public string $className = Rentedunit::class;
    public Rentedunit $rentedunit;

    public function rules() {
        return [
            'rentedunit.price' => [
                'required',
                'gt:0',
                'numeric'
            ],
            'rentedunit.idRent' => [
                'required',
                'integer'
            ],
            'rentedunit.idUnit' => [
                'required',
                'integer'
            ]
        ];
    }

    public function queryNames() : array {
        $tab = [];
        $queryResults = Rent::all();

        for($i = 0; $i < count($queryResults); $i++) {
            $tab[$i] = [
                'name' => $queryResults[$i],
                'id' => $queryResults[$i]->id
            ];
        }

        return $tab;
    }

    public function mount(Rentedunit $rentedunit, Bool $editMode) {
        $this->rentedunit = $rentedunit;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->rentedunit);
    }
}
