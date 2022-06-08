@extends('layouts.admin.admin')
@section('title','Кинотеатры')
@section('link')
    <link rel="stylesheet" href="{{asset('css/cinemas.css')}}">
@endsection
@section('content')
    <div>
        <div class="row align-items-center mt-5 ml-3">

            @if(isset($cinemas))
                @foreach($cinemas as $cinema)
                    <div class="col-2 mt-5 mr-4">
                        <div class="row ">
                            <div class="position-relative imageStore">
                                <a class="" href="{{route('admin.cinemas.edit',$cinema->id)}}">
                                    <img id="img{{$cinema->id}}"
                                         class="position-absolute top-50 start-50 translate-middle imgStoreNew"
                                         src="{{$cinema->logo_img !== null ? Storage::url($cinema->logo_img) : 'https://img.icons8.com/ios/100/undefined/xlarge-icons.png'}}"/>
                                </a>
                                <form action="{{route('admin.cinemas.destroy',$cinema->id)}}" method="post" class="">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="position-absolute top-10 start-0 translate-middle">
                                        <img class="w-50" src="https://img.icons8.com/flat-round/64/undefined/delete-sign.png"/>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="fs-5">{{$cinema->title}}</label>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-md-1 offset-md-1">
                <a class="btn btn-dark pt-3" href="{{route('admin.cinemas.create')}}"
                        style="width: 70px; height: 70px; font-size: 25px">+
                </a>
            </div>
        </div>
    </div>
@endsection
