<div class="dropdown float-right">
    <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </div>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <h6 class="dropdown-header">{{ $leave->leaveType->name }}</h6>
        <a href="#" class="dropdown-item leaveNoteModal" data-toggle="modal" data-target="#{{ $tag }}NoteModal" data-tag="{{ $leave->leaveType->name }}" data-id="{{ hashEncode($leave->id) }}">
            <i class="fas fa-info"></i>
            Note
        </a>
        @if($leave->status  !== \App\Enums\LeaveStatus::Approved && now()->lt($leave->start))
        <a href="{{ url('user/leave/application/' . hashEncode($leave->id) . '/edit') }}" class="dropdown-item">
            <i class="fas fa-edit"></i>
            Edit
        </a>
        @endif
        @if($leave->status === \App\Enums\LeaveStatus::Approved)
            @if($leave->leaveNote()->where('type', \App\Enums\LeaveNoteType::Handover)->count() < 1)
            <a href="{{ url('user/leave/' . hashEncode($leave->id) . '/note/handover/create') }}" class="dropdown-item">
            @else
            <a href="#" class="dropdown-item">
            @endif
                <i class="fas fa-file-signature"></i>
                Handover note
            </a>
        @endif

        @if($leave->status === \App\Enums\LeaveStatus::Approved && now()->gt($leave->start))
        <a href="{{ url('user/leave/' . hashEncode($leave->id) . '/extend') }}" class="dropdown-item">
            <i class="fas fa-calendar-plus"></i>
            Extend
        </a>
        @endif

        @if($leave->status === \App\Enums\LeaveStatus::Approved && $leave->hasEnded())
        <a href="{{ url('user/leave/' . hashEncode($leave->id) . '/note/handover') }}" class="dropdown-item">
            <i class="fas fa-file-signature"></i>
            Return note
        </a>
        @endif

        @if($leave->hasEnded())
        <a href="{{ url('user/leave/' . hashEncode($leave->id) . '/report') }}" class="dropdown-item">
            <i class="fas fa-list-alt"></i>
            Resumption form
        </a>
        <a href="{{ url('user/leave/' . hashEncode($leave->id) . '/report') }}" class="dropdown-item">
            <i class="fas fa-clipboard-list"></i>
            Reports
        </a>
        @endif

        @if($leave->status === \App\Enums\LeaveStatus::Approved && now()->gt($leave->started))
        <a href="#" class="dropdown-item text-warning">
            <i class="fas fa-times"></i>
            Cancel leave
        </a>
        @endif

        @if($leave->status === \App\Enums\LeaveStatus::Pending)
        <a href="#" class="dropdown-item text-danger admin-delete-item" data-id="{{ hashEncode($leave->id) }}" data-tag="{{ $leave->leaveType->name }}">
            <i class="fas fa-times"></i>
            Delete
        </a>
        @endif
    </div>
</div>

