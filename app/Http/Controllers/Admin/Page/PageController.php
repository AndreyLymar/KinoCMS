<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\createOrUpdateRequest;
use App\Models\ContactPage;
use App\Models\HomePage;
use App\Models\Page;
use App\Service\Admin\Page\Other\Service;

class PageController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $home = HomePage::first();
        $pages = Page::all();
        $contact = ContactPage::first();
        return view('admin.page.index', compact('home', 'pages', 'contact'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    public function updateOrCreate(createOrUpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->updateOrCreatePages($data);
        return redirect()->route('admin.pages.index');
    }

    public function destroy(Page $page)
    {
        $this->service->delete($page);
        return redirect()->route('admin.pages.index');

    }
}
