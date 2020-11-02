<!-- Modal -->
<div class="modal fade" id="smsModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="smsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smsModalLabel">
                    <i class="far fa-comment-alt"></i>
                    <span id="smsModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('sms_user_id', '', ['id'=>'sms_user_id']) }}
                {{ Form::hidden('sms_user_tag', '', ['id'=>'sms_user_tag']) }}

                <!-- SMS field -->
                <div class="form-group input-required">
                	{{ Form::label('sms_content', 'SMS') }}
                	{{ Form::textarea('sms_content', old('sms_content'), ['id'=>'sms_content', 'placeholder'=>'Type the SMS message', 'class'=>'form-control max-length-field mb-5 ' .  ($errors->has('sms_content') ? ' is-invalid' : null), 'maxlength'=>160, 'rows'=>4]) }}

                	@error('sms_content')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <button type="submit" class="btn btn-outline-bqhr btn-lg btn-block btn-submit" id="sms-send">
                    <i class="fas fa-paper-plane"></i>
                    Send SMS
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
