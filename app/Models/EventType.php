<?php

namespace App\Models;

use App\Models\Events\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class EventType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::upper(Str::slug($model->name,'_'));
        });
        static::updating(function ($model) {
            $model->slug = Str::upper(Str::slug($model->name,'_'));
        });
    }

    public function events():HasMany
    {
        return $this->hasMany(Event::class, 'event_type_id', 'id');
    }
}
