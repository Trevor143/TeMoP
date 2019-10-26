@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Bids for {{$tender->name}}
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">Bids</li>
            <li>for {{$tender->name}}</li>
        </ol>
    </section>
@stop

@section('content')
{{--    Main content with bids view--}}
    <div class="col-lg-9">
    @foreach($bids as $bid)
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                    <span class="username"><a href="#">{{$bid->bidder->name}}.</a></span>
                    <span class="description">Bid submitted - {{$bid->created_at->isoFormat('dddd, D MMMM, Y')}} by {{$bid->bidder->name}}</span>
                </div>
                <!-- /.user-block -->
                <div class="box-tools">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- post text -->
                <p>Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at</p>

                <p>the coast of the Semantics, a large language ocean.
                    A small river named Duden flows by their place and supplies
                    it with the necessary regelialia. It is a paradisematic
                    country, in which roasted parts of sentences fly into
                    your mouth.</p>

                <span class="input-group-btn">
                        <a href="{{route('bids.show', $bid->id)}}" class="btn btn-primary">Show Bid</a>
                </span>

            </div>
            <!-- /.box-body -->

        </div>
    @endforeach
    </div>
{{--    Options on the Right--}}
    <div class="col-lg-3">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Options</h3>

{{--                <div class="box-tools pull-right">--}}
{{--                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                Invite all bidders <br>
                <a href="#" class="btn btn-success">Send Emails</a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    @stop
