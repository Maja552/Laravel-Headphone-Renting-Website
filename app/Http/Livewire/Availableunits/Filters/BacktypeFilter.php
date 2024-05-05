<?php

namespace App\Http\Livewire\Availableunits\Filters;

use App\Http\Utils;
use App\Models\Backtype;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class BacktypeFilter extends Filter
{
    public $type = 'select';
    public $view = 'select-filter';

    public function __contruct()
    {
        parent::__construct();
    }

    public function getTitle()
    {
        return __('availableunits.filters.backtype');
    }

    public function options() {
        $opts = [];
        $backtypes = Backtype::all();
        foreach ($backtypes as $backtype) {
            $opts[Utils::trans('backtypes.backtypes.'.strtolower($backtype->name), $backtype->name)] = $backtype->id;
        }
        return $opts;
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('headphones', function ($query) use ($value) {
            $query->where('idBacktype', 'like', '%' . $value . '%');
        });
    }
}
