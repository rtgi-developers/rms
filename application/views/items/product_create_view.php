<?php  
/* Header */
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resCreateProd"></div>

<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
	<a class="nav-item nav-link active" id="navTabBasicInfo" data-toggle="tab" href="#navBasicInfo" role="tab" aria-controls="navBasicInfo" aria-selected="true">Basic Info</a>
	<a class="nav-item nav-link" id="navTabPackaging" data-toggle="tab" href="#navPackaging" role="tab" aria-controls="navPackaging" aria-selected="false">Packaging</a>
</div>

<form action="" id="formCreateProd">
	<div class="tab-content d-flex flex-column" id="nav-tabContent" style="min-height: 50vh">
        <div class="tab-pane fade show active" id="navBasicInfo" role="tabpanel" aria-labelledby="navTabBasicInfo">
			<div class="form-group row">
				<div class="col-md-12">
                    <label for="txtProdCatParent">
                        Product Categories <br>
                        <small class="text-muted">Select product category and sub categories</small>
					</label>
					<div class="d-flex flex-row">
						<select name="txtProdCatParent" id="txtProdCatParent" class="custom-select custom-select-sm mr-2" required>
							<option value>Select parent category</option>
						</select>
						<select name="txtProdCatChild1" id="txtProdCatChild1" class="custom-select custom-select-sm mr-2" required>
								<option value>Select child category 1</option>
						</select>
						<select name="txtProdCatChild2" id="txtProdCatChild2" class="custom-select custom-select-sm mr-2">
								<option value>Select child category 2 (Optional)</option>
						</select>
						<a href="" id="lnkCreateCat" class="text-nowrap text-decoration-none" data-toggle="modal" data-target="#mdlCreateCat" data-backdrop="static" data-keyboard="false"><i class="las la-plus-square la-lg"></i> Create new category</a>
					</div>
				</div>
			</div>
            <div class="form-group row">
				<div class="col-md-3">
					<label for="txtProdStyleNum">
                        Product Style Number<br>
                        <small class="text-muted">Example of style number 12345-18</small>
					</label>
					<input type="text" name="txtProdStyleNum" id="txtProdStyleNum" class="form-control form-control-sm mr-2" placeholder="Style number" required>
				</div>
				<div class="col-md-9">
					<label for="txtProdName">
                        Product Name<br>
                        <small class="text-muted">Enter product descriptive name and avoid special characters as much as possible</small>
					</label>
					<input type="text" name="txtProdName" id="txtProdName" class="form-control form-control-sm mr-2 col-md9" placeholder="Name" required>
				</div>
            </div>
            <div class="form-group row">
				<div class="col-md-3">
                    <label for="txtProdColor">
                        Color<br>
                        <small class="text-muted">Enter product's base color</small>
					</label>
					<input type="text" name="txtProdColor" id="txtProdColor" class="form-control form-control-sm mr-2 col-md2" placeholder="Color" required>
				</div>
				<div class="col-md-6">
					<label for="txtProdDim">
						Size <br>
						<small class="text-muted">Product's length, width, height &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtProdLn" id="txtProdLn" class="form-control form-control-sm text-center mx-1" placeholder="L" required>x
						<input type="number" step="any" name="txtProdWd" id="txtProdWd" class="form-control form-control-sm text-center mx-1" placeholder="W" required>x
						<input type="number" step="any" name="txtProdHt" id="txtProdHt" class="form-control form-control-sm text-center mx-1" placeholder="H">
						<select name="txtProdSizeUom" id="txtProdSizeUom" class="custom-select custom-select-sm mr-2 txt-uom-length" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Length'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<label for="txtProdWt">
						Net Weight <br>
						<small class="text-muted">Product's per unit net weight &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtProdWt" id="txtProdWt" class="form-control form-control-sm mr-2 text-center" placeholder="Net Wt" required>
						<select name="txtProdWtUom" id="txtProdWtUom" class="custom-select custom-select-sm mr-2 txt-uom-weight" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Weight'); ?>
						</select>
					</div>
				</div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="txtProdMoq">
                        MOQ <br>
                        <small class="text-muted">Minimum order quantity &amp; uom</small>
                    </label>
                    <div class="d-flex flex-row">
                        <input type="number" step="any" name="txtProdMoq" id="txtProdMoq" class="form-control form-control-sm mr-2 text-center" placeholder="Qty" required>
                        <select name="txtProdMoqUom" id="txtProdMoqUom" class="custom-select custom-select-sm mr-2 txt-uom-count" required>
                            <option value>UOM</option>
							<?php echo get_uom_options('Count'); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="txtProdMfgTime">
                        Manufacturing Time <span class="text-muted">(optional)</span><br>
                        <small class="text-muted">Time required in manufacturing &amp; uom</small>
                    </label>
                    <div class="d-flex flex-row">
                        <input type="number" step="any" name="txtProdMfgTime" id="txtProdMfgTime" class="form-control form-control-sm mr-2 text-center" placeholder="Qty">
                        <select name="txtProdMfgTimeUom" id="txtProdMfgTimeUom" class="custom-select custom-select-sm mr-2 txt-uom-time">
                            <option value>UOM</option>
							<?php echo get_uom_options('Time'); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="txtProdCost">
                        Cost <span class="text-muted">(optional)</span><br>
                        <small class="text-muted">Product's manufacturing cost &amp; currency</small>
                    </label>
                    <div class="d-flex flex-row">
                        <input type="number" step="any" name="txtProdCost" id="txtProdCost" class="form-control form-control-sm mr-2 text-center" placeholder="Cost">
                        <select name="txtProdCostCurr" id="txtProdCostCurr" class="custom-select custom-select-sm mr-2 txt-curr-code">
                            <option value>Currency</option>
							<?php echo get_curr_options(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="txtProdPrice">
                        Price <span class="text-muted">(optional)</span><br>
                        <small class="text-muted">Product's selling price &amp; currency</small>
                    </label>
                    <div class="d-flex flex-row">
                        <input type="number" step="any" name="txtProdPrice" id="txtProdPrice" class="form-control form-control-sm mr-2 text-center" placeholder="Price">
                        <select name="txtProdPriceCurr" id="txtProdPriceCurr" class="custom-select custom-select-sm mr-2 txt-curr-code">
                            <option value>Currency</option>
							<?php echo get_curr_options(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="navPackaging" role="tabpanel" aria-labelledby="navTabPackaging">
			<div class="form-group row">
				<div class="col-md-3">
					<h4>Inner Packaging</h4>	
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-3">
					<label for="txtIpQty">
						Inner Pack Quantity <br>
						<small class="text-muted">Number of units in a pack</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtIpQty" id="txtIpQty" class="form-control form-control-sm text-center mr-2" placeholder="Qty" required>
						<select name="txtIpQtyUom" id="txtIpQtyUom" class="custom-select custom-select-sm mr-2 txt-uom-count" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Count'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<label for="txtIpWt">
						Inner Pack Weight <br>
						<small class="text-muted">Packaged product weight &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtIpWt" id="txtIpWt" class="form-control form-control-sm text-center mr-2" placeholder="Wt" required>
						<select name="txtIpWtUom" id="txtIpWtUom" class="custom-select custom-select-sm mr-2 txt-uom-weight" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Weight'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<label for="txtIpDim">
						Inner Pack Dimension <br>
						<small class="text-muted">Packaged product's length, width, height &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtIpLn" id="txtIpLn" class="form-control form-control-sm text-center mx-1" placeholder="L" required>x
						<input type="number" step="any" name="txtIpWd" id="txtIpWd" class="form-control form-control-sm text-center mx-1" placeholder="W" required>x
						<input type="number" step="any" name="txtIpHt" id="txtIpHt" class="form-control form-control-sm text-center mx-1" placeholder="H" required>
						<select name="txtIpDimUom" id="txtIpDimUom" class="custom-select custom-select-sm mr-2 txt-uom-length" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Length'); ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group row mt-4">
				<div class="col-md-3">
					<h4>Master Packaging</h4>	
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-3">
					<label for="txtMpQty">
						Master Pack Quantity <br>
						<small class="text-muted">Number of units in a pack &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMpQty" id="txtMpQty" class="form-control form-control-sm text-center mr-2" placeholder="Qty" required>
						<select name="txtMpQtyUom" id="txtMpQtyUom" class="custom-select custom-select-sm mr-2 txt-uom-count" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Count'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<label for="txtMpWt">
						Master Pack Weight <br>
						<small class="text-muted">Packaged product weight &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMpWt" id="txtMpWt" class="form-control form-control-sm text-center mr-2" placeholder="Wt" required>
						<select name="txtMpWtUom" id="txtMpWtUom" class="custom-select custom-select-sm mr-2 txt-uom-weight" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Weight'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<label for="txtMpDim">
						Master Pack Dimension <br>
						<small class="text-muted">Packaged product's length, width, height &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMpLn" id="txtMpLn" class="form-control form-control-sm text-center mx-1" placeholder="L" required>x
						<input type="number" step="any" name="txtMpWd" id="txtMpWd" class="form-control form-control-sm text-center mx-1" placeholder="W" required>x
						<input type="number" step="any" name="txtMpHt" id="txtMpHt" class="form-control form-control-sm text-center mx-1" placeholder="H" required>
						<select name="txtMpDimUom" id="txtMpDimUom" class="custom-select custom-select-sm mr-2 txt-uom-length" required>
							<option value>UOM</option>
							<?php echo get_uom_options('Length'); ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="form-group row mt-auto">
		<div class="col-md-12 text-right">
			<span class="text-muted small">
				<i class="las la-info-circle la-lg text-primary"></i>
				Enter all the required fields in all tabs to enable "Create Product" button.
			</span>	
			<button type="submit" name="btnCreateProd" id="btnCreateProd" class="btn btn-sm btn-primary" disabled>Create Product</button>
			<a href="javascript: history.back();" class="btn btn-sm btn-secondary">Cancel</a>		
		</div>
	</div>
</form>


<?php 
/* Footer */
$this->load->view('items/categories_create_view', [ 'cat_id' => 1]);
$this->load->view('items/product_create_script');
$this->load->view('templates/footer'); 
?>