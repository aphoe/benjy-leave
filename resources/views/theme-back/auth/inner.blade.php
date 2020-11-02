@extends('theme-back.auth.chassis')

@section('auth-chassis')
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">

                        <div class="p-5">
                            <div class="mx-auto mb-5">
                                <a href="{{ url('/') }}">
                                    <img src="{{ backImageUrl('logo-short.png') }}" alt="{{ config('project.appName') }}" height="24" />
                                    <h3 class="d-inline align-middle ml-1 text-logo">{{ config('project.appName') }}</h3>
                                </a>
                            </div>
                            @include('partials.theme-back.alert')

                            @yield('inner')
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-md-inline-block">
                        <div class="auth-page-sidebar">
                            <div class="overlay"></div>
                            <div class="auth-user-testimonial">
                                <p class="font-size-24 font-weight-bold text-white mb-1">{{ config('project.appNameLong') }}</p>
                                <p class="lead">{{ config('project.slogan') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end card-body -->
        </div>
        <!-- end card -->

        @yield('auth-inner-bottom')

    </div> <!-- end col -->
@stop
