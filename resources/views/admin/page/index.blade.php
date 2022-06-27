@extends('layouts.admin.admin')
@section('title','Страницы')
@section('content')
    <div class="row mt-5 ml-5 mr-5">
        <div class="col-2">
            <a href="{{route('admin.pages.create')}}" class="btn-dark btn">Добавить страницу</a>
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
            <tr>
                <td>Главная</td>
                <td>{{$home !== null ? $home->created_at : 'Не создана'}}</td>
                <td></td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="{{$home !== null ? route('admin.pages.main.edit',$home->id) : route('admin.pages.main.create')}}"
                               class=""><img
                                    src="https://img.icons8.com/ios/30/000000/edit--v1.png"/></a>
                        </div>
                        @if($home !== null)
{{--                            <div class="col-4">--}}
{{--                                <form action="{{route('admin.pages.main.destroy',$home->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit"><img--}}
{{--                                            src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        @endif
                    </div>
                </td>
            </tr>
            @foreach($pages as $i => $page)
                <tr>
                    <td>{{$page->title}}</td>
                    <td>{{$page->created_at}}</td>
                    <td>
                        <div class=" ml-2 form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"  disabled {{$page->status === 1 ? 'checked' : ''}}>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                <a href="{{route('admin.pages.edit',$page->id)}}" class=""><img
                                        src="https://img.icons8.com/ios/30/000000/edit--v1.png"/></a>
                            </div>
                            @if($i>=6)
                            <div class="col-4">
                                <form action="{{route('admin.pages.destroy',$page->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"><img
                                            src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
