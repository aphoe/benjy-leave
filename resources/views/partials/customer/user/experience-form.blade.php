<!-- Title field -->
<div class="form-group input-required">
	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', old('title'), ['id'=>'title', 'placeholder'=>'Title of job/work or desgination', 'class'=>'form-control ' .  ($errors->has('title') ? ' is-invalid' : null)]) }}

	@error('title')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Employment type field -->
<div class="form-group input-required">
	{{ Form::label('employment_type', 'Employment type') }}
	{{ Form::select('employment_type', \App\Enums\ExperienceEmploymentType::toSelectArray(), old('employment_type'), ['id'=>'employment_type', 'placeholder'=>'Select Employment type...', 'class'=>'form-control ' .  ($errors->has('employment_type') ? ' is-invalid' : null)]) }}

	@error('employment_type')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Company field -->
<div class="form-group input-required">
	{{ Form::label('company', 'Company') }}
	{{ Form::text('company', old('company'), ['id'=>'company', 'placeholder'=>'Name of company', 'class'=>'form-control ' .  ($errors->has('company') ? ' is-invalid' : null)]) }}

	@error('company')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Location field -->
<div class="form-group input-required">
	{{ Form::label('location', 'Location') }}
	{{ Form::text('location', old('location'), ['id'=>'location', 'placeholder'=>'Address or location', 'class'=>'form-control ' .  ($errors->has('location') ? ' is-invalid' : null)]) }}

	@error('location')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Work description field -->
<div class="form-group input-required">
	{{ Form::label('description', 'Work description') }}
	{{ Form::textarea('description', old('description'), ['id'=>'description', 'placeholder'=>'Describe what you did there', 'class'=>'form-control ' .  ($errors->has('description') ? ' is-invalid' : null), 'rows'=> 4]) }}

	@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Start date field -->
<div class="form-group input-required">
	{{ Form::label('start', 'Start date') }}
	{{ Form::text('start', old('start'), ['id'=>'start', 'placeholder'=>'Start date', 'class'=>'form-control flatpickr-date ' .  ($errors->has('start') ? ' is-invalid' : null)]) }}

	@error('start')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- End date field -->
<div class="form-group">
	{{ Form::label('end', 'End date') }}
	{{ Form::text('end', old('end'), ['id'=>'end', 'placeholder'=>'End date', 'class'=>'form-control flatpickr-date ' .  ($errors->has('end') ? ' is-invalid' : null)]) }}

	@error('end')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
