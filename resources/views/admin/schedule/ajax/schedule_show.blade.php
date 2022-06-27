@extends('layouts.admin.admin')
@section('title','Расписание')
@section('content')
    <div class="row mt-5">
        <div class="col-2">
            <button type="button" name="addSchedule" id="addSchedule" class="btn-dark btn">
                Добавить сеанс
            </button>
            <button type="button" name="delNewSchedule" id="delNewSchedule" class="btn-dark btn">
                Убрать
            </button>
        </div>
    </div>
    <div class="row mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Время</th>
                <th scope="col">Дата</th>
                <th scope="col">Кинотеатр</th>
                <th scope="col">Зал</th>
                <th scope="col">Фильм</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="tbody">
            <tr id="newSchedule">

            </tr>
            @foreach($schedules as $schedule)
                <tr>
{{--                    <form action="" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('patch')--}}
                    <th scope="row">{{$schedule->id}}</th>
                    <td>
                        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time"
                               name="time" value="{{old('time') ?? $schedule->time}}">
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                        @enderror
                    </td>
                    <td>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                               name="date" value="{{old('date') ?? $schedule->date}}">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                        @enderror
                    </td>
                    <td>
                        <select class="form-select cinemas @error('cinema') is-invalid @enderror" data-id="{{$schedule->id}}" name="cinema" aria-label="Default select example">
                            @foreach($cinemas as $cinema)
                                <option value="{{$cinema->id}}"
                                        @if(old('cinema'))
                                            {{ 'selected'}}
                                    @else
                                    @foreach($schedule->halls as $hall)
                                        @if($cinema->id == $hall->cinema_id)
                                            {{ 'selected'}}
                                        @endif
                                    @endforeach
                                    @endif
                                    >{{$cinema->title}}</option>
                            @endforeach
                        </select>
                        @error('cinema')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                        @enderror
                    </td>
                    <td>
                        <select class="form-select @error('hall') is-invalid @enderror" name="hall" aria-label="Default select example">
                            @foreach($cinema->halls as $hall)
                                <option value="{{$hall->id}}" {{old('hall') ? 'selected' : ($hall->id == $schedule->hall_id ? 'selected' : '')}}>{{$hall->number}} -Зал</option>
                            @endforeach
                        </select>
                        @error('hall')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                        @enderror
                    </td>
                    <td>
                        <select class="form-select @error('film') is-invalid @enderror" name="film" aria-label="Default select example">
                            @foreach($films as $film)
                                <option value="{{$film->id}}" {{old('film') ? 'selected' : ($film->id == $schedule->film_id ? 'selected' : '')}}>{{$film->title}}</option>
                            @endforeach
                        </select>
                        @error('hall')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                        @enderror
                    </td>
                    <td>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price') ?? $schedule->price}}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                        @enderror
                    </td>
                    <td>
                        <div class="col-4">
                            <button type="submit" ><img src="https://img.icons8.com/ios/30/000000/save--v1.png"/></button>
                        </div>
                    </td>
{{--                    </form>--}}
                    <td>
                        <div class="col-4">
{{--                            <form action="" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('delete')--}}
                                <button type="submit"><img
                                        src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>
{{--                            </form>--}}
                        </div>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
{{--        {{$users->links()}}--}}
    </div>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function(){

            $('.cinemas').change(function (){
                let cinema = $(this).val();
                let schedule_id = $(this).data('id');
                console.log(cinema, schedule_id);

                $.ajax({
                    url:'{{route('admin.schedules.index')}}',
                    type: 'GET',
                    data:{
                        cinema: cinema,
                        schedule_id: schedule_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:(data) => {
                        console.log(data);
                    }
                })
            })



            $('#addSchedule').on('click', function(){
                $('#newSchedule').html(`      <form action="" method="post">
                        @csrf
                <th scope="row">New</th>
                    <td>
                        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time"
                               name="time" value="">
                        @error('time')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </td>
                <td>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                               name="date" value="">
                        @error('date')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </td>
                <td>
                    <select class="form-select cinemas @error('cinema') is-invalid @enderror" data-id="new" name="cinema" aria-label="Default select example">
                            @foreach($cinemas as $cinema)
                <option value="{{$cinema->id}}" {{old('cinema') ? 'selected' : ''}}>{{$cinema->title}}</option>
                            @endforeach
                </select>
@error('cinema')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </td>
                <td>
                    <select class="form-select @error('hall') is-invalid @enderror" name="hall" aria-label="Default select example">
                            @foreach($halls as $hall)
                <option value="{{$hall->id}}" {{old('hall') ? 'selected' : ''}}>{{$hall->number}} -Зал</option>
                            @endforeach
                </select>
@error('hall')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </td>
                <td>
                    <select class="form-select @error('film') is-invalid @enderror" name="film" aria-label="Default select example">
                            @foreach($films as $film)
                <option value="{{$film->id}}" {{old('film') ? 'selected' : ''}}>{{$film->title}}</option>
                            @endforeach
                </select>
@error('hall')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </td>
                <td>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}">
                        @error('price')
                <span class="invalid-feedback" role="alert">
{{ $message }}
                </span>
@enderror
                </td>
                <td>
                    <div class="col-4">
                        <button type="submit" ><img src="https://img.icons8.com/ios/30/000000/save--v1.png"/></button>
                    </div>
                </td>
                </form>
                <td>

                </td>`);
            });
        });
        $(document).ready(function(){
            $('#delNewSchedule').on('click',function (){
                $('#newSchedule').html('');
            });
        })
    </script>
@endsection


