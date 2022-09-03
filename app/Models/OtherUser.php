<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTypeBuyAttribute($value): ?string
    {
        if ($value == 1)
            return 'خرید آنلاین';
        elseif ($value == 2)
            return 'خرید حضوری';
        elseif ($value == 3)
            return 'خرید همکار';
        else
            return $value;
    }
    public function getRoleAttribute($value): ?string
    {
        if ($value == 1)
            return 'ادمین';
        elseif ($value == 2)
            return 'همکار';
        elseif ($value == 3)
            return 'خریدار';
        else
            return $value;
    }

}
