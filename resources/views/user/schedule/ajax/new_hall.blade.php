<option></option>
@foreach($cinema_select->halls as $hall)
    <option value="{{$hall->id}}" {{old('hall') ? 'select' : ''}}>{{$hall->number}} -Зал</option>
@endforeach

