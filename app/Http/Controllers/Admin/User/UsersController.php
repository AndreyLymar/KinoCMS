<?php

namespace App\Http\Controllers\Admin\User;

class UsersController extends BaseController
{
    public function index(){
        return view('admin.user.index');
    }
}
