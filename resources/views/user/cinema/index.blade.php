@extends('layouts.user.user')
@section('content')


    <div class="container p-0 main-container mt-5">
        <div class="row">
            <h2 class="fw-light text-center mt-5">Наши кинотеатры</h2>
        </div>
        <div class="album py-5 ">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($cinemas as $cinema)
                            <a href="{{route('user.cinemas.show', $cinema->id)}}" class="link-dark">
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img class="bd-placeholder-img card-img-top" src="{{isset($cinema->logo_img) ? Storage::url($cinema->logo_img) : 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}" style="width: auto !important;" height="225">
                                        <div class="card-body">
                                            <p class="card-text">{{$cinema->title}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
