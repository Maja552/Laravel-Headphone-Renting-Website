<?php

namespace App\Http\Livewire\Rentstatuses;

use App\Http\Livewire\Form;
use App\Models\Rentstatus;

class RentstatusForm extends Form
{
    public string $tableName = 'rentstatus';
    public string $tableNamePlural = 'rentstatuses';
    public string $className = Rentstatus::class;
    public Rentstatus $rentstatus;

    public function rules() {
        return parent::rulesTemplate($this->rentstatus);
    }

    public function mount(Rentstatus $rentstatus, Bool $editMode) {
        $this->rentstatus = $rentstatus;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->rentstatus);
    }
}
