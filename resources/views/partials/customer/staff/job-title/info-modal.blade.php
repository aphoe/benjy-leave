<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">
                    <i class="fas fa-user-tie"></i>
                    <span id="infoModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <x-modal-loading id="info"/>

                <div class="container-fluid" id="infoModalDetail">
                    <div class="row">
                        <div class="col-12">
                            <x-modal-row caption="Job title" id="infoModalJobTitle"/>
                            <x-modal-row caption="Staff" id="infoModalStaff"/>
                            <x-modal-row caption="Resumed" id="infoModalStart"/>
                            <x-modal-row caption="Probation ends" id="infoModalProbation"/>
                            <x-modal-row caption="Ended" id="infoModalEnd"/>
                            <x-modal-row caption="Business unit" id="infoModalUnit"/>
                            <x-modal-row caption="Branch" id="infoModalBranch"/>
                            <x-modal-row caption="Reports to" id="infoModalReportsTo"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

