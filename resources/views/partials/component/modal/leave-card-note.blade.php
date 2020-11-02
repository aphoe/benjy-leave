<!-- Modal -->
<div class="modal fade" id="{{ $tag }}NoteModal" tabindex="-1" role="dialog" aria-labelledby="{{ $tag }}NoteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $tag }}NoteModalLabel">
                    <i class="fas fa-info"></i>
                    <span id="{{ $tag }}NoteModalTitle"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <x-modal-loading id="{{ $tag }}Note"/>

                <div id="{{ $tag }}NoteModalDetail">
                    <h6 class="font-weight-normal text-uppercase mb-0">Note</h6>
                    <div id="{{ $tag }}NoteModalNote"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bqhr" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

@once
<script>
    modalTag = '{{ $tag }}Note';
</script>
@endonce
