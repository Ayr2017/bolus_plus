<?php

namespace Feature\Models;

use AllowDynamicProperties;
use App\Models\BreedingBull;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\QueryException;
use Carbon\Carbon;


use function Symfony\Component\Clock\now;

#[AllowDynamicProperties] class BreedingBullTest extends TestCase
{
    use RefreshDatabase;

    public function test_mass_assignment()
    {
        $data = [
            'type' => 'Test Type',
            // TODO: в модели в fillable seed_supplier переименовать в semen_supplier, как указано в миграции. и тут тоже
            'seed_supplier' => 'Test Seed Supplier',
            'nickname' => 'Test Nickname',
            'date_of_birth' =>  now(),
            'country_of_birth' => 'Test Country of Birth',
            'tag_number' => 'Test Tag Number',
            'semen_code' => 'Test Semen Code',
            'rshn_id' => 'Test RSHN ID',
            'coat_color_id' => 1,
            'breed_id' => 1,
            'is_selected' => true,
            'is_active' => true,
            'is_own' => true,
        ];

        $result = BreedingBull::create($data);

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $result->$key);
        }
    }

    public function test_create()
    {
        $data = [
            'type' => 'Test Type',
        ];

        BreedingBull::create($data);

        $this->assertDatabaseHas('breeding_bulls', $data);
    }

    public function test_read()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
        ]);

        $found = BreedingBull::find($result->id);
        $this->assertEquals('Test Type', $found->type);
    }

    public function test_update()
    {
        $today = Carbon::now();
        $tomorrow = $today->addDay();

        $result = BreedingBull::create([
            'type' => 'Test Type',
            // TODO: в модели в fillable seed_supplier переименовать в semen_supplier, как указано в миграции. и тут тоже
            'seed_supplier' => 'Test Seed Supplier',
            'nickname' => 'Test Nickname',
            'date_of_birth' => $today,
            'country_of_birth' => 'Test Country of Birth',
            'tag_number' => 'Test Tag Number',
            'semen_code' => 'Test Semen Code',
            'rshn_id' => 'Test RSHN ID',
            'coat_color_id' => 1,
            'breed_id' => 1,
            'is_selected' => true,
            'is_active' => true,
            'is_own' => true,
        ]);

        $result->update([
            'type' => 'Updated Type',
            // TODO: в модели в fillable seed_supplier переименовать в semen_supplier, как указано в миграции. и тут тоже
            'seed_supplier' => 'Updated Seed Supplier',
            'nickname' => 'Updated Nickname',
            'date_of_birth' =>  $tomorrow,
            'country_of_birth' => 'Updated Country of Birth',
            'tag_number' => 'Updated Tag Number',
            'semen_code' => 'Updated Semen Code',
            'rshn_id' => 'Updated RSHN ID',
            'coat_color_id' => 2,
            'breed_id' => 2,
            'is_selected' => false,
            'is_active' => false,
            'is_own' => false,
        ]);

        $this->assertDatabaseHas('breeding_bulls', [
            'type' => 'Updated Type',
            // TODO: в модели в fillable seed_supplier переименовать в semen_supplier, как указано в миграции. и тут тоже
            'seed_supplier' => 'Updated Seed Supplier',
            'nickname' => 'Updated Nickname',
            'date_of_birth' =>  $tomorrow,
            'country_of_birth' => 'Updated Country of Birth',
            'tag_number' => 'Updated Tag Number',
            'semen_code' => 'Updated Semen Code',
            'rshn_id' => 'Updated RSHN ID',
            'coat_color_id' => 2,
            'breed_id' => 2,
            'is_selected' => false,
            'is_active' => false,
            'is_own' => false,
        ]);
    }

    public function test_delete()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
        ]);

        $result->delete();

        $this->assertDatabaseMissing('breeding_bulls', [
            'id' => $result->id,
        ]);
    }

    public function test_type_is_required()
    {
        $this->expectException(QueryException::class);
        BreedingBull::create(['type' => null]);
    }

    public function test_semen_supplier_is_nullable()
    {
        // TODO: seed_supplier переименовать в semen_supplier, как указано в миграции. и тут тоже
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'seed_supplier' => null,
        ]);

        $this->assertNull($result->seed_supplier);
    }

    public function test_nickname_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'nickname' => null,
        ]);

        $this->assertNull($result->nickname);
    }

    public function test_date_of_birth_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'date_of_birth' => null,
        ]);

        $this->assertNull($result->date_of_birth);
    }

    public function test_country_of_birth_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'country_of_birth' => null,
        ]);

        $this->assertNull($result->country_of_birth);
    }

    public function test_tag_number_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'tag_number' => null,
        ]);

        $this->assertNull($result->tag_number);
    }

    public function test_semen_code_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'semen_code' => null,
        ]);

        $this->assertNull($result->semen_code);
    }

    public function test_rshn_id_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'rshn_id' => null,
        ]);

        $this->assertNull($result->rshn_id);
    }

    public function test_coat_color_id_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'coat_color_id' => null,
        ]);

        $this->assertNull($result->coat_color_id);
    }

    public function test_breed_id_is_nullable()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'breed_id' => null,
        ]);

        $this->assertNull($result->breed_id);
    }

    public function test_is_selected_default_is_false()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
        ]);

        $result->refresh();

        // TODO: в модели кастовать is_selected to boolean
        $this->assertFalse($result->is_selected);
    }

    public function test_is_active_default_is_true()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
        ]);

        $result->refresh();

        $this->assertTrue($result->is_active);
    }

    public function test_is_own_default_is_false()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
        ]);

        $result->refresh();

        $this->assertFalse($result->is_own);
    }

    public function test_is_selected_casts_to_boolean()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'is_selected' => 1
        ]);

        // TODO: в модели кастовать is_selected to boolean
        $this->assertTrue($result->is_selected);
    }

    public function test_is_active_casts_to_boolean()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'is_active' => 1
        ]);

        $this->assertTrue($result->is_active);
    }

    public function test_is_own_casts_to_boolean()
    {
        $result = BreedingBull::create([
            'type' => 'Test Type',
            'is_own' => 1
        ]);

        $this->assertTrue($result->is_own);
    }

    public function test_factory()
    {
        $result = BreedingBull::factory()->create();

        $this->assertDatabaseHas('breeding_bulls', data: [
            'id' => $result->id,
        ]);

        $this->assertNotNull($result->id);
    }
}
