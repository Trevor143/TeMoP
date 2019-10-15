{{--@extends('backpack::layout')--}}

{{--@section('after_styles')--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>--}}
{{--@endsection--}}

{{--`@section('header')`--}}
{{--    <section class="content-header">--}}
{{--        <h1>--}}
{{--            Add Partners <small>Create Timelines</small>--}}
{{--        </h1>--}}
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>--}}
{{--            <li class="active">Tender Partners</li>--}}
{{--        </ol>--}}
{{--    </section>--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--    <div class="row ">--}}
{{--        <div class="box box-primary ">--}}
{{--            <form action="">--}}
{{--                <div class="box-body ">--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Select Tender</label>--}}
{{--                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">--}}
{{--                            <option selected="selected" data-select2-id="3">Alabama</option>--}}
{{--                            <option data-select2-id="36">Alaska</option>--}}
{{--                            <option data-select2-id="37">California</option>--}}
{{--                            <option data-select2-id="38">Delaware</option>--}}
{{--                            <option data-select2-id="39">Tennessee</option>--}}
{{--                            <option data-select2-id="40">Texas</option>--}}
{{--                            <option data-select2-id="41">Washington</option>--}}
{{--                        </select>--}}
{{--                        <span class="select2 select2-container select2-container--default select2-container--below select2-container--open" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="true" tabindex="0" aria-labelledby="select2-9fpj-container" aria-owns="select2-9fpj-results" aria-activedescendant="select2-9fpj-result-rs7t-Washington"><span class="select2-selection__rendered" id="select2-9fpj-container" role="textbox" aria-readonly="true" title="Washington">Washington</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Task</label>--}}
{{--                        <input type="text" class="form-control" placeholder="Enter Name of Task">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Period to Run</label>--}}
{{--                        <input type="date" class="form-control">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Person(s) responsible</label>--}}
{{--                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">--}}
{{--                            <option data-select2-id="18">Alabama</option>--}}
{{--                            <option data-select2-id="19">Alaska</option>--}}
{{--                            <option data-select2-id="20">California</option>--}}
{{--                            <option data-select2-id="21">Delaware</option>--}}
{{--                            <option data-select2-id="22">Tennessee</option>--}}
{{--                            <option data-select2-id="23">Texas</option>--}}
{{--                            <option data-select2-id="24">Washington</option>--}}
{{--                        </select>--}}
{{--                        <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="Alaska" data-select2-id="54"><span class="select2-selection__choice__remove" role="presentation">×</span>Alaska</li><li class="select2-selection__choice" title="Tennessee" data-select2-id="55"><span class="select2-selection__choice__remove" role="presentation">×</span>Tennessee</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
{{--                    </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Multiple</label>--}}
{{--                                <select class="form-control select2" name="approved[]" multiple="multiple" data-placeholder="Select a State"--}}
{{--                                        style="width: 100%;">--}}
{{--                                    <option value="1">Alabama</option>--}}
{{--                                    <option value="4">Alaska</option>--}}
{{--                                    <option value="5">California</option>--}}
{{--                                    <option value="6">Delaware</option>--}}
{{--                                    <option value="7">Tennessee</option>--}}
{{--                                    <option value="8">Texas</option>--}}
{{--                                    <option value="9">Washington</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('after_scripts')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            //Initialize Select2 Elements--}}
{{--            $('.select2').select2()--}}
{{--        })--}}
{{--    </script>--}}
{{--    @endsection--}}

    <!DOCTYPE html>
<html>
<head>
    <title>Laravel - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<div class="container">
    <h2 align="center">Laravel - Dynamically Add or Remove input fields using JQuery</h2>
    <div class="form-group">
        <form name="add_name" id="add_name">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg" style="display:none">
                <ul></ul>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>


        </form>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        var postURL = "<?php echo url('addmore'); ?>";
        var i=1;


        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('' +
                '<tr id="row'+i+'" class="dynamic-added">' +
                    '<td>' +
                        '<input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" />' +
                    '</td>' +
                    '<td>' +
                        '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button>' +
                    '</td>' +
                '</tr>');
        });


        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function(){
            $.ajax({
                url:postURL,
                method:"POST",
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }
            });
        });


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $(".print-success-msg").css('display','none');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script>
</body>
</html>
