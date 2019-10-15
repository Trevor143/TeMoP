{{--@if ($crud->hasAccess('create'))--}}
{{--    <a href="{{ url($crud->route.'/partner') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Add Partners </span></a>--}}
{{--@endif--}}
@php
    use App\Models\Detail;
    use App\Models\Tender;

    $tender = App\Models\Detail::where('tender_id',$entry->getKey())->first();

@endphp

@if($tender)
    @if ($crud->hasAccess('create'))
        <a href="{{ url(config('backpack.base.route_prefix').'/detail/'.$tender->id.'/edit') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Edit Details </span></a>

    @endif
@else
    @if ($crud->hasAccess('update'))
        <a href="{{ url(config('backpack.base.route_prefix').'/detail/create') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Add Details </span></a>
    @endif
@endif


