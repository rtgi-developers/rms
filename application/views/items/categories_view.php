<?php  
/* Header */
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resCat"></div>

<style>
.col-wd-200{
	word-wrap: break-word;
	min-width: 200px;
	max-width: 200px;
}
.dataTables_filter, .dataTables_length, .dataTables_info{
	display: none;
}
.table-tool-input:focus {
	outline: 0 !important;
	border-color: initial;
	box-shadow: none;
	background-color: white !important;
}
</style>

<div class="row mb-2">
	<div class="col-md-10 pr-0">
		<div class="input-group">
			<span class="input-group-prepend">
				<div class="input-group-text order-right-0 border bg-whitesmoke">
					<i class="la la-search"></i>
				</div>
			</span>
			<input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchCat" placeholder="Search all categories">
		</div>
	</div>
	<div class="col-md-2 text-right export-buttons">
		<a href="#" id="lnkCreateCat" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2" data-toggle="modal" data-target="#mdlCreateCat" data-backdrop="static" data-keyboard="false">
			<i class="las la-plus-circle la-lg"></i> Create Category
		</a>
	</div>
</div>

<table class="table table-sm table-hover border border-gainsboro-2" id="tblCat">
	<thead>
		<tr class="bg-whitesmoke">
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-center">
				Category Id
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Category
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
		</tr>
	</thead>
</table>

<?php 
/* Footer */
$this->load->view('items/categories_create_view', [ 'cat_name' => 'All']);
$this->load->view('items/categories_edit_view'); 
$this->load->view('items/categories_script');
$this->load->view('templates/footer'); 
?>