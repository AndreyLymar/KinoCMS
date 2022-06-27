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
            <img style="height: 900px; padding: 0;" src="{{Storage::url($page->main_img) ?? ''}}" alt="">
        </div>
        <div class="row">
            <div class="col-md-8 m-5">
                <div class="row mb-4">
                    <h4 class="fw-light text-center mb-5 mt-5">{{$page->title}}</h4>
                </div>
                <div class="row mt-5">
                    <p>
                        {{$page->description}}
                    </p>
                </div>

                @if($page->pageGalleries)
                    <div class="row">
                        <h4 class="fw-light text-center mb-5 mt-5">Фотогалерея</h4>
                    </div>
                    <div id="myCarouselNewsSpecialOffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($page->pageGalleries as $key => $pageGallery)
                                <button type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                        data-bs-slide-to="{{$key}}"
                                        class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                                        aria-label="{{$pageGallery->id}}"></button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach($page->pageGalleries as $key => $pageGallery)
                                <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                                    <img class="bd-placeholder-img" width="100%" height="100%"
                                         src="{{Storage::url($pageGallery->img)}}" aria-hidden="true">
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
            <div class="col-md-2">

            </div>

            </div>

        </div>
    </div>

@endsection
