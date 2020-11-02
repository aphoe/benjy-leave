$(document).ready(function (e) {
    $('.admin-delete-item').click(function(n){
        n.preventDefault();

        var id = $(this).attr('data-id');
        var tag = $(this).attr('data-tag');
        var tr = '#' + trId + '-' + id;

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
                    url: deleteUrl + '/' + id,
                    type: "delete",
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

    $('.admin-activate-item').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        var id = $(this).attr('data-id');
        var action = $(this).attr('data-action');
        var ctrl = $(this);
        var i = ctrl.children("i");
        var iCur = i.attr('class');
        var span = ctrl.children("span");
        var disp = $('#active-' + id );

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Loading
        i.removeClass().addClass('fas fa-spin fa-spinner');

        $.ajax({
        	url: baseUrl + activateUrl,
        	type: "get",
            data: {
                id: id,
                action: action
            },
        	error: function(data){
        		Swal.fire({
        			toast: true,
        			position: 'top-end',
        			title: 'Error!',
        			text: 'Activation error: ' + data.statusText,
        			icon: 'error',
        			showConfirmButton: false,
        			timer: 5000,
        			timerProgressBar: true,
        		});
                i.removeClass().addClass(iCur);
        	},
        	success: function(html){
        		console.log(html);
                if(html == 1){
                    span.html('Deactivate');
                    ctrl.attr('data-action', 'deactivate');
                    disp.html("Yes");
                    i.removeClass().addClass('fas fa-ban');
                }else if(html == 2){
                    span.html('Activate');
                    ctrl.attr('data-action', 'activate');
                    disp.html("No");
                    i.removeClass().addClass('fas fa-check');
                }else{
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        title: null,
                        text: html,
                        icon: 'info',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                    });
                    i.removeClass().addClass(iCur);
                }
        	}
        });
    });
});
