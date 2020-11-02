<!-- Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLabel">
                    <i class="fas fa-user-tie"></i>
                    <span id="removeModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<h3 class="text-center font-weight-light">Remove from position</h3>
                <div class="row">
                    <div class="col-12 text-center">
                        {{ Form::hidden('remove_user_id', '', ['id'=>'remove_user_id']) }}
                        {{ Form::hidden('remove_user_tag', '', ['id'=>'remove_user_tag']) }}

                        <x-form-input-date caption="Effective date" id="end_date" placeholder="Effective date of ending staff member in this position" required="1"/>

                        <x-modal-action-button caption="Remove" id="remove-btn" icon="fas fa-user-tie"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

