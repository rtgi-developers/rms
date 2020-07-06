<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div class="card rounded-0 shadow-sm mb-3" id="divAddSoHeader">
    <div class="card-body">
        <form id="formAddSoHeader">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtCust" class="font-weight-bold req-after">Customer</label>
                    <div class="d-flex flex-row">
                        <input list="listCust" type="search" name="txtCust" id="txtCust" class="form-control form-control-sm col-md-6" placeholder="Search and select customer" required>
                        <datalist id="listCust"></datalist>
                        <a href="<?php echo base_url('contacts/customers/view_create_cust'); ?>" id="lnkCreateCust" class="text-decoration-none text-nowrap mt-1 col-md-6">
                            <i class="far fa-plus-square"></i> Create customer
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtBillAddrId" class="font-weight-bold req-after">Billing Address</label>
                    <select name="txtBillAddrId" id="txtBillAddrId" class="custom-select custom-select-sm" required>
                        <option value>Select address...</option>
                    </select>
                    <small><i class="fas fa-info-circle"></i> Select customer to get list of available addresses for selected customer.</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="txtShipAddrId" class="font-weight-bold req-after">Shipping Address</label>
                    <select name="txtShipAddrId" id="txtShipAddrId" class="custom-select custom-select-sm" required>
                        <option value>Select address...</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="txtCustPO" class="font-weight-bold req-after">Customer PO</label>
                    <input type="text" name="txtCustPO" id="txtCustPO" class="form-control form-control-sm" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="txtOrderDate" class="font-weight-bold req-after">Order Date</label>
                    <input type="text" name="txtOrderDate" id="txtOrderDate" class="form-control form-control-sm flatpickr-datepicker" placeholder="Select date..." required>
                </div>
                <div class="form-group col-md-2">
                    <label for="txtCancelDate" class="font-weight-bold req-after">Cancel Date</label>
                    <input type="text" name="txtCancelDate" id="txtCancelDate" class="form-control form-control-sm flatpickr-datepicker" placeholder="Select date..." required>
                </div>
                <div class="form-group col-md-2">
                    <label for="txtShipMethod" class="font-weight-bold">Shipping Method</label>
                    <input type="text" name="txtShipMethod" id="txtShipMethod" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-2">
                    <label for="txtPymtTerms" class="font-weight-bold">Terms of Payment</label>
                    <input type="text" name="txtPymtTerms" id="txtPymtTerms" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-2">
                    <label for="txtCurrCode" class="font-weight-bold req-after">Currency</label>
                    <select name="txtCurrCode" id="txtCurrCode" class="custom-select custom-select-sm" required>
                        <option value>Currency</option>
                        <?php echo get_curr_options(); ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2 pt-1"><i class="fas fa-info-circle"></i> Click save and continue to enter sales order product details.</span>
                        <a href="javascript: history.back();" class="btn btn-sm btn-secondary mr-2">Cancel</a>
                        <button type="submit" id="btnCreateSO" class="btn btn-sm btn-primary">Save &amp; continue</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card rounded-0 shadow-sm content-hide" id="divAddSoDetails">
    <div class="card-body">
        <h5 class="card-title">Sales Order # <span id="txtSoNum"></span></h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Add products to this sales order.</h6> -->
        
        <!-- <form id="formAddSoDetails" class="content-hid">
            <div class="form-row content-hide">
                <div class="form-group col-md-12">
                    <label for="txtProduct" class="font-weight-bold req-after">Sales Order Id</label>
                    <input type="text" name="txtSoId" id="txtSoId" class="form-control form-control-sm" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtProduct" class="font-weight-bold req-after">Product</label>
                    <input type="search" list="listProd" name="txtProd" id="txtProd" class="form-control form-control-sm" placeholder="Search and select product by name, color and id." required>   
                    <datalist id="listProd"></datalist>
                </div>
                <div class="form-group col-md-2">
                    <label for="txtProdQty" class="font-weight-bold req-after">Order Quantity</label>
                    <div class="input-group">
                        <input type="number" step="any" name="txtProdQty" id="txtProdQty" class="form-control form-control-sm border0 rounded0 text-right" required>  
                        <input type="text" name="txtProdQtyUOM" id="txtProdQtyUOM" class="form-control form-control-sm border0 rounded0 px-0 text-center text-prod-uom" placeholder="UOM" readonly>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="txtProduct" class="font-weight-bold req-after">Price per unit</label>
                    <div class="input-group">
                        <input type="number" step="any"  name="txtProdPrice" id="txtProdPrice" class="form-control form-control-sm text-right" required>  
                        <input type="text" name="txtProdPriceCurr" id="txtProdPriceCurr" class="form-control form-control-sm px-0 text-center" placeholder="CURR" readonly>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="txtProduct" class="font-weight-bold req-after">Total Price</label>
                    <div class="input-group">
                        <input type="number" step="any"  name="txtTotalPrice" id="txtTotalPrice" class="form-control form-control-sm text-right" readonly>  
                        <input type="text" name="txtTotalPriceCurr" id="txtTotalPriceCurr" class="form-control form-control-sm px-0 text-center" placeholder="CURR" readonly>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 text-right">
                    <button class="btn btn-sm btn-primary">Add product</button>
                </div>
            </div>
        </form> -->
        
        <form id="formAddSoDetails">
            <table class="table table-sm tablehover table-bordered border border-gainsboro-2" id="tblSoDetails">    
                <thead>
                    <tr class="bg-whitesmoke">
                        <td class="align-middle text-nowrap font-weight-bold small py-2 text-left w-50">
                            Product
                        </td>
                        <td class="align-middle text-nowrap font-weight-bold small py-2 text-center">
                            Order quantity <i class="fas fa-info-circle text-secondary" data-toggle="tooltip" data-placement="top" data-html="true" title="<small>Unit of measurement(UOM) will be automatically fetched from products default UOM (i.e. UOM for Minimum Order Qty) for selected product</small>"></i>
                        </td>
                        <td class="align-middle text-nowrap font-weight-bold small py-2 text-center">
                            Price per unit <i class="fas fa-info-circle text-secondary" data-toggle="tooltip" data-placement="top" data-html="true" title="<small>Price currency is same as what you have selected during sales order header entry</small>"></i>
                        </td>
                        <td class="align-middle text-nowrap font-weight-bold small py-2 text-center">
                            Total price
                        </td>
                        <td class="align-middle text-nowrap font-weight-bold small py-2"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-nowrap small p-0 w-50">
                            <input type="text" name="txtSoId" id="txtSoId" class="form-control form-control-sm border-0 rounded-0 content-hide" required>
                            <input type="search" list="listProd" name="txtProd" id="txtProd" class="form-control form-control-sm border-0 rounded-0" placeholder="Search and select product by name, color and id." required>   
                            <datalist id="listProd"></datalist>
                        </td>
                        <td class="align-middle text-nowrap small p-0 input-group border-0">
                            <input type="number" step="any" name="txtProdQty" id="txtProdQty" class="form-control form-control-sm border-0 rounded-0 text-right" required>  
                            <input type="text" name="txtProdQtyUOM" id="txtProdQtyUOM" class="form-control form-control-sm border-0 rounded-0 px-0 text-center text-prod-uom" placeholder="UOM" readonly>
                        </td>
                        <td class="align-middle text-nowrap small p-0">
                            <div class="input-group border-0">
                                <input type="number" step="any"  name="txtProdPrice" id="txtProdPrice" class="form-control form-control-sm border-0 rounded-0 text-right" required>  
                                <input type="text" name="txtProdPriceCurr" id="txtProdPriceCurr" class="form-control form-control-sm border-0 rounded-0 px-0 text-center" placeholder="CURR" readonly>
                            </div>    
                        </td>
                        <td class="align-middle text-nowrap small p-0">
                            <div class="input-group border-0">
                                <input type="number" step="any"  name="txtTotalPrice" id="txtTotalPrice" class="form-control form-control-sm border-0 rounded-0 text-right" readonly>  
                                <input type="text" name="txtTotalPriceCurr" id="txtTotalPriceCurr" class="form-control form-control-sm border-0 rounded-0 px-0 text-center" placeholder="CURR" readonly>
                            </div>    
                        </td>
                        <td class="align-middle text-nowrap small p-0">
                            <button type="submit" id="btnAddSOProd" class="btn btn-sm btn-link justify-content-center" title="Add product to sales order"><i class="fas fa-plus-square fa-lg"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<?php 
$this->load->view('templates/footer'); 
?>

<script>
    $(document).ready(function(){
        /**
         * Search and select customer
         */
        $('#txtCust').on("keyup", function(){
            // Search keyword
            let keyword = $(this).val(); 

            $.ajax({
                type: "get", 
                url: "<?php echo base_url('contacts/customers/get_cust_options_by_search'); ?>", 
                data:"keyword="+keyword, 
                success: function(res)
                {
                    $('#listCust').html(res); 
                }, 
                error: function(xhr)
                {
                    var xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            });
        }); 

        /**
         * Get selected customer billing and shipping address 
         */
        $('#txtCust').on("blur", function(){
            // Get customer id
            let customer = $(this).val(); 
            let cust_id = customer.match(/\[(.*?)]/)[1]; 

            $.ajax({
                type: "get", 
                url: "<?php echo base_url('contacts/customers/get_cust_addr_options'); ?>", 
                data: "custid="+cust_id, 
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
                    $('#txtBillAddrId').html(res);
                    $('#txtShipAddrId').html(res);
                }, 
                error: function(xhr)
                {
                    let xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            }); 
        });

        /**
         * Submit add SO header form
         */
        $('#formAddSoHeader').submit(function(event){
            event.preventDefault(); 

            $.ajax({
                type: "post", 
                url: "<?php echo base_url('orders/sales/add_so_header'); ?>", 
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
                        let so_id = res.so_id; 

                        $('#divAddSoHeader').hide(); 
                        $('#divAddSoDetails').show(); 

                        $('#txtSoNum').text(so_id); 
                        $('#txtSoId').val(so_id); 
                        $('#txtProdPriceCurr, #txtTotalPriceCurr').val($('#txtCurrCode').val());  
                    }
                    else {
                        swal({title: "Oops!", text: res.message, icon: "error"});
                    }
                }, 
                error: function(xhr)
                {
                    let xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            }); 
        }); 
    
        /**
        * Get product
        */
        $('#txtProd').on("keyup", function(){
            $.ajax({
                type: "get", 
                url: "<?php echo base_url('items/products/get_prod_options_by_search'); ?>", 
                data: "keyword="+$(this).val(),
                success: function(res)
                {   
                    $('#listProd').html(res); 
                }, 
                error: function(xhr)
                {
                    let xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            }); 
        }); 

        /**
         * Get selected product details
         */
        $('#txtProd').on('blur', function(){
            // Get product details
            let prod = $(this).val(); 
            let prod_id = prod.match(/\[(.*?)]/)[1]; 

            $.ajax({
                type: "get", 
                url: "<?php echo base_url('items/products/get_prod_details'); ?>", 
                data: "prodid="+prod_id, 
                dataType: "json", 
                success: function(res)
                {
                    if(res.status == 'success')
                    {
                        $('#txtProdQtyUOM').val(res.prod_uom); 
                    }
                    else {
                        swal({title: "Oops!", text: res.data, icon: res.status});
                    }
                }, 
                error: function(xhr)
                {
                    let xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            }); 
        }); 

        /**
         * Calculate total price
         */
        $('#txtProdQty, #txtProdPrice').on('keyup', function(){
            let prod_qty = $('#txtProdQty').val(); 
            let prod_price = $('#txtProdPrice').val(); 
            let total_price = (prod_qty*prod_price).toFixed(2); 

            $('#txtTotalPrice').val(total_price); 
        });

        /**
         * Submit add SO details form
         */
        $('#formAddSoDetails').submit(function(event){
            event.preventDefault(); 

            $.ajax({
                type: "post", 
                url: "<?php echo base_url('orders/sales/add_so_details'); ?>", 
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
                    if(res.status = 'success')
                    {
                        $('#tblSoDetails > tbody').prepend(res.message).fadeIn('slow'); 
                        //$('#formEditSoDetails').prepend(res.message).fadeIn('slow'); 

                        // Reset some inputs of the form 
                        $('#txtProd, #txtProdQty, #txtProdPrice, #txtTotalPrice').val(''); 

                        /**
                        * Delete sales order product
                        */
                        $('.btn-del-so-prod').each(function(){
                            $(this).click(function(){
                                let so_id = $(this).attr('so-id'); 
                                let prod_id  = $(this).attr('prod-id');
                                let del_row  = $(this).closest('tr'); 

                                // Delete confirmation
                                swal({
                                    title: "Confirm delete!", 
                                    text: "Are you sure you want to delete this product?", 
                                    icon: "warning", 
                                    buttons: ["No", "Yes"],
                                    dangerMode: true
                                })
                                .then((willDelete) => {
                                    if(willDelete) ajax_del_so_prod(so_id, prod_id, del_row);
                                });     
                            }); 
                        }); 
                    }
                    else {
                        swal({title: "Oops!", text: res.message, icon: "error"});   
                    }

                }, 
                error: function(xhr)
                {
                    let xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});   
                }
            }); 
        }); 

        /**
         * Ajax request to delete sales order product
         *
         * @param   integer     so_id       Sales order id
         * @param   integer     prod_id     Product id
         * @param   object      del_row     Delete row
         * @return  void
         */
        function ajax_del_so_prod(so_id, prod_id, del_row)
        {
            $.ajax({
                type: "get", 
                url: "<?php echo base_url('orders/sales/delete_so_prod'); ?>", 
                data: "soid="+so_id+"&prodid="+prod_id, 
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
                        // Success message
                        swal({title: res.title, text: res.data, icon: res.status});

                        // Remove verify button
                        del_row.hide('slow', function(){del_row.remove();});
                    }
                    else swal({title: res.title, text: res.data, icon: res.status});
                }, 
                error: function(xhr)
                {
                    let xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            });
        }


    }); 
</script>