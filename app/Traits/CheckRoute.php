<?php

namespace App\Traits;

trait CheckRoute {

    static public function check($name)
    {
        if (request()->route()->getName() == $name)
            return 'active';
        else
            return '';
    }
}