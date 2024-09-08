<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Breed extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function animals():HasMany
    {
        return $this->hasMany(Animal::class);
    }
}