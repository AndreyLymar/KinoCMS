<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\createOrUpdateRequest;
use App\Models\Cinema;
use App\Service\Admin\Cinema\Service;

class CinemaController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $cinemas = Cinema::all();
        return view('admin.cinema.index', compact('cinemas',));
    }

    public function create()
    {
        return view('admin.cinema.create');
    }

    public function edit(Cinema $cinema)
    {
        return view('admin.cinema.edit', compact('cinema'));
    }

    public function updateOrCreate(createOrUpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->updateOrCreate($data);
        return redirect()->route('admin.cinemas.index');
    }

    public function destroy(Cinema $cinema)
    {
        $this->service->delete($cinema);
        return redirect()->route('admin.cinemas.index');

    }
}
