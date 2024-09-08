<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Organisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'structural_unit_id',
        'parent_id',
    ];
    public function employees():HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function structuralUnit():BelongsTo
    {
        return $this->belongsTo(StructuralUnit::class);
    }
    public function animals():hasMany
    {
        return $this->hasMany(Animal::class, 'organisation_id');
    }
}
