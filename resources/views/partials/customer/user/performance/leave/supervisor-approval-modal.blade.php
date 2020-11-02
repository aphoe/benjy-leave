<!-- Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvalModalLabel">
                    <i class="fas fa-pen-fancy"></i>
                    <span id="approvalModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-uppercase font-weight-light" id="approvalModalName"></h6>
                {{ Form::hidden('leave_id', '', ['id'=>'approvalModalLeaveId']) }}
                {{ Form::hidden('leave_tag', '', ['id'=>'approvalModalLeaveTag']) }}
                {{ Form::hidden('leave_name', '', ['id'=>'approvalModalLeaveName']) }}

                <x-form-input-check caption="Approval" id="approvalModalLeaveStatusWrapper" required="1">
                    <x-form-input-radio caption="{{ App\Enums\LeaveStatus::getDescription(App\Enums\LeaveStatus::Approved) }}" id="approvalModalLeaveStatusApproved" name="approvalModalLeaveStatus" value="{{ App\Enums\LeaveStatus::Approved }}"/>
                    <x-form-input-radio caption="{{ App\Enums\LeaveStatus::getDescription(App\Enums\LeaveStatus::Denied) }}" id="approvalModalLeaveStatusDenied" name="approvalModalLeaveStatus" value="{{ App\Enums\LeaveStatus::Denied }}"/>
                </x-form-input-check>

                <x-form-input-textarea caption="Reason" id="approvalModalLeaveReason" placeholder="Enter your reason for approving or declining this leave application" rows="4" required="1"/>

                <x-modal-action-button caption="Submit" id="approval-btn" icon="fas fa-pen-fancy"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
