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
            <img style="padding: 0;" src="https://i02.appmifile.com/images/2017/09/01/a21030b9-a690-48ba-81cd-903fe03c1ffb.jpg" alt="">
        </div>
        <div class="container p-5">
            <div class="row mb-5">
                <h4 class="fw-light text-center mb-5 mt-5">Контакты</h4>
            </div>
            @if(!empty($contacts))
                @foreach($contacts as $contact)
                    <div class="row m-5">
                        <div class="col-md-4">
                            <p class="fs-5 ">{{$contact->cinema->title}}</p>
                        </div>
                        <div class="col-md-4">
                            @if($contact->logo_img !== null)<img src="{{Storage::url($contact->logo_img)}}" width="250" alt="">@endif
                        </div>
                        <div class="col-md-4">
                            <p class="text-secondary fw-light">{{$contact->address}}</p>
                        </div>
                    </div>
                    <div class="row m-5" >
                        <div class="col-md-6">
                            @if($contact->cinema->top_banner_img !== null)<img src="{{Storage::url($contact->cinema->top_banner_img)}}" width="100%" alt="">@endif
                        </div>
                        <div class="col-md-5">
                         {!! $contact->coordinates !!}
                        </div>
                    </div>
                    <hr class="m-5">
                @endforeach
            @endif
        </div>
        </div>

@endsection
