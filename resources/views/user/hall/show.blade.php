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
            <img style="height: 900px; padding: 0;" src="{{Storage::url($hall->top_banner_img) ?? ''}}" alt="">
        </div>
        <div class="row">
            <div class="col-md-3 mt-5">
                <div class="row mt-5">

                </div>
                <div class="row mt-5">
                    <div class="col-md-6 m-5">
                        <p>Сеансы:</p>
{{--                        @foreach($cinema->halls as $hall)--}}
{{--                            <div class="row">--}}
{{--                                <a href="?{{$hall->id}}" class="p-2 text-dark" style="border:1px solid grey; {{strpos($_SERVER['REQUEST_URI'], '/cinemas/' . $cinema->id . '?' . $hall->id) !== false ? 'background-color: #eeeeee;' : ''}}">{{$hall->number}}-й зал</a>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <img class="mt-5" style="height:60px; width: auto;"
                             src="{{Storage::url($hall->hall_img) ?? ''}}" alt="">
                        <h4 class="fw-light mt-2">Зал №{{$hall->number}}</h4>
                    </div>
                </div>
                <div class="row mt-5">
                    <p>
                        {{$hall->description}}
                    </p>
                </div>
                <div class="row">
                    <h4 class="fw-light text-center mb-5 mt-5">Карта зала</h4>
                    <div class="col-1 m-5">
                        @for($i = 12; $i >= 1; $i--)
                                <div class="d-flex flex-row mb-3 justify-content-start">
                                    <div class="p-2 m-1">
                                        {{$i}}
                                    </div>
                                </div>
                        @endfor
                    </div>
                    <div class="col-9 m-5">
                        @for($i = 12; $i >= 1; $i--)
                            <div class="d-flex flex-row mb-3 justify-content-center">
                            @if($i === 11 || $i === 8 || $i === 1)
                                @for($j = 1; $j<=18; $j++)
                                        <div class="m-1 text-center ">
                                            <div style="background-color: {{$i < 5 ? 'mediumslateblue' : 'red'}}; width: 40px; height: 40px;" class="p-2">{{$j}}</div>
                                        </div>
                                @endfor
                            @endif
                            @if($i === 12 || $i === 10 || $i === 9 || $i === 7 || $i === 6 || $i === 4 || $i === 3)
                                    @for($j = 1; $j<=20; $j++)
                                        <div class="m-1 text-center ">
                                            <div style="background-color: {{$i < 5 ? 'mediumslateblue' : 'red'}}; width: 40px; height: 40px;" class="p-2">{{$j}}</div>
                                        </div>
                                    @endfor
                            @endif
                            @if($i === 5 || $i === 2)
                                    @for($j = 1; $j<=19; $j++)
                                        <div class="m-1 text-center ">
                                            <div style="background-color: {{$i < 5 ? 'mediumslateblue' : 'red'}}; width: 40px; height: 40px;" class="p-2">{{$j}}</div>
                                        </div>
                                    @endfor
                            @endif
                            </div>
                        @endfor
                        <div class="d-flex flex-row mb-3 mt-4 justify-content-center" style="background-color: yellow;">
                            Экран
                        </div>
                    </div>
                </div>
                @if($hall->hallGalleries)
                    <div class="row">
                        <h4 class="fw-light text-center mb-5 mt-5">Фотогалерея</h4>
                    </div>
                    <div id="myCarouselNewsSpecialOffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($hall->hallGalleries as $key => $hallGallery)
                                <button type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                        data-bs-slide-to="{{$key}}"
                                        class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                                        aria-label="{{$hallGallery->id}}"></button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach($hall->hallGalleries as $key => $hallGallery)
                                <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                                    <img class="bd-placeholder-img" width="100%" height="100%"
                                         src="{{Storage::url($hallGallery->img)}}" aria-hidden="true">
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
