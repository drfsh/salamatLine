<?php

namespace App\Traits;
use App\Models\Address;

trait CheckAddress {
    public function Address($id,$userId) {

        $address = Address::with('province','city','district')->find($id);
        if ($address->user_id != $userId) {
            return 'not valid';
        }
        if ($address->district_id) {
            $ad = $address->province->title.' - '.$address->city->title.' - '.$address->district->title.' - '.$address->content;
        }else{
            $ad = $address->province->title.' - '.$address->city->title.' - '.$address->content;
        }

        return $ad;
    }
}