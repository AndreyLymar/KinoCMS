@extends('layouts.user.user')
@section('content')

    <div class="container p-0 main-container mt-5">
        <div class="row mt-5" id="SchedulesFilter">
            <table class="w-75">
                <thead>
                <tr>
                    <th scope="col" class="p-2">Дата</th>
                    <th scope="col" class="p-2">Кинотеатр</th>
                    <th scope="col" class="p-2">Зал</th>
                    <th scope="col" class="p-2">Фильм</th>
                    <th scope="col" class="p-2">  2d  </th>
                    <th scope="col" class="p-2">  3d  </th>
                    <th scope="col" class="p-2">  imax  </th>
                </tr>
                <tr>
                    <form class="filterSchedules" >
                        <td class="p-2">
                            <input type="date" class="form-control date" id="dateFilter"
                                   name="dateFilter" value="{{old('date')}}">
                        </td>
                        <td class="p-2">
                            <select class="form-select cinema" name="cinemaFilter" id="cinemaFilter"
                                    aria-label="Default select example">
                                <option></option>
                                @foreach($cinemas as $cinema)
                                    <option value="{{$cinema->id}}">{{$cinema->title}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="p-2">
                            <select class="form-select hall" name="hallFilter" id="hallFilter" aria-label="Default select example">
                                <option></option>
                            </select>
                        </td>
                        <td class="p-2">
                            <select class="form-select film " name="filmFilter" id="filmFilter" data-id="Filter" aria-label="Default select example">
                                <option></option>
                                @foreach($films as $film)
                                    <option value="{{$film->id}}" {{old('film') ? 'select' : ''}}>{{$film->title}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="p-2">
                            <input class="form-check-input" type="checkbox" value="2d" id="2dFilter">
                        </td>
                        <td class="p-2">
                            <input class="form-check-input" type="checkbox" value="3d" id="3dFilter">
                        </td>
                        <td class="p-2">
                            <input class="form-check-input" type="checkbox" value="imax" id="imaxFilter">
                        </td>
                    </form>
                </tr>
                </thead>
            </table>
        </div>

        <div class="row mt-5" id="Schedules">
           @include('user.schedule.ajax.schedule_show')
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Filter table

            function getMoreSchedulesAndFilter(){
                let date = $('#dateFilter').val();
                let cinema = $('#cinemaFilter').val();
                let hall = $('#hallFilter').val();
                let film = $('#filmFilter').val();
                let type_2d = $('#2dFilter').prop('checked') ? $('#2dFilter').val() : '';
                let type_3d =  $('#3dFilter').prop('checked') ? $('#3dFilter').val() : '';
                let type_imax =  $('#imaxFilter').prop('checked') ? $('#imaxFilter').val() : '';
                let filter = true;

                console.log(date, cinema, hall, film, type_2d, type_3d, type_imax)
                $.ajax({
                    url: '{{route('user.schedules.index')}}',
                    type: 'GET',
                    data: {
                        filter: filter,
                        cinema: cinema,
                        date: date,
                        hall: hall,
                        film: film,
                        type_2d: type_2d,
                        type_3d: type_3d,
                        type_imax: type_imax
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('#Schedules').html(data);
                    }
                })
            }
            $(document).on('change','#dateFilter', function () {
                getMoreSchedulesAndFilter();
            });
            $(document).on('change','#hallFilter', function () {
                getMoreSchedulesAndFilter();
            });
            $(document).on('change','#cinemaFilter', function () {
                $('#hallFilter').html('');
                getMoreSchedulesAndFilter();
            });
            $(document).on('change','#filmFilter', function () {
                getMoreSchedulesAndFilter();
            });
            $(document).on('click','#2dFilter', function () {
                getMoreSchedulesAndFilter();
            });
            $(document).on('click','#3dFilter', function () {
                getMoreSchedulesAndFilter();
            });
            $(document).on('click','#imaxFilter', function () {
                getMoreSchedulesAndFilter();
            });

            //end Filter


            // change cinema
            $(document).on('change','#cinemaFilter', function () {
                let cinema = $(this).val();

                $.ajax({
                    url: '{{route('user.schedules.index')}}',
                    type: 'GET',
                    data: {
                        cinema: cinema,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        console.log(data);
                        $('#hallFilter').html(data);
                    }
                })
            })

        })
    </script>
@endsection
