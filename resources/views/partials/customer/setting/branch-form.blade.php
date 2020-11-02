<!-- Type of Branch field -->
<div class="form-group input-required">
	{{ Form::label('office_branch_type_id', 'Type of Branch') }}
	{{ Form::select('office_branch_type_id', $branchTypes, old('office_branch_type_id'), ['id'=>'office_branch_type_id', 'placeholder'=>'Select a branch type...', 'class'=>'form-control select-2 ' .  ($errors->has('office_branch_type_id') ? ' is-invalid' : null)]) }}

	@error('office_branch_type_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Branch head field -->
<div class="form-group">
	{{ Form::label('branch_head_id', 'Branch head') }}
	{{ Form::select('branch_head_id',  staffFormArray(), old('branch_head_id'), ['id'=>'branch_head_id', 'placeholder'=>'Select head of branch...', 'class'=>'form-control select-2 ' .  ($errors->has('branch_head_id') ? ' is-invalid' : null)]) }}

	@error('branch_head_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Name field -->
<div class="form-group input-required">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Name of branch', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

	@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Description field -->
<div class="form-group">
	{{ Form::label('description', 'Description') }}
	{{ Form::text('description', old('description'), ['id'=>'description', 'placeholder'=>'Describe branch office in few words', 'class'=>'form-control ' .  ($errors->has('description') ? ' is-invalid' : null)]) }}

	@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Street address field -->
<div class="form-group input-required">
	{{ Form::label('address', 'Street address') }}
	{{ Form::text('address', old('address'), ['id'=>'address', 'placeholder'=>'Street address of branch', 'class'=>'form-control ' .  ($errors->has('address') ? ' is-invalid' : null)]) }}

	@error('address')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Landmark field -->
<div class="form-group">
	{{ Form::label('landmark', 'Landmark') }}
	{{ Form::text('landmark', old('landmark'), ['id'=>'landmark', 'placeholder'=>'Major landmark that can be used to identify office', 'class'=>'form-control ' .  ($errors->has('landmark') ? ' is-invalid' : null)]) }}

	@error('landmark')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Town/city field -->
<div class="form-group input-required">
	{{ Form::label('city', 'Town/city') }}
	{{ Form::text('city', old('city'), ['id'=>'city', 'placeholder'=>'Town or city branch office is located', 'class'=>'form-control ' .  ($errors->has('city') ? ' is-invalid' : null)]) }}

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
