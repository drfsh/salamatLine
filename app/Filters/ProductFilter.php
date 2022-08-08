<?php

namespace App\Filters;

use Ambengers\QueryFilter\AbstractQueryFilter;
use Illuminate\Http\Request;

class ProductFilter extends AbstractQueryFilter
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
    ];

    /**
     * List of object filters.
     *
     * @var array
     */
    protected $filters = [
    ];

    protected $sortableColumns = [];

    public function keywords($name)
    {
        return $this->builder
        ->where('id','LIKE','%'.$name.'%')
        ->orWhere('title','LIKE','%'.$name.'%')
        ->orWhere('subtitle','LIKE','%'.$name.'%');
    }


    public function price($price)
    {
        if ($price == 'single') {
            return $this->builder->whereNotNull('price');
        }elseif($price == 'multi'){
            return $this->builder->whereHas('multiprice');
        }elseif($price == 'empty'){
            return $this->builder->whereNull('price')->doesntHave('multiprice');
        }
        
    }

    public function brand($id)
    {
        if ($id == 'null') {
            return $this->builder->whereNull('brand_id');
        }
        return $this->builder->where('brand_id',$id);
    }

    public function country($id)
    {
        if ($id == 'null') {
            return $this->builder->whereNull('country_id');
        }
        return $this->builder->where('country_id',$id);
    }

    public function company($id)
    {
        if ($id == 'null') {
            return $this->builder->whereHas('feature', function ($query) use ($id) {$query->whereNull('company_id');});
        }
        return $this->builder->whereHas('feature', function ($query) use ($id) {$query->where('company_id',$id);});       
        
    }


    public function filter($name)
    {
        if ($name == 'nopic') {
            return $this->builder->whereNull('image');
        }elseif($name == 'nosubtitle'){
            return $this->builder->whereNull('subtitle');
        }elseif($name == 'nocontent'){
            return $this->builder->whereHas('feature', function ($query) use ($name) {$query->whereNull('content');});
        }elseif($name == 'withcontent'){
            return $this->builder->whereHas('feature', function ($query) use ($name) {$query->whereNotNull('content');});
        }elseif ($name == 'multifeature') {
            return $this->builder->whereHas('multifeature');
        }elseif ($name == 'discount') {
            return $this->builder->whereHas('discount');
        }elseif ($name == 'featured') {
            return $this->builder->where('featured',1);
        }elseif ($name == 'multipic') {
            return $this->builder->whereHas('photos');
        }elseif ($name == 'active') {
            return $this->builder->where('active',1);
        }elseif ($name == 'inactive') {
            return $this->builder->where('active',0);
        }
    }

    public function size($name)
    {
        if ($name == 'empty') {
            return $this->builder->whereHas('feature', function ($query) use ($name) {$query->whereNull('transport');});
        }else{
            return $this->builder->whereHas('feature', function ($query) use ($name) {$query->where('transport',$name);});
        }
    }



    public function seo($name)
    {
        if ($name == 'withkeyboard') {
            return $this->builder->whereHas('seo', function ($query) use ($name) {$query->whereNotNull('keywords');});
        }elseif ($name == 'nokeyword') {
            return $this->builder->whereHas('seo', function ($query) use ($name) {$query->whereNull('keywords');})->ordoesntHave('seo');
        }elseif ($name == 'withdesc') {
            return $this->builder->whereHas('seo', function ($query) use ($name) {$query->whereNotNull('metadesc');});
        }elseif ($name == 'nodesc') {
            return $this->builder->whereHas('seo', function ($query) use ($name) {$query->whereNull('metadesc');})->ordoesntHave('seo');
        }
    }

}
