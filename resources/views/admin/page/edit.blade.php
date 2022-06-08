@extends('layouts.admin.admin')
@section('title','Добавить страниц')
@section('link')
    <link rel="stylesheet" href="{{asset('css/styleBannerGallery.css')}}">
@endsection
@section('content')

    <form action="{{route('admin.pages.update_or_create')}}" method="post" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" value="{{$page->id}}" name="page_id">
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="title" class="form-label">Название:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                       name="title" value="{{old('title') ?? $page->title}}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-md-1 ml-5">
                <div class="form-switch">
                    <label for="status">Статус</label>
                    <input class="form-check-input ml-4" type="checkbox" role="switch" id="status" {{$page->status === 1 ? 'checked' : ''}} value = "1" name="status">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Описание:</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          name="description">{{old('description') ?? $page->description}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
{{--            Главная картинка     --}}
            <div class="row mt-5"><b>Главная картинка</b></div>
            <div class="row align-items-center ml-3" id="cardAddMainImg">
                <div class="col-6 mt-5 mr-4" id="imgStoreMainImg">
                    <div class="row ">
                        <div class="imageStore position-relative">
                            <img id="imgMain"
                                 class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                 src="{{isset($page->main_img) ? Storage::url($page->main_img) : 'https://img.icons8.com/color/96/undefined/downloads.png'}}"/>
                                    <button type="button" onclick="del('Main');" class="position-absolute top-10 start-0 translate-middle">
                                        <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                    </button>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-4 mt-2 p-0 mr-5">
                                <div class="mb-3 p-0 col-md-12">
                                    <label for="formFileMain" class="form-label"></label>
                                    <input type="hidden" value="{{$page->main_img}}" id="main_img_old" name="main_img_old">
                                    <input class="form-control @error('img') is-invalid @enderror " name="main_img"
                                           accept="image/*"
                                           type="file"
                                           onchange="window.checkNew(this.files[0], 'Main'); document.getElementById('main_img_old').remove();"
                                           id="formFileMain">
                                    @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
            </div>

{{--          Галерея картинок     --}}
            <div class="row mt-5"><b>Галерея картинок</b></div>
            <div class="row ml-3">
                @foreach($page->pageGalleries as $pageGallery)
                <div class="col-2 mt-5 mr-4" id="imgStoreGallery">
                    <div class="row">
                        <div class="imageStore position-relative">
                            <img id="imgO{{$pageGallery->id}}"
                                 class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                 src="{{Storage::url($pageGallery->img) ?? 'https://img.icons8.com/color/96/undefined/downloads.png'}}"/>
                            <button type="button" onclick="del({{$pageGallery->id}});" class="position-absolute top-10 start-0 translate-middle">
                                <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2 p-0 mr-5">
                            <div class="mb-3 p-0 col-md-12">
                                <label for="formFileO{{$pageGallery->id}}" class="form-label"></label>
                                <input type="hidden" value="{{$pageGallery->id}}" id="idO{{$pageGallery->id}}" name="id[]">
                                <input class="form-control @error('img') is-invalid @enderror " name="img[]"
                                       accept="image/*"
                                       type="file"
                                       onchange="window.checkOld(this.files[0], {{$pageGallery->id}})"
                                       id="formFileO{{$pageGallery->id}}">
                                @error('img')
                                <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    @for($i = 1; $i <= 5 - count($page->pageGalleries); $i++)
                        <div class="col-2 mt-5 mr-4" id="imgStoreGallery">
                            <div class="row">
                                <div class="imageStore position-relative">
                                    <img id="img{{$i}}"
                                         class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                         src="https://img.icons8.com/color/96/undefined/downloads.png"/>
                                    <button type="button" onclick="del({{$i}});" class="position-absolute top-10 start-0 translate-middle">
                                        <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-2 p-0 mr-5">
                                    <div class="mb-3 p-0 col-md-12">
                                        <label for="formFile{{$i}}" class="form-label"></label>
                                        <input class="form-control @error('img') is-invalid @enderror " name="img[]"
                                               accept="image/*"
                                               type="file"
                                               onchange="window.checkNew(this.files[0], {{$i}})"
                                               id="formFile{{$i}}">
                                        @error('img')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
            </div>
        <div class="row mt-5 ml-3">
            <div class="col-md-8">
                <div class="row mt-3">
                    <label for="seo_url" class="form-label">seo_url:</label>
                    <input type="text" class="form-control @error('seo_url') is-invalid @enderror" id="seo_url"
                           name="seo_url" value="{{old('seo_url') ?? $page->seo_url}}">
                    @error('seo_url')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-3">
                    <label for="seo_title" class="form-label">seo_title:</label>
                    <input type="text" class="form-control @error('seo_title') is-invalid @enderror" id="seo_title"
                           name="seo_title" value="{{old('seo_title') ?? $page->seo_title}}">
                    @error('seo_title')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-3">
                    <label for="seo_keywords" class="form-label">seo_keywords:</label>
                    <input type="text" class="form-control @error('seo_keywords') is-invalid @enderror"
                           id="seo_keywords"
                           name="seo_keywords" value="{{old('seo_keywords') ?? $page->seo_keywords}}">
                    @error('seo_keywords')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <label for="seo_description" class="form-label">seo_description:</label>
                    <textarea class="form-control @error('seo_description') is-invalid @enderror"
                              name="seo_description">{{old('seo_description') ?? $page->seo_url}}</textarea>
                </div>
            </div>
        </div>
        <div class="row ml-3 mt-5 mb-5 justify-content-start">
            <button type="submit" class="btn btn-dark w-25">Сохранить</button>
        </div>
    </form>

@endsection
@section('script')
    <script>


         function del(i){
             if(document.getElementById('imgO' + i)){
                 document.getElementById('imgO' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                 document.getElementById('formFileO' + i).value = '';
                 if(document.getElementById('idO' + i)){
                     document.getElementById('idO' + i).remove();
                 }
             }
             if(document.getElementById('img' + i)){
                 document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                 document.getElementById('formFile' + i).value = '';
                 if(document.getElementById('id' + i)){
                     document.getElementById('id' + i).remove();
                 }
             }

             if(i === 'Main'){
                 document.getElementById('main_img_old').remove();
             }
         }
        function checkNew(file, i) {
            if (file) {
                document.getElementById('img' + i ).src = window.URL.createObjectURL(file);
                document.getElementById('formFile' + i ).insertAdjacentHTML('beforebegin', "<input type='hidden' value='' id='id'" + i + " name='id[]'>");
            } else {
                document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';

            }
            if (error(file)) {
                document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                document.getElementById('formFile' + i).value = '';
            }
        }
         function checkOld(file, i) {
             if (file) {
                 document.getElementById('imgO' + i ).src = window.URL.createObjectURL(file);

             } else {
                 document.getElementById('imgO' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';

             }
             if (error(file)) {
                 document.getElementById('imgO' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                 document.getElementById('formFileO' + i).value = '';
             }
         }
        function error(file) {
            let error = false;
            if (file.name.includes(' ')) {
                alert('Название файла должно быть без пробелов!')
                error = true;
            }
            if (file.type !== 'image/jpg' && file.type !== 'image/phg' && file.type !== 'image/jpeg') {
                alert('Тип файла должен быть без jpg, jpeg, png!')
                error = true;
            }
            return error;
        }
    </script>
@endsection
