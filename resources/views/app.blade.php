@extends('layouts.app')

@section('content')

    <div class="container">

        @include('alerts.header-message')

        <div class="row">
            <div class="">
                <div class="panel panel-primary">
                
                    <div class="panel-heading">
                        <span id="content-title">{{ $content_title }}</span>
                        @if(isset($edit))
                            <span style="padding-left: 10px;">
                             {{ '('.$measurement->created_at->format('m/d/Y h:i:s A').')' }}
                            </span>
                        @endif

                        @if(isset($create_new))
                        <a class="btn btn-xs" href="{{ url('/measurements/create') }}" 
                            style="float: right; color: white; ">
                            <i class="fa fa-btn fa-plus fa-2x"></i>
                        </a>
                        @elseif(isset($cancel_new))
                        <a class="btn btn-xs" href="{{ url('/measurements') }}" 
                            style="float: right; color: white;">
                            <i class="fa fa-btn fa-times fa-2x"></i>
                        </a>                   
                        @endif
                    </div>

                    <div class="panel-body">
                        @yield('main')
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@stop
