@php
    $body_class = 'authentication-bg';
@endphp

@extends('theme-back.chassis')

@section('chassis')
    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">

                @yield('auth-chassis')
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@stop
