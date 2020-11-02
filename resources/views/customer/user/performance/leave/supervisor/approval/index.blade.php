@php
$sn = startPageSn($leaves);
@endphp

@extends('theme-back.body')

@push('css')
    {!! backSectionCss(['admin']) !!}
@endpush

@push('js')
    {!! backSectionJs(['admin', 'performance-leave-leave-supervisor-approval']) !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Leave application approvals </h4>
                    <p class="sub-header">
                        Leave application requests by junior colleagues.
                    </p>

                    @if ($leaves->count() < 1)
                        {!! htmlBackAlert('info', 'You don\'t have any leave appliction request to approve on ' . config('project.appName')) !!}
                    @else
                    <div class="table-responsive">
                        <table class="table  table-mb">
                            <thead class="thead-bqhr">
                            <tr>
                                <th>#</th>
                                <th>&nbsp;</th>
                                <th>Name</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Working Days</th>
                                <th class="td-admin-menu">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leaves as $leave)
                            <tr id="leave-{{ hashEncode($leave->id) }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $leave->tag }}</td>
                                <td>{{ $leave->user->name }}</td>
                                <td>{{ $leave->start->format('j M, Y') }}</td>
                                <td>{{ $leave->end->format('j M, Y') }}</td>
                                <td class="text-center">{{ $work_day_service->getTotalWeekdays($leave->start, $leave->end) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <h6 class="dropdown-header">{{ $leave->tag }}</h6>
                                            {{--<a href="#" class="dropdown-item text-success request-approval" data-id="{{ hashEncode($leave->id) }}" data-tag="{{ $leave->tag }}" data-name="{{ $leave->user->name }}" data-action="accept">
                                                <i class="fas fa-check"></i>
                                                Accept
                                            </a>
                                            <a href="#" class="dropdown-item text-danger request-approval" data-id="{{ hashEncode($leave->id) }}" data-tag="{{ $leave->tag }}" data-name="{{ $leave->user->name }}" data-action="decline">
                                                <i class="fas fa-times"></i>
                                                Decline
                                            </a>--}}
                                            <a href="#" class="dropdown-item request-approval"   data-toggle="modal" data-target="#approvalModal" data-id="{{ hashEncode($leave->id) }}" data-tag="{{ $leave->tag }}" data-name="{{ $leave->user->name }}">
                                                <i class="fas fa-pen-fancy"></i>
                                                Approval
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($leaves->total() > $leaves->perPage())
                        {{ $leaves->render() }}
                    @endif

                    @include('partials.customer.user.performance.leave.supervisor-approval-modal')
                    @include('partials.customer.processing-modal')

                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        deleteUrl = "{{ url('user/leave/supervisor/approval') }}";
        trId = 'leave';
    </script>
@endsection
