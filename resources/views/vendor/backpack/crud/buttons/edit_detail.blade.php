{{--@if ($crud->hasAccess('create'))--}}
{{--    <a href="{{ url($crud->route.'/partner') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Add Partners </span></a>--}}
{{--@endif--}}

@if ($crud->hasAccess('create'))
    <a href="{{ url(config('backpack.base.route_prefix').'/detail/'.$entry->getKey().'/edit') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Edit Details </span></a>
@endif


