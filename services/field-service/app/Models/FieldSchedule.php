<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FieldSchedule extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'field_id',
        'day_of_week',
        'open_time',
        'close_time',
        'is_open',
    ];

    protected $casts = [
        'is_open' => 'boolean',
        'day_of_week' => 'integer',
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
