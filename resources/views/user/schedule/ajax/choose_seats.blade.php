@for($i = 1; $i <= 10; $i++)
    <div class="d-flex flex-row mb-3 justify-content-center">
        @foreach($schedule->seats  as $seat)
            @if($seat->row == $i)
                <div class="m-1 text-center">
                    <button
                        {{$seat->status === 1 ? 'disabled': ''}} class="p-2  chooseSeat {{$seat->status === 1 ? (isset(Auth::user()->id) && $seat->user->id == Auth::user()->id ? 'myReservation' : 'reservation') : 'notChoose'}}"
                        data-id="{{$seat->id}}">{{$seat->seat}}</button>
                </div>
            @endif
        @endforeach
    </div>
@endfor
<script>
    $(document).ready(function () {
        $('#allReservedSeats').html(`<p class="fw-light text-dark mt-2">Забронированные места: <b> @foreach(Auth::user()->seats as $seat) @if($seat->schedule->id === $schedule->id) ряд:{{$seat->row}} место:{{$seat->seat}}, <br> @endif @endforeach</b></p>`);
    })
</script>
