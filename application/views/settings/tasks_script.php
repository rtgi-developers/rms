<!-- Javascript -->
<script>
	$(document).ready(function(){
		/*
		|-----------------------------------------------------
		| GET TASKS LIST
		|-----------------------------------------------------
		*/
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('settings/tasks/list_tasks'); ?>", 
			dataType: "json", 
			beforeSend: function(){$('#loader').show()}, 
			complete: function(){$('#loader').hide()}, 
			success: function(resp){
				if(resp.success)
				{
					$('#resTasksTable').html(resp.data);

					$('#tblTasks').DataTable({
						/*scrollY:        '55vh',
    					scrollCollapse: true,*/
						fixedHeader: {headerOffset: $('#topNav').outerHeight()},
						"aaSorting": [], 
						"order": [[ 1, "desc" ]],
						"paging": false, 
					});

					// Search import shipment items table from custom search box
					var tbl_tasks = $("#tblTasks").DataTable();
					//$("#btnSearchTasks").click(function(){
					$("#txtSearchTasks").on('keyup', function(){
						tbl_tasks.search($('#txtSearchTasks').val()).draw();
					});

					/*
					|-----------------------------------------------------
					| EDIT TASKS VALUE
					|-----------------------------------------------------
					*/ 
					$('.btn-edit-task').each(function(){
						$(this).click(function(){

							// Get category options
							$.ajax({
								type: "get", 
								url: "<?php echo base_url('settings/tasks/task_cat_list'); ?>", 
								dataType: "json", 
								success: function(resp){
									if(resp.success) $('#listEditTaskCat').html(resp.data);
									else $('#resEditTask').html(resp.data);
								}
							});

							// Get textbox values from link attributes
							$('#txtEditTaskId').val($(this).attr('task-id'));
							$('#txtEditTaskName').val($(this).attr('task-name'));
							$('#txtEditTaskCat').val($(this).attr('task-cat'));
							$('#txtEditClassName').val($(this).attr('class-name'));
							$('#txtEditMethodName').val($(this).attr('method-name'));
							$('#txtEditDir').val($(this).attr('task-dir'));
						});
					});

					/*
					|-----------------------------------------------------
					| DLETETE TASK
					|-----------------------------------------------------
					*/ 
					$('.btn-del-task').each(function(){
						$(this).click(function(){
							var task_id = $(this).attr('task-id');
							var del_row = $(this).closest('tr');

							// Sweet alert confirmation before delete
							swal({
								title: "Cofirm Delete!", 
								text: "Are you sure you want to delete this task?",
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
										url: "<?php echo base_url('settings/tasks/delete_task'); ?>",
										data: "taskid="+task_id, 
										dataType: "json", 
										beforeSend: function(){$('#loader').show()}, 
										complete: function(){$('#loader').hide()}, 
										success: function(resp){
											if(resp.success)
											{	
												// Show success message
												swal({title: "Deleted!", text: resp.data, icon: "success"});

												// Remove verify button
												del_row.remove();	
											} 
											else swal({title: "Oops!", text: resp.data, icon: "error"});
										}
									});
								}
							});
						});
					}); 
				}
				else $('#resTasksTable').html(resp.data);
			}
		});

		/*
		|-----------------------------------------------------
		| GET UNIQUE EXISTING CATEGORY
		|-----------------------------------------------------
		*/ 
		$('#linkCreateNewTask').click(function(){
			// Empty existing task category list
			//$('#listTaskCat').empty();

			// Ajax get request
			$.ajax({
				type: "get", 
				url: "<?php echo base_url('settings/tasks/task_cat_list'); ?>", 
				dataType: "json", 
				success: function(resp){
					if(resp.success) $('#listTaskCat').html(resp.data);
					else $('#resCreateTask').html(resp.data);
				}
			});
		});

		/*
		|-----------------------------------------------------
		| SUBMIT CREATE TASK FORM
		|-----------------------------------------------------
		*/ 
		$('#formCreateTask').submit(function(event){
			// Prevent form default behaviour
			event.preventDefault();

			// Ajax request
			$.ajax({
				type: "post",
				url: "<?php echo base_url('settings/tasks/create_task'); ?>",
				data: $(this).serialize(), 
				dataType: "json",
				beforeSend: function(){$('#loaderCreateTask').show()},
				complete: function(){$('#loaderCreateTask').hide()},
				success: function(resp){
					if(resp.success) $('#resCreateTask').html(resp.data);
					else $('#resCreateTask').html(resp.data);
				}
			});
		});

		/*
		|-----------------------------------------------------
		| SUBMIT EDIT TASK AND SAVE CHANGES FORM
		|-----------------------------------------------------
		*/ 
		$('#formEditTask').submit(function(event){
			// Prevent form default behaviour
			event.preventDefault();

			// Ajax request
			$.ajax({
				type: "post",
				url: "<?php echo base_url('settings/tasks/edit_task'); ?>",
				data: $(this).serialize(), 
				dataType: "json",
				beforeSend: function(){$('#loaderEditTask').show()},
				complete: function(){$('#loaderEditTask').hide()},
				success: function(resp){
					if(resp.success) $('#resEditTask').html(resp.data);
					else $('#resEditTask').html(resp.data);
				}
			});
		});
	});
</script>