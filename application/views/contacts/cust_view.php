<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>
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
	    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchCust" placeholder="Search customers">
	</div>
	<a href="<?php echo base_url('contacts/customers/view_create_cust'); ?>" id="lnkCreateCust" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2 col-md-2">
		<i class="las la-plus-circle la-lg"></i> Create Customer
	</a>
</div>

<table class="table table-sm table-hover border border-gainsboro-2" id="tblCust">
	<thead>
		<tr class="bg-whitesmoke">
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-center">
				Customer Id
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Customer Name
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Customer Email
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Customer Phone
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
		</tr>
	</thead>
</table>

<?php 
$this->load->view('templates/footer'); 
?>
<script>
	$(document).ready(function(){
		/**
		* Get all products on page load using server side datatable
		*/
		var dt_cust = $('#tblCust').DataTable({
			"processing": true, 
			"serverSide": true, 
			"ordering": true,
			"ajax": {
				type: "post", 
				url: "<?php echo base_url('contacts/customers/get_cust_serverside'); ?>", 
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
					$("#tblCust").html('<tbody><tr><td class="align-middle text-center" colspan="4">No customers found!</td></tr></tbody>');
				}
			}, 
			"createdRow": function(row, data, index)
			{
				$('td', row).addClass('align-middle');
				$('td:eq(0)', row).addClass('text-center');
				$('td:eq(3)', row).addClass('text-left');
				$('td:eq(1)', row).addClass('text-left');
			}, 
			"drawCallback": function(settings, json)
			{	
				/**
				* Delete product
				*/
				$('.lnk-del-cust').each(function(){
					$(this).click(function(){
						var cust_id  = $(this).attr('cust-id');
						var del_row  = $(this).closest('tr'); 

						// Delete confirmation
						swal({
							title: "Confirm delete!", 
							text: "Are you sure you want to delete this customer?", 
							icon: "warning", 
							buttons: ["No", "Yes"],
							dangerMode: true
						})
						.then((willDelete) => {
							if(willDelete) ajax_del_cust(cust_id, del_row);
						})
					}); 
				});
			}
		});

		/**
		* Search products table
		*/
		$("#txtSearchCust").on('keyup', function(){
			dt_cust.search($('#txtSearchCust').val()).draw();
		});

		/**
		* Ajax request to delete a product 
		* 
		* @param  int 		prodid  	Product id
		* @param  object 	delrow 		Row to be deleted
		* @return alert
		*/
		function ajax_del_cust(cust_id, del_row)
		{
			$.ajax({
				type: "get", 
				url: "<?php echo base_url('contacts/products/delete_cust'); ?>", 
				data: "custid="+cust_id, 
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
						// Success message
						swal({title: res.title, text: res.data, icon: res.status});

						// Remove verify button
						del_row.hide('slow', function(){del_row.remove();});
					}
					else swal({title: res.title, text: res.data, icon: res.status});
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