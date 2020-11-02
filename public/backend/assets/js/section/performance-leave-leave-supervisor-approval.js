$(document).ready(function (){
    $('#approvalModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id');
        var tag = button.data('tag');
        var name = button.data('name');

        $('#approvalModalTitle').html(tag);
        $('#approvalModalName').html(name);
        $('#approvalModalLeaveId').val(id);
        $('#approvalModalLeaveTag').val(tag);
        $('#approvalModalLeaveName').val(name);
    });

    $('#approval-btn').click(function () {
        var id = $('#approvalModalLeaveId').val();
        var tag = $('#approvalModalLeaveTag').val();
        var name = $('#approvalModalLeaveName').val();
        var i = $(this).children("i");
        var icon = i.attr('class');
        var row = $('#' + trId + '-' + id);
        var status = $('input[name="approvalModalLeaveStatus"]:checked').val();
        var reason = $('#approvalModalLeaveReason').val();

        //Validation
        if(status == null){
            Swal.fire(
                '',
                'Please select an an approval status',
                'error'
            );
            return;
        }

        if(reason == null || reason.length < 10){
            Swal.fire(
                '',
                'Reason for approval/denial should not be less than 10 characters long',
                'error'
            );
            reason.focus();
            return;
        }

        i.removeClass();
        i.addClass('fas fa-spin fa-spinner');
        $('#processingModal').modal('show');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        	url: baseUrl + 'user/leave/supervisor/approval/' + id,
        	type: "put",
            data: {
        	    status: status,
                reason: reason,
            },
        	error: function(data){
        		Swal.fire({
        			toast: true,
        			position: 'top-end',
        			title: 'Error!',
        			text: 'Could not complete approval for "' + tag + '": ' + data.statusText,
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
        				text: 'Leave application by ' + name + ' has been successfully processed',
        				icon: 'success',
        				showConfirmButton: false,
        				timer: 5000,
        				timerProgressBar: true,
        			});
        			row.hide();
                    $('#approvalModal').modal('hide')
        		}else if(html == 0){
        			Swal.fire({
        				toast: true,
        				position: 'top-end',
        				title: null,
        				text: 'Approval failed',
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

                $('#processingModal').modal('show');
        	}
        });
    });
});
