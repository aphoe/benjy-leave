<!-- Modal -->
<div class="modal fade" id="mailModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mailModalLabel">
                    <i class="far fa-envelope"></i>
                    <span id="mailModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('mail_user_id', '', ['id'=>'mail_user_id']) }}
                {{ Form::hidden('mail_user_tag', '', ['id'=>'mail_user_tag']) }}

                <!-- Subject field -->
                <div class="form-group input-required">
                	{{ Form::label('mail_subject', 'Subject') }}
                	{{ Form::text('mail_subject', old('mail_subject'), ['id'=>'mail_subject', 'placeholder'=>'Enter subject of mail', 'class'=>'form-control ' .  ($errors->has('mail_subject') ? ' is-invalid' : null)]) }}

                	@error('mail_subject')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Content field -->
                <div class="form-group input-required">
                	{{ Form::label('mail_content', 'Content') }}
                	{{ Form::textarea('mail_content', old('mail_content'), ['id'=>'mail_content', 'placeholder'=>'Enter content of mail', 'class'=>'form-control ' .  ($errors->has('mail_content') ? ' is-invalid' : null), 'rows'=>5]) }}

                	@error('mail_content')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <button type="submit" class="btn btn-outline-bqhr btn-lg btn-block btn-submit" id="mail-send">
                    <i class="fas fa-paper-plane"></i>
                    Send mail
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
