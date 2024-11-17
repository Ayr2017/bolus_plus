<?php

namespace App\Strategies;

interface EventStrategy
{
    public function validateData(string $type): array;
    public function processData(array $data): array;
}
