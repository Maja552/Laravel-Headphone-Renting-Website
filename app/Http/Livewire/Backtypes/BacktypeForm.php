<?php

namespace App\Http\Livewire\Backtypes;

use App\Http\Livewire\Form;
use App\Models\Backtype;

class BacktypeForm extends Form
{
    public string $tableName = 'backtype';
    public string $tableNamePlural = 'backtypes';
    public string $className = Backtype::class;
    public Backtype $backtype;

    public function rules() {
        return parent::rulesTemplate($this->backtype);
    }

    public function mount(Backtype $backtype, Bool $editMode) {
        $this->backtype = $backtype;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->backtype);
    }
}
