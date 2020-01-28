<script>
$(document).ready(function(){
	/*
	|-----------------------------------------------------
	| Initialize datatable on users table
	|-----------------------------------------------------
	*/
	// Initialize jquery datatable
	var dt_users = $('#tblUsers').DataTable({
		fixedHeader: {headerOffset: $('#topNav').outerHeight()},
		"aaSorting": [], 
		"order": [[ 4, "asc" ]],
		"paging": true,
	});

	// Datatable custom search
	$('#txtSearchUsers').on('keyup', function(){
		dt_users.search($('#txtSearchUsers').val()).draw();
	});

	// Invite user
	invite_user();

	// Delete user
	delete_user();

	// Verify user
	verify_user();

	/**
	 * Invite new user
	 * 
	 * @return {[type]} [description]
	 */
	function invite_user()
	{
		$('#btnInviteUser').click(function(){
			swal({
				title: "Invite New User",
				text: "Please enter an email to send invitation",  
				content: "input", 
				button: {
					text: "Invite", 
					closeModal: false, 
				}
			})
			.then((email) => {
				if(email !== '') ajax_invite_user(email);
				else swal("Oops!", "You must enter an email to send invitation.", "error");
			});
		});
	}

	/**
	 * Ajax request to invite new user
	 * 
	 * @return {[type]} [description]
	 */
	function ajax_invite_user(email)
	{
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('settings/users/invite_user'); ?>", 
			data: "email="+email, 
			dataType: "json", 
			success: function(resp)
			{
				if(resp.success) swal({title: resp.title, text: resp.data, icon: resp.type});
				else swal({title: resp.title, text: resp.data, icon: resp.type});
			}, 
		});
	}


	/**
	 * Delete user javascript funtion 
	 * 
	 * @return {[type]} [description]
	 */
	function delete_user()
	{
		$('#tblUsers').on('click', '.btn-delete-user', function(){
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
				if(willDelete) ajax_delete_user(user_id);
			});
		});
	}

	/**
	 * Ajax request to delete user
	 * 
	 * @param  {[type]} userid [description]
	 * @return {[type]}        [description]
	 */
	function ajax_delete_user(userid)
	{
		// Ajax request to delete user
		$.ajax({
			type: "get",
			url: "<?php echo base_url('settings/users/delete_user'); ?>",
			data: "userid="+userid, 
			dataType: "json", 
			beforeSend: function(){$('#loader').show()}, 
			complete: function(){$('#loader').hide()}, 
			success: function(resp){
				if(resp.success) 
				{
					// Display message 
					swal({title: resp.title, text: resp.data, icon: resp.type});

					// Remove user from view after successful delete
					var user_row = $('#btnDeleteUser'+userid).closest('tr');
					user_row.hide('slow', function(){user_row.remove();});
				}
				else swal({title: resp.title, text: resp.data, icon: resp.type});
			}
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
		$('#tblUsers').on('click', '.btn-verify-user', function(){
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
				if(willDelete) ajax_verify_user(user_id, user_email, user_name);
			});
		});
	}

	/**
	 * Ajax request to verify user 
	 * 
	 * @param  {[type]} userid    [description]
	 * @param  {[type]} useremail [description]
	 * @param  {[type]} username  [description]
	 * @return {[type]}           [description]
	 */
	function ajax_verify_user(userid, useremail, username)
	{
		// Ajax request to delete user
		$.ajax({
			type: "get",
			url: "<?php echo base_url('settings/users/verify_user'); ?>",
			data: "userid="+userid+"&useremail="+useremail+"&username="+username, 
			dataType: "json", 
			beforeSend: function(){$('#loader').show()}, 
			complete: function(){$('#loader').hide()}, 
			success: function(resp){
				if(resp.success)
				{	
					// Show success message
					swal({title: resp.title, text: resp.data, icon: resp.type});

					// Remove verify button
					$('#btnVerifyUser'+userid).remove();	
				} 
				else swal({title: resp.title, text: resp.data, icon: resp.type});
			}
		});
	}
	
});
</script>