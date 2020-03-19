<script>
$(document).ready(function(){
	// Highlight all required fields
	$('[required]').css('border-color', 'red');

	/**
	 * Enable create product submit button 
	 * when all required fields have value
	 */
	$('[required]').on('keyup change paste', function()
	{	
		// Start counter to count number of req inputs with values
		var reqInputsWithValues = 0;

		// Loop through each required fields
		$('[required]').each(function(){
			if($(this).val())
			{
				// Remove red border from req inputs
				$(this).css('border-color', '');

				// Increase the req inputs values as they filled up
				reqInputsWithValues += 1;
			}
			else $(this).css('border-color', 'red');
		});

		// Enable/Disable submit button
		if(reqInputsWithValues == $('[required]').length) 
		{
			$('#btnCreateProd').prop("disabled", false); 
		}
		else {
			$('#btnCreateProd').prop("disabled", true); 
		}
	});

	/**
	 * Get product categories on page load
	 */
	$.ajax({
		type: "get", 
		url: "<?php echo base_url('items/products/get_prod_cat_options') ?>", 
		data: "cat-id=1", 
		success: function(res)
		{	
			$('#txtProdCatParent').append(res);
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
	$('#txtProdCatParent').change(function(){
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/products/get_prod_cat_options') ?>",  
			data: "cat-id="+$(this).val(), 
			success: function(res)
			{	
				$('#txtProdCatChild1').html(res);
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
	$('#txtProdCatChild1').change(function(){
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/products/get_prod_cat_options') ?>",  
			data: "cat-id="+$(this).val(), 
			success: function(res)
			{	
				$('#txtProdCatChild2').html(res);
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	$('#lnkCreateCat-dead').click(function(){
		var parent_cat_id = $(this).attr('parent-cat-id');

		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/products/get_prod_cat_options_2') ?>",  
			//data: "cat-id="+$(this).val(), 
			success: function(res)
			{	
				$('#txtParentCat').html(res);
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});


	/**
	 * Submit create product form
	 */
	$('#formCreateProd').submit(function(event){
		
		// Prevent form's default behaviour
		event.preventDefault(); 

		$.ajax({
			type: "post", 
			url: "<?php echo base_url('items/products/create_product'); ?>", 
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
				if(res.status == 'success')
				{
					$('#resCreateProd').html(res.data);
				}
				else $('#resCreateProd').html(res.data);
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