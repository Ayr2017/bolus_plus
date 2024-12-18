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
        $this->artisan('db:seed');

        // TODO: заполнить сидер
        $this->artisan('db:seed --class=BreedingBullSeeder');


        BreedingBull::create(['type' => 'type1']);
        BreedingBull::create(['type' => 'type2']);
    }

    public function test_index_for_admin()
    {
        $response = $this->actingAs($this->admin)->getJson(route('api.breeding-bulls.index'));
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

        // TODO: привести к единому виду:
        // в api response           seed_supplier и seed_code
        // в модели                 seed_supplier и semen_code
        // в миграции               semen_supplier и semen_code
        $this->assertTrue(False); // это специальный фэйл для привлечения внимания, удалить после исправления


        // TODO: после создания отдавать 201 вместо 200
        $response->assertCreated();

        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'id',
                'type',
                'seed_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'seed_code',
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
        $data = [
            'type' => 'Test Type',
            'rshn_id' => 'Test RSHN ID',
        ];

        $response = $this->actingAs($this->user)->postJson(route('api.breeding-bulls.store'), $data);

        // TODO: после создания отдавать 201 вместо 200
        $response->assertCreated();
        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'id',
                'type',
                'seed_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'seed_code',
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

    public function test_show_for_admin()
    {
        $breedingBull = BreedingBull::query()->first();
        $response = $this->actingAs($this->admin)->json('GET', route('api.breeding-bulls.show', $breedingBull), ['breeding_bull' => $breedingBull->id]);

        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'success',
            'error',
            'data' => [
                'id',
                'type',
                'seed_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'seed_code',
                'rshn_id',
                'color',
                'is_selected',
                'is_active',
                'is_own',
                'created_at',
                'updated_at',
            ],
        ]);
        $response->assertJson([
            'data' => [
                'id' => $breedingBull->id,
                'type' => $breedingBull->type,
                'seed_supplier' => $breedingBull->seed_supplier,
                'nickname' => $breedingBull->nickname,
                'date_of_birth' => $breedingBull->date_of_birth,
                'country_of_birth' => $breedingBull->country_of_birth,
                'tag_number' => $breedingBull->tag_number,
                'seed_code' => $breedingBull->seed_code,
                'rshn_id' => $breedingBull->rshn_id,
                'color' => $breedingBull->color,
                'is_selected' => $breedingBull->is_selected,
                'is_active' => $breedingBull->is_active,
                'is_own' => $breedingBull->is_own,
                'created_at' => $breedingBull->created_at,
                'updated_at' => $breedingBull->updated_at,
            ]
        ]);
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
                'seed_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'seed_code',
                'rshn_id',
                'color',
                'is_selected',
                'is_active',
                'is_own',
                'created_at',
                'updated_at',
            ],
        ]);
        $response->assertJson([
            'data' => [
                'id' => $breedingBull->id,
                'type' => $breedingBull->type,
                'seed_supplier' => $breedingBull->seed_supplier,
                'nickname' => $breedingBull->nickname,
                'date_of_birth' => $breedingBull->date_of_birth,
                'country_of_birth' => $breedingBull->country_of_birth,
                'tag_number' => $breedingBull->tag_number,
                'seed_code' => $breedingBull->seed_code,
                'rshn_id' => $breedingBull->rshn_id,
                'color' => $breedingBull->color,
                'is_selected' => $breedingBull->is_selected,
                'is_active' => $breedingBull->is_active,
                'is_own' => $breedingBull->is_own,
                'created_at' => $breedingBull->created_at,
                'updated_at' => $breedingBull->updated_at,
            ]
        ]);
    }

    public function test_update_for_admin()
    {
        $breedingBull = BreedingBull::query()->first();

        $data = [
            'type' => 'Updated Type',
            'seed_supplier' => 'Updated Seed Supplier',
            'nickname' => 'Updated Nickname',
            'date_of_birth' =>  now(),
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
                'seed_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'seed_code',
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
            'seed_supplier' => 'Updated Seed Supplier',
            'nickname' => 'Updated Nickname',
            'date_of_birth' =>  now(),
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
                'seed_supplier',
                'nickname',
                'date_of_birth',
                'country_of_birth',
                'tag_number',
                'seed_code',
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
