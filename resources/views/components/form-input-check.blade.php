<!-- {{ $caption }} field -->
<div class="form-group check-input {{ $required ? 'check-required' : '' }} {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="label">{{ $caption }}</div>

    {{ $slot }}

    @if ($errors->has($id))
        <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first($id) }}</strong>
    </span>
    @endif
</div>
