<?php

namespace App\Http\Controllers\User\PersonalAccount;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\HomePage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class PersonalAccountController extends BaseController
{
    public function index(){
        return view('user.personal_account.index');
    }

    public function update(UpdateRequest $request, User $user){
        $data = $request->validated();
        $this->service->update($data);
        return redirect()->route('user.personal_accounts.index');
    }
}
