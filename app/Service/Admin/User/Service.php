<?php

namespace App\Service\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Service
{
    public function update($user, $data)
    {
        unset($data['user_id']);
        if (!isset($data['password'])) {
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($data['password']);
        }
        if ($data['city_id'] == 0) {
            $data['city_id'] = null;
        }
        $user->update($data);
    }
}
