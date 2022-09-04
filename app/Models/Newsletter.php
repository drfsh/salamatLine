<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function getCreatedAtAttribute($value)
    {
        return Verta($value)->format('l d F Y ساعت H:i');
    }

}
