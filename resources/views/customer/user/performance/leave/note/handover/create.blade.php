@extends('theme-back.body')

@push('css')
    {!! backLibCss(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionCss(['select2', 'flatpickr']) !!}
@endpush

@push('js')
    {!! backLibJs(['select2/select2.min', 'flatpickr/flatpickr.min']) !!}
    {!! backSectionJs(['select2-config', 'flatpickr-config', 'nod']) !!}
    {!! backValidationJs('customer.user.performance.leave.note.handover.create') !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Upload handover note </h4>
                    <p class="sub-header">
                        Upload handover note for {{ $leave->tag }}.
                    </p>

                    {!! Form::open(['url' => 'user/leave/' . $leave_id . '/note/handover', 'method' => 'post', 'id' => 'page-form', 'files'=>true]) !!}
                    @csrf

                    {{ Form::hidden('leave_id', $leave_id) }}
                    {{ Form::hidden('type', \App\Enums\LeaveNoteType::Handover) }}

                    @include('partials.customer.user.performance.leave.note-file-format')

                    <x-form-input-file caption="Handover note" id="note" placeholder="Select handover note file" required="1"/>

                    <x-back-button caption="Upload"/>

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
