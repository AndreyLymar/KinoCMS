@extends('layouts.user.user')
@section('content')


    <div class="container-fluid p-0 main-container">
        <div class="row">
            <img style="height: 800px; padding: 0;" src="http://dengi.bm.img.com.ua/dengi/orig/9/68/df958bc1d296d0bce3981c9798d6c689.jpg" alt="">
        </div>
        <div class="row">
            <div class="col-10">
                <div class="row">
                    <h2 class="fw-light text-center mt-5">Наши новости</h2>
                </div>
                <div class="album py-5 ">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach($news as $oneNews)
                                <a href="{{route('user.news.show', $oneNews->id)}}" class="link-dark" style="text-decoration: none;">
                                    <div class="col">
                                        <div class="card shadow-sm" style="height: 500px;">
                                            <img class="bd-placeholder-img card-img-top" src="{{isset($oneNews->main_img) ? Storage::url($oneNews->main_img) : 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}" style="width: auto !important;" height="225">
                                            <div class="card-body">
                                                <div class="row p-2 text-primary">
                                                    {{$oneNews->title}}
                                                </div>
                                                <div class="row p-2">
                                                    {{date('Y-m-d',strtotime($oneNews->date_published))}}
                                                </div>

                                                <div class="row p-2" style=" max-height: 150px; overflow: hidden; text-overflow: ellipsis; white-space: normal;">
                                                    <hr>
                                                    {{$oneNews->description}}
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
