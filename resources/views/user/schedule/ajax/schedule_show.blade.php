@foreach($dateSchedulesGroups as $key => $dateSchedulesGroup)
    <div class="row mt-5">
        <p class="text-secondary"> Дата {{$key}} </p>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Время</th>
            <th scope="col">Фильм</th>
            <th scope="col">Тип</th>
            <th scope="col">Кинотеатр</th>
            <th scope="col">Зал</th>
            <th scope="col">Цена</th>
            <th scope="col">Бронировать</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dateSchedulesGroup as $schedule)
            <tr>
                <td>{{$schedule->time}}</td>
                <td>{{$schedule->film->title}}</td>
                <td>{{$schedule->type}}</td>
                <td>{{$schedule->hall->cinema->title}}</td>
                <td>{{$schedule->hall->number}} зал</td>
                <td>{{$schedule->price}}</td>
                <td>
                    <a href="{{route('user.schedules.show', $schedule->id)}}" class="btn btn-dark btn-sm">Бронировать</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach
