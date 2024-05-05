<?php

namespace App\Http\Livewire\Availableunits\Filters;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class ManufacturerFilter extends Filter
{
    public $type = 'select';
    public $view = 'select-filter';

    public function __contruct()
    {
        parent::__construct();
    }

    public function getTitle()
    {
        return __('availableunits.filters.manufacturer');
    }

    public function options() {
        $opts = [];
        $manufacturers = Manufacturer::all();
        foreach ($manufacturers as $manufacturer) {
            $opts[$manufacturer->name] = $manufacturer->id;
        }
        return $opts;
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('headphones', function ($query) use ($value) {
            $query->where('idManufacturer', 'like', '%' . $value . '%');
        });
    }
}
