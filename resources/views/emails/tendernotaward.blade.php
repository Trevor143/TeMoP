@component('mail::message')
# Bid Declined

Your bid for <strong>{{$tender->name}}</strong> tender has been declined.

More tenders will be avaliable.

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
