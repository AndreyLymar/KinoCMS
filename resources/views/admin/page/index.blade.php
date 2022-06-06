@extends('layouts.admin.admin')
@section('title','Страницы')
@section('content')
    <div class="row mt-5 ml-5 mr-5">
        <div class="col-2">
            <a href="" class="btn-dark btn">Добавить страницу</a>
        </div>
    </div>
    <div class="row mt-5 ml-5 mr-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название:</th>
                <th scope="col">Дата создания</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Главная</td>
                <td>{{$home !== null ? $home->created_at : 'Не создана'}}</td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="{{$home !== null ? route('admin.pages.main.edit',$home->id) : route('admin.pages.main.create')}}" class=""><img
                                    src="https://img.icons8.com/ios/30/000000/edit--v1.png"/></a>
                        </div>
                        @if($home !== null)
                            <div class="col-4">
                                <form action="{{route('admin.pages.main.destroy',$home->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"><img
                                            src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>
                                </form>
                            </div>
                        @endif
                    </div>
                </td>
{{--                @foreach($users as $user)--}}
{{--                    <th scope="row">{{$user->id}}</th>--}}
{{--                    <td>{{$user->created_at}}</td>--}}
{{--                    <td>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-4">--}}
{{--                                <a href="{{route('admin.users.show',$user->id)}}" class=""><img--}}
{{--                                        src="https://img.icons8.com/ios/30/000000/edit--v1.png"/></a>--}}
{{--                            </div>--}}
{{--                            <div class="col-4">--}}
{{--                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit"><img--}}
{{--                                            src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                @endforeach--}}
            </tr>
            </tbody>
        </table>
    </div>
@endsection
