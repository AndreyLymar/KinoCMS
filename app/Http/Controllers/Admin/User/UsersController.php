<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends BaseController
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function show(User $user){
        $cities = City::all();
        return view('admin.user.show', compact('user','cities'));
    }

    public function update (Request $request, User $user){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['nullable','string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'min:14'],
            'role' => ['int'],
            'pseudonym' => ['nullable','string', 'max:255'],
            'address' => ['nullable','string', 'max:255'],
            'gender' => ['nullable','string', 'max:15'],
            'date_of_birth' => ['nullable','date'],
            'city_id' => '',
            'number_card' => ['nullable','string','min:19','max:19'],
        ]);
        unset($data['id']);
        if(!isset($data['password'])){
            unset($data['password']);
        }
        if($data['city_id'] == 0){
            $data['city_id'] = null;
        }
        $user->update($data);
        return redirect()->route('admin.users.index');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
