<!-- Javascript -->
<script>
	$(document).ready(function(){
		/*
		|--------------------------------------------------
		| DATATABLE FOR NOTIFICATION TABLE
		|--------------------------------------------------
		 */
		var dt_notifs = $('#tblNotifs').DataTable({
			fixedHeader: {headerOffset: $('#topNav').outerHeight()},
			"aaSorting": [], 
			"order": [[ 3, "desc" ]],
			"paging": true,
		});

		// Datatable custom search
		$('#txtSearchNotifs').on('keyup', function(){
			dt_notifs.search($('#txtSearchNotifs').val()).draw();
		});

		/*
		|--------------------------------------------------
		| DELETE NOTIFICATION
		|--------------------------------------------------
		 */
		$('#tblNotifs').on('click', '.lnk-del-notif', function(){
			// Variables to be used further
			var notif_id = $(this).attr('notif-id');
			var del_row  = $(this).closest('tr');

			// Alert user before delete
			swal({
				title: "Confirm Deletion", 
				text: "Are you sure you want to delete this notification?", 
				icon: "warning", 
				buttons: ["No", "Yes"], 
				dangerMode: true
			})
			.then((willdelete) => {
				if(willdelete) ajax_del_notif(notif_id, del_row);
			}); 
		});
	

		/**
		 * Function to delete notification
		 * 
		 * @return Mix
		 */
		function ajax_del_notif(notifid, deletedrow)
		{
			$.ajax({
				type: "get", 
				url: "<?php echo base_url('settings/notifs/delete_notif'); ?>", 
				data: "notifid="+notifid, 
				dataType: "json", 
				beforeSend: function()
				{
					$('#loader').show()
				}, 
				complete: function()
				{
					$('#loader').hide()
				}, 
				success: function(resp)
				{
					if(resp.status == 'success') 
					{	
						// Successfull deletion message
						swal({title: resp.title, text: resp.data, icon: resp.status});
						
						// Remove verify button
						deletedrow.hide('slow', function(){deletedrow.remove();});
					}
					else swal({title: resp.title, text: resp.data, icon: resp.status});
				}, 
				error: function(xhr)
				{	
					var xhr_text = xhr.status+" "+xhr.statusText;
					swal({title: "Request Error!", text: xhr_text, icon: "error"});
				}
			});
		}

		/*
		|--------------------------------------------------
		| ON OPEN MODAL CREATE NOTIF
		|--------------------------------------------------
		 */
		$('#lnkCreateNotif').click(function(){
			$.ajax({
				type: "get", 
				url: "<?php echo base_url('settings/notifs/show_rcpts'); ?>", 
				dataType: "json", 
				beforeSend: function()
				{
					$('#loaderGetUsers').show()
				}, 
				complete: function(){
					$('#loaderGetUsers').hide()
				}, 
				success: function(resp) 
				{
					if(resp.status == 'success') 
					{	
						// Json encoded response
						$('#resRcpts').html(resp.data);

						// Table search
						$('#txtSearchRcpts').on('keyup', function(){
							// Search keyword
							var keyword = $(this).val().toLowerCase();

							// Filter
							$('#tblRcpts tr').filter(function(){
								$(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1)
							});
						});

						/*
						|---------------------------------------------------------------
						| Update permission hiddedn textbox value(0, 1) task checkbox change
						|---------------------------------------------------------------
						*/
						$('.cbx-rcpt').each(function(){
							$(this).change(function(){
								// Get task id
								var userId = $(this).attr('user-id');

								// Update permission text box value
								if($(this).is(':checked')) $('#txtIsSel'+userId).val(1);
								else $('#txtIsSel'+userId).val(0);
							});
						});

						/*
						|----------------------------------------------------
						| Check/Uncheck all recipients
						|----------------------------------------------------
						*/
						$('#cbxSelAllRcpts').change(function(){
							if($(this).is(":checked"))
							{	
								$('.cbx-rcpt').prop('checked', true);
								$('.cbx-rcpt').closest('tr').addClass('bg-lavender');
								$('.txt-is-sel').val(1);
							}
							else{
								$('.cbx-rcpt').prop('checked', false);
								$('.cbx-rcpt').closest('tr').removeClass('bg-lavender');
								$('.txt-is-sel').val(0);
							}
						});
					}
					else $('#resRcpts').html(resp.data);
				}, 
				error: function(xhr)
				{
					var xhr_text = xhr.status+" "+xhr.statusText;

					swal({title: "Request Error!", text: xhr_text, icon: "error"});
				}
			});
		});

		/*
		|--------------------------------------------------------------
		| Submit create notification form
		|--------------------------------------------------------------
		*/
		$('#formCreateNotif').submit(function(event){
			event.preventDefault();

			$.ajax({
				type: "post", 
				url: "<?php echo base_url('settings/notifs/create_notif'); ?>", 
				data: $(this).serialize(), 
				dataType: "json", 
				beforeSend: function()
				{
					$('#loaderCreateNotif').show()
				}, 
				complete: function()
				{
					$('#loaderCreateNotif').hide()
				}, 
				success: function(resp)
				{
					if(resp.status == 'success') $('#resCreateNotif').html(resp.data);
					else $('#resCreateNotif').html(resp.data);
				}, 
				error: function(xhr)
				{	
					var xhr_text = xhr.status+" "+xhr.statusText;
					swal({title: "Request Error!", text: xhr_text, icon: "error"});
				}
			});
		});

		/*
		|----------------------------------------------------
		| Bootstrap modal on close
		|----------------------------------------------------
		*/
		$('#mdlCreateNotif').on('hidden.bs.modal', function(){
			$('#resCreateNotif').html('');
			$('#formCreateNotif').trigger('reset');
		});
	});
</script>