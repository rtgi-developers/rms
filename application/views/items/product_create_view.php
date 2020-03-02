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
				<div class="col-md-3">
                    <label for="txtProdCat">
                        Category <br>
                        <small class="text-muted">Select category to load sub category</small>
                    </label>
                    <select name="txtProdCat" id="txtProdCat" class="custom-select custom-select-sm" required>
                        <option value>Select category</option>
					</select>
                </div>
                <div class="col-md-9">
                    <label for="txtProdSubCat">
                        Sub Category <br>
                        <small class="text-muted">Select product sub category</small>
					</label>
					<div class="d-flex flex-row">
						<select name="txtProdSubCat" id="txtProdSubCat" class="custom-select custom-select-sm col-md-3 mr-2" required>
							<option value>Select sub category</option>
						</select>
						<span>Category or sub category not found? <a href="" class="text-decoration-none">Create Category</a></span>
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
                        <small class="text-muted">Enter product descriptive name avoid special characters as much as possible</small>
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
						<select name="txtProdDimUom" id="txtProdDimUom" class="custom-select custom-select-sm mr-2 txt-uom-length" required>
							<option value>UOM</option>
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
                            <option value>CURR</option>
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
                            <option value>CURR</option>
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
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="form-group row mt-auto">
		<div class="col-md-12 text-right">
			<button type="submit" name="btnCreateProd" id="btnCreateProd" class="btn btn-sm btn-primary" disabled>Create Product</button>
			<a href="javascript: history.back();" class="btn btn-sm btn-secondary">Cancel</a>		
		</div>
	</div>
</form>

<?php 
/* Footer */
//$this->load->view('items/material_create_script');
$this->load->view('templates/footer'); 
?>

<script>
$(document).ready(function(){
	// Highlight all required fields
	$('[required]').css('border-color', 'red');

	/**
	 * Enable create product submit button 
	 * when all required fields have value
	 */
	$('[required]').on('keyup change paste', function()
	{	
		// Start counter to count number of req inputs with values
		var reqInputsWithValues = 0;

		// Loop through each required fields
		$('[required]').each(function(){
			if($(this).val())
			{
				// Remove red border from req inputs
				$(this).css('border-color', '');

				// Increase the req inputs values as they filled up
				reqInputsWithValues += 1;
			}
			else $(this).css('border-color', 'red');
		});

		// Enable/Disable submit button
		if(reqInputsWithValues == $('[required]').length) 
		{
			$('#btnCreateProd').prop("disabled", false); 
		}
		else {
			$('#btnCreateProd').prop("disabled", true); 
		}
	});

	/**
	 * Get product categories on page load
	 */
	$.ajax({
		type: "get", 
		url: "<?php echo base_url('items/products/get_prod_cat_options/print') ?>",  
		success: function(res)
		{	
			$('#txtProdCat').append(res);
		}, 
		error: function(xhr)
		{
			var xhr_text = xhr.status+" "+xhr.statusText;
			swal({title: "Request Error!", text: xhr_text, icon: "error"});
		}
	});

	/**
	 * Get unit of measurements
	 */
	get_uom('Count', '.txt-uom-count'); 
	get_uom('Length', '.txt-uom-length'); 
	get_uom('Weight', '.txt-uom-weight'); 
	get_uom('Time', '.txt-uom-time'); 

	function get_uom(unit_type, elem_class)
	{
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('systems/uom/get_uom_options') ?>",  
			data: "unittype="+unit_type,  
			success: function(res)
			{	
				$(elem_class).append(res);
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	}

	/**
	 * Ajax request to get currency options
	 */
	$.ajax({
		type: "get", 
		url: "<?php echo base_url('systems/currencies/get_curr_options') ?>",  
		data: "currtype=Enabled",  
		success: function(res)
		{	
			$('.txt-curr-code').append(res);
		}, 
		error: function(xhr)
		{
			var xhr_text = xhr.status+" "+xhr.statusText;
			swal({title: "Request Error!", text: xhr_text, icon: "error"});
		}
	});
	
	/**
	 * Get products sub category on changing category
	 */
	$('#txtProdCat').on('change', function(){
		$.ajax({
			type: "get", 
			url: "<?php echo base_url('items/products/get_prod_subcat_options/print'); ?>", 
			data: "catname="+$(this).val(), 
			success: function(res)
			{	
				$('#txtProdSubCat').html(res);
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});

	/**
	 * Submit create product form
	 */
	$('#formCreateProd').submit(function(event){
		event.preventDefault(); 

		$.ajax({
			type: "post", 
			url: "<?php echo base_url('items/products/create_product'); ?>", 
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
				if(res.status == 'success')
				{
					$('#resCreateProd').html(res.data);
				}
				else $('#resCreateProd').html(res.data);
			}, 
			error: function(xhr)
			{
				var xhr_text = xhr.status+" "+xhr.statusText;
				swal({title: "Request Error!", text: xhr_text, icon: "error"});
			}
		});
	});
}); 
</script>