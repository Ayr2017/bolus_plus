<?php

namespace App\Services\Animal;

use App\Models\Animal;
use \App\Services\Service;

class AnimalService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeAnimal(array $data): ?Animal
    {
        $animal = Animal::query()->create($data);
        if($animal){
            return $animal;
        }
        return null;
    }
    public function updateAnimal(array $data, Animal $animal): ?Animal
    {
        $result = $animal->update($data);
        if($result){
            return $animal;
        }
        return null;
    }
}
