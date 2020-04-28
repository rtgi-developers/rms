<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<style>
	.col-wd-200 {
		word-wrap: break-word;
		min-width: 200px;
		max-width: 200px;
	}
	.dataTables_filter, .dataTables_length, .dataTables_inf {
		display: none;
	}
	.table-tool-input:focus {
	    outline: 0 !important;
	    border-color: initial;
	    box-shadow: none;
	    background-color: white !important;
	}
</style>

<div class="d-flex flex-row no-gutters mb-2">
	<div class="input-group pr-2 col-md-10">
	    <span class="input-group-prepend">
	    	<div class="input-group-text order-right-0 border bg-whitesmoke">
	    		<i class="la la-search"></i>
	    	</div>
	    </span>
	    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchSO" placeholder="Search sales order">
	</div>
	<a href="<?php echo base_url('orders/sales/view_create_so'); ?>" id="lnkCreateSO" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2 col-md-2">
		<i class="las la-plus-circle la-lg"></i> Create Sales Order
	</a>
</div>

<table class="table table-sm table-hover border border-gainsboro-2" id="tblSO">
	<thead>
		<tr class="bg-whitesmoke">
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				SO Number
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Customer
            </td>
            <td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Customer PO
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Order Date
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Cancel Date
            </td>
			<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				SO Status
            </td>
            <td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
				Ready to Ship %
			</td>
			<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
		</tr>
	</thead>
</table>

<?php $this->load->view('templates/footer'); ?>

<script>
    $(document).ready(function(){
        /**
         * Get all products useing server-side
         */
        var dt_so = $('#tblSO').DataTable({
            "processing": true, 
            "serverSide": true, 
            "ordering": true, 
            "ajax": {
                type: "post", 
                url: "<?php echo base_url('orders/sales/get_so_serverside');  ?>", 
                dataType: "json", 
                beforeSend: function()
                {
                    $('#loader').show(); 
                }, 
                complete: function()
                {
                    $('#loader').hide(); 
                }, 
                data: {
                    "<?php echo $this->security->get_csrf_token_name(); ?>" : 
				    "<?php echo $this->security->get_csrf_hash(); ?>"
                }, 
                error: function()
                {
                    $("#tblSO").html('<tbody><tr><td class="align-middle text-center" colspan="8">No orders found!</td></tr></tbody>');
                }
            }, 
            "createdRow": function(row, data, index)
            {
                $('td', row).addClass('align-middle');
                $('td:eq(1)', row).addClass('text-left');
                $('td:eq(6)', row).addClass('text-left');
            }, 
            "drawCallback": function(settings, json)
            {
                // Your code goes here
            }
        }); 

        /**
         * Search sales orders
         */
        $('#txtSearchSO').on('keyup', function(){
            dt_so.search($(this).val()).draw(); 
        }); 
    }); 
</script>