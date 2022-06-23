@extends('layouts.admin.admin')
@section('title','Фильмы')
@section('link')
    <link rel="stylesheet" href="{{asset('css/cinemas.css')}}">
@endsection
@section('content')
    <div>
        <div class="row align-items-center mt-5 ml-3">
            <div class="row mt-5 mb-5 m-2">
                <h4 class="fw-light mt-2 text-dark">Список текущих фильмов</h4>
            </div>
            @if(isset($films_already))
                @foreach($films_already as $film)
                    <div class="col-2 mt-5 mr-4">
                        <div class="row ">
                            <div class="position-relative imageStore">
                                <a class="" href="{{route('admin.films.edit',$film->id)}}">
                                    <img id="img{{$film->id}}"
                                         class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                         src="{{$film->main_img !== null ? Storage::url($film->main_img) : 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}"/>
                                </a>
                                <form action="{{route('admin.films.destroy',$film->id)}}" method="post" class="">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="position-absolute top-10 start-0 translate-middle">
                                        <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="fs-5">{{$film->title}}</label>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-md-1 offset-md-1">
                <a class="btn btn-dark pt-3" href="{{route('admin.films.create','already')}}"
                   style="width: 70px; height: 70px; font-size: 25px">+
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center mt-5 ml-3">
        <div class="row mt-5 mb-5 m-2">
            <h4 class="fw-light mt-2 text-dark">Список фильмов которые покажут скоро</h4>
        </div>
        @if(isset($films_soon))
            @foreach($films_soon as $film)
                <div class="col-2 mt-5 mr-4">
                    <div class="row ">
                        <div class="position-relative imageStore">
                            <a class="" href="{{route('admin.films.edit',$film->id)}}">
                                <img id="img{{$film->id}}"
                                     class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                     src="{{$film->main_img !== null ? Storage::url($film->main_img) : 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}"/>
                            </a>
                            <form action="{{route('admin.films.destroy',$film->id)}}" method="post" class="">
                                @csrf
                                @method('delete')
                                <button type="submit" class="position-absolute top-10 start-0 translate-middle">
                                    <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="fs-5">{{$film->title}}</label>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-md-1 offset-md-1">
            <a class="btn btn-dark pt-3" href="{{route('admin.films.create','soon')}}"
               style="width: 70px; height: 70px; font-size: 25px">+
            </a>
        </div>
    </div>
    </div>
@endsection
