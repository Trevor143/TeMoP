@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Bids <small>Bids on your tenders will show up here once the deadline is past</small>
        </h1>

                <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">Bids</li>
        </ol>
    </section>
@stop
@section('after_styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    @stop

@section('content')
    <div class="col-lg-9">
    <div class="form-group">
        <table id="tenders" class="table table-bordered table-striped table-responsive m-b-0">
            <thead>
            <tr>
                <th style="font-weight: 600!important;">Tender Name</th>
                <th style="font-weight: 600!important;">Tender Deadline</th>
                <th style="font-weight: 600!important;">Number of Bids</th>
                <th style="font-weight: 600!important;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tenders as $tender)
                <tr>
                    <td>{{$tender->name}}</td>
                    <td>{{$tender->deadline->isoFormat('dddd, D MMMM, Y')}}</td>
                    <td>{{$tender->bids->count()}}</td>
{{--                    @if($tender->deadline->diffInDays(now()) == 0 )--}}
                    <td><a href="{{route('bids.bids', $tender->id)}}" class="btn btn-success">View Bids</a></td>
{{--                    @else--}}
{{--                        <td><p>You will view all bids once the deadline expires</p></td>--}}
{{--                    @endif--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@stop

@section('after_scripts')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tenders').DataTable( {
                // "scrollX": true,
            } );
        } );
    </script>
    @stop
