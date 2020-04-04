<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

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
	<div class="card-header font-weight-bold"><?php echo $cust_name; ?> </div>
	<div class="card-body pb-0">
		<form id="formAddCustAddr">
            <div class="form-row content-hide">
                <div class="form-group col-md-2">
					<label for="txtCustId" class="sr-only req-after">Customer Id</label>
					<input type="text" name="txtCustId" id="txtCustId" class="form-contol form-control-sm content-hide" value="<?php echo $cust_id; ?>" required>
				</div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtCustAddr1" class="font-weight-bold req-after">Address Line 1</label>
                    <input type="text" name="txtCustAddr1" id="txtCustAddr1" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtCustAddr2" class="font-weight-bold">Address Line 2</label>
                    <input type="text" name="txtCustAddr2" id="txtCustAddr2" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="txtCustCity" class="font-weight-bold req-after">City</label>
                    <input type="text" name="txtCustCity" id="txtCustCity" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-3">
                    <label for="txtCustState" class="font-weight-bold req-after">State</label>
                    <input type="text" name="txtCustState" id="txtCustState" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-3">
                    <label for="txtCustPostalCode" class="font-weight-bold req-after">Postal Code</label>
                    <input type="text" name="txtCustPostalCode" id="txtCustPostalCode" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-3">
                    <label for="txtCustCountry" class="font-weight-bold req-after">Country</label>
                    <input type="text" name="txtCustCountry" id="txtCustCountry" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 text-right">
                    <button type="submit" id="btnAddCustAddr" class="btn btn-sm btn-primary">Add Address</button>
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
	    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchCustAddr" placeholder="Search all addressed of this customer">
	</div>
</div>

<table class="table table-sm table-hover border border-gainsboro-2" id="tblCustAddr">
	<thead>
		<tr class="bg-whitesmoke">
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Addresses
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
		</tr>
	</thead>
	<tbody>
		<?php echo $cust_addr_table; ?>
	</tbody>
</table>

<?php 
//$this->load->view('items/bom_script'); 
$this->load->view('templates/footer'); 
?>
<script>
    $(document).ready(function(){
        /**
        * Submit add custmer address form 
        */
        $('#formAddCustAddr').submit(function(event){
            // Prevent default
            event.preventDefault(); 

            // Ajax form submit
            $.ajax({
                type: "post", 
                url: "<?php echo base_url('contacts/customers/add_cust_addr'); ?>", 
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
                        $('#tblCustAddr').prepend(res.data).fadeIn('slow'); 
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
        * Initialize datatable on customer address table
        */
        var dt_cust_addr = $('#tblCustAddr').DataTable({
            fixedHeader: {headerOffset: $('#topNav').outerHeight()},
            "aaSorting": [], 
            "order": [[ 1, "desc" ]],
            "paging": true,
        }); 

        /**
        * Search customer addresses datatable
        */
        $('#txtSearchCustAddr').on('keyup', function(){
            dt_cust_addr.search($('#txtSearchCustAddr').val()).draw();
        });

        /**
        * Delete customer address
        */
        $('#tblCustAddr').on('click', '.lnk-del-cust-addr', function(){
            
            // Variables to be used further
            var cust_id        = $(this).attr('cust-id');
            var cust_addr_id   = $(this).attr('cust-addr-id');
            var del_row        = $(this).closest('tr');

            // Alert user before delete
            swal({
                title: "Confirm Delete!", 
                text: "Are you sure you want to delete this address?", 
                icon: "warning", 
                buttons: ["No", "Yes"], 
                dangerMode: true
            })
            .then((willdelete) => {
                if(willdelete) ajax_del_cust_addr(cust_addr_id, cust_id, del_row);
            }); 
        });

        /**
        * Function to delete customer address
        * 
        * @param	integer 	cust_id 	Customer id
        * @param	Object		del_row		Html deleted row 
        * @return Mix
        */
        function ajax_del_cust_addr(cust_addr_id, cust_id, del_row)
        {
            $.ajax({
                type: "get", 
                url: "<?php echo base_url('contacts/customers/delete_cust_addr'); ?>", 
                data: "custid="+cust_id+"&custaddrid="+cust_addr_id,  
                dataType: "json", 
                beforeSend: function()
                {
                    $('#loader').show()
                }, 
                complete: function()
                {
                    $('#loader').hide()
                }, 
                success: function(res)
                {
                    if(res.status == 'success') 
                    {	
                        // Successfull deletion message
                        swal({title: res.title, text: res.data, icon: res.status});
                        
                        // Remove verify button
                        del_row.hide('slow', function(){del_row.remove();});
                    }
                    else swal({title: res.title, text: res.data, icon: res.status});
                }, 
                error: function(xhr)
                {	
                    var xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            });
        }
    }); 
</script>