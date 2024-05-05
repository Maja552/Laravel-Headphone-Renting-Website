<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rentedunit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'price',
        'idRent',
        'idUnit'
    ];

    protected $casts = [
        'price' => 'float'
    ];

    public function __toString()
    {
        return 'Rented unit (' . Headphone::where('id', $this->idUnit)->first()->name . ') idRent: ' . $this->idRent;
    }
}
