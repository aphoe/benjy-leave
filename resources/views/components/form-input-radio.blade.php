<div class="custom-control custom-radio mb-2">
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" class="custom-control-input {{ $class }}" {{ $checked ? 'checked' : null }} {{ $disabled ? 'disabled' : null }}>
    <label class="custom-control-label" for="{{ $id }}">{{ $caption }}</label>
</div>
