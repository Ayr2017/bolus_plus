<?php

namespace App\Http\Resources\Restriction;

use App\Http\Resources\PaginatedJsonResponse;
use App\Modules\Event\DataObject\EventDataObjectFactory;
use Illuminate\Http\Request;

class RestrictionResource extends PaginatedJsonResponse
{
    /**
     * @throws \Exception
     */
    public function toArray(Request $request): array
    {
        $special = [];
        $general =  [
            'id' => $this->id,
            'type' => $this->type,
            'event_category' => $this->event_category,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];

        $dataObject = EventDataObjectFactory::create($this->type, $this->data ?? []);

        foreach ($dataObject->fields() as $field) {
            $special[$field] = $this->{$field};
        }

        return array_merge($general, $special);
    }
}
