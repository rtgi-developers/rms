<?php 
$this->load->view('templates/header'); 
$this->load->view('templates/loader'); 
?>

<div class="container justify-content-center vertical-center-85">
	<div class="col-md-4">

		<div class="text-center mb-2">
			<a href="#" class="navbar-brand text-dark">
				<img src="<?php  echo base_url('assets/img/logo/rtgi_logo.png'); ?>" width="80" height="40" class="d-inline-block align-middle" alt="RMS-LOGO"> 
				<p class="lead font-weight-normal my-0">Login to RMS</p>
			</a>
		</div>

	    <div class="card rounded-0 shadow-sm">
		  	<div class="card-body">
				<h3 class="card-title"><?php echo $title; ?></h3>
				<div id="resLogin"></div>
				<form id="formLogin">
					<div class="form-group">
				    	<label for="txtUserEmail" class="font-weight-bold">Email</label>
				    	<input type="text" class="form-control" id="txtUserEmail" name="txtUserEmail" aria-describedby="txtUsernameHelp" placeholder="Enter email" required>
				    	<small id="txtUsernameHelp" class="form-text text-muted"> Enter email associated with your account.</small>
				  	</div>
				  	<div class="form-group">
				    	<label for="txtUserPswd" class="font-weight-bold">Password</label>
				    	<input type="password" class="form-control" id="txtUserPswd" name="txtUserPswd" placeholder="Enter password" required>
				  	</div>
				  	<div class="form-group">
				    	<input type="hidden" class="form-control" id="g-recaptcha-response" name="g-recaptcha-response">
				  	</div>
				  	<div class="form-group">	
				  		<button type="submit" name="btnLogin" id="btnLogin" class="btn btn-primary">Login</button>
				  	</div>
				  	<div class="form-group">
				  		<a href="#" class="text-decoration-none">Forgot username or passowrd?</a>
				  	</div>
				</form>
		  	</div>
		</div>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>

<script>
$(document).ready(function(){
	/*
	|------------------------------------------------------
	|	Login
	|------------------------------------------------------
	 */
	$('#formLogin').submit(function(event){
		// Prevent form default behaviour
		event.preventDefault();

		// Ajax post request
		$.ajax({
			type: "post",
			url: "<?php echo base_url('users/login/authenticate'); ?>",
			data: $(this).serialize(),
			dataType: "json",
			beforeSend: function(){$('#loader').show()},
			complete: function(){$('#loader').hide()},
			success: function(response)
			{
				if(response.success) $('#resLogin').html(response.data);
				else $('#resLogin').html(response.data);
			}
		});
	});
});

</script>
