<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Backtype extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function headphones()
    {
        return $this->belongsToMany(Headphone::class);
    }
}
