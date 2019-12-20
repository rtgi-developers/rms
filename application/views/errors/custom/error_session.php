<?php $this->load->view('templates/header'); ?>

<!-- Session expiration message -->
<div class="container">
	<div class="vertical-center-85">
		<div class="col-sm-12">
			<h2 class="text-center">Session expired!</h2>
			<h4 class="text-center">Your session has expired. Please click <a href="<?php echo base_url('users/login'); ?>">here</a> to login again.</h4>
		</div>
	</div>
</div>


<?php $this->load->view('templates/footer.php'); ?>