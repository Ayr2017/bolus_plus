<?php

namespace Feature\Controllers\Api;

use AllowDynamicProperties;
use App\Models\BreedingBull;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

#[AllowDynamicProperties] class BreedingBullsControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        BreedingBull::factory()->count(10)->create();

    }

    public function test_index_for_admin()
    {
        $response = $this->actingAs($this->admin)->getJson(route('api.breeding-bulls.index'));
        $response->assertSuccessful();
        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'items',
                "current_page",
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total',
            ]
        ]);
    }

    public function test_index_for_non_admin()
    {
        $response = $this->actingAs($this->user)->getJson(route('api.breeding-bulls.index'));
        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'items',
                "current_page",
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total',
            ]
        ]);
    }

    public function test_store_for_admin()
    {
        $data = [
            'type' => 'Test Type',
            'rshn_id' => 'Test RSHN ID',

        ];

        $response = $this->actingAs($this->admin)->postJson(route('api.breeding-bulls.store'), $data);

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'id',
                'type',
                'semen_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'semen_code',
                'rshn_id',
                'color',
                'is_selected',
                'is_active',
                'is_own',
                'created_at',
                'updated_at',
            ],
        ]);

        $this->assertDatabaseHas('breeding_bulls', $data);
    }

    public function test_store_for_non_admin()
    {
        $response = $this->actingAs($this->user)->postJson(route('api.breeding-bulls.store'), BreedingBull::factory()->make()->toArray());

        $response->assertForbidden();
    }
    public function test_show_for_admin()
    {
        $breedingBull = BreedingBull::query()->first();
        $response = $this->actingAs($this->admin)->json('GET', route('api.breeding-bulls.show', $breedingBull), ['breeding_bull' => $breedingBull->id]);

        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'error',
            'success',
            'data' => [
                'id',
                'type',
                'semen_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'semen_code',
                'rshn_id',
                'color',
                'is_selected',
                'is_active',
                'is_own',
                'created_at',
                'updated_at',
            ],
        ]);

        $response->assertJson(
            [
                'message' => 'Success',
                'data' => [
                    'id' => $breedingBull->id,
                    'type' => $breedingBull->type,
                    'semen_supplier' => $breedingBull->semen_supplier,
                    'nickname' => $breedingBull->nickname,
                    'date_of_birth' => $breedingBull->date_of_birth->toDateTimeString(), // Updated
                    'country_of_birth' => $breedingBull->country_of_birth,
                    'tag_number' => $breedingBull->tag_number,
                    'semen_code' => $breedingBull->semen_code,
                    'rshn_id' => $breedingBull->rshn_id,
                    'color' => $breedingBull->color,
                    'is_selected' => $breedingBull->is_selected,
                    'is_active' => $breedingBull->is_active,
                    'is_own' => $breedingBull->is_own,
                    'created_at' => $breedingBull->created_at->toDateTimeString(), // Updated
                    'updated_at' => $breedingBull->updated_at->toDateTimeString(), // Updated
                ],
                'success' => true,
                'error' => null,
            ]
        );
    }

    public function test_show_for_non_admin()
    {
        $breedingBull = BreedingBull::query()->first();
        $response = $this->actingAs($this->user)->json('GET', route('api.breeding-bulls.show', $breedingBull), ['breeding_bull' => $breedingBull->id]);

        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'id',
                'type',
                'semen_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'semen_code',
                'rshn_id',
                'color',
                'is_selected',
                'is_active',
                'is_own',
                'created_at',
                'updated_at',
            ],
        ]);

        $breedingBull = $breedingBull->fresh();
        $response->assertJson([
            'data' => [
                'id' => $breedingBull->id,
                'type' => $breedingBull->type,
                'semen_supplier' => $breedingBull->semen_supplier,
                'nickname' => $breedingBull->nickname,
                'date_of_birth' => $breedingBull->date_of_birth->toDateTimeString(),
                'country_of_birth' => $breedingBull->country_of_birth,
                'tag_number' => $breedingBull->tag_number,
                'semen_code' => $breedingBull->semen_code,
                'rshn_id' => $breedingBull->rshn_id,
                'color' => $breedingBull->color,
                'is_selected' => $breedingBull->is_selected,
                'is_active' => $breedingBull->is_active,
                'is_own' => $breedingBull->is_own,
                'created_at' => $breedingBull->created_at->toDateTimeString(),
                'updated_at' => $breedingBull->updated_at->toDateTimeString(),
            ]
        ]);
    }

    public function test_update_for_admin()
    {
        $breedingBull = BreedingBull::query()->first();

        $data = [
            'type' => 'Updated Type',
            'semen_supplier' => 'Updated Seed Supplier',
            'nickname' => 'Updated Nickname',
            'date_of_birth' => now(),
            'country_of_birth' => 'Updated Country of Birth',
            'tag_number' => 'Updated Tag Number',
            'semen_code' => 'Updated Semen Code',
            'rshn_id' => 'Updated RSHN ID',
            'coat_color_id' => 2,
            'breed_id' => 2,
            'is_selected' => false,
            'is_active' => false,
            'is_own' => false,
        ];

        // TODO: почему-то ищет колонку 'created_at:"2024-12-17T22:02:26.000000Z"' прямо целиком. ошибка синтаксиса.
        $response = $this->actingAs($this->admin)->putJson(route('api.breeding-bulls.update', $breedingBull), $data);

        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'id',
                'type',
                'semen_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'semen_code',
                'rshn_id',
                'color',
                'is_selected',
                'is_active',
                'is_own',
                'created_at',
                'updated_at',
            ],
        ]);

        $this->assertDatabaseHas('breeding_bulls', $data);
    }

    public function test_update_for_non_admin()
    {
        $breedingBull = BreedingBull::query()->first();

        $data = [
            'type' => 'Updated Type',
            'semen_supplier' => 'Updated Seed Supplier',
            'nickname' => 'Updated Nickname',
            'date_of_birth' => now(),
            'country_of_birth' => 'Updated Country of Birth',
            'tag_number' => 'Updated Tag Number',
            'semen_code' => 'Updated Semen Code',
            'rshn_id' => 'Updated RSHN ID',
            'coat_color_id' => 2,
            'breed_id' => 2,
            'is_selected' => false,
            'is_active' => false,
            'is_own' => false,
        ];

        // TODO: почему-то ищет колонку 'created_at:"2024-12-17T22:02:26.000000Z"' прямо целиком. ошибка синтаксиса.
        $response = $this->actingAs($this->admin)->putJson(route('api.breeding-bulls.update', $breedingBull), $data);

        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'id',
                'type',
                'semen_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'semen_code',
                'rshn_id',
                'color',
                'is_selected',
                'is_active',
                'is_own',
                'created_at',
                'updated_at',
            ],
        ]);

        $this->assertDatabaseHas('breeding_bulls', $data);
    }

    public function test_destroy_for_admin()
    {
        $breedingBull = BreedingBull::query()->first();

        $response = $this->actingAs($this->admin)->deleteJson(route('api.breeding-bulls.destroy', $breedingBull), ['breeding_bull' => $breedingBull->id]);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'error' => null,
        ]);

        $this->assertDatabaseMissing('breeding_bulls', ['id' => $breedingBull->id]);
    }


    public function test_destroy_forbidden_for_non_admin()
    {
        $breedingBull = BreedingBull::query()->first();

        $response = $this->actingAs($this->user)->deleteJson(route('api.breeding-bulls.destroy', $breedingBull), ['breeding_bull' => $breedingBull->id]);

        $response->assertForbidden();

        $this->assertDatabaseHas('breeding_bulls', ['id' => $breedingBull->id]);
    }
}
