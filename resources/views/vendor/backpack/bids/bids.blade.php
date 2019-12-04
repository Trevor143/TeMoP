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
    @forelse($bids as $bid)
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
                <p><strong>E-mail: </strong><a href="mailto: {{$bid->bidder->company->email}}">{{$bid->bidder->company->email}}</a></p>
                <p><strong>Phone Number: </strong>{{$bid->bidder->company->mobile}}</p>
                <p><strong>Year Found: </strong>{{$bid->bidder->company->yearFounded}}</p>

                <span class="input-group-btn">
                        <a href="{{route('bids.show', $bid->id)}}" class="btn btn-primary">Show Bid</a>
                </span>

            </div>
            <!-- /.box-body -->

        </div>
        @empty
        <div class="box box-widget">
            <div class="box-body">
                <p>No bids have been placed on this tender</p>
            </div>
        </div>
    @endforelse
    </div>

<div class="col-lg-3">
    @if($company->count() == 0 )
        @if($bids->count() > 0)
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3>Invite all bidders</h3>
                </div>
                @if($tender->deadline >= \Carbon\Carbon::today())
                <div class="box-body">
                    <p>Invites can be sent out once deadline is past</p>
                </div>
                @else
                    <div class="box-body">
                        <a href="{{route('inviteAll', $tender->id)}}" class="btn btn-success">Send Emails</a>
                    </div>
                @endif
            </div>
        @else
            <div class="box box-warning">
                <div class="box-header with-border">
                    No bids
                </div>
            </div>
        @endif
    @else
        <div class="box box-warning">
            <div class="box-header-with-border">
                Bid has been awarded
            </div>
            <div class="box-body">
                Bid was awarded to <strong>{{$tender->company->first()->name}}</strong>
            </div>
        </div>
    @endif
</div>


{{--    Options on the Right--}}
{{--@forelse($bids as $bid)--}}
{{--    <div class="col-lg-3">--}}
{{--        <div class="box box-warning">--}}
{{--            <div class="box-header with-border">--}}
{{--                <h3 class="box-title">Options</h3>--}}
{{--                <div class="box-tools pull-right">--}}
{{--                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <!-- /.box-tools -->--}}
{{--            </div>--}}
{{--            <!-- /.box-header -->--}}
{{--            <div class="box-body">--}}
{{--                Invite all bidders <br>--}}
{{--                @forelse($company as $com)--}}
{{--                    <div>--}}
{{--                        Tender was awarded to <strong>{{$com->name}}</strong>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    <div>--}}
{{--                        <a href="{{route('inviteAll', $tender->id)}}" class="btn btn-success">Send Emails</a>--}}
{{--                    </div>--}}
{{--                @endforelse--}}
{{--                @if($tender->company)--}}
{{--                    This tender was awarded.--}}
{{--                @else--}}
{{--                    <a href="{{route('inviteAll', $tender->id)}}" class="btn btn-success">Send Emails</a>--}}

{{--                @endif--}}
{{--            </div>--}}
{{--            <!-- /.box-body -->--}}
{{--        </div>--}}
{{--        <!-- /.box -->--}}
{{--    </div>--}}
{{--    @empty--}}
{{--    <div class="col-lg-3">--}}
{{--        <div class="box box-warning">--}}
{{--            <div class="box-header with-border">--}}
{{--                <h3 class="box-title">Options</h3>--}}
{{--            </div>--}}
{{--            <!-- /.box-header -->--}}
{{--            <div class="box-body">--}}
{{--                No bids submitted <br>--}}
{{--            </div>--}}
{{--            <!-- /.box-body -->--}}
{{--        </div>--}}
{{--        <!-- /.box -->--}}
{{--    </div>--}}
{{--@endforelse--}}
    @stop
