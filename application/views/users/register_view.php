<?php 
$this->load->view('templates/header'); 
$this->load->view('templates/loader'); 
?>
<div class="container justify-content-center vertical-center-90 px-">
	<div class="col-sm-4">
		<div class="text-center mb-2">
			<a href="#" class="navbar-brand text-dark">
				<img src="<?php  echo base_url('assets/img/logo/rtgi_logo.png'); ?>" width="100" height="50" class="d-inline-block align-middle" alt="RMS-LOGO"> 
				<!-- <p class="lead font-weight-normal my-0">Create Account</p> -->
			</a>
		</div>
	    <div class="card borde-0 rounded-0 shadow-sm">
		  	<div class="card-body p-4">
		  		
		  		<h5 class="card-title mb-0">Create Account</h5>
		  		<p>It only takes a few steps</p>

				<div id="resRegister"></div>
				<form id="formRegister" class="mt-4">
					<div class="form-group">
				    	<!-- <label for="txtNewUserName" class="font-weight-bold req-after">Name</label> -->
				    	<input type="text" class="form-control rounded-0" id="txtNewUserName" name="txtNewUserName" placeholder="Name" required>
				  	</div>
				  	<div class="form-group">
				    	<!-- <label for="txtNewUserEmail" class="font-weight-bold">Email</label> -->
				    	<input type="email" class="form-control rounded-0" id="txtNewUserEmail" name="txtNewUserEmail" placeholder="Email" required>
				  	</div>
				  	<div class="form-group">
				    	<!-- <label for="txtNewUserPswd" class="font-weight-bold">Password</label> -->
				    	<input type="password" class="form-control rounded-0" id="txtNewUserPswd" name="txtNewUserPswd" placeholder="Password" required>
				  	</div>
				  	<div class="form-group">
				    	<input type="hidden" class="form-control" id="g-recaptcha-response" name="g-recaptcha-response">
				  	</div>
				  	<div class="form-group">	
				  		<button type="submit" name="btnCreateAccount" id="btnCreateAccount" class="btn btn-primary btn-l btn-bloc font-weight-bol" styl="font-size: 16px !important;">Sign Up</button>
				  	</div>
				  	<div class="form-group">
				  		<p>Already have an account? <a href="<?php echo base_url('users/login'); ?>" class="text-decoration-none">Login</a></p>
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
	|	New user registeration
	|------------------------------------------------------
	 */
	$('#formRegister').submit(function(event){
		// Prevent forms default behaviour
		event.preventDefault();

		// Ajax post request
		$.ajax({
			type: "post",
			url: "<?php echo base_url('users/register/create_account'); ?>",
			data: $(this).serialize(),
			dataType: "json",
			beforeSend: function(){$('#loader').show()},
			complete: function(){$('#loader').hide()},
			success: function(response)
			{
				if(response.success) $('#resRegister').html(response.data);
				else $('#resRegister').html(response.data);
			}
		});
	});
});
</script>

