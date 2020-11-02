<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">
                    <i class="far fa-user"></i>
                    <span id="updateModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="updateModalDetail">
                    <h6 class="text-uppercase mb-0">Process Request</h6>
                    <p class="mt-0 mb-2 text-warning">Decision taken is final. {{ $uploadModalInfo }}</p>
                    <div class="row">
                        <div class="col-12">
                            {{ Form::hidden('model_id',null, ['id'=>'model_id']) }}
                            @foreach(\App\Enums\AcceptStatus::toArray() as $val=>$key)
                                @if($key !== \App\Enums\AcceptStatus::Pending)
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="status-{{ $key }}" name="accepted_status" class="custom-control-input" value="{{ $key }}">
                                        <label class="custom-control-label" for="status-{{ $key }}">{{ \App\Enums\AcceptStatus::getDescription($key) }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="offset-3 col-6">
                            <a href="#" class="btn btn-outline-bqhr my-4 btn-block" id="updateModalProcess" target="_blank">
                                <i class="far fa-address-card"></i>
                                Finalise
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
