<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\Main\StoreRequest;
use App\Http\Requests\Admin\Pages\Main\UpdateRequest;
use App\Models\HomePage;
use App\Service\Admin\Page\Main\Service;

class MainController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.page.index');
    }

    public function create()
    {
        return view('admin.page.main.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.pages.index');
    }

    public function update(UpdateRequest $request, HomePage $home)
    {

        $data = $request->validated();
        $this->service->update($home, $data);
        return redirect()->route('admin.pages.index');
    }

    public function edit(HomePage $home)
    {
        return view('admin.page.main.edit', compact('home'));
    }

    public function destroy(HomePage $home)
    {

        $home->delete();
        return redirect()->route('admin.pages.index');

    }

}
