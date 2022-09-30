<?php

namespace App\Filters;

use Ambengers\QueryFilter\AbstractQueryFilter;

class InventoryFilter extends AbstractQueryFilter
{
    /**
     * Relationship loader class.
     *
     * @var string
     */
    protected $loader = '';

    /**
     * Columns that are searchable.
     *
     * @var array
     */
    protected $searchableColumns = [
        //
    ];

    /**
     * List of object filters.
     *
     * @var array
     */
    protected $filters = [
        //
    ];

    public function searchwords($name)
    {
        return $this->builder->whereHas('product', function ($query) use ($name) {
            $query->where('title','LIKE','%'.$name.'%');
        });
    }

}
