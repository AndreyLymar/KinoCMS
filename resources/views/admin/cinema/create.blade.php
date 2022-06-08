@extends('layouts.admin.admin')
@section('title','Кинотеатр - создание')
@section('link')
    <link rel="stylesheet" href="{{asset('css/styleBannerGallery.css')}}">
@endsection
@section('content')

    <form action="{{route('admin.cinemas.update_or_create')}}" method="post" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" value="" name="cinema_id">
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="title" class="form-label">Название:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                       name="title" value="{{old('title')}}">
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
                          name="description">{{old('description')}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="terms" class="form-label">Условия:</label>
                <textarea class="form-control @error('terms') is-invalid @enderror"
                          name="terms">{{old('terms')}}</textarea>
                @error('terms')
                <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

{{--            Лого          --}}
            <div class="row mt-5"><b>Лого</b></div>
            <div class="row align-items-center ml-3" id="cardAddLogoImg">
                <div class="col-6 mt-5 mr-4" id="imgStoreLogoImg">
                    <div class="row ">
                        <div class="imageStore position-relative">
                            <img id="imgLogo"
                                 class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                 src="https://img.icons8.com/color/96/undefined/downloads.png"/>
                                    <button type="button" onclick="del('Logo');" class="position-absolute top-10 start-0 translate-middle">
                                        <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                    </button>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-4 mt-2 p-0 mr-5">
                                <div class="mb-3 p-0 col-md-12">
                                    <label for="formFileLogo" class="form-label"></label>
                                    <input class="form-control @error('logo_img') is-invalid @enderror " name="logo_img"
                                           accept="image/*"
                                           type="file"
                                           onchange="window.checkNew(this.files[0], 'Logo')"
                                           id="formFileLogo">
                                    @error('logo_img')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
            </div>
{{--     Картинка верхнего баннера    --}}
        <div class="row mt-5"><b>Верхний баннер</b></div>
        <div class="row align-items-center ml-3" id="cardAddTopBannerImg">
            <div class="col-6 mt-5 mr-4" id="imgStoreTopBannerImg">
                <div class="row ">
                    <div class="imageStore position-relative">
                        <img id="imgTopBanner"
                             class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                             src="https://img.icons8.com/color/96/undefined/downloads.png"/>
                        <button type="button" onclick="del('TopBanner');" class="position-absolute top-10 start-0 translate-middle">
                            <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2 p-0 mr-5">
                        <div class="mb-3 p-0 col-md-12">
                            <label for="formFileTopBanner" class="form-label"></label>
                            <input class="form-control @error('top_banner_img') is-invalid @enderror " name="top_banner_img"
                                   accept="image/*"
                                   type="file"
                                   onchange="window.checkNew(this.files[0], 'TopBanner')"
                                   id="formFileTopBanner">
                            @error('top_banner_img')
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
                @for($i = 1; $i <= 5; $i++)
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
                           name="seo_url" value="{{old('seo_url')}}">
                    @error('seo_url')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-3">
                    <label for="seo_title" class="form-label">seo_title:</label>
                    <input type="text" class="form-control @error('seo_title') is-invalid @enderror" id="seo_title"
                           name="seo_title" value="{{old('seo_title')}}">
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
                           name="seo_keywords" value="{{old('seo_keywords')}}">
                    @error('seo_keywords')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <label for="seo_description" class="form-label">seo_description:</label>
                    <textarea class="form-control @error('seo_description') is-invalid @enderror"
                              name="seo_description">{{old('seo_description')}}</textarea>
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
            document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
            document.getElementById('formFile' + i).value = '';
        }
        function checkNew(file, i) {
            if (file) {
                document.getElementById('img' + i ).src = window.URL.createObjectURL(file);
            } else {
                document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';

            }
            if (error(file)) {
                document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                document.getElementById('formFile' + i).value = '';
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
