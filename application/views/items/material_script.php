<script>
$(document).ready(function(){
	/**
	 * Get all materials table on page load using server side
	 */
	var dt_matl = $('#tblMatl').DataTable({
		"processing": true, 
		"serverSide": true, 
		"ordering": true,
		"ajax": {
			type: "post", 
			url: "<?php echo base_url('items/materials/get_matl_serverside'); ?>", 
			dataType: "json", 
			beforeSend: function()
			{
				$('#loader').show();
			}, 
			complete: function(){
				$('#loader').hide();
			}, 
			data: {
				"<?php echo $this->security->get_csrf_token_name(); ?>" : 
				"<?php echo $this->security->get_csrf_hash(); ?>"
			}, 
			error: function()
			{	
				$("#tblMatl").html('<tbody><tr><td class="align-middle text-center" colspan="4">No materials found!</td></tr></tbody>');
			}
		}, 
		"createdRow": function(row, data, index)
		{
			$('td', row).addClass('align-middle');
			$('td:eq(3)', row).addClass('text-left');
			$('td:eq(1)', row).addClass('text-left');
		}, 
		"drawCallback": function(settings, json)
		{	
			/*
			|------------------------------------------------
			| DELETE MATERIAL
			|------------------------------------------------
			*/
			$('.lnk-del-matl').each(function(){
				$(this).click(function(){
					var matl_id  = $(this).attr('matl-id');
					var del_row  = $(this).closest('tr'); 

					// Delete confirmation
					swal({
						title: "Confirm delete!", 
						text: "Are you sure you want to delete this material?", 
						icon: "warning", 
						buttons: ["No", "Yes"],
						dangerMode: true
					})
					.then((willDelete) => {
						if(willDelete) ajax_del_matl(matl_id, del_row);
					})
				}); 
			});
		}
	});

	/**
	 * Search materials table
	 */
	$("#txtSearchMatl").on('keyup', function(){
		dt_matl.search($('#txtSearchMatl').val()).draw();
	});

	/**
	 * Ajax request to delete a material 
	 * 
	 * @param  {int} 	matlid  Material id
	 * @param  {object} delrow 	Row to be deleted
	 * @return alert
	 */
	function ajax_del_matl(matlid, delrow)
	{
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/materials/delete_matl'); ?>", 
			data: "matlid="+matlid, 
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
				if(resp.status == 'success') 
				{	
					// Success message
					swal({title: resp.title, text: resp.data, icon: resp.status});

					// Remove verify button
					delrow.hide('slow', function(){delrow.remove();});
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
});
</script>