@component('mail::message')
# Task Reminder for <strong> {{$task->text}}</strong>

The above task is slated to be completed by <strong>{{$task->start_date->addDays($task->duration)->isoFormat('dddd D MMMM Y')}}</strong>

Kindly take note.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="header">{{$task->text}} </div>--}}

{{--@stop--}}
