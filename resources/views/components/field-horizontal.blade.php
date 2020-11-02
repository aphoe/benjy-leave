@once
@push('css')
    {!! backComponentCss(['field-horizontal']) !!}
@endpush
@endonce

<div class="field-horizontal">
    <div class="label">{{ $label }}</div>
    <div class="data {{ $color !== null ? 'text-' . $color : '' }}">{{ $value ?? '' }}</div>
</div>
