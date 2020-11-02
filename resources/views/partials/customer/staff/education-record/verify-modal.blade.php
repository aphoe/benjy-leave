<!-- Modal -->
<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="verifyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifyModalLabel">
                    <i class="fas fa-clipboard-check"></i>
                    <span id="verifyModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="infoModalDetail">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center font-weight-light" id="verifyModalField"></h4>

                            {{ Form::hidden('verify_user_id', '', ['id'=>'verify_user_id']) }}
                            {{ Form::hidden('verify_user_tag', '', ['id'=>'verify_user_tag']) }}

                            @foreach(\App\Enums\EducationRecordStatus::toArray() as $caption=>$id)
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" id="verifyOption{{ $id }}" name="verifyOption" class="custom-control-input verify-radio" value="{{ $id }}">
                                    <label class="custom-control-label" for="verifyOption{{ $id }}">{{ $caption }}</label>
                                </div>
                            @endforeach

                            <div class="mt-3">&nbsp;</div>

                            <x-modal-action-button caption="Update verification status" id="verify-update" icon="fas fa-clipboard-check"/>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

