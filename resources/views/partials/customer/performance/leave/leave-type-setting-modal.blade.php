<!-- Modal -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="settingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingModalLabel">
                    <i class="fas fa-cog"></i>
                    <span id="settingModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <x-modal-loading id="setting"/>

                <div id="settingModalDetail">
                    <h6 class="font-weight-normal">Leave note required</h6>
                    {{ Form::hidden('description_leave_id', '', ['id'=>'description_leave_id']) }}
                    {{ Form::hidden('description_leave_tag', '', ['id'=>'description_leave_tag']) }}

                    <x-form-input-radio caption="Yes" id="description_leave_note_yes" name="description_leave_note" value="yes" checked="0" disabled="0" class="description_setting_radio"/>
                    <x-form-input-radio caption="No" id="description_leave_note_no" name="description_leave_note" value="no" checked="0" disabled="0" class="description_setting_radio"/>

                    <h6 class="font-weight-normal mt-4">Return note required</h6>
                    <x-form-input-radio caption="Yes" id="description_return_note_yes" name="description_return_note" value="yes" checked="0" disabled="0" class="description_setting_radio"/>
                    <x-form-input-radio caption="No" id="description_return_note_no" name="description_return_note" value="no" checked="0" disabled="0" class="description_setting_radio"/>

                    <h6 class="font-weight-normal mt-4">Submission of Reports required</h6>
                    <x-form-input-radio caption="Yes" id="description_report_yes" name="description_report" value="yes" checked="0" disabled="0" class="description_setting_radio"/>
                    <x-form-input-radio caption="No" id="description_report_no" name="description_report" value="no" checked="0" disabled="0" class="description_setting_radio"/>

                    <div class="mt-4">&nbsp;</div>
                    <x-modal-action-button caption="Update setting" id="setting-action" icon="fas fa-save"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
