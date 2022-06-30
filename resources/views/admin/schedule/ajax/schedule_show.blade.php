<table class="table" id="scheduleTable">
    <thead >
    <tr class="table-secondary">
        <th scope="col">#</th>
        <th scope="col">Время</th>
        <th scope="col">Дата</th>
        <th scope="col">Кинотеатр</th>
        <th scope="col">Зал</th>
        <th scope="col">Фильм</th>
        <th scope="col">Цена</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    <tr id="newSchedule " class="table-secondary">
        <form class="formSchedule" data-id="New">
            <th scope="row">New</th>
            <td>
                <input type="time" class="form-control time" id="timeNew"
                       name="timeNew" value="{{old('time')}}">
                <span class="invalid-feedback" id="timeNewError" role="alert"></span>
            </td>
            <td>
                <input type="date" class="form-control date" id="dateNew"
                       name="dateNew" value="{{old('date')}}">
                <span class="invalid-feedback" id="dateNewError" role="alert"></span>
            </td>
            <td>
                <select class="form-select cinema " data-id="New" name="cinemaNew" id="cinemaNew"
                        aria-label="Default select example">
                    <option> </option>
                @foreach($cinemas as $cinema)
                        <option value="{{$cinema->id}}"
                        @if(old('cinema'))
                            {{ 'selected'}}
                            @endif
                        >{{$cinema->title}}</option>
                    @endforeach
                </select>
                <span class="invalid-feedback" id="cinemaNewError" role="alert"></span>
            </td>
            <td>
                <select class="form-select hall" name="hallNew" id="hallNew" aria-label="Default select example">
                    <option> </option>
                </select>
                <span class="invalid-feedback" id="hallNewError" role="alert"></span>
            </td>
            <td>
                <select class="form-select film " name="filmNew" id="filmNew" aria-label="Default select example">
                    <option> </option>
                @foreach($films as $film)
                        <option value="{{$film->id}}" {{old('film') ? 'select' : ''}}>{{$film->title}}</option>
                    @endforeach
                </select>
                <span class="invalid-feedback" id="filmNewError" role="alert"></span>
            </td>
            <td>
                <input type="text" class="form-control price" id="priceNew" name="priceNew" value="{{old('price')}}">
                <span class="invalid-feedback" id="priceNewError" role="alert"></span>
            </td>
            <td>
                <div class="col-4">
                    <button type="button" data-id="New" class="storeUpdateSchedule btn-lg btn-dark">+</button>
                </div>
            </td>
            <td></td>
        </form>
    </tr>
    </thead>
    <tbody id="tbody">
    @foreach($schedules as $schedule)
        <tr>
            <form class="formSchedule" id="formSchedule{{$schedule->id}}" data-id="{{$schedule->id}}">
                <th scope="row">{{$schedule->id}}</th>
                <td>
                    <input type="time" class="form-control time" id="time{{$schedule->id}}"
                           name="time" value="{{old('time') ?? $schedule->time}}">
                    <span class="invalid-feedback" id="time{{$schedule->id}}Error" role="alert"></span>
                </td>
                <td>
                    <input type="date" class="form-control date" id="date{{$schedule->id}}"
                           name="date" value="{{old('date') ?? $schedule->date}}">
                    <span class="invalid-feedback" id="date{{$schedule->id}}Error" role="alert"></span>
                </td>
                <td>
                    <select class="form-select cinema " data-id="{{$schedule->id}}" name="cinema"
                            id="cinema{{$schedule->id}}" aria-label="Default select example">
                        @foreach($cinemas as $cinema)
                            <option value="{{$cinema->id}}"
                            @if(old('cinema'))
                                {{ 'selected'}}
                                @elseif($cinema->id == $schedule->hall->cinema_id)
                                {{ 'selected'}}
                                @endif
                            >{{$cinema->title}}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" id="cinema{{$schedule->id}}Error" role="alert"></span>
                </td>
                <td>
                    <select class="form-select hall" name="hall" id="hall{{$schedule->id}}"
                            aria-label="Default select example">
                        @foreach($halls as $hall)
                            @if($hall->cinema_id === $schedule->hall->cinema_id)
                                <option
                                    value="{{$hall->id}}" {{old('hall') ? 'selected' : ($hall->id == $schedule->hall_id ? 'selected' : '')}}>{{$hall->number}}
                                    -Зал
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <span class="invalid-feedback" id="hall{{$schedule->id}}Error" role="alert"></span>

                </td>
                <td>
                    <select class="form-select film " name="film" id="film{{$schedule->id}}"
                            aria-label="Default select example">
                        @foreach($films as $film)
                            <option
                                value="{{$film->id}}" {{old('film') ? 'selected' : ($film->id == $schedule->film_id ? 'selected' : '')}}>{{$film->title}}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" id="film{{$schedule->id}}Error" role="alert"></span>
                </td>
                <td>
                    <input type="text" class="form-control price" id="price{{$schedule->id}}" name="price"
                           value="{{old('price') ?? $schedule->price}}">
                    <span class="invalid-feedback" id="price{{$schedule->id}}Error" role="alert"></span>

                </td>
                <td>
                    <div class="col-4">
                        <button type="button" class="storeUpdateSchedule" data-id="{{$schedule->id}}"><img
                                src="https://img.icons8.com/ios/30/000000/save--v1.png"/></button>
                    </div>
                </td>
                <td>
                    <div class="col-4">
                        <button type="button" id="deleteSchedule" data-id="{{$schedule->id}}" class="deleteSchedule">
                            <img
                                src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>
                    </div>
                </td>
            </form>
        </tr>
    @endforeach

    </tbody>
</table>

{{$schedules->links()}}


