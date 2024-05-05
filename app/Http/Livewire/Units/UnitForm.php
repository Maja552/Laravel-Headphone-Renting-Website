<?php

namespace App\Http\Livewire\Units;

use App\Http\Livewire\Form;
use App\Http\Utils;
use App\Models\Headphone;
use App\Models\Manufacturer;
use App\Models\Unit;

class UnitForm extends Form
{
    public string $tableName = 'unit';
    public string $tableNamePlural = 'units';
    public string $className = Unit::class;
    public Unit $unit;

    public function rules() {
        return [
            'unit.idHeadphone' => [
                'required',
                'integer'
            ],
            'unit.owner' => [
                'required',
                'string',
                'min:3'
            ],
            'unit.price' => [
                'required',
                'integer',
                'gt:0',
                'max:999999'
            ],
            'unit.description' => [ ]
        ];
    }

    public function mount(Unit $unit, Bool $editMode) {
        $this->unit = $unit;
        $this->editMode = $editMode;
    }

    public function save() {
        $this->saveInstance($this->unit);
    }

    public function saveInstance($modelInstance) {
        if ($this->editMode) {
            $this->authorize('update', $modelInstance);
        } else {
            $this->authorize('create', $this->className);
        }

        $this->validate();
        $modelInstance->save();

        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __($this->tableNamePlural.'.messages.successes.updated', ['name' => $modelInstance])
                : __($this->tableNamePlural.'.messages.successes.stored', ['name' => $modelInstance])
        );
        $this->editMode = true;

        //return redirect()->route($this->tableNamePlural.'.index');
    }
}
