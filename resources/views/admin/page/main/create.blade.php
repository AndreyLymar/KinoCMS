@extends('layouts.admin.admin')
@section('title','Страницы - Главная  (Создать)')
@section('content')

    <form action="{{route('admin.pages.main.store')}}" method="post">
        @csrf
        <div class="row mt-5 ml-3">
            <div class="col-md-4">
                <div class="row mt-3">
                    <label for="phone1" class="form-label">Телефон 1:</label>
                    <input type="text" class="form-control phone @error('phone1') is-invalid @enderror" id="phone1"
                           name="phone1" value="{{old('phone1')}}">
                    @error('phone1')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-3">
                    <label for="phone2" class="form-label">Телефон 2:</label>
                    <input type="text" class="form-control phone @error('phone2') is-invalid @enderror" id="phone2"
                           name="phone2" value="{{old('phone2')}}">
                    @error('phone2')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

            </div>
        </div>
        {{--        seo          --}}


        <section class="content">
            <div class="row mt-5 ">
                <div class="col-md-10">
                    <div class="card-body">
                        <label for="seo_text" class="form-label">seo_text:</label>
                        <textarea id="summernote" name="seo_text">
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
@endsection
