<!-- Gateway field -->
<div class="form-group input-required">
	{{ Form::label('gateway', 'Gateway') }}
	{{ Form::select('gateway', \App\Enums\SmsGatewayName::toSelectArray(), old('gateway'), ['id'=>'gateway', 'placeholder'=>'Select SMS gateway...', 'class'=>'form-control ' .  ($errors->has('gateway') ? ' is-invalid' : null)]) }}

	@error('gateway')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Username field -->
<div class="form-group">
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username', old('username'), ['id'=>'username', 'placeholder'=>'Enter username, if needed', 'class'=>'form-control ' .  ($errors->has('username') ? ' is-invalid' : null)]) }}

	@error('username')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Password field -->
<div class="form-group">
	{{ Form::label('password', 'Password') }}
	{{ Form::text('password', old('password'), ['id'=>'password', 'placeholder'=>'Enter password, if needed', 'class'=>'form-control ' .  ($errors->has('password') ? ' is-invalid' : null),  'autocomplete'=>"off"]) }}

	@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- API key field -->
<div class="form-group">
	{{ Form::label('key', 'API key') }}
	{{ Form::text('key', old('key'), ['id'=>'key', 'placeholder'=>'Enter API key, if needed', 'class'=>'form-control ' .  ($errors->has('key') ? ' is-invalid' : null)]) }}

	@error('key')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<!-- Sender ID field -->
<div class="form-group">
	{{ Form::label('sender', 'Sender ID') }}
	{{ Form::text('sender', old('sender'), ['id'=>'sender', 'placeholder'=>'Enter sender ID, if needed', 'class'=>'form-control ' .  ($errors->has('sender') ? ' is-invalid' : null)]) }}

	@error('sender')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

