@extends('layouts.admin.admin')
@section('title','Страницы - Контакты')
@section('link')
    <link rel="stylesheet" href="{{asset('css/styleBannerGallery.css')}}">
@endsection
@section('content')
<div>
    <div  style="border-radius: 20px; border: 1px solid grey; padding: 40px;" class="m-5">
        <form enctype="multipart/form-data"
              action="{{route('admin.pages.contacts.store')}}" method="post">
            @csrf
            <div class="row fs-4">Создать</div>
            <div class="row mt-5 w-25 ml-3">
                <label for="cinema_id" class="form-label">Кинотеатр:</label>
                <select class="form-control @error('cinema_id') is-invalid @enderror" id="cinema_id" name="cinema_id">
                    <option value="">Выберите кинотеатр:</option>
                    @if(!empty($cinemas))
                        @foreach($cinemas as $cinema)
                            <option
                                value="{{$cinema->id}}" {{$cinema->id == old('cinema_id') ? 'selected' : ''}}>{{$cinema->title}}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('cinema_id')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="row mt-5 w-50 ml-3">
                <label for="address" class="form-label">Адресс:</label>
                <textarea id="" class="form-control @error('address') is-invalid @enderror"
                          name="address">{{old('address') ?? ''}}</textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="row mt-5 w-25 ml-3">
                <label for="coordinates" class="form-label">Координаты:</label>
                <input id="coordinates" class="form-control  @error('coordinates') is-invalid @enderror" name="coordinates"
                       value="{{old('address') ?? ''}}">
                @error('coordinates')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
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
                            <button type="button" onclick="del('Logo');"
                                    class="position-absolute top-10 start-0 translate-middle">
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
            {{--        seo          --}}

            <section class="content">
                <div class="row mt-5 ">
                    <div class="col-md-10">
                        <div class="card-body">
                            <label for="seo_text" class="form-label">seo_text:</label>
                            <textarea id="summernote" name="seo_text" class="summernote">
            {{old('seo_text')}}
              </textarea>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </section>

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
            <div class="row mt-5 ml-3">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-dark">Создать</button>
                </div>
            </div>
        </form>
    </div>

    @if(isset($contact_pages))
        @foreach($contact_pages as $contact_page)
            <div  style="border-radius: 20px; border: 1px solid grey; padding: 40px;" class="m-5">
                <form enctype="multipart/form-data"
                      action="{{route('admin.pages.contacts.update', $contact_page->id)}}" method="post" >
                    @csrf
                    @method('patch')
                    <div class="row fs-4">Изменить</div>
                    <div class="row w-25 mt-5 ml-3">
                        <label for="cinema_id" class="form-label">Кинотеатр:</label>
                        <select class="form-control @error('cinema_id') is-invalid @enderror" id="cinema_id" name="cinema_id">
                            <option value="">Выберите кинотеатр:</option>
                            @if(!empty($cinemas))
                                @foreach($cinemas as $cinema)
                                    <option
                                        value="{{$cinema->id}}" {{$cinema->id == $contact_page->cinema_id ? 'selected' : ''}}>{{$cinema->title}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('cinema_id')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mt-5 w-50 ml-3">
                        <label for="address" class="form-label">Адресс:</label>
                        <textarea id="" class="form-control @error('address') is-invalid @enderror"
                                  name="address">{{old('address') ? old('address') : ($contact_page->address ? $contact_page->address : '')}}</textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mt-5 w-25 ml-3">
                        <label for="coordinates" class="form-label">Координаты:</label>
                        <input id="coordinates" class="form-control  @error('coordinates') is-invalid @enderror"
                               name="coordinates"
                               value="{{old('address') ? old('address') : ($contact_page->address ? $contact_page->address : '')}}">
                        @error('coordinates')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--              Лого          --}}
                    <div class="row mt-5"><b>Лого</b></div>
                    <div class="row align-items-center ml-3" id="cardAddLogoImg">
                        <div class="col-6 mt-5 mr-4" id="imgStoreLogoImg">
                            <div class="row ">
                                <div class="imageStore position-relative">
                                    <img id="imgLogo{{$contact_page->id}}"
                                         class="position-absolute top-50 start-50 translate-middle imgStoreNew imgStore{{$contact_page->id}}"
                                         src="{{isset($contact_page->logo_img) ? Storage::url($contact_page->logo_img) : 'https://img.icons8.com/color/96/undefined/downloads.png'}}"/>
                                    <button type="button" onclick="del('Logo{{$contact_page->id}}');"
                                            class="position-absolute top-10 start-0 translate-middle">
                                        <img class="w-50"
                                             src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2 p-0 mr-5">
                                    <div class="mb-3 p-0 col-md-12">
                                        <input type="hidden" value="{{$contact_page->logo_img}}" id="logo_img_old"
                                               name="logo_img_old">
                                        <label for="formFileLogo{{$contact_page->id}}" class="form-label"></label>
                                        <input class="form-control @error('logo_img') is-invalid @enderror " name="logo_img"
                                               accept="image/*"
                                               type="file"
                                               onchange="window.checkNew(this.files[0], 'Logo{{$contact_page->id}}')"
                                               id="formFileLogo{{$contact_page->id}}">
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

                    {{--        seo          --}}

                    <section class="content">
                        <div class="row mt-5 ">
                            <div class="col-md-10">
                                <div class="card-body">
                                    <label for="seo_text" class="form-label">seo_text:</label>
                                    <textarea id="summernote" name="seo_text" class="summernote">
            {{old('seo_text')}}
              </textarea>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->
                    </section>

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
                                <input type="text" class="form-control @error('seo_title') is-invalid @enderror"
                                       id="seo_title"
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
                    <div class="row mt-5 ml-3">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-dark">Изменить</button>
                        </div>
                    </div>
                </form>
                <form action="{{route('admin.pages.contacts.destroy', $contact_page->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="row mt-5 ml-3">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    @endif
</div>
@endsection
@section('script')
    <script>

        $(document).ready(function(){
            $('.summernote').summernote();
        })

        function del(i){
            document.getElementById('img' + i).src = 'https://img.icons8.com/color/96/undefined/downloads.png';
            document.getElementById('formFile' + i).value = '';
            if (document.getElementById('logo_img_old')){
                document.getElementById('logo_img_old').value = '';
            }
        }
        function checkNew(file, i) {
            if (file) {
                document.getElementById('img' + i ).src = window.URL.createObjectURL(file);
                if (document.getElementById('logo_img_old')){
                    document.getElementById('logo_img_old').value = '';
                }
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

