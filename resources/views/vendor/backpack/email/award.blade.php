@extends('backpack::layout_guest')

@section('content')
    <div class="header">
        <h1>{{$bidder->company->name}} has been awarded the tender of <strong>{{$tender->name}}</strong></h1>
    </div>
    <div class="text-justify">
        <p> Dear {{$bidder->name}}, </p>
        <p>Your company, {{$bidder->company->name}} has been awarded the <strong>{{$tender->name}}</strong> tender effective today. More details will follow</p>
    </div>
@stop
