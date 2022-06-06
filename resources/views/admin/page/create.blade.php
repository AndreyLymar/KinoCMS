@extends('layouts.admin.admin')
@section('title','Баннеры/Слайдеры')
@section('link')
    <link rel="stylesheet" href="{{asset('css/styleBannerGallery.css')}}">
@endsection
@section('content')

    <div class="pb-5">
        {{--    Верхний баннер          --}}
        <hr class="mb-3 border-success border-3 opacity-50">
        <div class="row justify-content-center h3 mt-5 mb-3">Верхний Баннер</div>
        <form action="{{route('admin.galleries.top_banner.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center mt-5 ml-3" id="cardAddImgToTopBanner">

                @if(isset($home_page_galleries))
                    @foreach($home_page_galleries as $home_page_gallery)
                        <div class="col-2 mt-5 mr-4" id="imgStoreO{{$home_page_gallery->id}}">
                            <div class="row ">
                                <div class="imageStore position-relative">
                                    <img id="imgO{{$home_page_gallery->id}}"
                                         class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                         src="{{$home_page_gallery->img !== null ? Storage::url($home_page_gallery->img) : 'https://img.icons8.com/color/96/undefined/downloads.png'}}"/>
                                    <button type="button" id="clsImgO{{$home_page_gallery->id}}"
                                            class="position-absolute top-10 start-0 translate-middle"
                                            onclick="document.getElementById('imgStoreO{{$home_page_gallery->id}}').remove();">
                                        <img class="w-50"
                                             src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/></button>

                                </div>
                            </div>
                            <div class="row mt-2 p-0">
                                <div class="mb-3 p-0">
                                    <label for="formFileO{{$home_page_gallery->id}}" class="form-label"></label>
                                    <input type="hidden" value="{{$home_page_gallery->id}}" name="id[]">
                                    <input class="form-control" name="img[]" accept="image/*" type="file"
                                           onchange="window.checkOld(this.files[0], {{$home_page_gallery->id}})"
                                           id="formFileO{{$home_page_gallery->id}}">
                                </div>
                            </div>
                            <div class="row">
                                <input type="text" class="form-control form-control-sm @error('url') is-invalid @enderror"
                                       id=""
                                       name="url[]" placeholder="Url:" value="{{old('url') ?? $home_page_gallery->url}}">
                                @error('url')
                                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
                                @enderror
                            </div>
                            <div class="row mt-1">
                                <input type="text" class="form-control form-control-sm @error('text') is-invalid @enderror"
                                       id=""
                                       name="text[]" placeholder="Text:"
                                       value="{{old('text') ?? $home_page_gallery->text}}">
                                @error('text')
                                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                @endif


                <div class="col-md-1 offset-md-1" id="beforeAddImgToTopBanner">
                    <button class="btn btn-dark" type="button" id="addImgToTopBanner"
                            style="width: 70px; height: 70px; font-size: 25px">+
                    </button>
                </div>
            </div>
            {{--        <hr class="mb-3 border-success border-3 opacity-50">--}}

            <div class="row mt-5  ml-3">
                <div class="col-2 m-auto">
                    <button type="submit" class="btn btn-dark btn-lg ">Обновить</button>
                </div>

            </div>
        </form>
    {{--    <hr class="mb-3 border-success border-3 opacity-50">--}}
    </div>
    @endsection
@section('script')
    <script>
        function checkNew(file, i) {
            if (file) {
                document.getElementById('img' + i).src = window.URL.createObjectURL(file);
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
                document.getElementById('imgO' + i).src = window.URL.createObjectURL(file);
            } else {
                document.getElementById('imgO' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';

            }
            if (error(file)) {
                document.getElementById('imgO' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                document.getElementById('formFileO' + i).value = '';
            }
        }
            if (error(file)) {
                document.getElementById('imgNO' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
                document.getElementById('formFileNO' + i).value = '';
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

        $(document).ready(function () {
            let i = 0;
            $('#addImgToTopBanner').on('click', function () {
                ++i;
                $('#beforeAddImgToTopBanner').before(`        <div class="col-2 mt-5 mr-4" id="imgStore` + i + `">
                <div class="row ">
                <div class="imageStore position-relative">
                    <img id="img` + i + `" class="position-absolute top-50 start-50 translate-middle imgStoreNew" src="https://img.icons8.com/color/96/undefined/downloads.png"/>
                                    <button type="button" id="clsImg` + i + `" class="position-absolute top-10 start-0 translate-middle" onclick="document.getElementById('imgStore` + i + `').remove();"><img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/></button>

                </div>
            </div>
            <div class="row mt-2 p-0">
                <div class="mb-3 p-0">
                    <label for="formFile` + i + `" class="form-label"></label>
                    <input class="form-control" name="img[]" accept="image/*" value="" type="file" onchange="window.checkNew(this.files[0],` + i + `)" id="formFile` + i + `">
                </div>
            </div>
            <div class="row">
                <input type="text" class="form-control form-control-sm @error('url') is-invalid @enderror" id=""
                       name="url[]" placeholder="Url:" value="{{old('url') ?? ''}}">
                @error('url')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </div>
                <div class="row mt-1">
                    <input type="text" class="form-control form-control-sm @error('text') is-invalid @enderror" id=""
                       name="text[]" placeholder="Text:" value="{{old('text') ?? ''}}">
                @error('text')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </div>
            </div>
`);
            });
        });
    </script>
    @endsection
