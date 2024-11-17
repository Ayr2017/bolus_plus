<?php

namespace App\Strategies;

use App\Strategies\EventStrategy;

class CurrentRestrictionEventStrategy implements EventStrategy
{

    public function validateData(string $type): array
    {
        if($type == 'store'){
            return [
                'data.start_at' => 'date|nullable',
                'data.end_at' => 'date|nullable',
            ];
        }
    }

    public function processData(array $data): array
    {
        // TODO: Implement processData() method.
    }
}
