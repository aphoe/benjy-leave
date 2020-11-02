<!-- {{ $caption }} field -->
<div class="form-group {{ $required ? 'input-required' : null }}">
    {{ Form::label($id, $caption) }}
    {{ Form::text($id, old($id), ['id'=>$id, 'placeholder'=>$placeholder, 'class'=>'form-control ' .  ($errors->has($id) ? ' is-invalid' : null)]) }}

    @if ($errors->has($id))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($id) }}</strong>
        </span>
    @endif
</div>
