@extends('layouts.admin.admin')
@section('title','Акции')
@section('content')
    <div class="row mt-5 ml-5 mr-5">
        <div class="col-2">
            <a href="{{route('admin.special_offers.create')}}" class="btn-dark btn">Добавить страницу</a>
        </div>
    </div>
    <div class="row mt-5 ml-5 mr-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название:</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($special_offers as $special_offer)
                <tr>
                    <td>{{$special_offer->title}}</td>
                    <td>{{$special_offer->created_at}}</td>
                    <td>
                        <div class=" ml-2 form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"  disabled {{$special_offer->status === 1 ? 'checked' : ''}}>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                <a href="{{route('admin.special_offers.edit',$special_offer->id)}}" class=""><img
                                        src="https://img.icons8.com/ios/30/000000/edit--v1.png"/></a>
                            </div>
                            <div class="col-4">
                                <form action="{{route('admin.special_offers.destroy',$special_offer->id)}}" method="post">
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
