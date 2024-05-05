<?php

namespace App\Http\Livewire\Availableunits\Filters;

use App\Http\Utils;
use App\Models\Fittype;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class FittypeFilter extends Filter
{
    public $type = 'select';
    public $view = 'select-filter';

    public function __contruct()
    {
        parent::__construct();
    }

    public function getTitle()
    {
        return __('availableunits.filters.fittype');
    }

    public function options() {
        $opts = [];
        $fittypes = Fittype::all();
        foreach ($fittypes as $fittype) {
            $opts[Utils::trans('fittypes.fittypes.'.strtolower($fittype->name), $fittype->name)] = $fittype->id;
        }
        return $opts;
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('headphones', function ($query) use ($value) {
            $query->where('idFittype', 'like', '%' . $value . '%');
        });
    }
}
