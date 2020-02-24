<script>
$(document).ready(function(){
	/*
	|-----------------------------------------------
	| GET SUBCATEGORIES ON CATEGORY CHANGE
	|-----------------------------------------------
	*/
	$('#txtEditMatlCat').on('change', function(){
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/materials/load_subcat_list') ?>", 
			data: "catname="+$(this).val(), 
			dataType: "json", 
			success: function(resp)
			{	
				if(resp.status == 'success') 
				{
					$('#txtEditMatlSubCat').html(resp.data);
				}
				else {
					$('#txtEditMatlSubCat').empty();
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