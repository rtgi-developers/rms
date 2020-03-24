<?php  
/* Header */
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resCreateMatl"></div>

<form id="formCreateMatl">
	<div class="card rounded-0">
		<div class="card-body">
			<div class="form-group row">
				<div class="col-md-12">
					<label for="txtMatlCat">
						Material Categories <br>
						<small class="text-muted">Select materials category and sub categories to enable other tabs</small>
					</label>
					<div class="d-flex flex-row">
						<select name="txtMatlCat" id="txtMatlCat" class="custom-select custom-select-sm mr-2" required>
							<option value>-- Select Category --</option>
						</select>
						<select name="txtMatlSubCat1" id="txtMatlSubCat1" class="custom-select custom-select-sm mr-2" required>
							<option value>-- Select Category --</option>
						</select>
						<select name="txtMatlSubCat2" id="txtMatlSubCat2" class="custom-select custom-select-sm mr-2">
							<option value>-- Select Category --</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<div class="alert alert-secondary rounded-0" role="alert">
						Can't find your category? <a href="" id="lnkCreateCat" class="text-nowrap text-decoration-none" data-toggle="modal" data-target="#mdlCreateCat" data-backdrop="static" data-keyboard="false"><!--<i class="las la-plus-square la-lg"></i>--> Create new category</a>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<label for="txtMatlName">
						Material name &amp; color<br>
						<small class="text-muted">Enter material's name and color in their respective field</small>
					</label>
					<div class="d-flex flex-row">
						<input type="text" name="txtMatlName" id="txtMatlName" class="form-control form-control-sm mr-2 col-md-9" placeholder="Name" required>
						<input type="text" name="txtMatlColor" id="txtMatlColor" class="form-control form-control-sm mr-2 col-md-3" placeholder="Color">
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-3">
					<label for="txtMatlMoqUom">
						MOQ <br>
						<small class="text-muted">Minimum order qty &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMatlMoq" id="txtMatlMoq" class="form-control form-control-sm mr-2 text-center" placeholder="Qty">
						<select name="txtMatlMoqUom" id="txtMatlMoqUom" class="custom-select custom-select-sm mr-2 txt-uom">
							<option value>UOM</option>
							<?php echo get_uom_options('Count'); ?>
							<?php echo get_uom_options('Length'); ?>
							<?php echo get_uom_options('Weight'); ?>
							<?php echo get_uom_options('Volume'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<label for="txtMatlWtUom">
						Weight <br>
						<small class="text-muted">Enter weight of material &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMatlWt" id="txtMatlWt" class="form-control form-control-sm text-center mr-2" placeholder="Wt">
						<select name="txtMatlWtUom" id="txtMatlWtUom" class="custom-select custom-select-sm mr-2 txt-uom">
							<option value>UOM</option>
							<?php echo get_uom_options('Weight'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<label for="txtMatlSizeUom">
						Size <br>
						<small class="text-muted">Enter length, width, height &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMatlLn" id="txtMatlLn" class="form-control form-control-sm text-center mx-1" placeholder="L">x
						<input type="number" step="any" name="txtMatlWd" id="txtMatlWd" class="form-control form-control-sm text-center mx-1" placeholder="W">x
						<input type="number" step="any" name="txtMatlHt" id="txtMatlHt" class="form-control form-control-sm text-center mx-1" placeholder="H">
						<select name="txtMatlSizeUom" id="txtMatlSizeUom" class="custom-select custom-select-sm mr-2 txt-uom">
							<option value>UOM</option>
							<?php echo get_uom_options('Length'); ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group row mt-3">
		<div class="col-md-12 text-right">
			<button type="submit" name="btnCreateMatl" id="btnCreateMatl" class="btn btn-sm btn-primary">Create Material</button>
			<a href="javascript: history.back();" class="btn btn-sm btn-secondary">Cancel</a>		
		</div>
	</div>
</form>

<?php 
/* Footer */
$this->load->view('items/categories_create_view', [ 'cat_name' => 'Materials']);
$this->load->view('items/material_create_script');
$this->load->view('templates/footer'); 
?>