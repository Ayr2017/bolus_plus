<?php

namespace Tests;

use App\Models\Bolus;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $this->user = User::factory()->create();
        $this->admin = User::factory()->create()->assignRole('admin');
    }
}
