<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Requests\Admin\News\createOrUpdateRequest;
use App\Models\News;

class NewsController extends BaseController
{
    public function index(){
        $news = News::all();
        return view('admin.news.index',compact('news'));
    }

    public function create(){
        return view('admin.news.create');
    }

    public function edit(News $news){
        return view('admin.news.edit',compact('news'));
    }

    public function updateOrCreate(createOrUpdateRequest $request){
        $data = $request->validated();
        $this->service->updateOrCreate($data);
        return redirect()->route('admin.news.index');
    }

    public function destroy(News $news){
        $news->delete();
        return redirect()->route('admin.news.index');

    }
}
