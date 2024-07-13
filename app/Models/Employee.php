<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function organisation():BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
