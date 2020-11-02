<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">
                    <i class="far fa-user"></i>
                    <span id="infoModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="infoModalLoading">
                    <div class="spinner-border text-bqhr m-2" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="container-fluid" id="infoModalDetail">
                    <div class="row">
                        <div class="col-2">
                            <img src="#" alt="" id="infoModalUserPhoto" class="img-fluid">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4 text-right">Surname</div>
                                <div class="col-8 font-weight-bold" id="infoModalUserSurname"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">First name</div>
                                <div class="col-8" id="infoModalUserFirstName"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Other name</div>
                                <div class="col-8" id="infoModalUserOtherName"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Email</div>
                                <div class="col-8" id="infoModalUserEmail"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Verified</div>
                                <div class="col-8" id="infoModalUserVerified"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Blocked</div>
                                <div class="col-8" id="infoModalUserBlocked"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Account Created</div>
                                <div class="col-8" id="infoModalUserCreated"></div>
                            </div>
                        </div>
                    </div>

                    <h6 class="text-uppercase mb-0 mt-4">Personal Information</h6>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 text-right">Gender </div>
                                <div class="col-8" id="infoModalPersonalGender"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Date of Birth </div>
                                <div class="col-8" id="infoModalPersonalDob"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Marital Status </div>
                                <div class="col-8" id="infoModalPersonalMarital"></div>
                            </div>
                        </div>
                    </div>

                    <h6 class="text-uppercase mb-0 mt-4">Contact Info</h6>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 text-right">Phone no. </div>
                                <div class="col-8" id="infoModalContactPhone"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Address </div>
                                <div class="col-8" id="infoModalContactAddress"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">Location </div>
                                <div class="col-8" id="infoModalContactLocation"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="offset-3 col-6">
                            <a href="#" class="btn btn-outline-bqhr btn-sm my-4 btn-block" id="infoModalViewUser" target="_blank">
                                <i class="fas fa-user"></i>
                                View Profile
                            </a>
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
