<?php

namespace Tests\Unit\Models\RestrictionReason;

use App\Models\RestrictionReason;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RestrictionReasonTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест наличия необходимых колонок в таблице.
     */
    public function test_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('restriction_reasons', [
                'id',
                'name',
                'description',
                'created_at',
                'updated_at',
            ])
        );
    }

    /**
     * Тест проверки заполнения модели.
     */
    public function test_model_fillable_properties()
    {
        $restrictionReason = new RestrictionReason();

        $this->assertEquals(
            ['name', 'description'],
            $restrictionReason->getFillable()
        );
    }

    /**
     * Тест на уникальность поля `name`.
     */
    public function test_name_must_be_unique()
    {
        RestrictionReason::create([
            'name' => 'Test Reason',
            'description' => 'Test Description',
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        RestrictionReason::create([
            'name' => 'Test Reason', // Дублирование
            'description' => 'Another Description',
        ]);
    }

    /**
     * Тест на отношение hasMany (restrictions).
     */
    public function test_restriction_reason_has_many_restrictions()
    {
        $restrictionReason = RestrictionReason::factory()->create();

        $restriction = $restrictionReason->restrictions()->create([
            'name' => 'Sample Restriction',
        ]);

        $this->assertTrue($restrictionReason->restrictions->contains($restriction));
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Collection::class,
            $restrictionReason->restrictions
        );
    }

    /**
     * Тест на наличие кастомного аксессора или мутатора (если есть).
     */
    public function test_custom_accessors_or_mutators()
    {
        $restrictionReason = RestrictionReason::factory()->create([
            'name' => 'test name',
        ]);

        // Проверка, что, например, имя сохраняется в верхнем регистре
        $this->assertEquals('TEST NAME', $restrictionReason->name);
    }
}
