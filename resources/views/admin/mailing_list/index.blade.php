@extends('layouts.admin.admin')
@section('title','Рассылки')
@section('link')
    <style>
        .modal-content {
            width: 1000px;
        }

        .modal-dialog {
            max-width: 1000px !important;
        }
    </style>
@endsection
@section('content')

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Выберите пользователей</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Выбрать</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Дата рождения</th>
                            <th scope="col">Email</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Псевдоним</th>
                            <th scope="col">Город</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row"><input class="form-check" name="users[]" type="checkbox"
                                                       value="{{$user->id}}"></th>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->date_of_birth}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->surname}} {{$user->name}}</td>
                                <td>{{$user->pseudonym}}</td>
                                <td>{{empty($user->city_id) ? '' : $user->city->title}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" id="sendUsers">Выбрать</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5 m-2" id="rrr">
        <h4 class=" mt-2 text-dark">Email</h4>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row ml-5">
            <div class="col-md-2">
                <p class="fw-light">Выбрать кому слать:</p>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-1">
                        <input class="form-check-input" type="radio" name="checkedUsers" checked value="allUser"
                               id="allUsers">
                    </div>
                    <div class="col-8">
                        <label for="allUsers">Все пользователи</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-1">
                        <input class="form-check-input" type="radio" name="checkedUsers" value="null" id="thisUsers">
                    </div>
                    <div class="col-4">
                        <label for="thisUsers">Выборочно</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="selectUsers"
                        class="btn btn-dark">Выбрать пользователей
                </button>
            </div>
        </div>
        <div class="row ml-5 mt-5">
            <div class="col-5">
                <div class="row">
                    <div class="col-md-5">
                        <p class="fw-light">Загрузите файл:</p>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="file" id="templateFile" name="file" accept="text/html">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p class="fw-light">Используемый шаблон:</p>
                    </div>
                    <div class="col-md-5" id="checkedTemplate">

                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <p class="fw-light">Список последних загруженых шаблонов:</p>
                </div>
                <div class="row" id="filesTemplate">
                    @include('admin.mailing_list.ajax.files')
                </div>
            </div>

        </div>
        <div class="row m-5">
            <button class="btn btn-success w-25" id="sendMailing" type="button">Начать рассылку</button>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $('#selectUsers').hide();
            $(document).on('click', '#sendUsers', function () {
                let checked = [];
                $('input:checkbox:checked').each(function () {
                    checked.push($(this).val());
                });
                // console.log(checked);
            })


            $(document).on('click', '#thisUsers', function () {
                $('#selectUsers').show();
            })
            $(document).on('click', '#allUsers', function () {
                $('#selectUsers').hide();
                $('input:checkbox').prop('checked', false);
            })

            $(document).on('change', '#templateFile', function () {
                    if (window.FormData === undefined) {
                        alert('В вашем браузере FormData не поддерживается')
                    } else {

                        let templateFile = new FormData();
                        templateFile.append('file', $("#templateFile")[0].files[0]);
                        templateFile.append('title', $("#templateFile")[0].files[0].name);
                        $('#checkedTemplate').html('')


                        $.ajax({
                            url: '{{route('admin.mailing_lists.save_img')}}',
                            type: 'POST',
                            cash: false,
                            contentType: false,
                            processData: false,
                            data: templateFile,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: (data) => {
                                $('#filesTemplate').html(data)
                                $('#templateFile').val('')
                            }
                        })
                    }
                }
            )

            $(document).on('click', '.delFile', function (e) {
                e.preventDefault()
                let file_id = $(this).data('file_id');
                if ($('#template' + file_id).prop('checked')) {
                    $('#checkedTemplate').html('')
                }
                $.ajax({
                    url: '{{route('admin.mailing_lists.del_img')}}',
                    type: 'GET',
                    data: {file_id: file_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('#filesTemplate').html(data);
                    }
                })
            })

            $(document).on('click', '.templates', function () {
                let checkedTemplate = $(this).data('file_title');
                $('#checkedTemplate').html(`<p class="text-primary">` + checkedTemplate + `</p>`)
            })


            $(document).on('click', '#sendMailing', function () {
                    let users = [];
                     if ($('input[name="checkedUsers"]:checked').val() === 'allUser'){
                         users = $('input[name="checkedUsers"]').val();
                     }else{
                      $('input:checkbox:checked').each(function () {
                             users.push($(this).val());
                         });
                     }
                    let template = $('input[name=template]:checked').val();

                    console.log(users)
                    console.log(template)

                if (!$('input:checkbox:checked').val() && users !== 'allUser' ){
                        alert('Выберите хоть одного пользователя')
                }else if(!template){
                        alert('Выберите шаблон рассылки')
                }else{
                    $.ajax({
                        url: '{{route('admin.mailing_lists.send')}}',
                        type: 'POST',
                        data: {
                            users: users,
                            template: template
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: (data) => {
                            console.log(data);
                        }
                    })
                }
            })

        })
    </script>
@endsection
