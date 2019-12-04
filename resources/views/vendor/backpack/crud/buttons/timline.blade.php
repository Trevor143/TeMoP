{{--@if ($crud->hasAccess('create'))--}}
{{--    <a href="{{ url($crud->route.'/partner') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Add Partners </span></a>--}}
{{--@endif--}}
@php
    use App\Models\Detail;
    use App\Models\Tender;

    $tender = App\Models\Tender::where('id',$entry->getKey())->first();

@endphp

@if($tender)
        @if ($crud->hasAccess('create'))
            <a href="{{ url(config('backpack.base.route_prefix').'/tender/'.$tender->id.'/timeline') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Show Timeline </span></a>
        @endif
@else
    @if ($crud->hasAccess('update'))
        <a href="{{ url(config('backpack.base.route_prefix').'/tender/'.$tender->id.'/timeline') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Show Timeline </span></a>
    @endif
@endif


