<script>
$(document).ready(function(){
	/*
	|------------------------------------------------------
	| Initialize datatable on user logs table
	|------------------------------------------------------
	 */
	var dt_userlogs = $('#tblUserLogs').DataTable({
		fixedHeader: {headerOffset: $('#topNav').outerHeight()},
		"aaSorting": [], 
		"order": [[ 0, "desc" ]],
		"paging": true,
		dom: 'Bfrtip',
        buttons: [
	        {
	            extend: 'csv', 
	            text: 'Export table to CSV', 
	            className: 'btn-sm btn-dark btn-block text-nowrap border-gainsboro-2'
	        }
        ] 
	});	

	/*
	|------------------------------------------------------
	| Search user logs table
	|------------------------------------------------------
	 */
	$('#txtSearchUserLogs').on('keyup', function(){
		dt_userlogs.search($('#txtSearchUserLogs').val()).draw();
	});	

	/*
	|------------------------------------------------------
	| Customize datatable export button 
	|------------------------------------------------------
	 */
	$("#tblUserLogs_wrapper > .dt-buttons").appendTo("div.export-buttons");

	/*
	|------------------------------------------------------
	| Show truncated content in full
	|------------------------------------------------------
	 */
 	$('#tblUserLogs').on('click', '.show-full-content', function(){
		swal("Data sent by "+$(this).attr('user-name'), $(this).attr('td-content'));
	});
});
</script>