<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\City;
use App\Models\User;
use App\Service\Admin\User\Service;

class UsersController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {

        $users = User::paginate(5);

        return view('admin.user.index', compact('users'));
    }

    public function show(User $user)
    {

        $cities = City::all();

        return view('admin.user.show', compact('user', 'cities'));
    }

    public function update(UpdateRequest $request, User $user)
    {

        $data = $request->validated();

        $this->service->update($user, $data);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
