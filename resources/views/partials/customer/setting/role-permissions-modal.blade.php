<!-- Modal -->
<div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionModalLabel">
                    <i class="fas fa-user-check"></i>
                    <span id="permissionModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="permissionModalLoading">
                    <div class="spinner-border text-bqhr m-2" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center"  id="permissionModalUsers"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

