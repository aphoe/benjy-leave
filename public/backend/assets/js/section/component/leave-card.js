$('document').ready(function(){
    $('#' + modalTag + 'Modal').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var tag = button.data('tag') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#' + modalTag + 'ModalTitle').text(tag);
        modal.find('#' + modalTag + 'ModalLoading').show();
        modal.find('#' + modalTag + 'ModalDetail').hide();

        //Get other fields
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: baseUrl + 'data/leave/' + id,
            type: "get",
            error: function(data){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    title: 'Error!',
                    text: 'Could not get the info of   "' + tag + '": ' + data.statusText,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                });
            },
            success: function(html){
                console.log(html);
                modal.find('#' + modalTag + 'ModalNote').html(html.data.note_display !== null ? html.data.note_display : 'None');
            },
            complete: function (x) {
                modal.find('#' + modalTag + 'ModalLoading').hide();
                modal.find('#' + modalTag + 'ModalDetail').show();
            }
        });
    });
});
