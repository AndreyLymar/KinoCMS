<?php

namespace App\Http\Controllers\User\PersonalAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Service\User\PersonalAccount\Service;


class PersonalAccountController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('user.personal_account.index');
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $this->service->update($data);
        return redirect()->route('user.personal_accounts.index');
    }
}
