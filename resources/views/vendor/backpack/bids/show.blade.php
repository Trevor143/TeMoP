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

@section('content')
    <div class="col-lg-9">
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                    <span class="username"><a href="#">{{$bid->bidder->company->name}}.</a></span>
                    <span class="description">Bid submitted - {{$bid->created_at->isoFormat('dddd, D MMMM, Y')}} by {{$bid->bidder->name}}</span>
                </div>
                <!-- /.user-block -->
                <div class="box-tools">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

                <div class="box-body">
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>

                    <p>the coast of the Semantics, a large language ocean.
                        A small river named Duden flows by their place and supplies
                        it with the necessary regelialia. It is a paradisematic
                        country, in which roasted parts of sentences fly into
                        your mouth.</p>
                </div>
                <!-- /.box-tools -->
            <!-- /.box-header -->
        </div>
    </div>
    <div class="col-lg-3">
        <div class="box box-widget">
            <div class="box-header">
                Required Documents
            </div>
            <div class="box-body">
                <ul>
                @foreach($bid->files as $file)
                    <li><a href="{{Storage::url($file->fileurl)}}">{{$file->filename}}</a></li>
                @endforeach
                </ul>
                <div>
                    <a href="{{route('award', $bid->id)}}"><button class="btn btn-primary">Award Tender</button></a>
                </div>
            </div>
        </div>
    </div>
@stop
