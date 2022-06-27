@extends('layouts.user.user')
@section('link')
    <style>
        body {
            background: url({{Storage::url($homepage->bg_img) ?? ''}}) no-repeat center top fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>

@endsection
@section('content')

    <div class="container p-0 main-container mt-5 bg-light">
        @if(isset($home_page_galleries))
            <div id="myCarouselGallery" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($home_page_galleries as $key => $home_page_gallery)
                        <button type="button" data-bs-target="#myCarouselGallery" data-bs-slide-to="{{$key}}"
                                class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                                aria-label="{{$home_page_gallery->id}}"></button>
                    @endforeach
                </div>

                <div class="carousel-inner">
                    @foreach($home_page_galleries as $key => $home_page_gallery)
                        <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                            <img class="bd-placeholder-img" width="100%" height="100%"
                                 src="{{Storage::url($home_page_gallery->img)}}" aria-hidden="true">

                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <p>{{$home_page_gallery->text ?? ''}}</p>
                                    <p><a class="btn btn-lg btn-primary" href="{{$home_page_gallery->url ?? ''}}">Посмотреть</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarouselGallery"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarouselGallery"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
        <div class="row">
            <h2 class="fw-light text-center mt-5">Смотрите сегодня, {{date('d-M')}}</h2>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($films_already as $film)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="{{Storage::url($film->main_img) ?? 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}" style="width: auto !important;" height="225">
                            <div class="card-body">
                                <p class="card-text">{{$film->title}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('user.films.show',$film->id)}}" class="btn btn-sm btn-outline-secondary">Купить билет
                                        </a>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        {{--        Скоро --}}
        <div class="row">
            <h2 class="fw-light text-center mt-5">Смотрите скоро</h2>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($films_soon as $film)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img style="width: auto !important;" height="225" class="bd-placeholder-img card-img-top" src="{{Storage::url($film->main_img) ?? 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}">
                                <div class="card-body">
                                    <p class="card-text">{{$film->title}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('user.films.show',$film->id)}}" class="btn btn-sm btn-outline-secondary">Купить билет
                                            </a>
                                        </div>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{--     Новсти и акции     --}}
        @if($news_special_offers)
            <div class="row">
                <h2 class="fw-light text-center mb-5 mt-5">Новости и акции</h2>
            </div>
            <div id="myCarouselNewsSpecialOffer" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($news_special_offers as $key => $news_special_offer)
                        <button type="button" data-bs-target="#myCarouselNewsSpecialOffer" data-bs-slide-to="{{$key}}"
                                class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                                aria-label="{{$news_special_offer->id}}"></button>
                    @endforeach
                </div>

                <div class="carousel-inner">
                    @foreach($news_special_offers as $key => $news_special_offer)
                        <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                            <img class="bd-placeholder-img" width="100%" height="100%"
                                 src="{{Storage::url($news_special_offer->img)}}" aria-hidden="true">

                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <p><a class="btn btn-primary" href="{{$news_special_offer->url ?? ''}}">Посмотреть</a>
                                    </p>
                                </div>
                            </div>
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
        <div class="row">
            <h3 class="fw-light text-center mb-5">{{$homepage->seo_title ?? ''}}</h3>
        </div>
        <div class="row mb-5">
            <p class="fw-light text-center mb-5 ">{{$homepage->seo_text ?? ''}}</p>
            <div class="row mb-5">

            </div>
        </div>

    </div>


    {{--    Футер--}}

@endsection
