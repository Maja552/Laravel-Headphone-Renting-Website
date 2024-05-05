<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Form extends Component
{
    use Actions;
    use AuthorizesRequests;

    public string $tableName;
    public string $tableNamePlural;
    public string $className;
    public Bool $editMode;

    protected function rulesTemplate($modelInstance) {
        return [
            $this->tableName.'.name' => [
                'required',
                'string',
                'min:2',
                'unique:'.$this->tableNamePlural.',name' .
                ($this->editMode
                    ? (',' . $modelInstance->id)
                    : ''
                )
            ]
        ];
    }

    public function validationAttributes() {
        return [
            'name' => Str::lower( __($this->tableNamePlural.'.attributes.name') )
        ];
    }

    public function render() {
        return view('livewire.'.$this->tableNamePlural.'.'.$this->tableName.'-form');
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
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
                ? __($this->tableNamePlural.'.messages.successes.updated', ['name' => $modelInstance->name])
                : __($this->tableNamePlural.'.messages.successes.stored', ['name' => $modelInstance->name])
        );
        $this->editMode = true;

        //return redirect()->route($this->tableNamePlural.'.index');
    }
}
