{!! Form::open(['url' => $url, 'method' => 'post']) !!}
@csrf

<!-- Keyword field -->
<div class="form-group input-required">
	{{ Form::label('keyword', 'Keyword') }}
	{{ Form::text('keyword', old('keyword'), ['id'=>'keyword', 'placeholder'=>'Enter a search term here', 'class'=>'form-control ' .  ($errors->has('keyword') ? ' is-invalid' : null)]) }}

	@error('keyword')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<button type="submit" class="btn btn-bqhr btn-submit">
    <i class="fas fa-search"></i>
    Search
</button>
{!! Form::close() !!}
