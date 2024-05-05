<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Headphone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'idManufacturer',
        'idDrivertechnology',
        'idFittype',
        'idBacktype',
        'releaseYear',
        'weight',
        'impedance',
        'impedanceUnit',
        'driverSize',
        'image'
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'idManufacturer')->withTrashed();
    }

    public function drivertechnology()
    {
        return $this->belongsTo(Drivertechnology::class, 'idDrivertechnology')->withTrashed();
    }

    public function fittype()
    {
        return $this->belongsTo(Fittype::class, 'idFittype')->withTrashed();
    }

    public function backtype()
    {
        return $this->belongsTo(Backtype::class, 'idBacktype')->withTrashed() ;
    }


    protected function image(): Attribute {
        return Attribute::make(
            get: function ($value) {
                if ($value === null) {
                    return null;
                }
                return config('filesystems.images_dir') . '/' . $value;
            },
        );
    }

    public function imageUrl(): string {
        return $this->imageExists()
            ? Storage::url($this->image)
            : Storage::url(
                config('filesystems.default_image')
            );
    }

    public function imageExists(): bool {
        return $this->image !== null
            && Storage::disk('public')->exists($this->image);
    }
}
