<?php

namespace Tests\Feature\Animal;

use AllowDynamicProperties;
use App\Models\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

#[AllowDynamicProperties] class AnimalsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_admin_user_can_access_index_route(): void
    {
        $response = $this->actingAs($this->user)->get('/animals');
        $response->assertStatus(200);
    }

    public function test_admin_user_can_access_index_route(): void
    {
        $response = $this->actingAs($this->admin)->get('/animals');
        $response->assertStatus(200);
    }

    public function test_index_method_returns_view_with_animals()
    {
        $response = $this->actingAs($this->user)->get(route('animals.index'));
        $response->assertStatus(200);
        $response->assertViewIs('animals.index');
        $response->assertViewHas('animals');
    }

    public function test_create_method_returns_view()
    {
        $response = $this->actingAs($this->user)->get(route('animals.create'));
        $response->assertStatus(200);
        $response->assertViewIs('animals.create');
    }

    public function test_store_method_creates_new_animal()
    {
        $data = Animal::factory()->make()->toArray();
        $response = $this->actingAs($this->user)->post(route('animals.store'), $data);
        $response->assertRedirect(route('animals.index'));
        $this->assertDatabaseHas('animals', $data);
    }

    public function test_show_method_returns_view_with_animal()
    {
        $animal = Animal::factory()->create();
        $response = $this->actingAs($this->user)->get(route('animals.show', $animal));
        $response->assertStatus(200);
        $response->assertViewIs('animals.show');
        $response->assertViewHas('animal');
    }

    public function test_edit_method_returns_view_with_animal()
    {
        $animal = Animal::factory()->create();
        $response = $this->actingAs($this->user)->get(route('animals.edit', $animal));
        $response->assertStatus(200);
        $response->assertViewIs('animals.edit');
        $response->assertViewHas('animal');
    }

    public function test_update_method_updates_animal()
    {
        $animal = Animal::factory()->create();
        $data = [
            'name' => 'Updated Test Animal',
        ];

        $response = $this->actingAs($this->admin)->put(route('animals.update', $animal->id), $data);
        $response->assertRedirect(route('animals.index'));
        $this->assertDatabaseHas('animals', $data);
    }

    // public function test_destroy_method_deletes_animal()
    // {
    //     $animal = Animal::factory()->create();
    //     $response = $this->delete(route('animals.destroy', $animal));
    //     $response->assertRedirect(route('animals.index'));
    //     $this->assertDatabaseMissing('animals', ['id' => $animal->id]);
    // }
}
