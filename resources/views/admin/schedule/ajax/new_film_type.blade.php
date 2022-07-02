<option></option>
@if($film_select->type_2d == 1)
    <option value="2d" {{old('type') ? 'select' : ''}}>2D</option>
@endif
@if($film_select->type_3d == 1)
    <option value="3d" {{old('type') ? 'select' : ''}}>3D</option>
@endif
@if($film_select->type_imax == 1)
    <option value="imax" {{old('type') ? 'select' : ''}}>Imax</option>
@endif
