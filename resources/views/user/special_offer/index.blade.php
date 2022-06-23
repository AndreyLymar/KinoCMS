@extends('layouts.user.user')
@section('content')


    <div class="container-fluid p-0 main-container">
        <div class="row">
            <img style="height: 700px; padding: 0;" src="https://www.tourclub.com.ua/media/image/general_fotos/akciji.jpg" alt="">
        </div>
        <div class="row">
            <div class="col-10">
                <div class="row">
                    <h2 class="fw-light text-center mt-5">Наши акции</h2>
                </div>
                <div class="album py-5 ">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach($special_offers as $special_offer)
                                <a href="{{route('user.special_offers.show', $special_offer->id)}}" class="link-dark" style="text-decoration: none;">
                                    <div class="col">
                                        <div class="card shadow-sm" style="height: 500px;">
                                            <img class="bd-placeholder-img card-img-top" src="{{isset($special_offer->main_img) ? Storage::url($special_offer->main_img) : 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}" style="width: auto !important;" height="225">
                                            <div class="card-body">
                                                <div class="row p-2 text-primary">
                                                    {{$special_offer->title}}
                                                </div>
                                                <div class="row p-2">
                                                    {{date('Y-m-d',strtotime($special_offer->date_published))}}
                                                </div>

                                                <div class="row p-2" style=" max-height: 150px; overflow: hidden; text-overflow: ellipsis; white-space: normal;">
                                                    <hr>
                                                    {{$special_offer->description}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">

            </div>
        </div>

    </div>


@endsection
