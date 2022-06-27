<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\createOrUpdateRequest;
use App\Models\Film;
use App\Service\Admin\Film\Service;

class FilmController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $films_already = Film::where('status', 'already')->get();
        $films_soon = Film::where('status', 'soon')->get();
        return view('admin.film.index', compact('films_already','films_soon'));
    }

    public function create($status)
    {
        return view('admin.film.create',compact('status'));
    }

    public function edit(Film $film)
    {
        return view('admin.film.edit', compact('film'));
    }

    public function updateOrCreate(createOrUpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->updateOrCreate($data);
        return redirect()->route('admin.films.index');
    }

    public function destroy(Film $film)
    {
        $this->service->delete($film);
        return redirect()->route('admin.films.index');

    }
}
