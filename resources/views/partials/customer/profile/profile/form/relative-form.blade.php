<!-- Full name field -->
<div class="form-group input-required">
	{{ Form::label('name', 'Full name') }}
	{{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Full name of relative', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

	@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Relationship field -->
<div class="form-group input-required">
	{{ Form::label('relationship', 'Relationship') }}
	{{ Form::select('relationship', \App\Enums\RelativeRelationship::toSelectArray(), old('relationship'), ['id'=>'relationship', 'placeholder'=>'Select relationship...', 'class'=>'form-control ' .  ($errors->has('relationship') ? ' is-invalid' : null)]) }}

	@error('relationship')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Phone number field -->
<div class="form-group input-required">
	{{ Form::label('phone', 'Phone number') }}
	{{ Form::tel('phone', old('phone'), ['id'=>'phone', 'placeholder'=>'Phone number', 'class'=>'form-control ' .  ($errors->has('phone') ? ' is-invalid' : null)]) }}

	@error('phone')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Email field -->
<div class="form-group">
	{{ Form::label('email', 'Email') }}
	{{ Form::text('email', old('email'), ['id'=>'email', 'placeholder'=>'Email address', 'class'=>'form-control ' .  ($errors->has('email') ? ' is-invalid' : null)]) }}

	@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Street address field -->
<div class="form-group input-required">
	{{ Form::label('address', 'Street address') }}
	{{ Form::text('address', old('address'), ['id'=>'address', 'placeholder'=>'Street address of relative', 'class'=>'form-control ' .  ($errors->has('address') ? ' is-invalid' : null)]) }}

	@error('address')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Landmark field -->
<div class="form-group">
	{{ Form::label('landmark', 'Landmark') }}
	{{ Form::text('landmark', old('landmark'), ['id'=>'landmark', 'placeholder'=>'Major landmark that can be used to identify the address', 'class'=>'form-control ' .  ($errors->has('landmark') ? ' is-invalid' : null)]) }}

	@error('landmark')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Town/city field -->
<div class="form-group input-required">
	{{ Form::label('city', 'Town/city') }}
	{{ Form::text('city', old('city'), ['id'=>'city', 'placeholder'=>'Town or city this relative is located', 'class'=>'form-control ' .  ($errors->has('city') ? ' is-invalid' : null)]) }}

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

<script>
    countryId = '#country';
    stateParent = '#state-parent'
    stateId = '#state';
    loadingId = '#state-loading';
    stateHolder = 'Select a state...';
    chosenState = '{{ old('state') }}'
</script>
