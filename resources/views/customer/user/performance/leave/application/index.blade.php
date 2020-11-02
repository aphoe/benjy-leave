@php
$sn = startPageSn($leaves);
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
                    <h4 class="header-title mt-0 mb-1">My leave applications </h4>
                    <p class="sub-header">
                        All my  leave applications this year.
                    </p>
                </div>
            </div>

        </div>
    </div>

    @if ($leaves->count() < 1)
        {!! htmlBackAlert('info', 'You have no records of leave applications for ' . date('Y') . ' on ' . config('project.appName')) !!}
    @else

        <div class="row">
            @foreach($leaves as $leave)
                <div class="col-sm-12 col-md-6 col-lg-4 ">
                    <x-leave-card :leave="$leave"/>
                </div>
            @endforeach
        </div>

        @if($leaves->total() > $leaves->perPage())
            {{ $leaves->render() }}
        @endif

    @endif

    <script>
        deleteUrl = "{{ url('user/leave/application') }}";
        trId = 'leave';
    </script>
@endsection
