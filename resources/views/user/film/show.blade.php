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

    <div class="container-fluid m-0 p-0">
        <div class="row">
            <iframe width="560" height="800" src="{{$film->url_movie_trailer}}" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 m-2">
            <div class="col-4">
                <h4 class="fw-light text-dark">Расписание сеансов кинотеатра:</h4>
            </div>
            <div class="col-5">
                <select class="form-select w-75" aria-label="Default select example">
                    @foreach($cinemas as $cinema)
                        <option value="{{$cinema->id}}"
                                name="{{$cinema->id}}" {{old('cinema->id') ? 'select' : ''}}>{{$cinema->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="type_2d" name="type_2d"
                           disabled {{$film->type_2d ? 'checked' : ''}}>
                    <label class="form-check-label" for="type_2d">
                        2D
                    </label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="type_3d" name="type_3d"
                           disabled {{$film->type_3d ? 'checked' : ''}}>
                    <label class="form-check-label" for="type_3d">
                        3D
                    </label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="type_imax" name="type_imax"
                           disabled {{$film->type_imax ? 'checked' : ''}}>
                    <label class="form-check-label" for="type_imax">
                        IMAX
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-4">
            <div class="col-2">
                <div class="row text-center fs-4" style="border: 1px solid grey;">
                    <div><b>18 Чт</b></div>
                </div>
                <div class="row text-center fs-5" style="border: 1px solid grey;">
                    <div>Августа</div>
                </div>
            </div>
            <div class="col-2">
                <div class="row text-center fs-4" style="border: 1px solid grey;">
                    <div><b>18 Чт</b></div>
                </div>
                <div class="row text-center fs-5" style="border: 1px solid grey;">
                    <div>Августа</div>
                </div>
            </div>
            <div class="col-2">
                <div class="row text-center fs-4" style="border: 1px solid grey;">
                    <div><b>18 Чт</b></div>
                </div>
                <div class="row text-center fs-5" style="border: 1px solid grey;">
                    <div>Августа</div>
                </div>
            </div>
            <div class="col-2">
                <div class="row text-center fs-4" style="border: 1px solid grey;">
                    <div><b>18 Чт</b></div>
                </div>
                <div class="row text-center fs-5" style="border: 1px solid grey;">
                    <div>Августа</div>
                </div>
            </div>
            <div class="col-2">
                <div class="row text-center fs-4" style="border: 1px solid grey;">
                    <div><b>18 Чт</b></div>
                </div>
                <div class="row text-center fs-5" style="border: 1px solid grey;">
                    <div>Августа</div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h4 class="fw-light text-dark">Имя выбранного кинотеатра:</h4>
        </div>

        <div class="row mt-5">

            <div class="col-2 m-2">
                <div class="row">
                    <div class="col fs-5 text-center" style="border: 1px solid grey;">
                        <div>16:40</div>
                    </div>
                    <div class="col fs-5  text-center" style="border: 1px solid grey;">
                        <div>3D</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col fs-5 text-center" style="border: 1px solid grey;">
                        <div>Зал 1</div>
                    </div>
                    <div class="col fs-5  text-center" style="border: 1px solid grey;">
                        <div>23/56/120</div>
                    </div>
                </div>
            </div>
            <div class="col-2 m-2">
                <div class="row">
                    <div class="col fs-5 text-center" style="border: 1px solid grey;">
                        <div>16:40</div>
                    </div>
                    <div class="col fs-5  text-center" style="border: 1px solid grey;">
                        <div>3D</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col fs-5 text-center" style="border: 1px solid grey;">
                        <div>Зал 1</div>
                    </div>
                    <div class="col fs-5  text-center" style="border: 1px solid grey;">
                        <div>23/56/120</div>
                    </div>
                </div>
            </div>

            <div class="col-2 m-2">
                <div class="row">
                    <div class="col fs-5 text-center" style="border: 1px solid grey;">
                        <div>16:40</div>
                    </div>
                    <div class="col fs-5  text-center" style="border: 1px solid grey;">
                        <div>3D</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col fs-5 text-center" style="border: 1px solid grey;">
                        <div>Зал 1</div>
                    </div>
                    <div class="col fs-5  text-center" style="border: 1px solid grey;">
                        <div>23/56/120</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-4">
                <img width="80%" src="{{Storage::url($film->main_img) ? Storage::url($film->main_img) : ''}}">
            </div>
            <div class="col-8">
                <div class="row w-50">
                    <a class="btn btn-dark">Купить билет</a>
                </div>
                <div class="row mt-5">
                    <h4 class="fw-light text-dark">{{$film->title}}</h4>
                </div>
                <div class="row mt-4">
                    {{$film->description}}
                </div>
                <div class="row mt-4">
                    <div id="myCarouselNewsSpecialOffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($film->filmGalleries as $key => $filmGallery)
                                <button type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                        data-bs-slide-to="{{$key}}"
                                        class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                                        aria-label="{{$filmGallery->id}}"></button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach($film->filmGalleries as $key => $filmGallery)
                                <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                                    <img class="bd-placeholder-img" width="100%" height="100%"
                                         src="{{Storage::url($filmGallery->img)}}" aria-hidden="true">
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
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection