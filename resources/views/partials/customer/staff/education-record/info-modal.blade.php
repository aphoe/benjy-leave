<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">
                    <i class="fas fa-info"></i>
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
                            <h4 class="text-center font-weight-light" id="infoModalFieldOfStudy"></h4>
                            <x-modal-row caption="Qualification" id="infoModalQualification"/>
                            <x-modal-row caption="Grade" id="infoModalGrade"/>
                            <x-modal-row caption="Year Started" id="infoModalStarted"/>
                            <x-modal-row caption="Year Finished" id="infoModalFinished"/>
                            <x-modal-row caption="Institution" id="infoModalInstitution"/>
                            <x-modal-row caption="Address" id="infoModalAddress"/>
                            <x-modal-row caption="City" id="infoModalCity"/>
                            <x-modal-row caption="State" id="infoModalState"/>
                            <x-modal-row caption="Country" id="infoModalCountry"/>
                            <x-modal-row caption="Zip Code" id="infoModalZipCode"/>
                            <x-modal-row caption="Verification" id="infoModalStatus"/>
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
