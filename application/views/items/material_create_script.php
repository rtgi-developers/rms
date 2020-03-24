<script>
$(document).ready(function(){
	/**
	 * Get product categories on page load
	 */
	$.ajax({
		type: "get", 
		url: "<?php echo base_url('items/materials/get_matl_cat_options') ?>", 
		data: "cat-id=2", 
		beforeSend: function()
		{
			$('#loader').show();
		}, 
		complete: function()
		{
			$('#loader').hide(); 
		}, 		
		success: function(res)
		{	
			$('#txtMatlCat').html(res);
		}, 
		error: function(xhr)
		{
			var xhr_text = xhr.status+" "+xhr.statusText;
			swal({title: "Request Error!", text: xhr_text, icon: "error"});
		}
	});

	/**
	 * Get product sub categories on parent category change
	 */
	$('#txtMatlCat').change(function(){
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/materials/get_matl_cat_options') ?>",  
			data: "cat-id="+$(this).val(), 
			beforeSend: function()
			{
				$('#loader').show();
			}, 
			complete: function()
			{
				$('#loader').hide(); 
			}, 	
			success: function(res)
			{	
				$('#txtMatlSubCat1').html(res);
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});
	

	/**
	 * Get product sub categories on parent category change
	 */
	$('#txtMatlSubCat1').change(function(){
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/materials/get_matl_cat_options') ?>",  
			data: "cat-id="+$(this).val(), 
			beforeSend: function()
			{
				$('#loader').show();
			}, 
			complete: function()
			{
				$('#loader').hide(); 
			}, 	
			success: function(res)
			{	
				$('#txtMatlSubCat2').html(res);
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
			success: function(res)
			{
				if(res.status == 'success') $('#resCreateMatl').html(res.data);
				else $('#resCreateMatl').html(res.data);
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