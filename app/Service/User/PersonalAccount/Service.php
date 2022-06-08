<?php

namespace App\Service\User\PersonalAccount;

use Illuminate\Support\Facades\Hash;

class Service
{
    public function update($data){
        unset($data['user_id']);
        if (!isset($data['password'])) {
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($data['password']);
        }
        if($data['city_id'] == 0){
            $data['city_id'] = null;
        }
        auth()->user()->update($data);
    }
}
