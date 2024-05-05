<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'userId',
        'totalPrice',
        'startDate',
        'endDate',
        'requestDate',
        'statusId',
        'description',
        'deliveryName',
        'deliveryEmail',
        'deliveryPhone',
        'deliveryAddress'
    ];

    protected $casts = [
        'totalPrice' => 'float'
    ];

    public function __toString()
    {
        return __('rents.tostring', [
            'owner' => User::find($this->userId)->name,
            'description' => $this->description,
            'id' => $this->id
        ]);
    }

    public function rentstatus()
    {
        return $this->belongsTo(Rentstatus::class);
    }
}
