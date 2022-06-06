<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Requests\Admin\Pages\Main\StoreRequest;
use App\Http\Requests\Admin\Pages\Main\UpdateRequest;
use App\Models\HomePage;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function index(){
        return view('admin.page.index');
    }
    public function create(){
        return view('admin.page.main.create');
    }

    public function store(StoreRequest $request){

        $data = $request->validated();
        $this->service->storeMain($data);
        return redirect()->route('admin.pages.index');
    }

    public function update(UpdateRequest $request, HomePage $home){

        $data = $request->validated();
        $this->service->updateMain($home, $data);
        return redirect()->route('admin.pages.index');
    }

    public function edit(HomePage $home){
        return view('admin.page.main.edit',compact('home'));
    }

    public function destroy(HomePage $home){

        $home->delete();
        return redirect()->route('admin.pages.index');

    }

}
