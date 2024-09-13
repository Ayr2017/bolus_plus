<?php

namespace Tests\Feature\Bolus;

use AllowDynamicProperties;
use App\Models\Bolus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
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
    public function test_non_admin_user_cannot_access_index_route(): void
    {
        $response = $this->actingAs($this->user)->get('/boluses');
        $response->assertStatus(403);
    }
    /**
     * @return void
     */
    public function test_admin_user_can_access_index_route(): void
    {
        $response = $this->actingAs($this->admin)->get('/boluses');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_non_admin_user_cannot_access_show_route(): void
    {
        $this->boluses->each(function ($bolus) {
            $response = $this->actingAs($this->user)->get('/boluses/' . $bolus->id);
            $response->assertStatus(403);
        });
    }

    /**
     * @return void
     */
    public function test_admin_user_can_access_show_route(): void
    {
        $this->boluses->each(function ($bolus) {
            $response = $this->actingAs($this->admin)->get('/boluses/' . $bolus->id);
            $response->assertStatus(200);
        });
    }

    /**
     * @return void
     */
    public function test_non_admin_user_cannot_create_bolus(): void
    {
        $bolusData = Bolus::factory()->make()->toArray();
        $response = $this->actingAs($this->user)->post(route('boluses.store'), $bolusData);
        $response->assertStatus(403);
    }

    /**
     * @return void
     */
    public function test_admin_user_can_create_bolus(): void
    {
        $bolusData = Bolus::factory()->make()->toArray();
        $response = $this->actingAs($this->admin)->post(route('boluses.store'), $bolusData);
        $response->assertStatus(302);
        $response->assertRedirect('/boluses');
    }

}
