<?php

namespace App\Helpers;

class ModelSelectHelper
{
    public static function create(array $select): array
    {
        $filtered = array_filter($select);
        return count($filtered) ? array_merge(array_filter($select),['id']) : ['*'];
    }
}
