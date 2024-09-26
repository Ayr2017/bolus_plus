<?php

namespace Tests\Feature\Organisation;

use App\Models\Organisation;
use App\Models\StructuralUnit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganisationsControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->organisations = Organisation::factory()->count(10)->create();
        $this->structuralUnit = StructuralUnit::factory()->create();
    }

    public function test_non_admin_user_cannot_access_index_route(): void
    {
        $response = $this->actingAs($this->user)->get('/organisations');
        $response->assertStatus(403);
    }
}
