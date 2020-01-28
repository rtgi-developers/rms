<!-- Javascript -->
<script>
	$(document).ready(function(){

		/*
		|-----------------------------------------------------
		| INITIALIZE JQUERY DATATABLE FOR TASKS TABLE
		|-----------------------------------------------------
		*/ 
		var dt_tasks = $('#tblTasks').DataTable({
			fixedHeader: {headerOffset: $('#topNav').outerHeight()},
			"aaSorting": [], 
			"paging": true, 
		});

		/*
		|-----------------------------------------------------
		| SEARCH TASKS DATATABLE
		|-----------------------------------------------------
		*/ 
		$("#txtSearchTasks").on('keyup', function(){
			dt_tasks.search($('#txtSearchTasks').val()).draw();
		});

		/*
		|-----------------------------------------------------
		| DELETE TASK
		|-----------------------------------------------------
		*/ 
		$('#tblTasks').on('click', '.lnk-del-task', function(){
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
				if(willDelete) ajax_del_task(task_id, del_row);
			})
		});

		/**
		 * Ajax request to delete task
		 * 
		 * @param  {[type]} taskid [description]
		 * @return {[type]}        [description]
		 */
		function ajax_del_task(taskid, deletedrow)
		{
			// Ajax request to delete user
			$.ajax({
				type: "get",
				url: "<?php echo base_url('settings/tasks/delete_task'); ?>",
				data: "taskid="+taskid, 
				dataType: "json", 
				beforeSend: function(){$('#loader').show()}, 
				complete: function(){$('#loader').hide()}, 
				success: function(resp){
					if(resp.success)
					{	
						// Show success message
						swal({title: resp.title, text: resp.data, icon: resp.type});

						// Remove verify button
						deletedrow.remove();	
					} 
					else swal({title: resp.title, text: resp.data, icon: resp.type});
				}
			});
		}

		/*
		|-----------------------------------------------------
		| GET UNIQUE EXISTING CATEGORY
		|-----------------------------------------------------
		*/ 
		$('#linkCreateNewTask').click(function(){
			// Ajax get request
			$.ajax({
				type: "get", 
				url: "<?php echo base_url('settings/tasks/load_task_cat_options'); ?>", 
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
		| GET TASK CATEGORY EDIT TASK
		|-----------------------------------------------------
		*/ 
		$('#tblTasks').on('click', '.lnk-edit-task', function(){
			// Get category options
			$.ajax({
				type: "get", 
				url: "<?php echo base_url('settings/tasks/load_task_cat_options'); ?>", 
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
			$('#txtEditIsPermReq').val($(this).attr('is-perm-req')).change();
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

		/*
		|----------------------------------------------------
		| Bootstrap modal on close
		|----------------------------------------------------
		*/
		$('#mdlEditTask').on('hidden.bs.modal', function(){
			$('#formEditTask').trigger('reset'); // Reset the form
			$('#resEditTask').empty(); // Clear the processing result
		});
	});
</script>