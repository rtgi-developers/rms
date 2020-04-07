<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resEditCust"></div>

<?php echo $form_edit_cust; ?>

<?php 
$this->load->view('templates/footer'); 
?>

<script>
    $(document).ready(function(){
        /**
         * Submit edit customer form 
         */
        $('#formEditCust').submit(function(event){
            // Prevent form default behaviour
            event.preventDefault(); 
            
            // Ajax request to process the form
            $.ajax({
                type: "post", 
                url: "<?php echo base_url('contacts/customers/save_cust_changes'); ?>", 
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
                    if(res.status == 'success') $('#resEditCust').html(res.data); 
                    else $('#resEditCust').html(res.data); 
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