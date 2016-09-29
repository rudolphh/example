@extends('layouts.app')

@section('content')

    <div class="container">

        @include('alerts.header-message')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                
                    <div class="panel-heading">{{ $content_title }}
                        @if(isset($create_new))
                        <a href="{{ url('/measurements/create') }}" style="float: right;">
                            <i class="fa fa-btn fa-plus fa-2x"></i>
                        </a>
                        @elseif(isset($cancel_new))
                        <a href="{{ url('/measurements') }}" style="float: right;">
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
