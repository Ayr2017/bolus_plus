<?php

namespace App\Services\Employee;

use App\Models\Employee;
use \App\Services\Service;
use Illuminate\Support\Facades\Auth;

class EmployeeService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function current()
    {
        return Auth::user()->currentEmployee ?? null;
    }
}
