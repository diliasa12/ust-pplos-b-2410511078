<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Field extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'location',
        'price_per_hour',
        'status',
    ];

    protected $casts = [
        'price_per_hour' => 'decimal:2',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function category()
    {
        return $this->belongsTo(FieldCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(FieldImage::class, 'field_id');
    }

    public function schedules()
    {
        return $this->hasMany(FieldSchedule::class, 'field_id');
    }

    public function slots()
    {
        return $this->hasMany(FieldSlot::class, 'field_id');
    }

    public function primaryImage()
    {
        return $this->hasOne(FieldImage::class, 'field_id')->where('is_primary', true);
    }
}
