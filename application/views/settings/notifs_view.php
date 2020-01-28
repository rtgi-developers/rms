<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<?php echo $content; ?>

<!-- CREATE NEW NOTIFICATION modal -->
<div class="modal fade" id="mdlCreateNotif" tabindex="-1" role="dialog" aria-labelledby="titleCreateNotif" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-top modal-lg" role="document">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header rounded-0 bg-slategray text-white">
				<h5 class="modal-title" id="titleCreateNotif">Create Notification</h5>
		        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="las la-times"></i></span>
		        </button>
			</div>
			<form id="formCreateNotif">
				<div class="modal-body px-5">
					<div class="form-group" id="resCreateNotif"></div>
					<div class="form-group">
						<label for="txtNotifMsg" class="font-weight-bold req-after">Notification Message</label>
						<textarea name="txtNotifMsg" id="txtNotifMsg" class="form-control rounded-0" cols="30" rows="3" placeholder="Enter notification message"></textarea>
						<!-- <small class="text-muted">A meaningful name of the task.</small> -->
					</div>
					<div class="form-group">
						<label for="txtTaskName" class="font-weight-bold req-after mb-0">Add Recipients</label>
						<p class="text-muted">Select atleast one recipients from the list. Only added recipients can see this notification.</p>
						<div class="input-group mb-2">
						    <span class="input-group-prepend">
						    	<div class="input-group-text order-right-0 border bg-whitesmoke"><i class="la la-search"></i></div>
						    </span>
						    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchRcpts" placeholder="Search all recipients">
						</div>
						
						<table class="table table-sm table-hover border border-gainsboro-2 small" id="tblRcpts">
							<thead>
								<tr class="bg-whitesmoke">
									<td class="text-left align-middle pr-0">
										<div class="custom-control custom-checkbox">
										  <input type="checkbox" class="custom-control-input" 
										  id="cbxSelAllRcpts">
										  <label class="custom-control-label" 
										  for="cbxSelAllRcpts"></label>
										</div>
									</td>
									<td class="align-middle text-nowrap font-weight-bold smalls text-left"> Recipients Name</td>
									<td class="align-middle text-nowrap font-weight-bold smalls text-left">Recipients Email</td>
									<td class="align-middle text-nowrap font-weight-bold smalls text-left">Recipients Title</td>
								</tr>
							</thead>
							<tbody id="resRcpts"></tbody>
						</table>
							
						<div id="loaderGetUsers" class="content-hide">
							<div class="d-flex align-items-center">
								<div class="spinner-border text-info mr-auto" role="status" aria-hidden="true"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div id="loaderCreateNotif" class="content-hide">
						<div class="d-flex align-items-center">
							<div class="spinner-border text-info mr-auto" role="status" aria-hidden="true"></div>
						  	<strong> Updating...</strong>
						</div>
					</div>
					<button type="submit" name="btnCreateNotif" id="btnCreateNotif" class="btn btn-primary btn-sm">Create</button>
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
$this->load->view('settings/notifs_script');
$this->load->view('templates/footer'); 
?>