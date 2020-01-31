<?php  
/* Header */
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resCat"></div>

<?php echo $table_cat; ?>

<!-- CREATE CATEGORY -->
<div class="modal fade" id="mdlCreateCat" tabindex="-1" role="dialog" aria-labelledby="titleCreateCat" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top" role="document">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header rounded-0 bg-slategray text-white">
				<h5 class="modal-title" id="titleCreateCat">Create Category</h5>
		        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="las la-times"></i></span>
		        </button>
			</div>
			<form id="formCreateCat">
				<div class="modal-body px-4">
					<div class="form-group row">
						<label for="txtCatType" class="font-weight-bold req-after col-md-4">
							Category type
						</label>
						<div class="col-md-8">
							<select name="txtCatType" id="txtCatType" class="form-control form-control-sm" required>
								<option value="">Select</option>
								<option value="Material">Material</option>
								<option value="Product">Product</option>
							</select>
							<small class="text-muted">
								Category type material or product.
							</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtCat" class="font-weight-bold req-after col-md-4">Category</label>
						<div class="col-md-8">
							<input list="listCat" name="txtCat" id="txtCat" class="form-control form-control-sm" autocomplete="off" required>
							<datalist id="listCat"></datalist>
							<small class="text-muted">Select category or enter for new.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtSubCat" class="font-weight-bold req-after col-md-4">
							Sub category
						</label>
						<div class="col-md-8">
							<input list="listSubCat" name="txtSubCat" id="txtSubCat" class="form-control form-control-sm" autocomplete="off" required>
							<datalist id="listSubCat"></datalist>
							<small class="text-muted">Select sub category or enter for new.</small><br>
							<span><i class="las la-exclamation-triangle la-lg text-danger"></i> <small class="text-muted">If you select an already existing sub category your create request will result in failure.</small></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="btnCreateCat" id="btnCreateCat" class="btn btn-primary btn-sm">
						Create Category
					</button>
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
						Close
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- EDIT CATEGORY -->
<div class="modal fade" id="mdlEditCat" tabindex="-1" role="dialog" aria-labelledby="titleEditCat" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top" role="document">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header rounded-0 bg-slategray text-white">
				<h5 class="modal-title" id="titleEditCat">Edit Category</h5>
		        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="las la-times"></i></span>
		        </button>
			</div>
			<form id="formEditCat">
				<div class="modal-body px-4">
					<div class="form-group row content-hide">
						<label for="txtEditCatId" class="font-weight-bold req-after col-md-4">
							Category id
						</label>
						<div class="col-md-8">
							<input type="text" id="txtEditCatId" name="txtEditCatId" class="form-control form-control-sm" required>
							<small class="text-muted">Do not change the category id.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditCatType" class="font-weight-bold req-after col-md-4">
							Category type
						</label>
						<div class="col-md-8">
							<select name="txtEditCatType" id="txtEditCatType" class="form-control form-control-sm" required>
								<option value="">Select</option>
								<option value="Material">Material</option>
								<option value="Product">Product</option>
							</select>
							<small class="text-muted">
								Category type material or product.
							</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditCat" class="font-weight-bold req-after col-md-4">
							Category
						</label>
						<div class="col-md-8">
							<input list="listEditCat" name="txtEditCat" id="txtEditCat" class="form-control form-control-sm" autocomplete="off" required>
							<datalist id="listEditCat"></datalist>
							<small class="text-muted">Select category or enter for new.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditSubCat" class="font-weight-bold req-after col-md-4">
							Sub category
						</label>
						<div class="col-md-8">
							<input list="listEditSubCat" name="txtEditSubCat" id="txtEditSubCat" class="form-control form-control-sm" autocomplete="off" required>
							<datalist id="listEditSubCat"></datalist>
							<small class="text-muted">Select sub category or enter for new.</small>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="btnUpdCat" id="btnUpdCat" class="btn btn-primary btn-sm">
						Save Changes
					</button>
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
						Close
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
/* Footer */
$this->load->view('items/categories_script');
$this->load->view('templates/footer'); 
?>