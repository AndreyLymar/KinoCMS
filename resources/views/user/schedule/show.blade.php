@extends('layouts.user.user')
@section('link')
    <style>
        button {
            border: none; /*  убираем обводку кнопки */
            cursor: pointer;
            background-color: transparent;
        }

        .choose {
            background-color: grey;
            border-radius: 3px;
            width: 40px;
            height: 40px;
        }

        .reservation {
            background-color: #eeeeee;
            border-radius: 3px;
            width: 40px;
            height: 40px;
        }


        .myReservation {
            background-color: darkgreen;
            border-radius: 3px;
            width: 40px;
            height: 40px;
            color:white;
        }

        .notChoose {
            background-color: darkorange;
            border-radius: 3px;
            width: 40px;
            height: 40px;
        }

        .row1 {

        }
    </style>
@endsection
@section('content')
    <div class="container-fluid m-0">
        <div class="row">
            <img style="height: 900px; padding: 0;" src="{{Storage::url($schedule->hall->top_banner_img) ?? ''}}"
                 alt="">
        </div>
        <div class="row">
            <div class="col-md-3 mt-5">
                <div class="row">
                    <img style="height: auto; padding: 0;" src="{{Storage::url($schedule->film->main_img) ?? ''}}"
                         alt="">
                </div>
            </div>
            <div class="col-md-8 m-5">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="fw-light mt-2">{{$schedule->film->title}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="fw-light text-secondary mt-2">{{date('d F', strtotime($schedule->date))}}
                            , {{date('H:i', strtotime($schedule->time))}}, Зал №{{$schedule->hall->number}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <p class="fw-light text-dark mt-2">Цена в гривнах: <b>{{$schedule->price}} грн </b></p>
                    </div>
                    @if (Auth::user())
                        <div class="col-md-2" id="allReservedSeats">

                        </div>
                    @endif
                    <div class="chooseSum col-md-2">
                        <p class="fw-light text-dark mt-2">Сумма заказа: 0</p>
                    </div>
                    <div class="chooseCol col-md-2">
                        <p class="fw-light text-dark mt-2">Билетов: 0</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <p>
                        {{$schedule->film->description}}
                    </p>
                </div>

                <div class="row">
                    <div class="col-2 m-5"></div>
                    <div class="col-8 m-5">
                        <h4 class="fw-light text-center mb-5 mt-5">Карта зала</h4>
                        <div class="d-flex flex-row mb-3 mt-4 justify-content-center" style="background-color: yellow;">
                            Экран
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 m-5">
                        @for($i = 1; $i <= 10; $i++)
                            <div class="d-flex flex-row mb-3 justify-content-start">
                                <div class="p-2 m-1">
                                    Ряд - {{$i}}
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="col-8 m-5" id="hall">
                      @include('user.schedule.ajax.choose_seats')
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 m-5">
                    </div>
                    <div class="col-8 m-5">
                        <div class="row">
                            <div class="col-3 m-2">
                                <button class="btn btn-outline-dark" id="buySeats" data-user_id="{{isset(Auth::user()->id) ? Auth::user()->id : null}}">Купить билеты</button>
                            </div>
                            <div class="col-4 m-2">
                                <a class="btn btn-outline-success" id="reservationSeats" data-user_id="{{isset(Auth::user()->id) ? Auth::user()->id : null}}">Забронировать билеты</a>
                            </div>
                            <div class="col-3 m-2">
                                <a class="btn btn-outline-secondary" id="cancelReservationSeats" data-user_id="{{isset(Auth::user()->id) ? Auth::user()->id : null}}">Отменить бронь</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($schedule->film->filmGalleries)
                    <div class="row">
                        <h4 class="fw-light text-center mb-5 mt-5">Фотогалерея</h4>
                    </div>
                    <div id="myCarouselNewsSpecialOffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($schedule->film->filmGalleries as $key => $filmGallery)
                                <button type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                        data-bs-slide-to="{{$key}}"
                                        class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                                        aria-label="{{$filmGallery->id}}"></button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach($schedule->film->filmGalleries as $key => $filmGallery)
                                <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                                    <img class="bd-placeholder-img" width="100%" height="100%"
                                         src="{{Storage::url($filmGallery->img)}}" aria-hidden="true">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarouselNewsSpecialOffer"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.chooseSeat', function () {

                if ($(this).hasClass('choose')) {
                    $(this).removeClass('choose')
                    $(this).addClass('notChoose')
                } else {
                    $(this).addClass('choose')
                    $(this).removeClass('notChoose')
                }

                let seats_id = [];
                let i = 0;
                $(".choose").each(function () {
                    let seat_id = $(this).data('id');

                    seats_id[i] = seat_id;
                    i++;
                })

                $.ajax({
                    url: '{{route('user.schedules.show', $schedule->id)}}',
                    type: 'GET',
                    data: {
                        seats_id: seats_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        if (data){
                            $('.chooseSum').html(`<p class="fw-light text-dark mt-2">Сума заказа: ` + data['sum'] + `</p>`);
                            $('.chooseCol').html(`<p class="fw-light text-dark mt-2">Билетов: ` + data['count'] + `</p>`);
                        }else{
                            $('.chooseSum').html(`<p class="fw-light text-dark mt-2">Сума заказа: 0</p>`);
                            $('.chooseCol').html(`<p class="fw-light text-dark mt-2">Билетов: 0</p>`);
                        }

                    }
                })
            })

            function seats(action, class_name, user_id){
                if (user_id) {
                    let seats_id = [];
                    let i = 0;
                    $("." + class_name + "").each(function () {
                        let seat_id = $(this).data('id');

                        seats_id[i] = seat_id;
                        i++;
                    })

                    $.ajax({
                        url: '{{route('user.schedules.show', $schedule->id)}}',
                        type: 'GET',
                        data: {
                            action: action,
                            seats_id: seats_id,
                            user_id: user_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: (data) => {
                            $('#hall').html(data)
                        },
                        error: () => {
                            alert('Вы не выбрали места!');
                        }

                    })
                } else {
                    window.location.replace('/login');
                }
            }
            $(document).on('click', '#reservationSeats', function () {
                let user_id = $(this).data('user_id');
                seats('reservationSeats', 'choose', user_id);
            })

            $(document).on('click', '#cancelReservationSeats', function () {
                let user_id = $(this).data('user_id');
                seats('cancelReservationSeats', 'myReservation', user_id);
            })


            {{--// обновление данных у всех пользователей--}}
            {{--function refreshSeats(){--}}
            {{--        $.ajax({--}}
            {{--            url: '{{route('user.schedules.show', $schedule->id)}}',--}}
            {{--            type: 'GET',--}}
            {{--            data: {--}}
            {{--                action: 'refreshSeats',--}}
            {{--            },--}}
            {{--            headers: {--}}
            {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--            },--}}
            {{--            success: (data) => {--}}
            {{--                $('#hall').html(data)--}}
            {{--            }--}}
            {{--        })--}}
            {{--}--}}
            {{--setInterval(refreshSeats, 5000)--}}
        })

    </script>
@endsection
