@extends('layouts.user.user')
@section('link')
    <style>
        button {
            border: none; /*  убираем обводку кнопки */
            cursor: pointer;
            background-color: transparent;
        }
    </style>
@endsection
@section('content')

    <div class="container-fluid m-0">
        <div class="row">
            <img style="height: 900px; padding: 0;" src="{{Storage::url($cinema->top_banner_img) ?? ''}}" alt="">
        </div>
        <div class="row">
            <div class="col-md-3 mt-5">
                <div class="row mt-5">

                </div>
                <div class="row mt-5">
                    <div class="col-md-6 m-5">
                        <p>Количество залов: {{$cinema->halls->count()}}</p>
                        @foreach($cinema->halls as $hall)
                            <div class="row">
                                <a href="{{route('user.halls.show',$hall->id)}}" class="p-2 text-dark" style="border:1px solid grey; {{strpos($_SERVER['REQUEST_URI'], '/halls/' . $hall->id) !== false ? 'background-color: #eeeeee;' : ''}}">{{$hall->number}}-й зал</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <img class="mt-5" style="height:60px; width: auto;"
                             src="{{Storage::url($cinema->logo_img) ?? ''}}" alt="">
                        <h4 class="fw-light mt-2">{{$cinema->title}}</h4>
                    </div>
                    <div class="col-md-8">
                        <div class="row mt-5">
                            <a href="{{route('user.schedules.index')}}" class="btn-dark btn w-50">Расписание сеансов</a>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-1">
                                <h6 class="fw-light mt-2">2D</h6>
                            </div>
                            <div class="col-md-1">
                                <h6 class="fw-light mt-2">3D</h6>
                            </div>
                            <div class="col-md-1">
                                <h6 class="fw-light mt-2">Imax</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <p>
                        {{$cinema->description}}
                    </p>
                </div>
                <div class="row">
                    <div class="row mb-4">
                        <h4 class="fw-light text-center mb-5 mt-5">Условия</h4>
                    </div>

                    <div class="row" style="border: 1px solid gray; background-color: #eeeeee">
                        {!!$cinema->terms!!}
                    </div>
                </div>
                @if($cinema->cinemaGalleries)
                    <div class="row">
                        <h4 class="fw-light text-center mb-5 mt-5">Фотогалерея</h4>
                    </div>
                    <div id="myCarouselNewsSpecialOffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($cinema->cinemaGalleries as $key => $cinemaGallery)
                                <button type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                        data-bs-slide-to="{{$key}}"
                                        class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                                        aria-label="{{$cinemaGallery->id}}"></button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach($cinema->cinemaGalleries as $key => $cinemaGallery)
                                <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                                    <img class="bd-placeholder-img" width="100%" height="100%"
                                         src="{{Storage::url($cinemaGallery->img)}}" aria-hidden="true">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif
            </div>

        </div>
    </div>

@endsection
