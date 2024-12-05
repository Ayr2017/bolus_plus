<?php

namespace App\Enums\Directory;

enum InseminationMethods: string
{
    case FULL = 'Полная';
    case HALF = 'Половина';
    case QUARTER = 'Четверть';
    case DOUBLE = 'Двойная';

    public function slug(): string
    {
        return match ($this) {
            self::FULL => 'full',
            self::HALF => 'half',
            self::QUARTER => 'quarter',
            self::DOUBLE => 'double',
        };
    }

    public function id(): int
    {
        return match ($this) {
            self::FULL => 1,
            self::HALF => 2,
            self::QUARTER => 3,
            self::DOUBLE => 4,
        };
    }

    public static function all(): array
    {
        return array_map(fn($case) => [
            'id' => $case->id(),
            'slug' => $case->slug(),
            'value' => $case->value,
        ], self::cases());
    }
}
