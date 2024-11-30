<?php

namespace App\Models;

use AllowDynamicProperties;
use App\Modules\Event\DataObject\EventDataObject;
use App\Modules\Event\DataObject\EventDataObjectFactory;
use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

#[AllowDynamicProperties] class Event extends Model
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

    /**
     * @return EventDataObject
     * @throws Exception
     */
    public function getDataObject(): EventDataObject
    {
        return EventDataObjectFactory::create($this->type, $this->data ?? []);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class, 'event_type_id', 'id');
    }

}
