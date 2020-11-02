<!-- Head of Unit field -->
<div class="form-group">
	{{ Form::label('user_id', 'Head of Unit') }}
	{{ Form::select('user_id', staffFormArray(), old('user_id'), ['id'=>'user_id', 'placeholder'=>'Select the Head of Unit...', 'class'=>'form-control select-2 ' .  ($errors->has('user_id') ? ' is-invalid' : null)]) }}

	@error('user_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Name of Unit field -->
<div class="form-group input-required">
	{{ Form::label('name', 'Name of Unit') }}
	{{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Name of the Unit', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

	@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Description field -->
<div class="form-group">
	{{ Form::label('description', 'Description') }}
	{{ Form::text('description', old('description'), ['id'=>'description', 'placeholder'=>'Describe this unit in few words', 'class'=>'form-control ' .  ($errors->has('description') ? ' is-invalid' : null)]) }}

	@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
