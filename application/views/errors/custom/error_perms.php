<?php $this->load->view('templates/header'); ?>

<div class="container">
	<div class="vertical-center-85">
		<div class="col-sm-12 text-center">
			<h2><?php echo $title; ?></h2>
			<h4>
				You do not have enough privileges to access this page or function.<br>
				Kindly contact system administrator.
			</h4>
			<?php  
				if(isset($errormsg)) echo '<p class="text-danger">'.base64_decode($errormsg).'</p>';
			?>
			<a href="javascript:history.back()" class="text-decoration-none">&larr; Go Back</a> 
		</div>
	</div>
</div>

<?php $this->load->view('templates/footer.php'); ?>