<?php

namespace Tests\Feature\Bolus;

use AllowDynamicProperties;
use App\Models\Bolus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

#[AllowDynamicProperties] class BolusesControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $this->boluses = Bolus::factory()->count(10)->create();
        $this->user = User::factory()->create();
        $this->admin = User::factory()->create()->assignRole('admin');
    }

    /**
     * @return void
     */
    public function test_non_admin_user_cannot_access_admin_routes(): void
    {
        $response = $this->actingAs($this->user)->get('/boluses');
        $response->assertStatus(403);
    }
    /**
     * @return void
     */
    public function test_admin_user_cannot_access_admin_routes(): void
    {
        $response = $this->actingAs($this->admin)->get('/boluses');
        $response->assertStatus(200);
    }
}
