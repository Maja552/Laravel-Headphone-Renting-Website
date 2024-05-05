<?php

namespace App\Http\Livewire\Manufacturers;

use App\Http\Livewire\Form;
use App\Models\Manufacturer;

class ManufacturerForm extends Form
{
    public string $tableName = 'manufacturer';
    public string $tableNamePlural = 'manufacturers';
    public string $className = Manufacturer::class;
    public Manufacturer $manufacturer;

    public function rules() {
        return parent::rulesTemplate($this->manufacturer);
    }

    public function mount(Manufacturer $manufacturer, Bool $editMode) {
        $this->manufacturer = $manufacturer;
        $this->editMode = $editMode;
    }

    public function save() {
        return parent::saveInstance($this->manufacturer);
    }
}
