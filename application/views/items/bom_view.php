<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<!-- <h4><?php echo $prod_name; ?></h4> -->

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

<div class="card rounded-0 mb-3">
	<div class="card-header font-weight-bold"><?php echo strtoupper($prod_name); ?> </div>
	<div class="card-body pb-0">
		<form id="formAddBom">
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="txtProdId" class="sr-only">Product Id</label>
					<input type="text" name="txtProdId" id="txtProdId" class="form-contol form-control-sm content-hide" value="<?php echo $prod_id; ?>" required>

					<label for="txtMatlId" class="">
						Material Id
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" data-html="false" title="Enter material id or search by material name or color">
							<i class="las la-info-circle"></i>
						</a>
					</label>
					<input list="listMatl" name="txtMatlId" id="txtMatlId" class="form-control form-control-sm" placeholder="" required>
					<datalist id="listMatl"></datalist>
				</div>
				<div class="form-group col-md-5">
					<label for="txtMatlName" class="">
						Material Description
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" data-html="false" title="Please enter material id to get material description.">
							<i class="las la-info-circle"></i>
						</a>
					</label>
					<input type="text" name="txtMatlName" id="txtMatlName" class="form-control form-control-sm" readonly required>
				</div>
				<div class="form-group col-md-4">
					<label for="txtMatlQty" class="">Material quantity &amp; uom</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMatlQty" id="txtMatlQty" class="form-control form-control-sm text-center mr-2 col-md-4" placeholder="Qty" required>
						<select name="txtMatlQtyUom" id="txtMatlQtyUom" class="custom-select custom-select-sm mr-2 col-md-4" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Count'); ?>
							<?php echo get_uom_options('Length'); ?>
							<?php echo get_uom_options('Weight'); ?>
							<?php echo get_uom_options('Volume'); ?>
						</select>
						<button type="submit" name="btnAddBom" id="btnAddBom" class="btn btn-sm btn-primary col-md-4">Add Material</button>
					</div>
				</div>
				<div class="col-md-3">
					
				</div>
			</div>
		</form>
	</div>
</div>

<div class="d-flex flex-row no-gutters mb-2">
	<div class="input-group col-md-12">
	    <span class="input-group-prepend">
	    	<div class="input-group-text order-right-0 border bg-whitesmoke">
	    		<i class="la la-search"></i>
	    	</div>
	    </span>
	    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchBom" placeholder="Search all materials of this product">
	</div>
</div>

<table class="table table-sm table-hover border border-gainsboro-2" id="tblBom">
	<thead>
		<tr class="bg-whitesmoke">
		<td class="align-middle text-nowrap font-weight-bold small py-2 text-center">
				Material Id
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Material Description
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-center">
				Quantity
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				UOM
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
		</tr>
	</thead>
	<tbody>
		<?php echo $bom_table; ?>
	</tbody>
</table>

<?php 
$this->load->view('items/bom_script'); 
$this->load->view('templates/footer'); 
?>
