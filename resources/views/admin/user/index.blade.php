@extends('layouts.admin.admin')
@section('title','Пользователи')
@section('content')
    <div class="row mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Email</th>
                <th scope="col">Телефон</th>
                <th scope="col">ФИО</th>
                <th scope="col">Псевдоним</th>
                <th scope="col">Город</th>
                <th scope="col">Доступ</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->date_of_birth}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->surname}} {{$user->name}}</td>
                    <td>{{$user->pseudonym}}</td>
                    <td>{{empty($user->city_id) ? '' : $user->city->title}}</td>
                    <td>{{$user->role}}</td>
                    <td></td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                <a href="{{route('admin.users.show',$user->id)}}" class=""><img
                                        src="https://img.icons8.com/ios/30/000000/edit--v1.png"/></a>
                            </div>
                            <div class="col-4">
                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
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
        {{$users->links()}}
    </div>

@endsection
