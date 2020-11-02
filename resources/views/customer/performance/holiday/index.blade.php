@php
$sn = startPageSn($holidays);
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
                    <h4 class="header-title mt-0 mb-1">Holidays </h4>
                    <p class="sub-header">
                        List of all holidays.
                    </p>

                    @if ($holidays->count() < 1)
                        {!! htmlBackAlert('info', 'You have not created any holidays.') !!}
                    @else
                    <div class="table-responsive">
                        <table class="table  table-mb">
                            <thead class="thead-bqhr">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Start</th>
                                <th>End</th>
                                <th class="td-admin-menu">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($holidays as $holiday)
                            <tr id="holiday-{{ hashEncode($holiday->id) }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $holiday->name }}</td>
                                <td>{{ $holiday->year }}</td>
                                <td>{{ $holiday->format('start') }}</td>
                                <td>{{ $holiday->end !== null ? $holiday->format('end') : '--' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <h6 class="dropdown-header">{{ $holiday->tag }}</h6>
                                            <a href="{{ url('performance/holiday/' . hashEncode($holiday->id) . '/edit') }}" class="dropdown-item">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ url('performance/holiday/' . hashEncode($holiday->id) . '/delete') }}" class="dropdown-item text-danger admin-delete-item" data-id="{{ hashEncode($holiday->id) }}" data-tag="{{ $holiday->tag }}">
                                                <i class="fas fa-times"></i>
                                                delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($holidays->total() > $holidays->perPage())
                        {{ $holidays->render() }}
                    @endif

                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        deleteUrl = "{{ url('performance/holiday') }}";
        trId = 'holiday';
    </script>
@endsection
