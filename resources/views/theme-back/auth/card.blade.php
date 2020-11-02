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

        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="text-muted">Return to <a href="{{ url('login') }}" class="text-primary font-weight-bold ml-1">Login</a></p>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- end col -->
@stop
