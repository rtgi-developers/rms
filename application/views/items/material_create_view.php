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
				<div class="col-md-6">
					<label for="txtMatlName">
						Material name &amp; color<br>
						<small class="text-muted">Enter material's name and color in their respective field</small>
					</label>
					<div class="d-flex flex-row">
						<input type="text" name="txtMatlName" id="txtMatlName" class="form-control form-control-sm mr-2 col-md-9" placeholder="Name" required>
						<input type="text" name="txtMatlColor" id="txtMatlColor" class="form-control form-control-sm mr-2 col-md-3" placeholder="Color">
					</div>
				</div>
				<div class="col-md-3">
					<label for="txtCat">
						Category <br>
						<small class="text-muted">Select material category</small>
					</label>
					<select name="txtMatlCat" id="txtMatlCat" class="form-control form-control-sm" required>
						<option value>Select category</option>
					</select>
				</div>
				<div class="col-md-3">
					<label for="txtSubCat">
						Sub Category <br>
						<small class="text-muted">Select material's sub category</small>
					</label>
					<select name="txtMatlSubCat" id="txtMatlSubCat" class="form-control form-control-sm" required>
						<option value>Select sub category</option>
					</select>
				</div>	
			</div>
			<div class="form-group row">
				<div class="col-md-3">
					<label for="txtMOQ">
						MOQ <br>
						<small class="text-muted">Minimum order qty &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMatlMOQ" id="txtMatlMOQ" class="form-control form-control-sm mr-2 text-center" placeholder="Qty">
						<select name="txtMatlMOQUnit" id="txtMatlMOQUnit" class="form-control form-control-sm mr-2 txt-uom">
							<option value>UOM</option>
							<?php echo get_uom_options('Count'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<label for="txtMatlWt">
						Weight <br>
						<small class="text-muted">Enter weight of material &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMatlWt" id="txtMatlWt" class="form-control form-control-sm text-center mr-2" placeholder="Wt">
						<select name="txtMatlWtUnit" id="txtMatlWtUnit" class="form-control form-control-sm mr-2 txt-uom">
							<option value>UOM</option>
							<?php echo get_uom_options('Weight'); ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<label for="">
						Dimensions <br>
						<small class="text-muted">Enter length, width, height &amp; uom</small>
					</label>
					<div class="d-flex flex-row">
						<input type="number" step="any" name="txtMatlLn" id="txtMatlLn" class="form-control form-control-sm text-center mx-1" placeholder="L">x
						<input type="number" step="any" name="txtMatlWd" id="txtMatlWd" class="form-control form-control-sm text-center mx-1" placeholder="W">x
						<input type="number" step="any" name="txtMatlHt" id="txtMatlHt" class="form-control form-control-sm text-center mx-1" placeholder="H">
						<select name="txtMatlDimUnit" id="txtMatlDimUnit" class="form-control form-control-sm mr-2 txt-uom">
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
$this->load->view('items/material_create_script');
$this->load->view('templates/footer'); 
?>