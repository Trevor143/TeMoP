@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Timelines <small>Bids on your tenders will show up here once the deadline is past</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">Tender Timelines</li>
        </ol>
    </section>
@stop
@section('after_styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')


@stop
