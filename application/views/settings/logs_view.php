<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resUserLogs"></div>

<script>
	$(document).ready(function(){
		$.ajax({
			type: "get", 
			url: "<?php  echo base_url('settings/logs/show_logs'); ?>", 
			dataType: "json", 
			beforeSend: function(){$('#loader').show()}, 
			complete: function(){$('#loader').hide()},
			success: function(resp)
			{	
				if(resp.success) 
				{	
					// Print json encoded response
					$('#resUserLogs').html(resp.data);

					// Datatable initialization
					$('#tblUserLogs').DataTable({
						/*scrollY:        '55vh',
    					scrollCollapse: true,*/
						fixedHeader: {headerOffset: $('#topNav').outerHeight()},
						"aaSorting": [], 
						"order": [[ 1, "desc" ]],
						"paging": true,
						dom: 'Bfrtip',
				        buttons: [
				            {extend: 'csv', text: 'Export to CSV', className: 'btn-sm btn-dark'}
				        ] 
					});

					// Datatable custom search
					var tbl_user_logs = $('#tblUserLogs').DataTable();
					$('#txtSearchUserLogs').on('keyup', function(){
						tbl_user_logs.search($('#txtSearchUserLogs').val()).draw();
					});

					// Datatable custom export button
					$("#tblUserLogs_wrapper > .dt-buttons").appendTo("div.export-buttons");
					
					// Show truncated content in full
					$('#tblUserLogs').on('click', '.show-full-content', function(){
						swal("Data sent by "+$(this).attr('user-name'), $(this).attr('td-content'));
					});
				}
				else $('#resUserLogs').html(resp.data);
			}
		});
	});
</script>

<?php 
$this->load->view('templates/footer'); 
?>