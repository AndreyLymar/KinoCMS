
<div class="row mt-5 mb-4">
    @foreach($film->schedules as $schedule)
        @if($schedule->hall->cinema_id === $select_cinema->id)
    <div class="col-2">
        <div class="row text-center fs-4" style="border: 1px solid grey;">
            <div><b>{{date("d", strtotime($schedule->date))}}</b></div>
        </div>
        <div class="row text-center fs-5" style="border: 1px solid grey;">
            <div>{{date("F", strtotime($schedule->date))}}</div>
        </div>
    </div>
        @endif
    @endforeach
</div>

<div class="row mt-5">
    <h4 class="fw-light text-dark">{{$select_cinema->title}}:</h4>
</div>

<div class="row mt-5">
    @foreach($film->schedules as $schedule)
        @if($schedule->hall->cinema_id === $select_cinema->id)
    <div class="col-2 m-2">
        <div class="row">
            <div class="col fs-5 text-center" style="border: 1px solid grey;">
                <div>{{date("H:i", strtotime($schedule->time))}}</div>
            </div>
            <div class="col fs-5  text-center" style="border: 1px solid grey;">
                <div>{{$schedule->type}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col fs-5 text-center" style="border: 1px solid grey;">
                <div>{{$schedule->hall->number}} зал</div>
            </div>
            <div class="col fs-5  text-center" style="border: 1px solid grey;">
                <div>{{$schedule->price}}</div>
            </div>
        </div>
    </div>
        @endif
    @endforeach
</div>
