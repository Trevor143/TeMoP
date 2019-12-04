@component('mail::message')
# <strong>{{$tender->name}}</strong> Complete

You can proceed to complete and close the tender

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
