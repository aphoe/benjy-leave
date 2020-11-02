@extends('theme-back.body')

@push('css')
    {!! backLibCss(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionCss(['select2', 'flatpickr']) !!}
@endpush

@push('js')
    {!! backLibJs(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionJs(['select2-config', 'flatpickr-config', 'nod']) !!}
    {!! backValidationJs('customer.performance.leave.leave-setting.create') !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Edit a leave setting</h4>
                    <p class="sub-header">
                        {{ $leave_setting->tag }}
                    </p>

                    {!! Form::model($leave_setting, ['url' => 'performance/leave/setting/' . hashEncode($leave_setting->id), 'method' => 'put', 'id' => 'page-form']) !!}
                    @csrf

                    @include('partials.customer.performance.leave.leave-setting-form')

                    <x-back-button caption="Update"/>

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
