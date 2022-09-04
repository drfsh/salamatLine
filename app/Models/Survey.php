<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'twinmoti_official.surveys';
    public $incrementing = false;
    protected $primaryKey = 'invoice_id';

    protected $fillable = ['invoice_id'];

    // public function setAcquaintAttribute($value)
    // {
    //     $this->attributes['acquaint'] = json_encode($value);
    // }

    public function getAcquaintAttribute($value)
    {
        return $this->attributes['acquaint'] = json_decode($value);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
