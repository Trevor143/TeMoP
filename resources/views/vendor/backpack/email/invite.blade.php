@component('mail::message')
# Invitation for deliberation with regards to Tender : {{$tender->name}}

{{$bidder->name}} has been invited for a meet to discuss further along in regards to the bid submitted for the tender <strong>{{$tender->name}}</strong>

@endcomponent
