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
	    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchMatl" placeholder="Search all products">
	</div>
	<a href="<?php echo base_url('items/products/view_create_prod'); ?>" id="lnkCreateMatl" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2 col-md-2">
		<i class="las la-plus-circle la-lg"></i> Create Product
	</a>
</div>

<table class="table table-sm table-hover border border-gainsboro-2" id="tblMatl">
	<thead>
		<tr class="bg-whitesmoke">
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Material Name
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Material Size
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Material Color
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Material Weight
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Material Category
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
		</tr>
	</thead>
</table>

<?php 
/* Footer */
//$this->load->view('items/material_script');
$this->load->view('templates/footer'); 
?>

<script>
$(document).ready(function(){

});
</script>