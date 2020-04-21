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
	<!-- Bootstrap 4.4.1 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/4.4.1/dist/css/bootstrap.min.css'); ?>">
	<!-- Bootstrap select 1.13.9 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap-select/1.13.9/dist/css/bootstrap-select.min.css'); ?>" />
	<!-- jQuery-UI CSS -->	
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/jquery-ui/1.12.1/jquery-ui.min.css'); ?>">
	<!-- Line Awesome 1.3.0 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/line-awesome/1.3.0/css/line-awesome.min.css'); ?>" />
	<!-- Font awesome 5 Pro -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/fontawesome/5.0.0/css/all.min.css'); ?>">
	<!-- Flatpicker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/dist/flatpickr.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/dist/themes/dark.css'); ?>">
	<!-- Animate 3.7.2 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libs/animate/3.7.2/animate.min.css'); ?>" />
	<!-- Jquery datatables -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/datatables/datatables.min.css'); ?>"/>
	<!-- Custom defined stylesheet -->
	<link type="text/css" href="<?php echo base_url('assets/css/custom_style.css'); ?>" 
	rel="stylesheet"/>

	<!-- jQuery JS -->
	<script src="<?php echo base_url('assets/libs/jquery/3.4.1/jquery.min.js'); ?>"></script>
	<!-- jQuery-UI JS -->
	<script src="<?php echo base_url('assets/libs/jquery-ui/1.12.1/jquery-ui.min.js'); ?>"></script>
	<!-- Popper.js -->
	<script src="<?php echo base_url('assets/libs/popperjs/1.16.0/umd/popper.min.js'); ?>"></script>
	<!-- Bootstrap 4.4.1 JS -->
	<script src="<?php echo base_url('assets/libs/bootstrap/4.4.1/dist/js/bootstrap.min.js'); ?>"></script>
	<!-- Bootstrap select 1.13.9 -->
	<script src="<?php echo base_url('assets/libs/bootstrap-select/1.13.9/dist/js/bootstrap-select.min.js'); ?>"></script>
	<!-- Flatpicker -->
	<script src="<?php echo base_url('assets/libs/flatpickr/dist/flatpickr.min.js'); ?>"></script>
	<!-- Jquery Datatables - JS -->
	<script src="<?php echo base_url('assets/libs/datatables/datatables.min.js'); ?>"></script>
	<!-- Sweetalert 2.1.2 -->
	<script src="<?php echo base_url('assets/libs/sweetalert/2.1.2/sweetalert.min.js'); ?>"></script>
	<!-- Math.js -->
	<script src="<?php echo base_url('assets/libs/mathjs/dist/math.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/mathjs/dist/calculate.jquery.js'); ?>"></script>
	<!-- jQuery Ajax Form JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
	<!-- Chart.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js" integrity="sha256-OHkZxrR7EXZQ8MlUC+Ww2+RedaJSP6DEsAukSt023dU=" crossorigin="anonymous"></script>
	<!-- OMS custom javascript functions -->
	<script src="<?php  echo base_url('assets/js/custom_script.js');  ?>"></script>
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

			// Flatpickr - Datepicker
			$('.flatpickr-datepicker').flatpickr();   
	    });
	</script>
</head>
<body class="d-flex flex-column bg-whtesmoke min-vh-100">
	
	


