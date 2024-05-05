<?php

namespace App\Http\Repositories;

use App\Http\Utils;
use App\Models\Rent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RentRepository
{
    public static function async(string|null $search, array|null $selected): Collection
    {
        $collection = Rent::query()
            ->orderBy('id')
            ->when(
                $selected,
                fn (Builder $query) => $query->whereIn('id', $selected),
                fn (Builder $query) => $query
            )
            ->get();
        foreach($collection as $item) {
            $item->name = $item->__toString();
        }
        return $collection;
    }
}
