<ul>
    @foreach($mailing_lists as $key => $mailing_list)
        @if($key < 5)
    <li>
        <div class="row">
            <div class="col-4">
                <input class="form-check-input templates" type="radio" name="template" value="{{$mailing_list->id}}" data-file_title="{{$mailing_list->title}}"
                       id="template{{$mailing_list->id}}">
                <p class="">{{$mailing_list->title}}</p>
            </div>
            <div class="col-2">
                <button data-file_id="{{$mailing_list->id}}" class="delFile link-danger">Удалить</button>
            </div>
        </div>
    </li>
        @endif
    @endforeach
</ul>
