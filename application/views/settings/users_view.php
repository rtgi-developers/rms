<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader');
?>

<!-- Users list table -->
<div id="resUsersList"></div>

<?php 
$this->load->view('templates/footer'); 
?>

<script>
	$(document).ready(function(){
		/*
		|-----------------------------------------------------
		| Get users list
		|-----------------------------------------------------
		*/
		$.ajax({
			type: "get",
			url: "<?php echo base_url('settings/users/list_users'); ?>",
			dataType: "json",
			beforeSend: function(){$('#loader').show()},
			complete: function(){$('#loader').hide()},
			success: function(resp){
				if(resp.success) 
				{
					$('#resUsersList').html(resp.data);

					// Delete user
					delete_user();

					// Verify user
					verify_user();
				}
				else $('#resUsersList').html(resp.data);
			}
		});

	
		/**
		 * Deletre user javascript funtion 
		 * 
		 * @return {[type]} [description]
		 */
		function delete_user()
		{
			$('.btn-delete-user').each(function(){
				$(this).click(function(){
					// User id of clicked button
					var user_id = $(this).attr('user-id');

					// Sweet alert confirmation before delete
					swal({
						title: "Please Confirm", 
						text: "Are you sure you want to delete this user?",
						icon: "warning",
						buttons: ["No", "Yes"],
						dangerMode: true
					})
					.then((willDelete) => {
						if(willDelete)
						{	
							// Ajax request to delete user
							$.ajax({
								type: "get",
								url: "<?php echo base_url('settings/users/delete_user'); ?>",
								data: "userid="+user_id, 
								dataType: "json", 
								beforeSend: function(){$('#loader').show()}, 
								complete: function(){$('#loader').hide()}, 
								success: function(resp){
									if(resp.success) 
									{
										// Display message 
										swal({title: "Deleted!", text: resp.data, icon: "success"});

										// Remove user from view after successful delete
										var user_row = $('#btnDeleteUser'+user_id).closest('tr');
										user_row.hide('slow', function(){user_row.remove();});
									}
									else swal({title: "Oops!", text: resp.data, icon: "error"});
								}
							});
						}
					});
				});
			});
		}

		/**
		 * Verify user function 
		 * 
		 * @return {[type]} [description]
		 */
		function verify_user()
		{	
			// Loop through verify button
			$('.btn-verify-user').each(function(){
				// Get clicked button
				$(this).click(function(){
					// User id of clicked button
					var user_id    = $(this).attr('user-id');
					var user_email = $(this).attr('user-email');
					var user_name = $(this).attr('user-name');

					// Sweet alert confirmation before delete
					swal({
						title: "Please Confirm", 
						text: "Are you sure you want to verify this user?",
						icon: "warning",
						buttons: ["No", "Yes"],
						dangerMode: true
					})
					.then((willDelete) => {
						if(willDelete)
						{	
							// Ajax request to delete user
							$.ajax({
								type: "get",
								url: "<?php echo base_url('settings/users/verify_user'); ?>",
								data: "userid="+user_id+"&useremail="+user_email+"&username="+user_name, 
								dataType: "json", 
								beforeSend: function(){$('#loader').show()}, 
								complete: function(){$('#loader').hide()}, 
								success: function(resp){
									if(resp.success)
									{	
										// Show success message
										swal({title: "Verified!", text: resp.data, icon: "success"});

										// Remove verify button
										$('#btnVerifyUser'+user_id).remove();	
									} 
									else swal({title: "Oops!", text: resp.data, icon: "error"});
								}
							});
						}
					});
				});
			});
		}
		
	});
</script>