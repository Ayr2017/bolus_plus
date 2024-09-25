<?php

namespace App\Filters;

use App\Models\BolusReading;

class BolusReadingFilter extends Filter
{
    public function dateGt($date = null)
    {
        if($date == null){
            return $this->builder;
        }

        return $this->builder->whereDate('date', '>', $date);
    }
    public function dateLt($date = null)
    {
        if($date == null){
            return $this->builder;
        }

        return $this->builder->whereDate('date', '<', $date);
    }
    public function dateLte($date = null)
    {
        if($date == null){
            return $this->builder;
        }

        return $this->builder->whereDate('date', '<=', $date);
    }
    public function units($units = [])
    {
        $units = collect($units)->map(function ($value, $key) {
            return strtolower($value);
        })->toArray();
        $units = array_merge(
            array_intersect($units,$this->builder->getModel()->getFillable()),
            $this->builder->getModel()->getDates()
        );

        return $this->builder->select($units);
    }

    public function animalIds($animalIds = [])
    {
        $animalIds = array_filter($animalIds);
        if($animalIds == []){
            return $this->builder;
        }

        return $this->builder->whereHas('animal', function ($query) use ($animalIds) {
            $query->whereIn('animals.id', $animalIds);
        });
    }
}
