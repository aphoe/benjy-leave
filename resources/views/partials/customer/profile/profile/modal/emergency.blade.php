<!-- Modal -->
<div class="modal fade" id="emergencyModal" tabindex="-1" role="dialog" aria-labelledby="emergencyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emergencyModalLabel">
                    <i class="far fa-user"></i>
                    <span id="emergencyModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="emergencyModalLoading">
                    <div class="spinner-border text-bqhr m-2" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="container-fluid" id="emergencyModalDetail">
                    <div class="row">
                        <div class="col-2">
                            <img src="#" alt="" id="emergencyModalPhoto" class="img-fluid">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4 text-right">Full name</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalName"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Next of Kin?</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalNok"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Relationship</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalRelationship"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Phone no.</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalPhone"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Email address</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalEmail"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Address</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalAddress"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Landmark</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalLandmark"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Location</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalLocation"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Zip code</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalZipCode"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Added</div>
                                <div class="col-8 font-weight-bold" id="emergencyModalCreated"></div>
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
