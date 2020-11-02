@php
$sn = startPageSn($leaves);
@endphp

@extends('theme-back.body')

@push('css')
    {!! backSectionCss(['admin']) !!}
@endpush

@push('js')
    {!! backSectionJs(['admin', 'performance-admin-leave-application']) !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Leave requests</h4>
                    <p class="sub-header">
                        Leave applications by staff members awaiting HR approval.
                    </p>

                    @if ($leaves->count() < 1)
                        {!! htmlBackAlert('info', 'There are no leave applications available') !!}
                    @else
                    <div class="table-responsive">
                        <table class="table  table-mb">
                            <thead class="thead-bqhr">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Supervisor</th>
                                <th>Relieving staff</th>
                                <th>Period</th>
                                <th>W. Days</th>
                                @canany(['leave-super-admin', 'leave-admin'])
                                <th class="td-admin-menu">&nbsp;</th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leaves as $leave)
                            <tr id="leave-{{ hashEncode($leave->id) }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $leave->user->official_name }}</td>
                                <td>{{ $leave->leaveType->name }}</td>
                                <td>{{ $leave->supervisor->official_name }}</td>
                                <td>{{ $leave->reliever->official_name }}</td>
                                <td>{{ $leave->start->format('j M Y') . ' - ' . $leave->end->format('j M Y') }}</td>
                                <td>{{ $work_day_service->getTotalWeekdays($leave->start, $leave->end) }}</td>
                                @canany(['leave-super-admin', 'leave-admin'])
                                <td>
                                    <div class="dropdown">
                                        <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <h6 class="dropdown-header">{{ $leave->tag }}</h6>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#staffNoteModal" data-tag="{{ $leave->tag }}" data-name="{{ $leave->user->name }}" data-note="{{ $leave->note_display ?? 'None' }}">
                                                <i class="fas fa-info"></i>
                                                Staff note
                                            </a>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#supervisorNoteModal" data-tag="{{ $leave->tag }}" data-name="{{ $leave->user->name }}" data-reason="{{ $leave->approval->reason ?? 'None' }}">
                                                <i class="fas fa-info"></i>
                                                Supervisor's reason
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-success request-approval" data-id="{{ hashEncode($leave->id) }}" data-tag="{{ $leave->tag }}" data-name="{{ $leave->user->name }}" data-action="accept">
                                                <i class="fas fa-check"></i>
                                                Accept
                                            </a>
                                            <a href="#" class="dropdown-item text-danger request-approval" data-id="{{ hashEncode($leave->id) }}" data-tag="{{ $leave->tag }}" data-name="{{ $leave->user->name }}" data-action="decline">
                                                <i class="fas fa-times"></i>
                                                Decline
                                            </a>

                                        </div>
                                    </div>
                                </td>
                                @endcanany
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($leaves->total() > $leaves->perPage())
                        {{ $leaves->render() }}
                    @endif

                    @include('partials.customer.performance.leave.application-staff-note')
                    @include('partials.customer.performance.leave.application-supervisor-note')
                    @include('partials.customer.processing-modal')

                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        deleteUrl = "{{ url('user') }}";
        trId = 'leave';
    </script>
@endsection
