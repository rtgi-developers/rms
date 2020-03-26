<?php  
/* Header */
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<!-- Materials table -->
<style>
	.col-wd-200{
		word-wrap: break-word;
		min-width: 200px;
		max-width: 200px;
	}
	.dataTables_filter, .dataTables_length, .dataTables_inf{
		display: none;
	}
	.table-tool-input:focus {
	    outline: 0 !important;
	    border-color: initial;
	    box-shadow: none;
	    background-color: white !important;
	}
</style>

<div class="d-flex flex-row no-gutters mb-2">
	<div class="input-group pr-2 col-md-10">
	    <span class="input-group-prepend">
	    	<div class="input-group-text order-right-0 border bg-whitesmoke">
	    		<i class="la la-search"></i>
	    	</div>
	    </span>
	    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchProd" placeholder="Search all products">
	</div>
	<a href="<?php echo base_url('items/products/view_create_prod'); ?>" id="lnkCreateProd" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2 col-md-2">
		<i class="las la-plus-circle la-lg"></i> Create Product
	</a>
</div>

<table class="table table-sm table-hover border border-gainsboro-2" id="tblProd">
	<thead>
		<tr class="bg-whitesmoke">
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Style #
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Product Name
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Product Size
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Product Color
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Product Category
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
		</tr>
	</thead>
</table>

<?php 
/* Footer */
//$this->load->view('items/product_script');
$this->load->view('templates/footer'); 
?>

<script>
$(document).ready(function(){
	/**
	 * Get all products on page load using server side datatable
	 */
	var dt_prod = $('#tblProd').DataTable({
		"processing": true, 
		"serverSide": true, 
		"ordering": true,
		"ajax": {
			type: "post", 
			url: "<?php echo base_url('items/products/get_prod_serverside'); ?>", 
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
				$("#tblMatl").html('<tbody><tr><td class="align-middle text-center" colspan="4">No products found!</td></tr></tbody>');
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
			/**
			 * Delete product
			 */
			$('.lnk-del-prod').each(function(){
				$(this).click(function(){
					var prod_id  = $(this).attr('prod-id');
					var del_row  = $(this).closest('tr'); 

					// Delete confirmation
					swal({
						title: "Confirm delete!", 
						text: "Are you sure you want to delete this product?", 
						icon: "warning", 
						buttons: ["No", "Yes"],
						dangerMode: true
					})
					.then((willDelete) => {
						if(willDelete) ajax_del_prod(prod_id, del_row);
					})
				}); 
			});
		}
	});

	/**
	 * Search products table
	 */
	$("#txtSearchProd").on('keyup', function(){
		dt_prod.search($('#txtSearchProd').val()).draw();
	});

	/**
	 * Ajax request to delete a product 
	 * 
	 * @param  int 		prodid  	Product id
	 * @param  object 	delrow 		Row to be deleted
	 * @return alert
	 */
	function ajax_del_prod(prodid, delrow)
	{
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/products/delete_prod'); ?>", 
			data: "prodid="+prodid, 
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