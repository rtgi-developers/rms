<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<noscript>
		<!-- Redirect to javascript error page if javascript is disabled -->
		<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=<?php echo base_url('systems/errors/js_error');?>">
	</noscript>
	<title><?php echo $title." | ".$this->config->item('app_title'); ?></title>
	<!-- Favicon -->
	<link href="" rel="shortcut icon" type="image/png" />
	<!-- Bootstrap 4.3.1 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
	<!-- jQuery-UI CSS -->	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
	<!-- Line Awesome 1.3.0 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/line-awesome/1.3.0/css/line-awesome.min.css'); ?>" />
	<!-- Jquery datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
	<!-- Custom defined stylesheet -->
	<link type="text/css" href="<?php echo base_url('assets/css/custom_style.css'); ?>" 
	rel="stylesheet"/>

	<!-- jQuery JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- jQuery-UI JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<!-- Popper.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- Bootstrap 4.3.1 JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Jquery Datatables - JS -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
	<!-- Sweetalert 2.1.2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
	<!-- jQuery Ajax Form JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
	<!-- Chart.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js" integrity="sha256-OHkZxrR7EXZQ8MlUC+Ww2+RedaJSP6DEsAukSt023dU=" crossorigin="anonymous"></script>
	<!-- OMS custom javascript functions -->
	<script src="<?php  ?>"></script>
	<!-- Custom scripts -->
	<script type="text/javascript">
	    $(document).ready(function(){
	    	// Bootstrap tooltip apply
	        $('[data-toggle="tooltip"]').tooltip();
	        // Bootstrap popver apply 
	        $('[data-toggle="popover"]').popover();
	        // Disable popover on clicking anywhere in body
	        $('[data-toggle="popover"]').click(function (e) {
		        e.preventDefault();
		        $('[data-toggle="popover"]').not(this).popover('hide');
		        $(this).popover('toggle');
		    });
		    $(document).click(function (e) {
		        if ($(e.target).parent().find('[data-toggle="popover"]').length > 0) {
		            $('[data-toggle="popover"]').popover('hide');
		        }
		    });  
	    });
	</script>
</head>
<body class="d-flex flex-column bg-whtesmoke min-vh-100">
	
	


