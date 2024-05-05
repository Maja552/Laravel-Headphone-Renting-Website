<?php

namespace App\Http\Livewire\Units;

use App\Http\Livewire\Actions\SoftDeletesAction;
use App\Models\Headphone;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;

class UnitSoftDeletesAction extends SoftDeletesAction
{
    protected function dialogDescription(Model $model) : String {
        $headphone = Headphone::where('id', $model->idHeadphone)->first();
        $manufacturer = Manufacturer::where('id', $headphone->idManufacturer)->first();

        return __($this->tableName.'.dialogs.soft_deletes.description', [
            'name' => $manufacturer->name . ' ' . $headphone->name
        ]);
    }
}
