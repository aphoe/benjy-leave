$(document).ready(function(){
    $('#descriptionModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var descriptionId = button.data('id') // Extract description from data-* attributes
        var descriptionTag = button.data('tag') // Extract description from data-* attributes
        var descriptionDesc = button.data('description') // Extract description from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#descriptionModalTitle').text(descriptionTag);
        modal.find('#descriptionModalText').text(descriptionDesc);

    });

    $('#settingModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var settingId = button.data('id') // Extract info from data-* attributes
        var settingTag = button.data('tag') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#settingModalTitle').text(settingTag);
        modal.find('#description_leave_id').val(settingId);
        modal.find('#description_leave_tag').val(settingTag);
        modal.find('#settingModalLoading').show();
        modal.find('#settingModalDetail').hide();

        //Get other fields
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: baseUrl + 'performance/leave/type/setting/' + settingId,
            type: "get",
            error: function(data){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    title: 'Error!',
                    text: 'Could not get the info of   "' + settingId + '": ' + data.statusText,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                });
            },
            success: function(html){
                console.log(html);

                $('.description_setting_radio').attr('checked', false);

                //Set radios
                if(html.data.has_leave_note === 1){
                    $('#description_leave_note_yes').attr('checked', true);
                    $('#description_leave_note_no').attr('checked', false);
                }else{
                    $('#description_leave_note_yes').attr('checked', false);
                    $('#description_leave_note_no').attr('checked', true);
                }

                if(html.data.has_return_note === 1){
                    $('#description_return_note_yes').attr('checked', true);
                    $('#description_return_note_no').attr('checked', false);
                }else{
                    $('#description_return_note_yes').attr('checked', false);
                    $('#description_return_note_no').attr('checked', true);
                }

                if(html.data.has_report === 1){
                    $('#description_report_yes').attr('checked', true);
                    $('#description_report_no').attr('checked', false);
                }else{
                    $('#description_report_yes').attr('checked', false);
                    $('#description_report_no').attr('checked', true);
                }

                //Display form
                modal.find('#settingModalLoading').hide();
                modal.find('#settingModalDetail').show();
            },
            complete: function (x) {
                modal.find('#infoModalLoading').hide();
                modal.find('#infoModalDetail').show();
            }
        });
    });

    $('#setting-action').click(function (){
        var leave_note = $('input[name="description_leave_note"]:checked').val();
        var return_note = $('input[name="description_return_note"]:checked').val();
        var report = $('input[name="description_report"]:checked').val();
        var id = $('#description_leave_id').val();
        var tag = $('#description_leave_tag').val();
        var i = $(this).children('i');

        console.log(id);

        //Validation
        if(leave_note == null || return_note == null || report == null){
            Swal.fire(
                '',
                'Please select an option for each settings item',
                'error'
            );
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        i.removeClass();
        i.addClass('fas fa-spinner fa-spin');

        $.ajax({
        	url: baseUrl + 'performance/leave/type/setting/' + id,
            data: {
        	    id: id,
                leave_note: leave_note,
                return_note: return_note,
                report: report
            },
        	type: "put",
        	error: function(data){
        		Swal.fire({
        			toast: true,
        			position: 'top-end',
        			title: 'Error!',
        			text: 'Could not update settings "' + tag + '": ' + data.statusText,
        			icon: 'error',
        			showConfirmButton: false,
        			timer: 5000,
        			timerProgressBar: true,
        		});
        	},
        	success: function(html){
        		console.log(html);
        		if(html.status == 1){
        			Swal.fire({
        				toast: true,
        				position: 'top-end',
        				title: null,
        				text: 'Settings updated',
        				icon: 'success',
        				showConfirmButton: false,
        				timer: 5000,
        				timerProgressBar: true,
        			});
        			$('#leave-note-' + id).html(html.data.leave_note_text);
        			$('#return-note-' + id).html(html.data.return_note_text);
        			$('#report-' + id).html(html.data.report_text);

        		}else if(html.status == 0){
        			Swal.fire({
        				toast: true,
        				position: 'top-end',
        				title: null,
        				text: 'Update failed',
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
        				text: html.status,
        				icon: 'info',
        				showConfirmButton: false,
        				timer: 3000,
        				timerProgressBar: true,
        			});
        		}
        	},
        	complete: function (x) {
                i.removeClass();
                i.addClass('fas fa-save');
        	}
        });

    });
})
