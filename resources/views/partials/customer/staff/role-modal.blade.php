<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">
                    <i class="fas fa-user-tie"></i>
                    <span id="roleModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('role_user_id', '', ['id'=>'role_user_id']) }}
                {{ Form::hidden('role_user_tag', '', ['id'=>'role_user_tag']) }}

                <div class="text-center" id="roleModalLoading">
                    <div class="spinner-border text-bqhr m-2" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div id="staff-roles"></div>

                <button type="button" class="btn btn-outline-bqhr btn-lg btn-block btn-submit" id="role-process">
                    <i class="fas fa-user-tie"></i>
                    Update roles
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
