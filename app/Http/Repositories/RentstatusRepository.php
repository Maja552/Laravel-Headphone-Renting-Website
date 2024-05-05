<?php

namespace App\Http\Repositories;

use App\Http\Utils;
use App\Models\Rentstatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RentstatusRepository
{
    public static function async(string|null $search, array|null $selected): Collection
    {
        $collection = Rentstatus::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->when(
                $search,
                fn (Builder $query) => $query->where('name', 'like', "%{$search}%")
            )
            ->when(
                $selected,
                fn (Builder $query) => $query->whereIn('id', $selected),
                fn (Builder $query) => $query
            )
            ->get();
        foreach($collection as $item) {
            $item->name = Utils::trans('rentstatuses.rentstatuses.'.strtolower($item->name), $item->name);
        }
        return $collection;
    }
}
