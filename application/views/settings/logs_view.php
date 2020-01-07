<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resUserLogs"></div>

<form id="formTestLogs">
	<input type="text" name="txtName" placeholder="Enter your name">
	<input type="text" name="txtAge" placeholder="Enter your age.">
	<button type="submit" class="btn btn-sm btn-primary">Post</button>
</form>
<script>
	$(document).ready(function(){
		/*$.ajax({
			type: "get", 
			url: "<?php  echo base_url('settings/logs/get_logs'); ?>", 
			data: "isgetmethos=true", 
			dataType: "json", 
			beforeSend: function(){$('#loader').show()}, 
			complete: function(){$('#loader').hide()},
			success: function(resp)
			{	
				if(resp.success) $('#resUserLogs').html(resp.data);
				else $('#resUserLogs').html(resp.data);
			}
		});*/

		$('#formTestLogs').submit(function(event){
			event.preventDefault();
			$.ajax({
				type: "post", 
				url: "<?php  echo base_url('settings/logs/get_logs'); ?>", 
				data: $(this).serialize(), 
				dataType: "json", 
				beforeSend: function(){$('#loader').show()}, 
				complete: function(){$('#loader').hide()},
				success: function(resp)
				{	
					if(resp.success) $('#resUserLogs').html(resp.data);
					else $('#resUserLogs').html(resp.data);
				}
			});
		});
	});
</script>

<?php 
$this->load->view('templates/footer'); 
?>