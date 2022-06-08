<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\createOrUpdateRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index(){
       $cities = City::all();
        return view('admin.city.index', compact('cities'));
    }

    public function create(){
        return view('admin.city.create');
    }

    public function edit(City $city){
        return view('admin.city.edit',compact('city'));
    }

    public function updateOrCreate(createOrUpdateRequest $request){
        $data = $request->validated();
        $id = $data['id'];
        unset($data['id']);
        City::updateOrCreate(['id' => $id],$data);
        return redirect()->route('admin.cities.index');
    }

    public function destroy(City $city){
        $city->delete();
        return redirect()->route('admin.cities.index');

    }
}
