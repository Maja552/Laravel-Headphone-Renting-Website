<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idHeadphone',
        'owner',
        'price',
        'description'
    ];

    public function shortName() {
        $headphone = Headphone::where('id', $this->idHeadphone )->first();

        return Manufacturer::where('id', $headphone->idManufacturer )->first()->name . ' ' . $headphone->name;
    }

    public function __toString() {
        return __('units.tostring', [
            'headphone' => $this->shortName(),
            'id' => $this->id
        ]);
    }

    public function headphones() {
        return $this->belongsTo(Headphone::class, 'idHeadphone');
    }
}
