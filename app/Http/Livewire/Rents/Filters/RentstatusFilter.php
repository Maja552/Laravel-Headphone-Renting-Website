<?php

namespace App\Http\Livewire\Rents\Filters;

use App\Http\Utils;
use App\Models\Rentstatus;
use LaravelViews\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class RentstatusFilter extends Filter
{
    public $title = '';

    public function __construct() {
        parent::__construct();
        $this->title = __('rents.filters.rentstatus_title');
    }

    public function apply(Builder $query, $value, $request): Builder {
        return $query->where('statusId', $value);
    }

    public function options(): array {
        $options = [];
        $statuses = Rentstatus::all();
        for ($i = 0; $i <= count($statuses)-1; $i++) {
            $name = Utils::trans('rentstatuses.rentstatuses.'.strtolower($statuses[$i]->name), $statuses[$i]->name);
            $options[$name] = $statuses[$i]->id;
        }

        return $options;
    }
}
