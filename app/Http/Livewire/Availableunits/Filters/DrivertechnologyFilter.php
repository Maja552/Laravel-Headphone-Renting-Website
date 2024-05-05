<?php

namespace App\Http\Livewire\Availableunits\Filters;

use App\Http\Utils;
use App\Models\Drivertechnology;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class DrivertechnologyFilter extends Filter
{
    public $type = 'select';
    public $view = 'select-filter';

    public function __contruct()
    {
        parent::__construct();
    }

    public function getTitle()
    {
        return __('availableunits.filters.drivertechnology');
    }

    public function options() {
        $opts = [];
        $drivertechnologies = Drivertechnology::all();
        foreach ($drivertechnologies as $drivertechnology) {
            $opts[Utils::trans('drivertechnologies.drivertechnologies.'.strtolower($drivertechnology->name), $drivertechnology->name)] = $drivertechnology->id;
        }
        return $opts;
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('headphones', function ($query) use ($value) {
            $query->where('idDrivertechnology', 'like', '%' . $value . '%');
        });
    }
}
