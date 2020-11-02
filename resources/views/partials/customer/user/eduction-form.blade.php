<!-- Institution field -->
<div class="form-group input-required">
	{{ Form::label('institution', 'Institution') }}
	{{ Form::text('institution', old('institution'), ['id'=>'institution', 'placeholder'=>'Name of institution', 'class'=>'form-control ' .  ($errors->has('institution') ? ' is-invalid' : null)]) }}

	@error('institution')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Address field -->
<div class="form-group">
	{{ Form::label('address', 'Address') }}
	{{ Form::text('address', old('address'), ['id'=>'address', 'placeholder'=>'Address of institution', 'class'=>'form-control ' .  ($errors->has('address') ? ' is-invalid' : null)]) }}

	@error('address')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Town/city field -->
<div class="form-group">
	{{ Form::label('city', 'Town/city') }}
	{{ Form::text('city', old('city'), ['id'=>'city', 'placeholder'=>'City or town institution is located', 'class'=>'form-control ' .  ($errors->has('city') ? ' is-invalid' : null)]) }}

	@error('city')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Country field -->
<div class="form-group input-required">
	{{ Form::label('country', 'Country') }}
	{{ Form::select('country', countriesSelectArray(), old('country'), ['id'=>'country', 'placeholder'=>'Select country...', 'class'=>'form-control select-2 ' .  ($errors->has('country') ? ' is-invalid' : null)]) }}

	@error('country')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<h2 class="text-center" id="state-loading">
    <i class="fas fa-spinner fa-spin"></i>
</h2>

<!-- State or province field -->
<div class="form-group input-required" id="state-parent">
	{{ Form::label('state', 'State or province') }}
	{{ Form::select('state', [], old('state'), ['id'=>'state', 'placeholder'=>'Select a state...', 'class'=>'form-control select-2' .  ($errors->has('state') ? ' is-invalid' : null)]) }}

	@error('state')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Zip code field -->
<div class="form-group">
	{{ Form::label('zip_code', 'Zip code') }}
	{{ Form::text('zip_code', old('zip_code'), ['id'=>'zip_code', 'placeholder'=>'Zip or post code', 'class'=>'form-control ' .  ($errors->has('zip_code') ? ' is-invalid' : null)]) }}

	@error('zip_code')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Field of study field -->
<div class="form-group">
	{{ Form::label('field_of_study', 'Field of study') }}
	{{ Form::text('field_of_study', old('field_of_study'), ['id'=>'field_of_study', 'placeholder'=>'Course or field of study', 'class'=>'form-control ' .  ($errors->has('field_of_study') ? ' is-invalid' : null)]) }}

	@error('field_of_study')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Qualification field -->
<div class="form-group input-required">
	{{ Form::label('qualification', 'Qualification') }}
	{{ Form::select('qualification', \App\Enums\EducationalQualification::toSelectArray(), old('qualification'), ['id'=>'qualification', 'placeholder'=>'Qualification obtained', 'class'=>'form-control ' .  ($errors->has('qualification') ? ' is-invalid' : null)]) }}

	@error('qualification')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Grade field -->
<div class="form-group">
	{{ Form::label('grade', 'Grade') }}
	{{ Form::text('grade', old('grade'), ['id'=>'grade', 'placeholder'=>'Grade point achieved', 'class'=>'form-control ' .  ($errors->has('grade') ? ' is-invalid' : null)]) }}

	@error('grade')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Year started field -->
<div class="form-group">
	{{ Form::label('started', 'Year started') }}
	{{ Form::selectRange('started', date('Y'), config('project.year_start'), old('started'), ['id'=>'started', 'placeholder'=>'Select a year...', 'class'=>'form-control ' .  ($errors->has('started') ? ' is-invalid' : null)]) }}

	@error('started')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Year finished field -->
<div class="form-group">
	{{ Form::label('finished', 'Year finished') }}
	{{ Form::selectRange('finished', date('Y'), config('project.year_start'), old('finished'), ['id'=>'finished', 'placeholder'=>'Select a year...', 'class'=>'form-control ' .  ($errors->has('finished') ? ' is-invalid' : null)]) }}

	@error('finished')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<script>
    countryId = '#country';
    stateParent = '#state-parent'
    stateId = '#state';
    loadingId = '#state-loading';
    stateHolder = 'Select a state...';
    chosenState = '{{ old('state') }}'
</script>

