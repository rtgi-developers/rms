<!-- CREATE CATEGORY -->
<div class="modal fade" id="mdlCreateCat" tabindex="-1" role="dialog" aria-labelledby="titleCreateCat" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header rounded-0 bg-slategray text-white">
				<h5 class="modal-title" id="titleCreateCat">Create Category</h5>
		        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="las la-times"></i></span>
		        </button>
			</div>
			<form id="formCreateCat">
				<div class="modal-body px-4">
                    <div class="form-group row content-hide">
                        <div class="col-md-12">
                            <label for="txtProdStyleNum">
                                Category type<br>
                                <small class="text-muted">Category type materials or products.</small>
                            </label>
                            <input type="text" name="txtCatType" id="txtCatType" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="txtCat">
                                Category<br>
                                <small class="text-muted">Enter new category name</small>
                            </label>
                            <input type="text" name="txtCat" id="txtCat" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="txtParentCat">
                                Parent category <span class="text-muted">(optional)</span><br>
                                <small class="text-muted">Select none if is itself a parent category</small>
                            </label>
                            <select name="txtParentCat" id="txtParentCat" class="custom-select custom-select-sm" required>
							<option value>-- Parent Category --</option>
						</select>
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