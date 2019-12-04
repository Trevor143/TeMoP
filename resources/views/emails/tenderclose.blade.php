@component('mail::message')
# Tender has been closed

<strong>{{$tender->name}}</strong> tender has been closed.

This means no more edits will be made to the timelines unless the administrator opens it again.

Find the final timeline using the link below.

@component('mail::button', ['url' => $url])
Timeline
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
