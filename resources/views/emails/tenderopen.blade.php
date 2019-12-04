@component('mail::message')
# Tender has been Re-opened.

<strong>{{$tender->name}}</strong> tender has been reopened by the administrator.

This means that all tasks can be edited on request by the administrator. You will be notified once it is closed agaian.

@component('mail::button', ['url' => $url])
Timeline
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
