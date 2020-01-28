<script>
	$(document).ready(function(){
		/*
		|---------------------------------------------------------------
		| Bulk task selection based on module (None, Partial and Full)
		|---------------------------------------------------------------
		*/
		$('.rdo-task-cat').each(function(){
			$(this).change(function(){
				// Checked radio value
				var taskCat  = $(this).attr('task-cat');
				var rdoVal = $(this).val();

				// Bulk check or uncheck tasks check box permission based on module
				$('.cbx-task-cat-'+taskCat).each(function(){
					if(rdoVal == 'None'){
						$(this).prop({"checked": false, "disabled": true});
						$('.txt-task-mod-'+taskCat).val(0);
					}
					else if(rdoVal == 'Full'){
						$(this).prop({"checked": true, "disabled": false});
						$('.txt-task-mod-'+taskCat).val(1);
					}
					else if(rdoVal == 'Partial'){
						$(this).prop({"checked": false, "disabled": false});
						$('.txt-task-mod-'+taskCat).val(0);
					}
				});
			});
		});

		/*
		|---------------------------------------------------------------
		| Update permission hiddedn textbox value(0, 1) task checkbox change
		|---------------------------------------------------------------
		*/
		$('.cbx-task').each(function(){
			$(this).change(function(){
				// Get task id
				var taskId = $(this).attr('task-id');

				// Update permission text box value
				if($(this).is(':checked')) $('#txtTask'+taskId).val(1);
				else $('#txtTask'+taskId).val(0);
			});
		});

		/*
		|---------------------------------------------------------------
		| Make admin
		|---------------------------------------------------------------
		*/
		$('#btnMakeAdmin').click(function(){

			var user_id   = $(this).attr('user-id');
			var user_name = $(this).attr('user-name');

			swal({
				title: "Please Confirm!", 
				text: "Are you sure you want to make "+user_name+" an Admin?",
				icon: "warning",
				buttons: ["No", "Yes"],
				dangerMode: true
			})
			.then((willDelete) => {
				if(willDelete) ajax_make_admin(user_id);
			});

		});


		/**
		 * Ajax request to make user an admin
		 * 
		 * @param  {[type]} userid [description]
		 * @return {[type]}        [description]
		 */
		function ajax_make_admin(userid)
		{
			$.ajax({
				type: "get", 
				url: "<?php echo base_url('settings/users/make_admin'); ?>", 
				data: "userid="+userid, 
				dataType: "json", 
				beforeSend: function(){$('#loader').show()}, 
				complete: function(){$('#loader').hide()}, 
				success: function(resp){
					if(resp.success) swal({title: resp.title, text: resp.data, icon: resp.type});
					else swal({title: resp.title, text: resp.data, icon: resp.type});
				}
			});
		}

		/*
		|---------------------------------------------------------------
		| Submit save permission changes form 
		|---------------------------------------------------------------
		*/
		$('#formSaveUserPerms').submit(function(event){
			// Prevent forms default behaviour
			event.preventDefault();

			// Ajax post request
			$.ajax({
				type: "post", 
				url: "<?php echo base_url('settings/users/save_user_perms'); ?>",
				data: $(this).serialize(),
				dataType: "json", 
				beforeSend: function(){$('#loader').show()},
				complete: function(){$('#loader').hide()},
				success: function(resp)
				{
					if(resp.success) $('#resUserPermsChanges').html(resp.data);
					else $('#resUserPermsChanges').html(resp.data);
				}
			});
		});
	});
</script>