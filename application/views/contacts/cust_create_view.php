<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resCust"></div>

<div class="card rounded-0">
    <div class="card-body">
        <form id="formCreateCust">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtCustName" class="font-weight-bold req-after">Customer Name</label>
                    <input type="text" name="txtCustName" id="txtCustName" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtCustWebsite" class="font-weight-bold">Website</label>
                    <input type="url" name="txtCustWebsite" id="txtCustWebsite" class="form-control form-control-sm" placeholder="https://example.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="txtCustEmail1" class="font-weight-bold req-after">Email 1</label>
                    <input type="email" name="txtCustEmail1" id="txtCustEmail1" class="form-control form-control-sm" placeholder="email_1@example.com">
                </div>
                <div class="form-group col-md-3">
                    <label for="txtCustEmail2" class="font-weight-bold">Email 2</label>
                    <input type="email" name="txtCustEmail2" id="txtCustEmail2" class="form-control form-control-sm" placeholder="email_2@example.com">
                </div>
                <div class="form-group col-md-3">
                    <label for="txtCustPhone1" class="font-weight-bold req-after">Phone 1</label>
                    <input type="tel" name="txtCustPhone1" id="txtCustPhone1" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-3">
                    <label for="txtCustPhone2" class="font-weight-bold">Phone 2</label>
                    <input type="tel" name="txtCustPhone2" id="txtCustPhone2" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="txtCustPymtTerms" class="font-weight-bold">Terms of Payment</label>
                    <input type="text" name="txtCustPymtTerms" id="txtCustPymtTerms" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-9">
                    <label for="txtCustComment" class="font-weight-bold">Comment</label>
                    <div class="d-flex flex-row">
                        <input type="text" name="txtCustComment" id="txtCustComment" class="form-control form-control-sm col-md-8">
                        <div class="col-md-4">
                            <button type="submit" id="btnCreateCust" class="btn btn-sm btn-primary">Create Customer</button>
                            <a href="javascript: history.back();" class="btn btn-sm btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
$this->load->view('templates/footer'); 
?>

<script>
    $(document).ready(function(){
        $('#formCreateCust').submit(function(event){
            // Prevent default
            event.preventDefault(); 

            // Ajax request
            $.ajax({
                type: "post", 
                url: "<?php echo base_url('contacts/customers/create_cust'); ?>", 
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
                    $('#resCust').html(res.data); 
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