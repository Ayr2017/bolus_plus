<?php

namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class Filter
{
    protected Builder $builder;

    protected array $filterable = [];
    protected array $filterItems = [];
    private array $fields;



    public function __construct(protected Request $request) {
        $this->fields = $this->request?->all() ?? [];
    }

    /**
     * Apply the filters on the builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            $method = Str::camel($filter);
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], [$value]);
            }
        }

        return $this->builder;
    }


    /**
     * Get the list of filters and their values from the request.
     *
     * @return array
     */
    protected function getFilters(): array
    {
        $fields = $this->fields;
        foreach($fields as $key=>$field) {
            $fieldType = gettype($field);
            if ($fieldType=='string'){
                $this->filterItems[$key]=trim($field);
            }elseif ($fieldType=='array'){
                $this->filterItems[$key]=$this->trimArrayItems($field);
            }
        }
        return array_filter($this->filterItems);
    }

    private function trimArrayItems(array $field): array
    {
        return array_map('trim', $field);
    }
}
