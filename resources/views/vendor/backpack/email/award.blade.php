@component('mail::message')
# {{$bidder->company->name}} has been awarded the tender of <strong>{{$tender->name}}</strong>

Dear {{$bidder->name}},

Your company, {{$bidder->company->name}} has been awarded the <strong>{{$tender->name}}</strong> tender effective today. More details will follow

Thanks,<br>
{{ config('app.name') }}

@endcomponent
