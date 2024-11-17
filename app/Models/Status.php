<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Status extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'slug',
        'description',
    ];

    static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = Str::upper(Str::slug($model->name, '_'));
        });
        self::updating(function ($model) {
            $model->slug = Str::upper(Str::slug($model->name, '_'));
        });
    }
}
