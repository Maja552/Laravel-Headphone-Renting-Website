<?php

namespace App\Http\Livewire\Drivertechnologies;

use App\Http\Livewire\Form;
use App\Models\Drivertechnology;

class DrivertechnologyForm extends Form {
    public string $tableName = 'drivertechnology';
    public string $tableNamePlural = 'drivertechnologies';
    public string $className = Drivertechnology::class;
    public Drivertechnology $drivertechnology;

    public function rules() {
        return parent::rulesTemplate($this->drivertechnology);
    }

    public function mount(Drivertechnology $drivertechnology, Bool $editMode) {
        $this->drivertechnology = $drivertechnology;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->drivertechnology);
    }
}
