<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;

class User extends Authenticatable
{
    use Notifiable,HasRoles,Favoriteability;

    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'lname',
        'email',
        'phone',
        'mobile',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function newsletter()
    {
        return $this->hasOne('App\Models\Newsletter');
    }
    public function partner()
    {
        return $this->hasOne('App\Models\Partner');
    }

    public function getAvatarAttribute($value){
        if (!$value) {
           return asset('img/profile/default.jpg');
        }
        return asset('img/profile/' . $value);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


}
