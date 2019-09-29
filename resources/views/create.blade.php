@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            <span class="text-capitalize">Partners</span>
            <small>Add tender partners</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
            <li><a href="{{ url($crud->route.'/create') }}" class="text-capitalize">Partners</a></li>
            <li class="active">Add</li>
        </ol>
    </section>
@endsection

{{----------------------------------------------------------------------------------------}}


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row m-t-20">
                <div class="col-md-7 col-md-offset-2">
                    <form action="">
                        <div class="col-md-2">
                            <div class="row display-flex-wrap">
                                <div class="box p-t-20">
                                    <div class="box-body">
                                        <div class="form-group col-xs 10">
                                            <label>Tender</label>
                                            <input type="text" name="tender_id" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('content')--}}
{{--    @if ($crud->hasAccess('list'))--}}
{{--        <a href="{{ url($crud->route) }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a>--}}
{{--    @endif--}}

{{--    <div class="row m-t-20">--}}
{{--        <div class="{{ $crud->getCreateContentClass() }}">--}}
{{--            <!-- Default box -->--}}

{{--            @include('crud::inc.grouped_errors')--}}

{{--            <form method="post"--}}
{{--                  action="{{ url($crud->route) }}"--}}
{{--                  @if ($crud->hasUploadFields('create'))--}}
{{--                  enctype="multipart/form-data"--}}
{{--                @endif--}}
{{--            >--}}
{{--                {!! csrf_field() !!}--}}
{{--                <div class="col-md-12">--}}

{{--                    <div class="row display-flex-wrap">--}}
{{--                        <!-- load the view from the application if it exists, otherwise load the one in the package -->--}}
{{--                        @if(view()->exists('vendor.backpack.crud.form_content'))--}}
{{--                            @include('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])--}}
{{--                        @else--}}
{{--                            @include('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])--}}
{{--                        @endif--}}
{{--                    </div><!-- /.box-body -->--}}
{{--                    <div class="">--}}

{{--                        @include('crud::inc.form_save_buttons')--}}

{{--                    </div><!-- /.box-footer-->--}}

{{--                </div><!-- /.box -->--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}
