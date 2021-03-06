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
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="txtNewCat">
                                <span class="req-after">Category</span><br>
                                <small class="text-muted">Enter new category name</small>
                            </label>
                            <input type="text" name="txtNewCat" id="txtNewCat" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="txtParentCat">
                                <span class="req-after">Parent category</span> <br>
                                <small class="text-muted">Select none if is itself a parent category</small>
                            </label>
                            <select name="txtParentCat" id="txtParentCat" class="custom-select custom-select-sm" required>
							<option value>-- Parent Category --</option>
                            <?php 
                                if($cat_name == "All")
                                {
                                    echo get_all_subcat_options(get_cat_id_by_name('Products'));
                                    echo get_all_subcat_options(get_cat_id_by_name('Materials'));
                                }
                                else {
                                    echo get_all_subcat_options(get_cat_id_by_name($cat_name));
                                }
                             ?>
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

<script>
    $(document).ready(function(){
        /**
         * Submit create category form 
         */
        $('#formCreateCat').submit(function(event){
            event.preventDefault(); 

            $.ajax({
                type: "post", 
                url: "<?php echo base_url('items/categories/create_cat'); ?>", 
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
                success: function(res)
                {
                    if(res.status == true)
                    {
                        swal({title: res.title, text: res.data, icon: res.status});
                    }
                    else swal({title: res.title, text: res.data, icon: res.status});
                }, 
                error: function(xhr)
                {
                    var xhr_text = xhr.status+" "+xhr.statusText;
			        swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            });
        });

        /**
         * Modal create category on close
         *
         * Reload parent page: 
         * Blocked because its not a good option and will cause huge problem for the user
         * if he/she has entered a lot of product details.
         * 
         * Better replaced with a custom message upon successfull category creation
         * that reload the parent page to get the newly created category.
         *
         */
        
        $('#mdlCreateCat').on('hidden.bs.modal', function(){
            // Reset form on close 
            $('#formCreateCat').trigger('reset'); 

            // Reload parent page on close
            // window.location.reload(); 
        });  
    }); 

    
</script>