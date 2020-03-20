<script>
$(document).ready(function(){
	// Highlight all required fields
	$('#formCreateProd [required]').css('border-color', 'red');

	/**
	 * Keep all other tabs hidden exept categories
	 * And enable them only categories are filled
	 */
	$('#navProdCat [required]').on('change', function()
	{	
		// Start counter to count number of req inputs with values
		var reqInputsWithValues = 0;
		
		// Loop through each required fields
		$('#navProdCat [required]').each(function(){
			if($(this).val())
			{
				// Remove red border from req inputs
				$(this).css('border-color', '');

				// Increase the req inputs values as they filled up
				reqInputsWithValues += 1;
			}
			else $(this).css('border-color', 'red');
		});

		// Show/Hide other hidden tabs
		if(reqInputsWithValues == $('#navProdCat [required]').length) 
		{
			$('.nav-link-next').show();  
		}
		else {
			$('.nav-link-next').hide(); 
		}
	});

	/**
	 * Enable create product submit button 
	 * when all required fields have value
	 */
	$('#formCreateProd [required]').on('keyup change paste', function()
	{	
		// Start counter to count number of req inputs with values
		var reqInputsWithValues = 0;
		
		// Loop through each required fields
		$('#formCreateProd [required]').each(function(){
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
		if(reqInputsWithValues == $('#formCreateProd [required]').length) 
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
			$('#txtProdCatParent').html(res);
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
				$('#txtProdCatChild2').html(res);
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