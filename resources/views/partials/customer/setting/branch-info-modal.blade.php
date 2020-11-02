<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">
                    <i class="fas fa-code-branch"></i>
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
                            <div class="row">
                                <div class="col-4 text-right">Head</div>
                                <div class="col-8  font-weight-bold" id="infoModalHead"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Branch type</div>
                                <div class="col-8" id="infoModalBranchType"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Name</div>
                                <div class="col-8" id="infoModalName"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Description</div>
                                <div class="col-8" id="infoModalDescription"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Address</div>
                                <div class="col-8" id="infoModalAddress"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Landmark</div>
                                <div class="col-8" id="infoModalLandmark"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">City</div>
                                <div class="col-8" id="infoModalCity"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">State</div>
                                <div class="col-8" id="infoModalState"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Country</div>
                                <div class="col-8" id="infoModalCountry"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Zip code</div>
                                <div class="col-8" id="infoModalZip"></div>
                            </div>
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
