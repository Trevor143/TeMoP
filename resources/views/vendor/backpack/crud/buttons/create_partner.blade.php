@if ($crud->hasAccess('create'))
    <a href="{{ url($crud->route.'/partner') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Add Partners </span></a>
@endif
