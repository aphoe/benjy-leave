@extends('theme-back.auth.chassis')

@section('auth-chassis')
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="mx-auto">
                        <a href="{{ url('/') }}">
                            <img src="{{ backImageUrl('logo-short.png') }}" alt="{{ config('project.appName') }}" height="24" />
                            <h3 class="d-inline align-middle ml-1 text-logo">{{ config('project.appName') }}</h3>
                        </a>
                    </div>

                    @yield('card')
                </div>
            </div> <!-- end card-body -->
        </div>
        <!-- end card -->

    </div> <!-- end col -->
@stop
