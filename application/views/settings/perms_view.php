<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resUserPermsChanges"></div>

<?php echo $tasks; ?>

<?php 
$this->load->view('templates/footer'); 
?>

<script>
	$(document).ready(function(){
		/*
		|---------------------------------------------------------------
		| Bulk task selection based on module (None, Partial and Full)
		|---------------------------------------------------------------
		*/
		$('.rdo-mod').each(function(){
			$(this).change(function(){
				// Checked radio value
				var modId  = $(this).attr('mod-id');
				var rdoVal = $(this).val();

				// Bulk check or uncheck tasks check box permission based on module
				$('.cbx-task-mod-'+modId).each(function(){
					if(rdoVal == 'None'){
						$(this).prop({"checked": false, "disabled": true});
						$('.txt-task-mod-'+modId).val(0);
					}
					else if(rdoVal == 'Full'){
						$(this).prop({"checked": true, "disabled": false});
						$('.txt-task-mod-'+modId).val(1);
					}
					else if(rdoVal == 'Partial'){
						$(this).prop({"checked": false, "disabled": false});
						$('.txt-task-mod-'+modId).val(0);
					}
				});
			});
		});

		/*
		|---------------------------------------------------------------
		| Update permission text box value (0, 1) task checkbox change
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
