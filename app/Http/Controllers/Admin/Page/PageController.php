<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Requests\Admin\Pages\createOrUpdateRequest;
use App\Models\ContactPage;
use App\Models\HomePage;
use App\Models\HomePageGallery;
use App\Models\Page;
use App\Models\PageGallery;
use Illuminate\Support\Facades\Storage;

class PageController extends BaseController
{
    public function index(){
        $home = HomePage::first();
        $pages = Page::all();
        $contact = ContactPage::first();
        return view('admin.page.index', compact('home', 'pages', 'contact'));
    }

    public function create(){
        return view('admin.page.create');
    }

    public function edit(Page $page){
        return view('admin.page.edit',compact('page'));
    }

    public function updateOrCreate(createOrUpdateRequest $request){
        $data = $request->validated();
        $this->service->updateOrCreatePages($data);
        return redirect()->route('admin.pages.index');
    }

    public function destroy(Page $page){
        $page->delete();
        return redirect()->route('admin.pages.index');

    }
}
