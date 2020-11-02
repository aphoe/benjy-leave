@php
$sn = startPageSn($leave_settings);
@endphp

@extends('theme-back.body')

@push('css')
    {!! backSectionCss(['admin']) !!}
@endpush

@push('js')
    {!! backSectionJs(['admin']) !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">All leave settings </h4>
                    <p class="sub-header">
                        Leave settings
                    </p>

                    @if ($leave_settings->count() < 1)
                        {!! htmlBackAlert('info', 'You have not created any leave settings') !!}
                    @else
                    <div class="table-responsive">
                        <table class="table  table-mb">
                            <thead class="thead-bqhr">
                            <tr>
                                <th>#</th>
                                <th>Setting</th>
                                <th>Days</th>
                                <th>Shortest notice</th>
                                <th>Deadline</th>
                                <th>Start</th>
                                <th>End</th>
                                @canany(['leave-super-admin', 'leave-admin'])
                                <th class="td-admin-menu">&nbsp;</th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leave_settings as $leave_setting)
                            <tr id="leave-setting-{{ hashEncode($leave_setting->id) }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $leave_setting->tag }}</td>
                                <td>{{ $leave_setting->days ?? '--' }}</td>
                                <td>{{ $leave_setting->shortest_notice ? $leave_setting->shortest_notice . ' day(s)' : '0 days' }}</td>
                                <td>{{ $leave_setting->submission_deadline ? $leave_setting->submission_deadline->format('jS M, Y') : 'None'}}</td>
                                <td>{{ $leave_setting->start ? $leave_setting->start->format('jS M, Y') : 'None'}}</td>
                                <td>{{ $leave_setting->end ? $leave_setting->end->format('jS M, Y') : 'None'}}</td>

                                @canany(['leave-super-admin', 'leave-admin'])
                                <td>
                                    <div class="dropdown">
                                        <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <h6 class="dropdown-header">{{ $leave_setting->tag }}</h6>
                                            <a href="{{ url('performance/leave/setting/' . hashEncode($leave_setting->id) . '/edit') }}"
                                               class="dropdown-item">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ url('performance/leave/setting/' . hashEncode($leave_setting->id) . '/delete') }}" class="dropdown-item text-danger admin-delete-item" data-id="{{ hashEncode($leave_setting->id) }}" data-tag="{{ $leave_setting->tag }}">
                                                <i class="fas fa-times"></i>
                                                delete
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

                    @if($leave_settings->total() > $leave_settings->perPage())
                        {{ $leave_settings->render() }}
                    @endif

                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        deleteUrl = "{{ url('performance/leave/setting') }}";
        trId = 'leave-setting';
    </script>
@endsection
