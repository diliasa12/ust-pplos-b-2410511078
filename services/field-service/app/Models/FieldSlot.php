<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FieldSlot extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'field_id',
        'date',
        'start_time',
        'end_time',
        'status',
        'booking_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
}
