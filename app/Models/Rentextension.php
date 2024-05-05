<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rentextension extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'requestDate',
        'oldEndDate',
        'newEndDate',
        'idRent',
        'price',
        'description'
    ];

    protected $casts = [
        'price' => 'float'
    ];

    public function __toString()
    {
        return 'Rent extension of rent (' . Rent::where('id', $this->idRent)->first() . ')';
    }
}
