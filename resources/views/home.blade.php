@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
                    </div>
                    <div class="card-body">
                        <h5>Hi <strong>{{ Auth::user()->name }},</strong>
                            {{ __('You are logged in to ') }}{{ config('app.name', 'Laravel') }}</h5>
                        </br>
                        <hr>

                        <div class="row">
                            <div class="col-sm-12">
                                {{ $carreras }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
