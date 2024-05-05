<?php

namespace App\Http\Repositories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ManufacturerRepository
{
    public static function async(string|null $search, array|null $selected): Collection
    {
        return Manufacturer::query()
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
    }
}
