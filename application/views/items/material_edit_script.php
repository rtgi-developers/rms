<script>
$(document).ready(function(){
	/**
	 * Get product sub categories on parent category change
	 */
	$('#txtEditMatlCat').change(function(){
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
				$('#txtEditMatlSubCat1').html(res);
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
	$('#txtEditMatlSubCat1').change(function(){
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
				$('#txtEditMatlSubCat2').html(res);
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/*
	|-----------------------------------------------
	| SUBMIT EDIT MATERIAL FORM
	|-----------------------------------------------
	*/
	$('#formEditMatl').submit(function(event){
		// Prevent form default behaviour
		event.preventDefault(); 
		
		// Ajax request to process the form
		$.ajax({
			type: "post", 
			url: "<?php echo base_url('items/materials/save_matl_changes'); ?>", 
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
				if(res.status == 'success') $('#resEditMatl').html(res.data); 
				else $('#resEditMatl').html(res.data); 
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