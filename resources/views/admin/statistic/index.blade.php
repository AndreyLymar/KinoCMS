@extends('layouts.admin.admin')
@section('title','Статистика')

@section('link')
    <!-- uPlot -->
    <link rel="stylesheet" href="{{asset('plugins/uplot/uPlot.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

@endsection
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3">
                <section class="content">
                    <div class="container-fluid">
                        <!-- PIE CHART -->
                        <div class="card card-danger">
                            <div class="card-body">
                                <canvas id="pieChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div id="line-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.card-body-->
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <section class="content">
                <div class="container-fluid">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-body">
                            <div class="chart">
                                <div id="lineChart"
                                     style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </section>
        </div>

        <div class="row ml-1 mt-4">
            <div class="col-lg-6">
                <div class="card bg-gradient-primary">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Visitors
                        </h3>
                        <!-- card tools -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                <i class="far fa-calendar-alt"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <div id="world-map" style="height: 250px; width: 100%;"></div>
                    </div>
                    <!-- /.card-body-->
                    <div class="card-footer bg-transparent">
                        <div class="row">
                            <div class="col-4 text-center">
                                <div id="sparkline-1"></div>
                                <div class="text-white">Visitors</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-4 text-center">
                                <div id="sparkline-2"></div>
                                <div class="text-white">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-4 text-center">
                                <div id="sparkline-3"></div>
                                <div class="text-white">Sales</div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <section class="content">
                    <div class="container-fluid">
                        <!-- PIE CHART -->
                        <div class="card card-danger">
                            <div class="card-body">
                                <canvas id="gender"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </section>
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


    <!-- Page specific script -->
    <script>
        $(function () {

            /* uPlot
             * -------
             * Here we will create a few charts using uPlot
             */
            function getSize(elementId) {
                return {
                    width: document.getElementById(elementId).offsetWidth,
                    height: document.getElementById(elementId).offsetHeight,
                }
            }

            let data = [
                [0, 1, 2, 3, 4, 5, 6],
                [28, 48, 40, 19, 86, 27, 90],
                [65, 59, 80, 81, 56, 55, 40]
            ];

            const optsLineChart = {
                ...getSize('lineChart'),
                scales: {
                    x: {
                        time: false,
                    },
                    y: {
                        range: [0, 100],
                    },
                },
                series: [
                    {},
                    {
                        fill: 'transparent',
                        width: 5,
                        stroke: 'rgba(60,141,188,1)',
                    },
                    {
                        stroke: '#c1c7d1',
                        width: 5,
                        fill: 'transparent',
                    },
                ],
            };

            let lineChart = new uPlot(optsLineChart, data, document.getElementById('lineChart'));

            window.addEventListener("resize", e => {
                lineChart.setSize(getSize('lineChart'));
            });
        });

        $(function () {
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Chrome',
                    'IE',
                    'FireFox',
                    'Safari',
                    'Opera',
                    'Navigator',
                ],
                datasets: [
                    {
                        data: [700, 500, 400, 600, 300, 100],
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    }
                ]
            };
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        });

        $(function () {
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#gender').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Women',
                    'Men',
                ],
                datasets: [
                    {
                        data: [700, 300],
                        backgroundColor: ['#00c0ef', '#3c8dbc'],
                    }
                ]
            };
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        });

        $(function () {
            /*
             * LINE CHART
             * ----------
             */
            //LINE randomly generated data

            var sin = [],
                cos = []
            for (var i = 0; i < 14; i += 0.5) {
                sin.push([i, Math.sin(i)])
                cos.push([i, Math.cos(i)])
            }
            var line_data1 = {
                data: sin,
                color: '#3c8dbc'
            }
            var line_data2 = {
                data: cos,
                color: '#00c0ef'
            }
            $.plot('#line-chart', [line_data1, line_data2], {
                grid: {
                    hoverable: true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor: '#f3f3f3'
                },
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true
                    },
                    points: {
                        show: true
                    }
                },
                lines: {
                    fill: false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis: {
                    show: true
                },
                xaxis: {
                    show: true
                }
            })
            //Initialize tooltip on hover
            $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
                position: 'absolute',
                display: 'none',
                opacity: 0.8
            }).appendTo('body');

            $('#line-chart').bind('plothover', function (event, pos, item) {

                if (item) {
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2)

                    $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
                        .css({
                            top: item.pageY + 5,
                            left: item.pageX + 5
                        })
                        .fadeIn(200)
                } else {
                    $('#line-chart-tooltip').hide()
                }

            })
            /* END LINE CHART */
        })
    </script>
@endsection

