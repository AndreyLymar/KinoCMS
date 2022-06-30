@extends('layouts.admin.admin')
@section('title','Расписание')
@section('content')

    <div class="row mt-5" id="SchedulesFilter">

        <table class="w-50">
            <thead>
            <tr>
                <th scope="col">Время</th>
                <th scope="col">Дата</th>
                <th scope="col">Кинотеатр</th>
                <th scope="col">Зал</th>
                <th scope="col">Фильм</th>
                <th scope="col">Цена от</th>
                <th scope="col">Цена до</th>
            </tr>
            <tr>
                <form class="filterSchedules" >
                    <td>
                        <input type="time" class="form-control time" id="timeFilter"
                               name="timeFilter" value="{{old('time')}}">
                    </td>
                    <td>
                        <input type="date" class="form-control date" id="dateFilter"
                               name="dateFilter" value="{{old('date')}}">
                    </td>
                    <td>
                        <select class="form-select cinema" data-id="Filter" name="cinemaFilter" id="cinemaFilter"
                                aria-label="Default select example">
                            <option></option>
                        @foreach($cinemas as $cinema)
                                <option value="{{$cinema->id}}">{{$cinema->title}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-select hall" name="hallFilter" id="hallFilter" aria-label="Default select example">

                        </select>
                    </td>
                    <td>
                        <select class="form-select film " name="filmFilter" id="filmFilter" aria-label="Default select example">
                            <option></option>
                        @foreach($films as $film)
                                <option value="{{$film->id}}" {{old('film') ? 'select' : ''}}>{{$film->title}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control price" id="priceFilterFrom" name="priceFilterFrom">
                    </td>
                    <td>
                        <input type="text" class="form-control price" id="priceFilterBefore" name="priceFilterBefore">
                    </td>
                    <td>
                        <div class="col-4">
                            <button type="button" class="filter btn btn-dark">Поиск</button>
                        </div>
                    </td>
{{--                    <td></td>--}}
                </form>
            </tr>
            </thead>
        </table>

    </div>



    <div class="row mt-5" id="Schedules">
        @include('admin.schedule.ajax.schedule_show')
    </div>

    <script>
        $(document).ready(function(){
            // Filter table

            function getMoreSchedulesAndFilter(page){
                let date = $('#dateFilter').val();
                let time = $('#timeFilter').val();
                let cinema = $('#cinemaFilter').val();
                let hall = $('#hallFilter').val();
                let priceBefore = $('#priceFilterBefore').val();
                let priceFrom = $('#priceFilterFrom').val();
                let film = $('#filmFilter').val();

                $.ajax({
                    url: '{{route('admin.schedules.filter')}}',
                    type: 'GET',
                    data: {
                        page:page,
                        cinema: cinema,
                        date: date,
                        time: time,
                        hall: hall,
                        priceBefore: priceBefore,
                        priceFrom: priceFrom,
                        film: film
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('#Schedules').html(data);
                    }
                })
            }
            $(document).on('click','.filter', function () {
                let page = $('.pagination').find('li.active span').text();
                getMoreSchedulesAndFilter(page);
            });

            //end Filter


            // change cinema
            $(document).on('change','.cinema', function () {
                let cinema = $(this).val();
                let schedule_id = $(this).data('id');

                $.ajax({
                    url: '{{route('admin.schedules.index')}}',
                    type: 'GET',
                    data: {
                        cinema: cinema,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('#hall' + schedule_id).html(data);
                    }
                })
            })

            // del cinema
            $(document).on('click','.deleteSchedule', function () {
                let schedule_id = $(this).data('id');
                let page = $('.pagination').find('li.active span').text();

                $.ajax({
                    url: '{{route('admin.schedules.delete')}}',
                    type: 'GET',
                    data: {
                        schedule_id: schedule_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        getMoreSchedulesAndFilter(page);
                    }
                })
            })


            // store_or_update button click
            $(document).on('click','.storeUpdateSchedule',  function () {

                // let data = $( this ).serializeArray();

                let schedule_id = $(this).data('id');
                let date = $('#date' + schedule_id).val();
                let time = $('#time' + schedule_id).val();
                let cinema = $('#cinema' + schedule_id).val();
                let hall = $('#hall' + schedule_id).val();
                let price = $('#price' + schedule_id).val();
                let film = $('#film' + schedule_id).val();
                let page = $('.pagination').find('li.active span').text();

                $.ajax({
                    url: '{{route('admin.schedules.store_or_update')}}',
                    type: 'POST',
                    data: {
                        cinema: cinema,
                        schedule_id: schedule_id,
                        date: date,
                        time: time,
                        hall: hall,
                        price: price,
                        film: film
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        getMoreSchedulesAndFilter(page);
                        filter();
                        $('#dateNew').val('');
                        $('#timeNew').val('');
                        $('#cinemaNew').val(0);
                        $('#hallNew').val(0);
                        $('#priceNew').val('');
                        $('#filmNew').val(0);
                    },
                    error: (data) => {
                        if (data.responseJSON.errors.time ) {
                            $('#time' + schedule_id).addClass('is-invalid')
                            $('#time' + schedule_id + 'Error').text(data.responseJSON.errors.time)
                        } else{
                            $('#time' + schedule_id).removeClass('is-invalid')
                            $('#time' + schedule_id + 'Error').text('')
                        }
                        if (data.responseJSON.errors.date ) {
                            $('#date' + schedule_id).addClass('is-invalid')
                            $('#date' + schedule_id + 'Error').text(data.responseJSON.errors.date)
                        } else{
                            $('#date' + schedule_id).removeClass('is-invalid')
                            $('#date' + schedule_id + 'Error').text('')
                        }
                        if (data.responseJSON.errors.cinema ) {
                            $('#cinema' + schedule_id).addClass('is-invalid')
                            $('#cinema' + schedule_id + 'Error').text(data.responseJSON.errors.cinema)
                        } else{
                            $('#cinema' + schedule_id).removeClass('is-invalid')
                            $('#cinema' + schedule_id + 'Error').text('')
                        }
                        if (data.responseJSON.errors.film ) {
                            $('#film' + schedule_id).addClass('is-invalid')
                            $('#film' + schedule_id + 'Error').text(data.responseJSON.errors.film)
                        } else{
                            $('#film' + schedule_id).removeClass('is-invalid')
                            $('#film' + schedule_id + 'Error').text('')
                        }
                        if (data.responseJSON.errors.hall ) {
                            $('#hall' + schedule_id).addClass('is-invalid')
                            $('#hall' + schedule_id + 'Error').text(data.responseJSON.errors.hall)
                        } else{
                            $('#hall' + schedule_id).removeClass('is-invalid')
                            $('#hall' + schedule_id + 'Error').text('')
                        }
                        if (data.responseJSON.errors.price ) {
                            $('#price' + schСоздание страницы расписания в админке + фильтры + пагинация + ajaxedule_id).addClass('is-invalid')
                            $('#price' + schedule_id + 'Error').text(data.responseJSON.errors.price)
                        } else{
                            $('#price' + schedule_id).removeClass('is-invalid')
                            $('#price' + schedule_id + 'Error').text('')
                        }
                    }
                })
            })

            $(document).on('click','.pagination a', function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                getMoreSchedulesAndFilter(page);
            })
        })
    </script>
@endsection

