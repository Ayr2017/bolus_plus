<?php

namespace App\Models;

use AllowDynamicProperties;
use App\Models\Interfaces\HasDataFieldsInterface;
use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;


#[AllowDynamicProperties] class Event extends Model implements HasDataFieldsInterface
{
    use HasFactory;
    public mixed $eventData;
    private string $type;
    private string $event_category;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $fillable = [
        'type',
        'data',
        'event_category',
        'creator_id',
    ];

    protected $table = 'events';

    protected $casts = [
        'data' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();
        self::creating(function ($model) {
            $model->creator_id = auth()->id();
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function getDataFields(): array
    {
        return [];
    }


}
