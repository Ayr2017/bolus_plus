<?php

namespace App\Services\InseminationMethods;

use App\Enums\Directory\InseminationMethods;
use \App\Services\Service;

class InseminationMethodService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getInseminationMethods()
    {

        return InseminationMethods::all();
    }
}
