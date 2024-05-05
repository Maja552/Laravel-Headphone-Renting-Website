<?php

namespace App\Http\Livewire\Fittypes;

use App\Http\Livewire\Form;
use App\Models\Fittype;

class FittypeForm extends Form
{
    public string $tableName = 'fittype';
    public string $tableNamePlural = 'fittypes';
    public string $className = Fittype::class;
    public Fittype $fittype;

    public function rules() {
        return parent::rulesTemplate($this->fittype);
    }

    public function mount(Fittype $fittype, Bool $editMode) {
        $this->fittype = $fittype;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->fittype);
    }
}
