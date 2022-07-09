@extends('layouts.admin.admin')
@section('title','Статистика')

@section('link')
    <!-- uPlot -->
    <link rel="stylesheet" href="{{asset('plugins/uplot/uPlot.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages':['geochart'],
            // Note: Because this chart requires geocoding, you'll need mapsApiKey.
            // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
                ['Citi',   ''],
                ['Chernihiv', 36],
                ['Lviv', 76],
                ['Kiev', 156],
            ]);

            var options = {
                region: 'UA',
                colorAxis: {colors: ['#00853f', 'black', '#e31b23']},
                backgroundColor: '#81d4fa',
                datalessRegionColor: '#f8bbd4',
                defaultColor: '#f5f5f5',
            };

            var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
            chart.draw(data, options);
        };
    </script>

@endsection
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4">
                <canvas id="films"></canvas>
            </div>
            <div class="col-lg-5">
                <canvas id="schedules"></canvas>
            </div>
            <div class="col-lg-3 mt-4">
                <!-- small box -->
                <div class="small-box bg-warning w-50">
                    <div class="inner">
                        <h3>{{count($users)}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
         <canvas id="users"></canvas>
        </div>

        <div class="row ml-1 mt-4">
            <div class="col-lg-6">
                <div id="geochart-colors" style="width: 700px; height: 433px;"></div>
            </div>
            <div class="col-lg-6">
                <canvas id="gender"></canvas>
            </div>
        </div>

    </div>

@endsection
@section('script')

    <!-- uPlot -->
    <script src="{{asset('plugins/uplot/uPlot.iife.min.js')}}"></script>
    <!-- Pie Chart -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- FLOT CHARTS -->
    <script src="http://cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{asset('plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="{{asset('plugins/flot/plugins/jquery.flot.pie.js')}}"></script>


    <script>
        new Chart(document.getElementById('schedules'), {
            type: 'line',
            data: {
                labels: [`@foreach ($schedulesDate as $key => $scheduleDate) {{$key}} `, ` @endforeach`],
                datasets: [{
                    label: 'Сеансы',
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                    data: [`@foreach ($schedulesDate as $key => $scheduleDate) {{count($scheduleDate)}} `, ` @endforeach`],
                }]
            },
        });


        new Chart(document.getElementById('users'), {
            type: 'line',
            data: {
                labels: [`@foreach ($devicesDate as $key => $deviceDate) {{$key}} `, ` @endforeach`],
                datasets: [{
                    label: 'All Device',
                    fill: false,
                    borderColor: [
                        'rgb(25, 205, 86)',
                    ],
                    tension: 0.1,
                    data: [`@foreach ($allDevices as $allDevice) {{$allDevice}} `, ` @endforeach`],
                },{
                    label: 'Mobile',
                    fill: false,
                    borderColor: [
                        'rgb(214, 172, 255)',
                    ],
                    tension: 0.1,
                    data: [`@foreach ($mobiles as $mobile) {{$mobile}} `, ` @endforeach`],
                },{
                    label: 'Desktop',
                    fill: false,
                    borderColor: [
                        'rgb(54, 162, 235)',
                    ],
                    tension: 0.1,
                    data: [`@foreach ($desktops as $desktop) {{$desktop}} `, ` @endforeach`],
                }
                ]
            },
        });


        new Chart(document.getElementById('films'), {
            type: 'pie',
            data: {
                labels: [`@foreach ($schedulesFilms as $key => $schedulesFilm) {{\App\Models\Film::find($key)->title}} `, ` @endforeach`],
                datasets: [{
                    label: 'Сеансы',
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(25, 205, 86)',
                        'rgb(255, 25, 82)',
                        'rgb(55, 5, 8)',
                        'rgb(2, 205, 200)',
                        'rgb(125, 130, 12)',
                        'rgb(255, 205, 86)',
                    ],
                    fill: true,
                    data: [`@foreach ($schedulesFilms as $key => $schedulesFilm) {{count($schedulesFilm)}} `, ` @endforeach`],
                }]
            },
        });

        new Chart(document.getElementById('gender'), {
            type: 'pie',
            data: {
                {{--labels: [`@foreach ($usersGender as $key => $userGender) {{$key}} `, ` @endforeach`],--}}
                labels: ["Мужчины", "Женщины", "Не указано"],
                datasets: [{
                    label: 'Сеансы',
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(25, 205, 86)',
                    ],
                    fill: true,
                    data: [`@foreach ($usersGender as $key => $userGender) {{count($userGender)}} `, ` @endforeach`],
                }]
            },
        });
    </script>



@endsection

