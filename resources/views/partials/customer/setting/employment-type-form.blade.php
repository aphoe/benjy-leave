<!-- Name field -->
<div class="form-group input-required">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Name of employment type/status', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

	@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Description field -->
<div class="form-group input-required">
	{{ Form::label('description', 'Description') }}
	{{ Form::text('description', old('description'), ['id'=>'description', 'placeholder'=>'Description in few words', 'class'=>'form-control ' .  ($errors->has('description') ? ' is-invalid' : null)]) }}

	@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
