$(document).ready(function (e) {
    $('.emergency-spacer').hide();

    $('.contact-emergency-delete-item').click(function(n){
        n.preventDefault();

        var id = $(this).attr('data-id');
        var tag = $(this).attr('data-tag');
        var tr = '#contact-emergency-' + id;

        Swal.fire({
            title: null,
            text: 'Are you sure you want to PERMANENTLY delete "' + tag + '"?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            console.log(result);
            if (result.value) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: baseUrl + 'profile/emergency/' + id + '/delete',
                    type: "get",
                    error: function(data){
                        //notify('error', 'Could not delete "' + tag + '": ' + data.statusText);
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: 'Error!',
                            text: 'Could not delete "' + tag + '": ' + data.statusText,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    },
                    success: function(html){
                        console.log(html);
                        if(html == 1){
                            //notify('info', '"' + tag + '" has been permanently deleted.');
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                title: null,
                                text: '"' + tag + '" has been permanently deleted.',
                                icon: 'info',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $(tr).hide('slow');
                        }else if(html == 0){
                            //notify('notice', 'Could not delete "' + tag + '"');
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                title: null,
                                text: 'Could not delete "' + tag + '"',
                                icon: 'info',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }else{
                            //notify('notice', html);
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                title: null,
                                text: html,
                                icon: 'info',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    }
                });
            }
        });
    });

    $('.contact-relative-delete-item').click(function(n){
        n.preventDefault();

        var id = $(this).attr('data-id');
        var tag = $(this).attr('data-tag');
        var tr = '#contact-relative-' + id;

        Swal.fire({
            title: null,
            text: 'Are you sure you want to PERMANENTLY delete "' + tag + '"?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            console.log(result);
            if (result.value) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: baseUrl + 'profile/relative/' + id + '/delete',
                    type: "get",
                    error: function(data){
                        //notify('error', 'Could not delete "' + tag + '": ' + data.statusText);
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: 'Error!',
                            text: 'Could not delete "' + tag + '": ' + data.statusText,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    },
                    success: function(html){
                        console.log(html);
                        if(html == 1){
                            //notify('info', '"' + tag + '" has been permanently deleted.');
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                title: null,
                                text: '"' + tag + '" has been permanently deleted.',
                                icon: 'info',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $(tr).hide('slow');
                        }else if(html == 0){
                            //notify('notice', 'Could not delete "' + tag + '"');
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                title: null,
                                text: 'Could not delete "' + tag + '"',
                                icon: 'info',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }else{
                            //notify('notice', html);
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                title: null,
                                text: html,
                                icon: 'info',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    }
                });
            }
        });
    });

    $('.emergency-contact-dropdown').on('show.bs.dropdown', function () {
        $('.emergency-spacer').show();
    });

    $('.emergency-contact-dropdown').on('hide.bs.dropdown', function () {
        $('.emergency-spacer').hide();
    });

    $('#emergencyModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var emergencyId = button.data('id') // Extract info from data-* attributes
        var emergencyTag = button.data('tag') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#emergencyModalTitle').text(emergencyTag);
        modal.find('#emergencyModalLoading').show();
        modal.find('#emergencyModalDetail').hide();

        //Get other fields
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log(baseUrl + 'profile/emergency/' + emergencyId);

        $.ajax({
            url: baseUrl + 'profile/emergency/' + emergencyId,
            type: "GET",
            error: function(data){
                notify('error', 'Could not get the info of  "' + emergencyTag + '": ' + data.statusText);
            },
            success: function(html){
                console.log(html);
                modal.find('#emergencyModalPhoto').attr('src', html.data.photoAvatar);
                modal.find('#emergencyModalPhoto').attr('alt', html.data.name);
                modal.find('#emergencyModalName').html(html.data.name);
                modal.find('#emergencyModalNok').html(html.data.nok);
                modal.find('#emergencyModalRelationship').html(html.data.relationship);
                modal.find('#emergencyModalPhone').html(html.data.phone);
                modal.find('#emergencyModalEmail').html(html.data.email);
                modal.find('#emergencyModalAddress').html(html.data.address);
                modal.find('#emergencyModalLandmark').html(html.data.landmark);
                modal.find('#emergencyModalLocation').html(html.data.location);
                modal.find('#emergencyModalZipCode').html(html.data.zip_code);
                modal.find('#emergencyModalCreated').html(html.data.created);
            },
            complete: function (x) {
                modal.find('#emergencyModalLoading').hide();
                modal.find('#emergencyModalDetail').show();
            }
        });
    });

    $('#relativeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var relativeId = button.data('id') // Extract info from data-* attributes
        var relativeTag = button.data('tag') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#relativeModalTitle').text(relativeTag);
        modal.find('#relativeModalLoading').show();
        modal.find('#relativeModalDetail').hide();

        //Get other fields
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: baseUrl + 'profile/relative/' + relativeId,
            type: "GET",
            error: function(data){
                notify('error', 'Could not get the info of  "' + relativeTag + '": ' + data.statusText);
            },
            success: function(html){
                console.log(html);
                modal.find('#relativeModalName').html(html.data.name);
                modal.find('#relativeModalAddress').html(html.data.address);
                modal.find('#relativeModalLandmark').html(html.data.landmark);
                modal.find('#relativeModalLocation').html(html.data.location);
                modal.find('#relativeModalZipCode').html(html.data.zip_code);
                modal.find('#relativeModalPhone').html(html.data.phone);
                modal.find('#relativeModalEmail').html(html.data.email);
                modal.find('#relativeModalRelationship').html(html.data.relationship);
                modal.find('#relativeModalCreated').html(html.data.created);
            },
            complete: function (x) {
                modal.find('#relativeModalLoading').hide();
                modal.find('#relativeModalDetail').show();
            }
        });
    });
});
