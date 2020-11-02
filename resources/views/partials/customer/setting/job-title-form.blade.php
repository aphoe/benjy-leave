<!-- Code field -->
<div class="form-group input-required">
	{{ Form::label('code', 'Code') }}
	{{ Form::text('code', old('code'), ['id'=>'code', 'placeholder'=>'Code for this title', 'class'=>'form-control ' .  ($errors->has('code') ? ' is-invalid' : null)]) }}

	@error('code')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Name field -->
<div class="form-group input-required">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Name', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

	@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Description field -->
<div class="form-group">
	{{ Form::label('description', 'Description') }}
	{{ Form::text('description', old('description'), ['id'=>'description', 'placeholder'=>'Describe this job title', 'class'=>'form-control ' .  ($errors->has('description') ? ' is-invalid' : null)]) }}

	@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
