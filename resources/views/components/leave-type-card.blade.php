@once
@push('css')
    {!! backComponentCss(['leave-type-card']) !!}
@endpush

@push('js')
    {!! backComponentJs(['leave-type-card']) !!}
@endpush
@endonce

<div class="card leave-type-card">
    <div class="card-body">
        <h5 class="card-title font-size-16">{{ $leaveType->name }}</h5>
        <div class="card-text text-muted leave-description">{{ $leaveType->description }}</div>
    </div>
    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item">
            <small class="text-muted">Requires leave handover note</small>
            <div class="text-uppercase font-weight-bold">{{ $leaveType->leave_note_text }}</div>
        </li>
        <li class="list-group-item">
            <small class="text-muted">Requires return handover note</small>
            <div class="text-uppercase font-weight-bold">{{ $leaveType->return_note_text }}</div>
        </li>
        <li class="list-group-item">
            <small class="text-muted">Requires submission of report</small>
            <div class="text-uppercase font-weight-bold">{{ $leaveType->report_text }}</div>
        </li>
    </ul>
</div>
