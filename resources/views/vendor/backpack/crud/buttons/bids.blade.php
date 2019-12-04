
{{--Button to show biuds--}}
@if ($crud->hasAccess('update'))
    <a href="{{ url(config('backpack.base.route_prefix').'/bids/bidsfor-'.$entry->getKey() )}} " class="btn btn-primary ladda-button"><i class="fa fa-plus"></i> View Bids</a>
@endif
