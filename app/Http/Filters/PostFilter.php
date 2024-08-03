<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';

    public function getCallbacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function categoryId(Builder $builder, $value) {
        $builder->where('category_id', $value);
    }
}
