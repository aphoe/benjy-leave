@php
$sn = startPageSn($leave_types);
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
                    <h4 class="header-title mt-0 mb-1">{{ $card_title }}</h4>
                    <p class="sub-header">
                        {{ $card_sub_title }}
                    </p>
                </div>
            </div>

        </div>
    </div>

    @if ($leave_types->count() < 1)
        {!! htmlBackAlert('info', 'There are no leave types available on ' . config('project.appName')) !!}
    @else

        <div class="row">
            @foreach($leave_types as $leave_type)
                <div class="col-sm-12 col-md-6 col-lg-4 ">
                    <x-leave-type-card :leave-type="$leave_type"/>
                </div>
            @endforeach
        </div>

        @if($leave_types->total() > $leave_types->perPage())
            {{ $leave_types->render() }}
        @endif

    @endif

    <script>
        deleteUrl = "{{ url('ss') }}";
        trId = 'leave-type';
    </script>
@endsection
