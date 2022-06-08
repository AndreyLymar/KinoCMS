<?php

namespace App\Http\Controllers\Admin\Hall;

use App\Http\Requests\Admin\Hall\createOrUpdateRequest;
use App\Models\Cinema;
use App\Models\Hall;
use Illuminate\Http\Request;


class HallController extends BaseController
{
    public function create(Cinema $cinema){
        return view('admin.hall.create',compact('cinema'));
    }

    public function edit(Hall $hall, Cinema $cinema){
        return view('admin.hall.edit',compact('hall','cinema'));
    }

    public function updateOrCreate(createOrUpdateRequest $request){
//        dd($request);
        $data = $request->validated();
        $cinema_id = $this->service->updateOrCreate($data);
        return redirect()->route('admin.cinemas.edit',$cinema_id);
    }

    public function destroy(Hall $hall, Cinema $cinema){
        $hall->delete();
        return redirect()->route('admin.cinemas.edit',$cinema->id);

    }
}
