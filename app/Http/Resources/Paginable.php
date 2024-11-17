<?php

namespace App\Http\Resources;

use Illuminate\Pagination\LengthAwarePaginator;

interface Paginable
{
    public static function paginatedCollection(LengthAwarePaginator $paginator): array;
}
