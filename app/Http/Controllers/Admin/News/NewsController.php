<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\createOrUpdateRequest;
use App\Models\News;
use App\Service\Admin\News\Service;

class NewsController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function updateOrCreate(createOrUpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->updateOrCreate($data);
        return redirect()->route('admin.news.index');
    }

    public function destroy(News $news)
    {
        $this->service->delete($news);
        return redirect()->route('admin.news.index');

    }
}
