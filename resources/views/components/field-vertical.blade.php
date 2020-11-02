@once
@push('css')
    {!! backComponentCss(['field-vertical']) !!}
@endpush
@endonce

<div class="field-vertical">
    <div class="label">{{ $label }}</div>
    <div class="data {{ $color !== null ? 'text-' . $color : '' }}">{{ $value ?? '' }}</div>
</div>
