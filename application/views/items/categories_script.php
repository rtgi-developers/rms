<script>
$(document).ready(function(){
	/*
	|------------------------------------------------
	| GET ALL CATEGORIES TABLE ON PAGE LOAD
	|------------------------------------------------
	*/
	var dt_cat = $('#tblCat').DataTable({
		"processing": true, 
		"serverSide": true, 
		"ordering": true,
		"ajax": {
			type: "post", 
			url: "<?php echo base_url('items/categories/get_cat_serverside'); ?>", 
			dataType: "json", 
			beforeSend: function(){$('#loader').show()}, 
			complete: function(){$('#loader').hide()}, 
			data: {
				"<?php echo $this->security->get_csrf_token_name(); ?>" : 
				"<?php echo $this->security->get_csrf_hash(); ?>"
			}, 
			//success: function(resp){$('#tblCat').append(resp.data)}, 
			error: function()
			{	
				$("#tblCat").append('<tbody><tr><td class="align-middle text-center" colspan="4">No categories found!</td></tr></tbody>');
			}
		}, 
		"createdRow": function(row, data, index)
		{
			$('td', row).addClass('align-middle');
			$('td:eq(3)', row).addClass('text-right');
		}, 
		"drawCallback": function(settings, json)
		{	
			/*
			|------------------------------------------------
			| EDIT CATEGORY
			|------------------------------------------------
			*/
			$('.lnk-edit-cat').each(function(){
				$(this).click(function(){
					$('#txtEditCatId').val($(this).attr('cat-id'));
					$('#txtEditCatType').val($(this).attr('cat-type'));
					$('#txtEditCat').val($(this).attr('cat-name'));
					$('#txtEditSubCat').val($(this).attr('subcat-name'));
				}); 
			}); 
		
			/*
			|------------------------------------------------
			| DELETE CATEGORY
			|------------------------------------------------
			*/
			$('.lnk-del-cat').each(function(){
				$(this).click(function(){
					var cat_id  = $(this).attr('cat-id');
					var del_row = $(this).closest('tr'); 

					// Delete confirmation
					swal({
						title: "Are you sure?", 
						text: "Do you really want to delete this task? This process cannot be ubdone.", 
						icon: "warning", 
						buttons: ["No", "Yes"],
						dangerMode: true
					})
					.then((willDelete) => {
						if(willDelete) ajax_del_cat(cat_id, del_row);
					})
				}); 
			});
		}
	});

	/*
	|------------------------------------------------
	| SEARCH CATEGORY TABLE
	|------------------------------------------------
	*/
	$("#txtSearchCat").on('keyup', function(){
		dt_cat.search($('#txtSearchCat').val()).draw();
	});

	/*
	|------------------------------------------------
	| LOAD CATEGORY ON CATEGORY TYPE CHANGE - CREATE FORM
	|------------------------------------------------
	*/
	$('#txtCatType').on('change', function(){
		// Clear old category and sub category datalist
		$('#listCat').empty();
		$('#txtCat').val(null); 

		$('#listSubCat').empty();
		$('#txtSubCat').val(null); 

		// Ajax request to get categories list
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/categories/load_cat_list') ?>", 
			data: "cattype="+$(this).val(), 
			dataType: "json", 
			success: function(resp)
			{	
				if(resp.status == 'success') {
					$('#listCat').html(resp.data);
					$('#txtCat').attr('placeholder', 'Select from list or enter new.');
				}
				else {
					$('#listCat').empty(); 
					$('#txtCat').attr('placeholder', 'No categories found, please enter.');
				}
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/*
	|------------------------------------------------
	| LOAD SUB CATEGORY ON CATEGORY CHANGE - CREATE FORM
	|------------------------------------------------
	*/
	$('#txtCat').on('change', function(){
		// Clear old sub categories datalist
		$('#listSubCat').empty();
		$('#txtSubCat').val(null);

		// Ajax request to get categories list
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/categories/load_subcat_list') ?>", 
			data: "catname="+$(this).val(), 
			dataType: "json", 
			success: function(resp)
			{	
				if(resp.status == 'success') 
				{
					$('#listSubCat').html(resp.data);
					$('#txtSubCat').attr('placeholder', 'Select from list or enter new.')
				}
				else {
					$('#listSubCat').empty();
					$('#txtSubCat').attr('placeholder', 'No sub categories found, please enter.')
				}
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/*
	|------------------------------------------------
	| SUBMIT CREATE CATEGORY FORM
	|------------------------------------------------
	*/
	$('#formCreateCat').submit(function(event){
		// Prevent form default behaviour
		event.preventDefault(); 

		// Ajax post
		$.ajax({
			type: "post", 
			url: "<?php echo base_url('items/categories/create_cat'); ?>", 
			data: $(this).serialize(), 
			dataType: "json", 
			beforeSend: function()
			{
				$('#loader').show();
			}, 
			complete: function()
			{
				$('#loader').hide();	
			}, 
			success: function(resp)
			{
				if(resp.status == 'success') swal({title: resp.title, text: resp.data, icon: resp.status});
				else swal({title: resp.title, text: resp.data, icon: resp.status});
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/*
	|------------------------------------------------
	| LOAD CATEGORY ON CATEGORY TYPE CHANGE - EDIT FORM
	|------------------------------------------------
	*/
	$('#txtEditCatType').on('change', function(){
		// Clear old category and sub category datalist
		$('#listEditCat').empty();
		$('#txtEditCat').val(null); 

		$('#listEditSubCat').empty();
		$('#txtEditSubCat').val(null); 

		// Ajax request to get categories list
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/categories/load_cat_list') ?>", 
			data: "cattype="+$(this).val(), 
			dataType: "json", 
			success: function(resp)
			{	
				if(resp.status == 'success') {
					$('#listEditCat').html(resp.data);
					$('#txtEditCat').attr('placeholder', 'Select from list or enter new.');
				}
				else {
					$('#listEditCat').empty(); 
					$('#txtEditCat').attr('placeholder', 'No categories found, please enter.');
				}
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/*
	|------------------------------------------------
	| LOAD SUB CATEGORY ON CATEGORY CHANGE - EDIT FORM
	|------------------------------------------------
	*/
	$('#txtEditCat').on('change', function(){
		// Clear old sub categories datalist
		$('#listEditSubCat').empty();
		$('#txtEditSubCat').val(null);

		// Ajax request to get categories list
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/categories/load_subcat_list') ?>", 
			data: "catname="+$(this).val(), 
			dataType: "json", 
			success: function(resp)
			{	
				if(resp.status == 'success') 
				{
					$('#listEditSubCat').html(resp.data);
					$('#txtEditSubCat').attr('placeholder', 'Select from list or enter new.')
				}
				else {
					$('#listEditSubCat').empty();
					$('#txtEditSubCat').attr('placeholder', 'No sub categories found, please enter.')
				}
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/*
	|------------------------------------------------
	| SUBMIT EDIT CATEGORY UPDATE FORM
	|------------------------------------------------
	*/
	$('#formEditCat').submit(function(event){
		// Prevent form default behaviour
		event.preventDefault(); 

		// Ajax post
		$.ajax({
			type: "post", 
			url: "<?php echo base_url('items/categories/save_cat_changes'); ?>", 
			data: $(this).serialize(), 
			dataType: "json", 
			beforeSend: function()
			{
				$('#loader').show();
			}, 
			complete: function()
			{
				$('#loader').hide();	
			}, 
			success: function(resp)
			{
				if(resp.status == 'success') swal({title: resp.title, text: resp.data, icon: resp.status});
				else swal({title: resp.title, text: resp.data, icon: resp.status});
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/**
	 * Ajax request to delete a category 
	 * 
	 * @param  {int} 	catid  	Category id
	 * @param  {object} delrow 	Row to be deleted
	 * @return alert
	 */
	function ajax_del_cat(catid, delrow)
	{
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/categories/delete_cat'); ?>", 
			data: "catid="+catid, 
			dataType: "json", 
			beforeSend: function()
			{
				$('#loader').show();
			}, 
			complete: function()
			{
				$('#loader').hide();
			}, 
			success: function(resp)
			{
				if(resp.status == 'success') swal({title: resp.title, text: resp.data, icon: resp.status});
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
	|------------------------------------------------
	| DRAGGABLE MODAL
	|------------------------------------------------
	*/
	$('#mdlCreateCat, #mdlEditCat').draggable({
	    handle: ".modal-header"
	});

	/*
	|------------------------------------------------
	| MODAL ON CLOSE
	|------------------------------------------------
	*/
	$('#mdlCreateCat').on('hidden.bs.modal', function(){
		$('#formCreateCat').trigger('reset');
	});
	$('#mdlEditCat').on('hidden.bs.modal', function(){
		$('#formEditCat').trigger('reset');
	});


});
</script>