@extends('backpack::layout_guest')

@section('content')
    <div class="header">
        <h1>Invitation for deliberation with regards to Tender : {{$tender->name}}</h1>
    </div>
    <div class="text-justify">
        <p>{{$bidder->name}} has been invited for a meet to discuss further along in regards to the bid submitted for the tender <strong>{{$tender->name}}</strong></p>
    </div>
@stop
