<script>
$(document).ready(function(){
	/**
	 * Get material categories on page load
	 */
	$.ajax({
		type: "get", 
		url: "<?php echo base_url('items/materials/load_cat_list') ?>", 
		dataType: "json", 
		success: function(resp)
		{	
			if(resp.status == 'success') $('#txtMatlCat').append(resp.data);
			else $('#txtCat').empty(); 
		}, 
		error: function(xhr)
		{
			var xhr_text = xhr.status+" "+xhr.statusText;
			swal({title: "Request Error!", text: xhr_text, icon: "error"});
		}
	});

	/**
	 * Get subcategories on categories change
	 */
	$('#txtMatlCat').on('change', function(){
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/materials/load_subcat_list') ?>", 
			data: "catname="+$(this).val(), 
			dataType: "json", 
			success: function(resp)
			{	
				if(resp.status == 'success') 
				{
					$('#txtMatlSubCat').html(resp.data);
				}
				else {
					$('#txtMatlSubCat').empty();
				}
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/**
	 * Submit create material form
	 */
	$('#formCreateMatl').submit(function(event){
		// Prevent form default behaviour
		event.preventDefault(); 

		// Ajax
		$.ajax({
			type: "post",
			url: "<?php echo base_url('items/materials/create_matl');  ?>", 
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
				if(resp.status == 'success') $('#resCreateMatl').html(resp.data);
				else $('#resCreateMatl').html(resp.data);
			}, 	
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});
});
</script>