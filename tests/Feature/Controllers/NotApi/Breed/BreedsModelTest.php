<?php

namespace Feature\Controllers\NotApi\Breed;

use AllowDynamicProperties;
use App\Models\Breed;
use App\Models\Organisation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;


#[AllowDynamicProperties] class BreedsModelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->organisations = Organisation::factory()->count(5)->create();
    }

    public function test_mass_assignment()
    {
        // TODO: в модели Breed uuid указан в fillable, но перезаписывается при создании - это надо исправить (убрать uuid из fillable)?
        $uuid = Str::uuid();
        $data = ['name' => 'Test Breed'];
        $breed = Breed::create($data);
        $this->assertEquals('Test Breed', $breed->name);
    }

    public function test_create_breed()
    {
        Breed::create([
            'name' => 'Test Breed',
        ]);

        $this->assertDatabaseHas('breeds', [
            'name' => 'Test Breed',
        ]);
    }

    public function test_breed_has_uuid_on_creation()
    {
        $breed = Breed::create([
            'name' => 'Test Breed',
        ]);

        $uuidString = $breed->uuid->toString();
        $this->assertNotNull($uuidString);
        $this->assertTrue(Str::isUuid($uuidString));
    }

    public function test_read_breed()
    {
        $breed = Breed::create([
            'name' => 'Test Breed',
        ]);

        $foundBreed = Breed::find($breed->id);
        $this->assertEquals('Test Breed', $foundBreed->name);
        $this->assertTrue(Str::isUuid($foundBreed->uuid));
    }

    public function test_update_breed()
    {
        $breed = Breed::create([
            'name' => 'Test Breed',
        ]);

        $breed->update([
            'name' => 'Updated Test Breed',
        ]);

        $this->assertDatabaseHas('breeds', [
            'name' => 'Updated Test Breed',
        ]);
    }

    public function test_delete_breed()
    {
        $breed = Breed::create([
            'name' => 'Test Breed',
        ]);

        $breed->delete();

        $this->assertDatabaseMissing('breeds', [
            'id' => $breed->id,
        ]);
    }

    public function test_breed_has_many_animals()
    {
        $breed = Breed::create([
            'name' => 'Айрширская',
        ]);

        $animal1 = $breed->animals()->create([
            'name' => 'Имя1',
            'number' => '111111',
            'organisation_id' => $this->organisations->first()->id,
        ]);


        $animal2 = $breed->animals()->create([
            'name' => 'Имя2',
            'number' => '222222',
            'organisation_id' => $this->organisations->first()->id,
        ]);

        $this->assertCount(2, $breed->animals);
        $this->assertTrue($breed->animals->contains($animal1));
        $this->assertTrue($breed->animals->contains($animal2));
    }

    // проверка scope (условий Eloquent)
    // public function test_active_scope_returns_only_active_models()
    // {
    //     $breed1 = Breed::create([
    //         'name' => 'Test Breed 1',
    //         'is_active' => true,
    //     ]);

    //     $breed2 = Breed::create([
    //         'name' => 'Test Breed 2',
    //         'is_active' => false,
    //     ]);

    //     $activeBreeds = Breed::active()->get();

    //     $this->assertCount(1, $activeBreeds);
    // }

    // проверка фабрики
    // public function test_breed_factory_creates_valid_model()
    // {
    //     $breed = Breed::factory()->create();

    //     $this->assertNotNull($breed->name);
    //     $this->assertNotNull($breed->uuid);
    // }

    // проверка мутаторов
    // public function test_name_is_capitalized()
    // {
    //     $breed = Breed::create(['name' => 'test breed']);
    //     $this->assertEquals('Test Breed', $breed->name);
    // }

    // проверка уникальности полей
    // public function test_unique_name_validation()
    // {
    //     Breed::create(['name' => 'Test Breed']);

    //     $this->expectException(QueryException::class);
    //     Breed::create(['name' => 'Test Breed']);
    // }

    // проверка soft_delete, если она есть в модели
    // public function test_soft_delete_breed()
    // {
    //     $breed = Breed::create([
    //         'name' => 'Test Breed',
    //     ]);
    //     $breed->delete();

    //     $this->assertSoftDeleted($breed);
    // }
}
