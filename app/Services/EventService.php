<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Event\CurrentRestrictionEvent;
use App\Models\Event\EventModelFactory;
use App\Models\SemenPortion;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EventService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     *
     */
    public function index(mixed $data): ?LengthAwarePaginator
    {
        try {
            $perPage = Arr::get($data, 'per_page', 50);
            $page = Arr::get($data, 'page', 1);

            return  Event::query()->orderBy('id')->paginate(perPage: $perPage, page: $page);
        }catch (\Throwable $throwable){
            Log::error($throwable->getMessage());
        }

        return null;

    }
    public function show(string $id)
    {
        return CurrentRestrictionEvent::query()
            ->findOrFail($id);
    }


    public function storeEvent(array $data): ?Event
    {
        try {
            $event = Event::query()->create($data);
            if ($event) {
                return $event;
            }
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . " " . $exception->getMessage());
        }

        return null;
    }

    public function getEventDataClass($eventType)
    {
        return  App::make('\App\Entity\EventData\\'.Str::replace('_','',Str::title($eventType->slug)));

    }

    public function store(array $data)
    {
        try {
            $eventModel = EventModelFactory::create(Str::upper($data['type']));
            $event = $eventModel::query()->create($data);
            if ($event) {
                return $event;
            }
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . " " . $exception->getMessage());
        }

        return null;
    }


}
