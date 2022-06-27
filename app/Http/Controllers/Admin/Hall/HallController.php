<?php

namespace App\Http\Controllers\Admin\Hall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hall\createOrUpdateRequest;
use App\Models\Cinema;
use App\Models\Hall;
use App\Service\Admin\Hall\Service;


class HallController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function create(Cinema $cinema)
    {
        return view('admin.hall.create', compact('cinema'));
    }

    public function edit(Hall $hall, Cinema $cinema)
    {
        return view('admin.hall.edit', compact('hall', 'cinema'));
    }

    public function updateOrCreate(createOrUpdateRequest $request)
    {
        $data = $request->validated();
        $cinema_id = $this->service->updateOrCreate($data);
        return redirect()->route('admin.cinemas.edit', $cinema_id);
    }

    public function destroy(Hall $hall, Cinema $cinema)
    {
        $this->service->delete($hall);
        return redirect()->route('admin.cinemas.edit', $cinema->id);

    }
}
