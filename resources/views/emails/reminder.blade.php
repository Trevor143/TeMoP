{{--@component('mail::message')--}}
{{--# Task Reminder for <strong> {{$task->name}}</strong>--}}

{{--The body of your message.--}}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
{{--@endcomponent--}}

@extends('layouts.app')

@section('content')
    <div class="header">{{$task->text}} </div>

@stop
