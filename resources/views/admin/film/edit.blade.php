@extends('layouts.admin.admin')
@section('title','Фильмы - изменение')
@section('link')
    <link rel="stylesheet" href="{{asset('css/styleBannerGallery.css')}}">
@endsection
@section('content')

    <form action="{{route('admin.films.update_or_create')}}" method="post" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" value="{{$film->id}}" name="film_id">
        <input type="hidden" value="{{$film->status}}" name="status">

        <div class="row mt-3">
            <div class="col-md-2">
                <label for="title" class="form-label">Название:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                       name="title" value="{{old('title') ?? $film->title}}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Описание:</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          name="description">{{old('description') ?? $film->description}}</textarea>
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
                                 src="{{isset($film->main_img) ? Storage::url($film->main_img) : 'https://img.icons8.com/color/96/undefined/downloads.png'}}"/>
                                    <button type="button" onclick="del('Main');" class="position-absolute top-10 start-0 translate-middle">
                                        <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                    </button>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-4 mt-2 p-0 mr-5">
                                <div class="mb-3 p-0 col-md-12">
                                    <label for="formFileMain" class="form-label"></label>
                                    <input type="hidden" value="{{$film->main_img}}" id="main_img_old" name="main_img_old">
                                    <input class="form-control @error('main_img') is-invalid @enderror " name="main_img"
                                           accept="image/*"
                                           type="file"
                                           onchange="window.checkNew(this.files[0], 'Main'); document.getElementById('main_img_old').remove();"
                                           id="formFileMain">
                                    @error('main_img')
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
                @foreach($film->filmGalleries as $filmGallery)
                <div class="col-2 mt-5 mr-4" id="imgStoreGallery">
                    <div class="row">
                        <div class="imageStore position-relative">
                            <img id="imgO{{$filmGallery->id}}"
                                 class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                 src="{{Storage::url($filmGallery->img) ?? 'https://img.icons8.com/color/96/undefined/downloads.png'}}"/>
                            <button type="button" onclick="del({{$filmGallery->id}});" class="position-absolute top-10 start-0 translate-middle">
                                <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2 p-0 mr-5">
                            <div class="mb-3 p-0 col-md-12">
                                <label for="formFileO{{$filmGallery->id}}" class="form-label"></label>
                                <input type="hidden" value="{{$filmGallery->id}}" id="idO{{$filmGallery->id}}" name="id[]">
                                <input class="form-control @error('img') is-invalid @enderror " name="img[]"
                                       accept="image/*"
                                       type="file"
                                       onchange="window.checkOld(this.files[0], {{$filmGallery->id}})"
                                       id="formFileO{{$filmGallery->id}}">
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
                    @for($i = 1; $i <= 5 - count($film->filmGalleries); $i++)
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
                                        <input type='hidden' value='0' id='id{{$i}}' name='id[]'>
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
        <div class="row mt-5">
            <div class="col-md-2">
                <label for="url_movie_trailer" class="form-label">Ссылка на видео:</label>
                <input type="text" class="form-control @error('url_movie_trailer') is-invalid @enderror" id="url_movie_trailer"
                       name="url_movie_trailer" value="{{old('url_movie_trailer') ?? $film->url_movie_trailer}}">
                @error('url_movie_trailer')
                <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-1">
                <label for="" class="form-label">Тип кино:</label>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="type_2d" name="type_2d" {{old('type_2d') ?? ($film->type_2d === 1 ? 'checked' : '')}}>
                    <label class="form-check-label" for="type_2d">
                        2D
                    </label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="type_3d" name="type_3d" {{old('type_3d') ?? ($film->type_2d === 1 ? 'checked' : '')}}>
                    <label class="form-check-label" for="type_3d">
                        3D
                    </label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="type_imax" name="type_imax" {{old('type_imax') ?? ($film->type_imax === 1 ? 'checked' : '')}}>
                    <label class="form-check-label" for="type_imax">
                        IMAX
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-5 ml-3">
            <div class="col-md-8">
                <div class="row mt-3">
                    <label for="seo_url" class="form-label">seo_url:</label>
                    <input type="text" class="form-control @error('seo_url') is-invalid @enderror" id="seo_url"
                           name="seo_url" value="{{old('seo_url') ?? $film->seo_url}}">
                    @error('seo_url')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-3">
                    <label for="seo_title" class="form-label">seo_title:</label>
                    <input type="text" class="form-control @error('seo_title') is-invalid @enderror" id="seo_title"
                           name="seo_title" value="{{old('seo_title') ?? $film->seo_title}}">
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
                           name="seo_keywords" value="{{old('seo_keywords') ?? $film->seo_keywords}}">
                    @error('seo_keywords')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <label for="seo_description" class="form-label">seo_description:</label>
                    <textarea class="form-control @error('seo_description') is-invalid @enderror"
                              name="seo_description">{{old('seo_description') ?? $film->seo_url}}</textarea>
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
                     document.getElementById('idO' + i ).value = '0';
                 }
             }
             if(document.getElementById('img' + i)){
                 document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                 document.getElementById('formFile' + i).value = '';
                 if(document.getElementById('id' + i)){
                     document.getElementById('id' + i ).value = '0';
                 }
             }

             if(i === 'Main'){
                 document.getElementById('main_img_old').remove();
             }
         }
         function checkNew(file, i) {
             if (file) {
                 document.getElementById('img' + i ).src = window.URL.createObjectURL(file)
                 document.getElementById('id' + i ).value = '';
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
                 document.getElementById('idO' + i ).value = '0';

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
