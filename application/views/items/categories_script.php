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
			$('td:eq(0)', row).addClass('text-center');
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
					$('#txtEditCat').val($(this).attr('cat-name'));
					$('#catPath').text($(this).attr('cat-path'));
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
});
</script>