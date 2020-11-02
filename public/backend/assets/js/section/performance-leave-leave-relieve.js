$(document).ready(function (){
    $('.request-approval').click(function (){
        var id = $(this).data('id');
        var tag = $(this).data('tag');
        var name = $(this).data('name');
        var action = $(this).data('action');
        var i = $(this).children("i");
        var icon = i.attr('class');
        var row = $('#' + trId + '-' + id );

        Swal.fire({
            title: null,
            text: 'Do you want to ' + action + ' ' + tag + ' relieve request from ' + name + '?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, ' + action + ' request',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                //Loading
                i.removeClass().addClass('fas fa-spin fa-spinner');

                $('#processingModal').modal('show');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                	url: baseUrl + 'user/leave/relieve/' + id,
                	type: "put",
                    data:{
                        action: action,
                    },
                	error: function(data){
                		Swal.fire({
                			toast: true,
                			position: 'top-end',
                			title: 'Error!',
                			text: 'Could not ' + action + ' "' + tag + '" request: ' + data.statusText,
                			icon: 'error',
                			showConfirmButton: false,
                			timer: 5000,
                			timerProgressBar: true,
                		});
                	},
                	success: function(html){
                		console.log(html);
                		if(html == 1){
                			Swal.fire({
                				toast: true,
                				position: 'top-end',
                				title: null,
                				text: 'Request from ' + name +  ' ' + action + 'd',
                				icon: 'success',
                				showConfirmButton: false,
                				timer: 5000,
                				timerProgressBar: true,
                			});
                			row.hide();
                		}else if(html == 0){
                			Swal.fire({
                				toast: true,
                				position: 'top-end',
                				title: null,
                				text: 'Action failed',
                				icon: 'info',
                				showConfirmButton: false,
                				timer: 5000,
                				timerProgressBar: true,
                			});
                		}else{
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
                	},
                	complete: function (x) {
                		i.removeClass();
                		i.addClass(icon);

                        $('#processingModal').modal('hide')
                	}
                });
            }
        });
    })
})
