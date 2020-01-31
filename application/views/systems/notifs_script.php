<script>
$(document).ready(function(){
	/*
	|--------------------------------------------------
	| DATATABLE FOR NOTIFICATION TABLE
	|--------------------------------------------------
	 */
	var dt_notifs = $('#tblNotifs').DataTable({
		fixedHeader: {headerOffset: $('#topNav').outerHeight()},
		"aaSorting": [], 
		"paging": true,
	});

	/*
	|--------------------------------------------------
	| CUSTOM SEARCH 
	|--------------------------------------------------
	 */
	$('#txtSearchNotifs').on('keyup', function(){
		dt_notifs.search($('#txtSearchNotifs').val()).draw();
	});

	// Print total number of shipment items above table
	$('#spanNumAllNotif').text(dt_notifs.rows().count());
	
	/*
	|--------------------------------------------------
	| READ FULL NOTIFICATION
	|--------------------------------------------------
	 */
	$('#tblNotifs').on('click', '.lnk-read-full-notif', function(){
		$notif_msg = $(this).attr('notif-msg');

		swal('Full notification message', $notif_msg)
	});
});
</script>