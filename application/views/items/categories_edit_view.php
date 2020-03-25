<!-- EDIT CATEGORY -->
<div class="modal fade" id="mdlEditCat" tabindex="-1" role="dialog" aria-labelledby="titleEditCat" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
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
						<label for="txtEditCat" class="font-weight-bold req-after col-md-4">
							Category Name
						</label>
						<div class="col-md-8">
							<input type="text" name="txtEditCat" id="txtEditCat" class="form-control form-control-sm" autocomplete="off" required>
							<small class="text-muted" id="catPath"></small>
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
<script>
    $(document).ready(function(){
        /*
        |------------------------------------------------
        | SUBMIT EDIT CATEGORY UPDATE FORM
        |------------------------------------------------
        */
        $('#formEditCat').submit(function(event){
            // Prevent form default behaviour
            event.preventDefault(); 

            // Ajax post
            $.ajax({
                type: "post", 
                url: "<?php echo base_url('items/categories/save_cat_changes'); ?>", 
                data: $(this).serialize(), 
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
                    if(resp.status == 'success') swal({title: resp.title, text: resp.data, icon: resp.status});
                    else swal({title: resp.title, text: resp.data, icon: resp.status});
                }, 
                error: function(xhr)
                {
                    var xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            });
        });

        /*
        |------------------------------------------------
        | MODAL ON CLOSE
        |------------------------------------------------
        */
        $('#mdlEditCat').on('hidden.bs.modal', function(){
            $('#formEditCat').trigger('reset');
        });
    }); 
</script>