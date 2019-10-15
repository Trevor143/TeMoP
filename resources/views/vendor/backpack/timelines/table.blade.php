@extends('backpack::layout')


@section('header')

    @endsection

@section('after_styles')
    <link rel="stylesheet" href="{{asset('gantt/frappe-gantt.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="box ">
                <div class="box-header">
                    <h3 class="box-title">Timelines for {Tender Name}</h3>
                </div>
                <div class="box-body">
                    <svg id="gantt"></svg>
                </div>
            </div>
        </div>
    </div>
 @endsection

@section('after_scripts')
    <script src="{{asset('gantt/frappe-gantt.js')}}"></script>

    <script>

        var task = {!! $tender !!};
        var tasks = [
            {
                id: task[0]["id"],
                name: task[0]["task_name"],
                start: task[0]["start_date"],
                end: task[0]["end_date"],

            },
            {
                id: task[1]["id"],
                name: task[1]["task_name"],
                start: task[1]["start_date"],
                end: task[1]["end_date"],
            }
        ];

        var gantt = new Gantt('#gantt',tasks);
        gantt.change_view_mode('Week');
    </script>

@endsection





