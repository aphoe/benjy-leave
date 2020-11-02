@php
$sn = startPageSn($relieves);
@endphp

@extends('theme-back.body')

@push('css')
    {!! backSectionCss(['admin']) !!}
@endpush

@push('js')
    {!! backSectionJs(['admin', 'performance-leave-leave-relieve']) !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Pending leave relieve requests </h4>
                    <p class="sub-header">
                        Requests by other staff members to relieve them during leave.
                    </p>

                    @if ($relieves->count() < 1)
                        {!! htmlBackAlert('info', 'You have no pending leave relieve requests on ' . config('project.appName')) !!}
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
                            @foreach($relieves as $relieve)
                            <tr id="relieve-{{ hashEncode($relieve->id) }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $relieve->tag }}</td>
                                <td>{{ $relieve->user->name }}</td>
                                <td>{{ $relieve->start->format('j M, Y') }}</td>
                                <td>{{ $relieve->end->format('j M, Y') }}</td>
                                <td class="text-center">{{ $work_day_service->getTotalWeekdays($relieve->start, $relieve->end) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <h6 class="dropdown-header">{{ $relieve->tag }}</h6>
                                            <a href="#" class="dropdown-item text-success request-approval" data-id="{{ hashEncode($relieve->id) }}" data-tag="{{ $relieve->tag }}" data-name="{{ $relieve->user->name }}" data-action="accept">
                                                <i class="fas fa-check"></i>
                                                Accept
                                            </a>
                                            <a href="#" class="dropdown-item text-danger request-approval" data-id="{{ hashEncode($relieve->id) }}" data-tag="{{ $relieve->tag }}" data-name="{{ $relieve->user->name }}" data-action="decline">
                                                <i class="fas fa-times"></i>
                                                Decline
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($relieves->total() > $relieves->perPage())
                        {{ $relieves->render() }}
                    @endif

                    @include('partials.customer.processing-modal')

                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        deleteUrl = "{{ url('user/leave/relieve') }}";
        trId = 'relieve';
    </script>
@endsection
