@extends('layouts.admin.admin')
@section('title','Пользователь' . ' - ' . $user->name . ' ' . $user->surname)
@section('content')

    <form action="{{route('admin.users.update', $user->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="row mt-5 ml-3">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="col-md-4">
                <div class="row">
                    <label for="name" class="form-label">Имя:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                           name="name" placeholder="Андрей" value="{{old('name') ?? $user->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="surname" class="form-label ">Фамилия:</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                           id="surname" placeholder="Лымар" value="{{$user->surname ?? old('surname')}}">
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="pseudonym"
                           class="form-label ">Псевдоним:</label>
                    <input type="text" class="form-control @error('pseudonym') is-invalid @enderror" id="pseudonym"
                           name="pseudonym" value="{{old('pseudonym') ?? $user->pseudonym}}">
                    @error('pseudonym')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="email" class="form-label ">E-mail:</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                           placeholder="email@gmail.com" value="{{old('email') ?? $user->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="password" class="form-label">Пароль:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="password_confirm"
                           class="form-label ">Повторите пароль:</label>
                    <input id="password-confirm" type="password"
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           name="password_confirmation"
                           autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 ml-5">
                <div class="row">
                    <label for="address" class="form-label ">Адресс:</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                           name="address" placeholder="" value="{{ old('address') ?? $user->address }}">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                      {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="number_card" class="form-label">Номер карты:</label>
                    <input type="text" class="form-control number_card @error('number_card') is-invalid @enderror"
                           id="number_card" name="number_card" value="{{old('number_card') ?? $user->number_card}}">
                    @error('number_card')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <div class="col-md-2">
                        <label for="" class="">Пол:</label>
                    </div>
                    <div class="col-md-2 mr-2">
                        <input type="radio" class="form-check-input" id="genderM" name="gender"
                               value="men" {{(old('gender') ?? $user->gender) === 'men' ? 'checked' : ''}}>
                        <label for="genderM" class="form-label">Мужина</label>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" class="form-check-input" id="genderW" name="gender"
                               value="women" {{(old('gender') ?? $user->gender) === 'women' ? 'checked' : '' }}>
                        <label for="genderW" class="form-label">Женщина</label>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-2">
                        <label for="" class="">Роль:</label>
                    </div>
                    <div class="col-md-2 mr-2">
                        <input type="radio" class="form-check-input" id="roleUser" name="role"
                               {{(old('role') ?? $user->role) == 0 ? 'checked' : '' }}  value="0">
                        <label for="genderM" class="form-label">User</label>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" class="form-check-input" id="roleAdmin" name="role"
                               {{(old('role') ?? $user->role) == 1 ? 'checked' : '' }}  value="1">
                        <label for="genderW" class="form-label">Admin</label>
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="phone" class="form-label ">Номер телефона:</label>
                    <input type="text" class="form-control phone @error('phone') is-invalid @enderror" id="phone"
                           name="phone" value="{{$user->phone ?? old('phone')}}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="date_of_birth" class="form-label">Дата рождения:</label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                           id="date_of_birth" name="date_of_birth"
                           value="{{old('date_of_birth') ?? $user->date_of_birth }}">
                    @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row mt-4">
                    <label for="city" class="form-label">Город:</label>
                    <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
                        <option selected value="0">Выберите город:</option>
                        @if(!empty($cities))
                            @foreach($cities as $city)
                                <option
                                    value="{{$city->id}}" {{$city->id == $user->city_id ? 'selected' : ''}}>{{$city->title}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-5 ml-3">
            <div class="col-md-4">
                <button type="submit" class="btn btn-dark">Именить</button>
            </div>
        </div>
    </form>
@endsection

