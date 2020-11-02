@extends('theme-back.body')

@push('css')
    {!! backLibCss(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionCss(['select2', 'flatpickr']) !!}
@endpush

@push('js')
    {!! backLibJs(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionJs(['select2-config', 'flatpickr-config', 'nod']) !!}
    {!! backValidationJs('customer.user.performance.leave.application.create') !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Apply for leave </h4>
                    <p class="sub-header">

                    </p>

                    {!! Form::open(['url' => 'user/leave/application', 'method' => 'post', 'id' => 'page-form']) !!}
                    @csrf

                    @include('partials.customer.user.performance.leave.leave-application-form')

                    <x-back-button caption="Apply"/>

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
