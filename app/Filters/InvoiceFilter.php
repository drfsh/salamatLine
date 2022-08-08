<?php

namespace App\Filters;

use Ambengers\QueryFilter\AbstractQueryFilter;

class InvoiceFilter extends AbstractQueryFilter
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

    public function keywords($name)
    {
        // return $this->builder
        // ->where('id','LIKE','%'.$name.'%')
        // ->orWhere('pay_num','LIKE','%'.$name.'%') 
        // ->orWhereHas('user', function ($query) use ($name) {
        //     $query->where('name','LIKE','%'.$name.'%')
        //     ->orWhere('lname','LIKE','%'.$name.'%')
        //     ->orWhere('email','LIKE','%'.$name.'%');
        // })->orWhereHas('coupon', function ($query) use ($name) {
        //     $query->where('code','LIKE','%'.$name.'%');
        // })->orWhereHas('address', function ($query) use ($name) {
        //     $query->where('content','LIKE','%'.$name.'%');
        // });        

    }


    public function situation($name)
    {

        if ($name == 'paid') {
            return $this->builder->where('situation', 'paid');
        }elseif ($name == 'producing') {
            return $this->builder->where('situation', 'production');
        }elseif ($name == 'send') {
            return $this->builder->where('situation', 'sending');
        }elseif ($name == 'sent') {
            return $this->builder->where('situation', 'arrived');
        }elseif ($name == 'finish') {
            return $this->builder->where('situation', 'finish');
        }elseif ($name == 'unpaid') {
            return $this->builder->where('situation', 'unpaid');
        }
       
    }

    public function creator($name)
    {

        if ($name == 'online') {
            return $this->builder->whereNull('creator_id');
        }elseif($name == 'employee') {
            return $this->builder->whereNotNull('creator_id');
        }else{
            return $this->builder->where('creator_id',$name);
        }
       
    }


    public function city($name)
    {

        if ($name == 'tehran') {
            return $this->builder->WhereHas('address'); 
        }elseif ($name == 'tehran2') {
            return $this->builder->WhereHas('address', function ($query) use ($name) {
                $query->where('province_id',1)
                ->where('city_id','!=',1);
            }); 
        }elseif ($name == 'province') {
            return $this->builder->WhereHas('address', function ($query) use ($name) {
                $query->where('province_id','!=',1);
            }); 
        }
       
    }




}
