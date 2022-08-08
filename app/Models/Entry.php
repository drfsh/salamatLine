<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id','code','expire'];
}
