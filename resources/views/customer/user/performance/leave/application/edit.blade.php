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
                    <h4 class="header-title mt-0 mb-1">Edit Leave Application </h4>
                    <p class="sub-header">
                        Edit a leave application.
                    </p>

                    {!! Form::model($leave, ['url' => 'user/leave/application/' . hashEncode($leave->id), 'method' => 'put', 'id' => 'page-form']) !!}
                    @csrf

                    @if($leave->status !== \App\Enums\LeaveStatus::Pending || $leave->supervisor_status !== \App\Enums\LeaveStatus::Pending || $leave->reliever_status !== \App\Enums\LeaveStatus::Pending)
                    {!! htmlBackAlert('warning', 'Editing this application will reset all the approvals gotten') !!}
                    @endif

                    @include('partials.customer.user.performance.leave.leave-application-form')

                    <x-back-button caption="Update"/>

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
