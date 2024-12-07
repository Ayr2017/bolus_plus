<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SelectedBreedingBull extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'seed_supplier',
        'nickname',
        'date_of_birth',
        'country_of_birth',
        'tag_number',
        'seed_code',
        'rshn_id',
        'color',
        'breed_id',
    ];

    /**
     * Relationship with the Breed model.
     *
     * @return BelongsTo
     */
    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }
}
