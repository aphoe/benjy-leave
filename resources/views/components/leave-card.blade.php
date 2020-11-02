@once
    @push('js')
        {!! backComponentJs(['leave-card']) !!}
    @endpush
@endonce

<div class="card" id="{{ $tag . '-' . hashEncode($leave->id) }}">
    <div class="card-body">
        @if($menu === 'user')
            @include('partials.component.menu.leave-card-user')
        @endif

        <h5 class="card-title font-size-16">
            {{ $leave->leaveType->name }}
        </h5>

        <x-field-vertical label="Leave status" :value="$leave->statusText('status')" :color="$statusClass($leave->status)"/>

        @if($leave->start)
        <x-field-vertical label="Start date" :value="$leave->start->format('jS M, Y')"/>
        @endif

        @if($leave->end)
        <x-field-vertical label="End date" :value="$leave->end->format('jS M, Y')"/>
        @endif

        @if($leave->extension)
        <x-field-vertical label="Extended to" :value="$leave->extension->format('jS M, Y')"/>
        @endif

        @if($leave->hr_id)
            <x-field-vertical label="HR Officer" :value="$leave->hr->name"/>
        @endif

        @if($leave->supervisor_id)
        <x-field-vertical label="Supervisor" :value="$leave->supervisor->name"/>
        @endif

        <x-field-vertical label="Supervisor Approval" :value="$leave->statusText('supervisor_status')" :color="$statusClass($leave->supervisor_status)"/>

        @if($leave->reliever_id !== null)
            <x-field-vertical label="Relieved by" :value="$leave->reliever->name"/>
        @endif

        <x-field-vertical label="Reliever Approval" :value="$leave->statusText('reliever_status')" :color="$statusClass($leave->reliever_status)"/>

    </div>
</div>

@once
@include('partials.component.modal.leave-card-note')

<script>
    deleteUrl = "{{ url('user/leave/application') }}";
    trId = '{{ $tag }}';
</script>
@endonce
