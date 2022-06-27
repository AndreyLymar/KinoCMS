@extends('layouts.user.user')
@section('content')

    <div class="container p-0 main-container mt-5">
        <div class="row">
            <h2 class="fw-light text-center mt-5">Смотрите </h2>
        </div>
        <div class="album py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($films as $film)
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
    </div>
    @endsection
