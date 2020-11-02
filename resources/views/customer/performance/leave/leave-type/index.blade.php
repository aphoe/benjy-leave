@php
$sn = startPageSn($leave_types);
@endphp

@extends('theme-back.body')

@push('css')
    {!! backSectionCss(['admin']) !!}
@endpush

@push('js')
    {!! backSectionJs(['admin', 'performance-leave-leave-type']) !!}
@endpush

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Leave types </h4>
                    <p class="sub-header">
                        All leave types avaialble to staff members.
                    </p>

                    @if ($leave_types->count() < 1)
                        {!! htmlBackAlert('info', 'There are no Leave Types defined on ' . config('project.appName')) !!}
                    @else
                    <div class="table-responsive">
                        <table class="table  table-mb">
                            <thead class="thead-bqhr">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Leave note</th>
                                <th>Resumption note</th>
                                <th>Report</th>
                                <th class="td-admin-menu">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leave_types as $leave_type)
                            <tr id="leave-type-{{ hashEncode($leave_type->id) }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $leave_type->name }}</td>
                                <td id="leave-note-{{ hashEncode($leave_type->id) }}">{{ $leave_type->leave_note_text }}</td>
                                <td id="return-note-{{ hashEncode($leave_type->id) }}">{{ $leave_type->return_note_text }}</td>
                                <td id="report-{{ hashEncode($leave_type->id) }}">{{ $leave_type->report_text }}</td>
                                <td>
                                    <div class="dropdown">
                                        <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <h6 class="dropdown-header">{{ $leave_type->name }}</h6>
                                            <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#descriptionModal" data-tag="{{ $leave_type->name }}" data-description="{{ $leave_type->description }}" data-id="{{ hashEncode($leave_type->id) }}">
                                                <i class=" far fa-file-alt"></i>
                                                Description
                                            </a>

                                            @canany(['leave-super-admin', 'leave-admin'])
                                                <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#settingModal" data-tag="{{ $leave_type->name }}" data-id="{{ hashEncode($leave_type->id) }}">
                                                    <i class="fas fa-cog"></i>
                                                    Setting
                                                </a>

                                                <a href="{{ url('performance/leave/type/' . hashEncode($leave_type->id) . '/edit') }}"
                                                   class="dropdown-item">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                            @can('leave-super-admin')
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ url('performance/leave/type/' . hashEncode($leave_type->id) . '/delete') }}" class="dropdown-item text-danger admin-delete-item" data-id="{{ hashEncode($leave_type->id) }}" data-tag="{{ $leave_type->name }}">
                                                <i class="fas fa-times"></i>
                                                delete
                                            </a>
                                            @endcan
                                            @endcanany
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($leave_types->total() > $leave_types->perPage())
                        {{ $leave_types->render() }}
                    @endif

                    @include('partials.customer.performance.leave.leave-type-description-modal')
                    @include('partials.customer.performance.leave.leave-type-setting-modal')

                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        deleteUrl = "{{ url('performance/leave/type') }}";
        trId = 'leave-type';
    </script>
@endsection
