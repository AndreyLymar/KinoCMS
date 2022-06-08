@extends('layouts.admin.admin')
@section('title','Города')
@section('content')
    <div class="row mt-5 ml-5 mr-5">
        <div class="col-2">
            <a href="{{route('admin.cities.create')}}" class="btn-dark btn">Добавить страницу</a>
        </div>
    </div>
    <div class="row mt-5 ml-5 mr-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id:</th>
                <th scope="col">Название:</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{$city->id}}</td>
                    <td>{{$city->title}}</td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                <a href="{{route('admin.cities.edit',$city->id)}}" class=""><img
                                        src="https://img.icons8.com/ios/30/000000/edit--v1.png"/></a>
                            </div>
                            <div class="col-4">
                                <form action="{{route('admin.cities.destroy',$city->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"><img
                                            src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
