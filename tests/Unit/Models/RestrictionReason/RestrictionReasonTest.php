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
}
