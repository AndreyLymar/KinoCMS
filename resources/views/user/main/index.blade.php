@extends('layouts.user.user')
@section('content')
    <style>
        body {
            background: url({{Storage::url($homepage->bg_img) ?? ''}}) no-repeat center top fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>

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
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Купить билет
                                        </button>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Купить билет
                                        </button>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Купить билет
                                        </button>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Купить билет
                                        </button>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Купить билет
                                        </button>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Купить билет
                                        </button>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary"></button>--}}
                                        <p class="text-small text-success">В кино с 1 июня!</p>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary"></button>--}}
                                        <p class="text-small text-success">В кино с 1 июня!</p>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary"></button>--}}
                                        <p class="text-small text-success">В кино с 1 июня!</p>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary"></button>--}}
                                        <p class="text-small text-success">В кино с 1 июня!</p>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary"></button>--}}
                                        <p class="text-small text-success">В кино с 1 июня!</p>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">Главный герой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary"></button>--}}
                                        <p class="text-small text-success">В кино с 1 июня!</p>
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <div class="row w-100 p-0 m-0 bg-dark">
        <div class="row w-75 m-auto">
            <hr class="border-white mt-5">
        </div>
        <div class="row w-75 m-auto mt-5 mb-5">
            <div class="col-md-3">
                <ul class="">
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="">
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="">
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                    <li><small class="text-white">sljgjhsdfjkds</small></li>
                </ul>
            </div>
        </div>

    </div>
@endsection
