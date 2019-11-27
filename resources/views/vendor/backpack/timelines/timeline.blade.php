@extends('backpack::layout')

@section('after_styles')
    <script src="{{asset('gantt/codebase/dhtmlxgantt.js')}}"></script>
    <link href="{{asset('gantt/codebase/dhtmlxgantt.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">

    <style>
        html, body {
            padding: 0px;
            margin: 0px;
            height: 100%;
        }

        #gantt_here {
            width:100%;
            height:100%;
        }

        .gantt_grid_scale .gantt_grid_head_cell,
        .gantt_task .gantt_task_scale .gantt_scale_cell {
            font-weight: bold;
            font-size: 14px;
            color: rgba(0, 0, 0, 0.7);
        }

        .owner-label{
            width: 20px;
            height: 20px;
            line-height: 20px;
            font-size: 12px;
            display: inline-block;
            border: 1px solid #cccccc;
            border-radius: 25px;
            background: #e6e6e6;
            color: #6f6f6f;
            margin: 0 3px;
            font-weight: bold;
        }

        .gantt_cal_larea{
            overflow:visible;
        }
        .gantt_cal_chosen,
        .gantt_cal_chosen select{
            width: 400px;
        }
        .weekend {
            background: #f4f7f4;
        }

        .gantt_selected .weekend {
            background: #f7eb91;
        }

    </style>
@stop

@section('header')
    <section class="content-header">
        <h1>
            Timelines <small>Bids on your tenders will show up here once the deadline is past</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">Tender Timelines</li>
        </ol>
    </section>
@stop

@section('content')
<div class="container">
    <div id="gantt_here" style='width:100%; height:600px;'></div>
    </div>
@stop

@section('after_scripts')

    <script src="{{asset('gantt/codebase/ext/dhtmlxgantt_multiselect.js')}}"></script>

<script>
        gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
        gantt.config.order_branch = true;
        gantt.config.open_tree_initially = true;

        gantt.templates.scale_cell_class = function (date) {
            if (date.getDay() === 0 || date.getDay() === 6) {
                return "weekend";
            }
        };
        gantt.templates.timeline_cell_class = function (item, date) {
            if (date.getDay() === 0 || date.getDay() === 6) {
                return "weekend"
            }
        };

        gantt.form_blocks["multiselect"] = {
            render: function (sns) {
                var height = (sns.height || "23") + "px";
                var html = "<div class='gantt_cal_ltext gantt_cal_chosen gantt_cal_multiselect' style='height:" + height + ";'><select data-placeholder='...' class='chosen-select' multiple>";
                if (sns.options) {
                    for (var i = 0; i < sns.options.length; i++) {
                        if(sns.unassigned_value !== undefined && sns.options[i].key === sns.unassigned_value){
                            continue;
                        }
                        html += "<option value='" + sns.options[i].key + "'>" + sns.options[i].label + "</option>";
                    }
                }
                html += "</select></div>";
                return html;
            },

            set_value: function (node, value, ev, sns) {
                node.style.overflow = "visible";
                node.parentNode.style.overflow = "visible";
                node.style.display = "inline-block";
                const select = $(node.firstChild);

                if (value) {
                    value = (value + "").split(",");
                    select.val(value);
                }
                else {
                    select.val([]);
                }

                select.chosen();
                if(sns.onchange){
                    select.change(function(){
                        sns.onchange.call(this);
                    })
                }
                select.trigger('chosen:updated');
                select.trigger("change");
            },

            get_value: function (node, ev) {
                return $(node.firstChild).val();
            },

            focus: function (node) {
                $(node.firstChild).focus();
            }
        };

        // gantt.serverList("people", [
        //     {key: 6, label: "John"},
        //     {key: 7, label: "Mike"},
        //     {key: 8, label: "Anna"},
        //     {key: 9, label: "Bill"},
        //     {key: 10, label: "Floe"}
        // ]);

        function findUser(id){
            var list = gantt.serverList("people");
            for(var i = 0; i < list.length; i++){
                if(list[i].key === id){
                    return list[i];
                }
            }
            return null;
        }

        gantt.config.columns = [
            {name: "text", tree: true, width: 200, resize: true},
            {name: "start_date", align: "center", width: 80, resize: true},
            {name: "owner", align: "center", width: 75, label: "Owner", template: function (task) {
                    if (task.type === gantt.config.types.project) {
                        return "";
                    }

                    var result = "";

                    var owners = task.owners;

                    if (!owners || !owners.length) {
                        return "Unassigned";
                    }

                    if(owners.length === 1){
                        return findUser(owners[0]).label;
                    }

                    owners.forEach(function(ownerId) {
                        var owner = findUser(ownerId);
                        if (!owner)
                            return;
                        result += "<div class='owner-label' title='" + owner.label + "'>" + owner.label.substr(0, 1) + "</div>";

                    });

                    return result;
                }, resize: true
            },
            {name: "duration", width: 60, align: "center"},
            {name: "add", width: 44}
        ];

        gantt.locale.labels.section_owner = "Owner";
        gantt.config.lightbox.sections = [
            {name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
            // {name:"owner",height:60, type:"multiselect", options:gantt.serverList("people"), map_to:"owners"},
            {name: "owner", height: 22, map_to: "owner_id", type: "select", options: gantt.serverList("people")},
            // {name:"owner",height:60, type:"multiselect", options:gantt.serverList("people"), map_to:"owner_id" },
            {name: "time", type: "duration", map_to: "auto"},
            {{--{name: "tender_id", type:"hidden", value:"{{$tender->id}}"}--}}

        ];

        gantt.init("gantt_here");

        gantt.load("/api/data");

        var dp = new gantt.dataProcessor("/api");
        dp.init(gantt);
        dp.setTransactionMode("REST");

    </script>
{{--    <script type="text/javascript">--}}
{{--        gantt.config.date_format = "%Y-%m-%d %H:%i:%s";--}}
{{--        gantt.config.scroll_size = 40;--}}
{{--        gantt.templates.scale_cell_class = function (date) {--}}
{{--            if (date.getDay() === 0 || date.getDay() === 6) {--}}
{{--                return "weekend";--}}
{{--            }--}}
{{--        };--}}
{{--        gantt.templates.timeline_cell_class = function (item, date) {--}}
{{--            if (date.getDay() === 0 || date.getDay() === 6) {--}}
{{--                return "weekend"--}}
{{--            }--}}
{{--        };--}}
{{--        gantt.config.types["meeting"] = "type_id";--}}
{{--        gantt.locale.labels["type_meeting"] = "Meeting";--}}

{{--        //sections for tasks with 'meeting' type--}}

{{--        gantt.locale.labels.section_title = "Subject";--}}
{{--        gantt.locale.labels.section_details = "Details";--}}
{{--        gantt.config.lightbox["meeting_sections"] = [--}}
{{--            {name: "title", height: 20, map_to: "text", type: "text", focus: true},--}}
{{--            {name: "details", height: 70, map_to: "details", type: "textarea", focus: true},--}}
{{--            {name: "type", type: "typeselect", map_to: "type"},--}}
{{--            {name: "time", type: "time", map_to: "auto"}--}}
{{--        ];--}}

{{--        gantt.config.lightbox.sections = [--}}
{{--            {name: "description", height: 70, map_to: "text", type: "textarea", focus: true},--}}
{{--            {name: "time", type: "duration", map_to: "auto"},--}}
{{--            {name: "type", type: "typeselect", map_to: "type"},--}}
{{--            {name: "tender_id", type: "hidden", value: "{{$tender->id}}"}--}}
{{--        ];--}}

{{--        gantt.templates.task_text = function (start, end, task) {--}}
{{--            if (task.type === gantt.config.types.meeting) {--}}
{{--                return "Meeting: <b>" + task.text + "</b>";--}}
{{--            }--}}
{{--            return task.text;--}}
{{--        };--}}


{{--        gantt.templates.rightside_text = function (start, end, task) {--}}
{{--            if (task.type === gantt.config.types.milestone) {--}}
{{--                return task.text;--}}
{{--            }--}}
{{--            return "";--}}
{{--        };--}}
{{--        gantt.init("gantt_here");--}}



{{--        gantt.load("/api/data/{{$tender->id}}");--}}


{{--        // tender = document.getElementById('id');--}}
{{--        //--}}
{{--        // var taskId = gantt.addTask({--}}
{{--        //     id:task.get('id'),--}}
{{--        //     text:task,--}}
{{--        //     start_date:"02-09-2013",--}}
{{--        //     duration:28--}}
{{--        // });--}}
{{--        //--}}
{{--        // gantt.addTask({--}}
{{--        //     tender_id: tender,--}}
{{--        // })--}}
{{--        var dp = new gantt.dataProcessor("/api");--}}
{{--        dp.init(gantt);--}}
{{--        dp.setTransactionMode("REST");--}}

{{--    </script>--}}
@stop
