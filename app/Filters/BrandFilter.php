<?php

namespace App\Filters;

use Ambengers\QueryFilter\AbstractQueryFilter;

class BrandFilter extends AbstractQueryFilter
{
    protected $loader = '';

    protected $searchableColumns = [];

    protected $filters = [];

    public function keywords($name)
    {
        return $this->builder->where('title','LIKE','%'.$name.'%');
    }





    public function filter($name)
    {
        if ($name == 'withImage') {
            return $this->builder->whereNotNull('image');
        }elseif($name == 'noImage'){
            return $this->builder->whereNull('image');
        }elseif($name == 'withContent'){
            return $this->builder->whereNotNull('content');
        }elseif($name == 'noContent'){
            return $this->builder->whereNull('content');
        }elseif($name == 'withKeyboard'){
            return $this->builder->whereHas('seo', function ($query) use ($name) {$query->whereNotNull('keywords');});
        }elseif($name == 'noKeyboard'){
            return $this->builder->whereHas('seo', function ($query) use ($name) {$query->whereNull('keywords');})->orWhereDoesntHave('seo');
        }elseif($name == 'withProduct'){
            return $this->builder->whereHas('product');
        }elseif($name == 'noProduct'){
            return $this->builder->WhereDoesntHave('product');
        }
    }






}
