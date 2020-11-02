@extends('theme-back.chassis')

@push('css')
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <script>
        window.app_url = `{{ url('/') }}/`;
        window.app_name = `{{ config('project.appName') }}`;
        window.app_name_long = `{{ config('project.appNameLong') }}`;
        window.app_slogan = `{{ config('project.slogan') }}`;
        window.back_image_url = `{{ backImageUrl('/') }}/`;
    </script>
@endpush

@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush

@section('chassis')
    <div id="app">
        <router-view :key="$route.fullPath"></router-view>
    </div>
@stop
