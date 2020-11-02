@extends('theme-back.body')

@push('css')
    {!! backLibCss(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionCss(['select2', 'flatpickr']) !!}
@endpush

@push('js')
    {!! backLibJs(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionJs(['select2-config', 'flatpickr-config', 'nod']) !!}
    {!! backValidationJs('customer.performance.holiday.create') !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Create Holiday </h4>
                    <p class="sub-header">
                        Create a new holiday.
                    </p>

                    {!! Form::open(['url' => 'performance/holiday', 'method' => 'post', 'id' => 'page-form']) !!}
                    @csrf

                    @include('partials.customer.performance.holiday.holiday-form')

                    <x-back-button caption="Create"/>

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
