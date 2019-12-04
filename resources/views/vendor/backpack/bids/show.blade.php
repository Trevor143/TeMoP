@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Bids for {{$bid->tender->name}}
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">Bids</li>
        </ol>
    </section>
@stop

@section('content')
    <div class="col-lg-5">
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
                <p><strong>E-mail: </strong><a href="mailto: {{$bid->bidder->company->email}}">{{$bid->bidder->company->email}}</a></p>
                <p><strong>Phone Number: </strong>{{$bid->bidder->company->mobile}}</p>
                <p><strong>Year Found: </strong>{{$bid->bidder->company->yearFounded}}</p>

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
                        <li><a href="{{Storage::url( str_replace("storage/","",$file->fileurl))}}">{{$file->filename}}</a></li>
                    @endforeach
                </ul>

                @if($company->count() > 0)
                    <div>
                        Tender was awarded to <strong> {{$company->first()->name}}</strong>
                    </div>
                @else
                    @if($bid->tender->deadline >= \Carbon\Carbon::today())
                        <div class="box-body">
                            <div class="alert-danger">
                                <p>Tender can only be awarded once deadline has passed</p>
                            </div>
                        </div>
                    @else
                        <div>
                            <a href="{{route('award', $bid->id)}}"><button class="btn btn-primary">Award Tender</button></a>
                        </div>
                        @error('error')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror

                    @endif
                @endif
            </div>
        </div>
    </div>
@stop
