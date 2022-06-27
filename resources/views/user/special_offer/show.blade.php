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
        <div id="myCarouselGallery" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($special_offer->specialOfferGalleries as $key => $specialOfferGallery)
                    <button type="button" data-bs-target="#myCarouselGallery" data-bs-slide-to="{{$key}}"
                            class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                            aria-label="{{$specialOfferGallery->id}}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach($special_offer->specialOfferGalleries as $key => $specialOfferGallery)
                    <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                        <img class="bd-placeholder-img" width="100%" height="100%"
                             src="{{Storage::url($specialOfferGallery->img)}}" aria-hidden="true">

                        <div class="container">
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
        <div class="row mt-5 mb-5">
            <div class="col-md-9 mb-5 pb-5" style="background-color: #eeeeee;">
                <div class="row mt-5 m-2">
                    <h4 class="fw-light mt-2 text-primary">{{$special_offer->title}}</h4>
                </div>
                <div class="row">
                    <div class="col-md-3 m-2">
                        <img class="mt-5" style="height:auto; width: 300px;"
                             src="{{Storage::url($special_offer->main_img) ?? ''}}" alt="">
                    </div>
                    <div class="col-md-8 m-2">
                        <div class="row mt-5">
                            <p>
                                {{$special_offer->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
