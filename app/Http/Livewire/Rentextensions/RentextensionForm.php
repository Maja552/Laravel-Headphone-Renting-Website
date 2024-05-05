<?php

namespace App\Http\Livewire\Rentextensions;

use App\Http\Livewire\Form;
use App\Models\Rent;
use App\Models\Rentextension;

class RentextensionForm extends Form
{
    public string $tableName = 'rentextension';
    public string $tableNamePlural = 'rentextensions';
    public string $className = Rentextension::class;
    public Rentextension $rentextension;

    public function rules() {
        return [
            'rentextension.requestDate' => [
                'required',
                'date'
            ],
            'rentextension.oldEndDate' => [
                'required',
                'date'
            ],
            'rentextension.newEndDate' => [
                'required',
                'date'
            ],
            'rentextension.idRent' => [
                'required',
                'numeric'
            ],
            'rentextension.price' => [
                'required',
                'gt:0',
                'numeric'
            ],
            'rentextension.description' => [ ],
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

    public function mount(Rentextension $rentextension, Bool $editMode) {
        $this->rentextension = $rentextension;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->rentextension);
    }
}
