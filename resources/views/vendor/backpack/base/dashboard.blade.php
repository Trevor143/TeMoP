@extends('backpack::layout')

@section('after_styles')
    <style>
        #container {
            max-width: 800px;
            min-width: 800px;
            height: 400px;
            margin: 1em auto;
        }
        .scrolling-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        #container1 {
            max-width: 800px;
            min-width: 800px;
            height: 400px;
            margin: 1em auto;
        }
        .scrolling-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>

@endsection

@section('header')
    <section class="content-header">
        <h1>
            {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">{{ trans('backpack::base.dashboard') }}</li>
        </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>

                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
            @foreach($tenders as $tender)
                Some words
            @endforeach

            <div class="scrolling-container">
                <div id="container"></div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
    <script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>
    <script src="https://code.highcharts.com/gantt/modules/exporting.js"></script>

    <script>
        // Set to 00:00:00:000 today
        var today = new Date(),
            day = 1000 * 60 * 60 * 24,
            map = Highcharts.map,
            dateFormat = Highcharts.dateFormat,
            series,
            cars;

        // Set to 00:00:00:000 today
        today.setUTCHours(0);
        today.setUTCMinutes(0);
        today.setUTCSeconds(0);
        today.setUTCMilliseconds(0);
        today = today.getTime();

        var tenders = @json($tenders);
        cars = [
            {
            // model: 'Nissan Leaf',
            current: 0,
            deals: [{
                task: ,
                start_date: today - 1 * day,
                end_date: today + 2 * day
            },
            ]
            },
        ];

        // Parse car data into series.
        series = cars.map(function (car, i) {
            var data = car.deals.map(function (deal) {
                return {
                    id: 'deal-' + i,
                    task: deal.task,
                    start: deal.start_date,
                    end: deal.end_date,
                    y: i
                };
            });
            return {
                // name: car.model,
                data: data,
                current: car.deals[car.current]
            };
        });

        Highcharts.ganttChart('container',
            {
            series: series,
            title: {
                text: 'Car Rental Schedule'
            },
            tooltip: {
                pointFormat: '<span>Rented To: {point.task}</span><br/><span>From: {point.start:%e. %b}</span><br/><span>To: {point.end:%e. %b}</span>'
            },
            xAxis: {
                currentDateIndicator: true
            },
            yAxis: {
                type: 'category',
                grid: {
                    columns: [
                    //     {
                    //     title: {
                    //         text: 'Model'
                    //     },
                    //     categories: map(series, function (s) {
                    //         return s.name;
                    //     })
                    // },
                        {
                        title: {
                            text: 'Task Name'
                        },
                        categories: map(series, function (s) {
                            return s.current.task;
                        })
                    }, {
                        title: {
                            text: 'From'
                        },
                        categories: map(series, function (s) {
                            return dateFormat('%e. %b', s.current.start_date);
                        })
                    }, {
                        title: {
                            text: 'To'
                        },
                        categories: map(series, function (s) {
                            return dateFormat('%e. %b', s.current.end_date);
                        })
                    }]
                }
            }
        });

    </script>

@endsection
