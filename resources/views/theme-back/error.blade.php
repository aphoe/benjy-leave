@php
    $body_class = 'authentication-bg';
@endphp

@extends('theme-back.chassis')

@section('chassis')
    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-8">
                    <div class="text-center">

                        <div>
                            <img src="{{ backImageUrl('errors/' . $image) }}" alt="{{ $code }}" class="img-fluid" />
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="mt-3">{{ $heading }}</h3>
                    <p class="text-muted">{!! $message !!}</p>
                    @if($exception->getMessage())
                    <p class="text-muted">{{ $exception->getMessage() }}</p>
                    @endif

                    <a href="{{ url('/') }}" class="btn btn-lg btn-bqhr mt-4">Take me back to Home</a>
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end account-pages -->
@stop
