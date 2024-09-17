<?php

namespace App\Entity;

class StoreRule
{
    public function __construct(array $data)
    {
        $storeRulesArray = $data['store_rules'];
        foreach ($storeRulesArray as $storeRule) {
            $$storeRule['name'] = $storeRule['name'];
        }
    }
}
