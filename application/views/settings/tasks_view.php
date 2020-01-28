<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader');
?>

<!-- Content -->
<?php echo $content; ?>

<!-- CREATE TASK -->
<div class="modal fade" id="mdlCreateTask" tabindex="-1" role="dialog" aria-labelledby="titleCreateTask" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-lg" role="document">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header rounded-0 bg-slategray text-white">
				<h5 class="modal-title" id="titleCreateTask">Create New Task</h5>
		        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="las la-times"></i></span>
		        </button>
			</div>
			<form id="formCreateTask">
				<div class="modal-body px-5">
					<div class="form-group" id="resCreateTask"></div>
					<div class="form-group row">
						<label for="txtTaskName" class="font-weight-bold req-after col-md-4">Task name</label>
						<div class="col-md-8">
							<input type="text" name="txtTaskName" id="txtTaskName" class="form-control form-control-sm" required>
							<small class="text-muted">A meaningful display name of the task.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtTaskCat" class="font-weight-bold req-after col-md-4">Task category</label>
						<div class="col-md-8">
							<input list="listTaskCat" name="txtTaskCat" id="txtTaskCat" class="form-control form-control-sm" autocomplete="off" required>
							<datalist id="listTaskCat"></datalist>
							<small class="text-muted">Select task category or enter for new.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtClassName" class="font-weight-bold req-after col-md-4">Class/Controller name</label>
						<div class="col-md-8">
							<input type="text" name="txtClassName" id="txtClassName" class="form-control form-control-sm" required>
							<small class="text-muted">Class or controller name must be in lower case.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtMethodName" class="font-weight-bold req-after col-md-4">Method/Function name</label>
						<div class="col-md-8">
							<input type="text" name="txtMethodName" id="txtMethodName" class="form-control form-control-sm" required>
							<small class="text-muted">Method or function name must be same as in the source code.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtDir" class="font-weight-bold col-md-4">Controller's parent directory</label>
						<div class="col-md-8">
							<input type="text" name="txtDir" id="txtDir" class="form-control form-control-sm">
							<small class="text-muted">Lower case parent folder followed by (/). Example: directory/name/</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtIsPermReq" class="font-weight-bold req-after col-md-4">Is permission required?</label>
						<div class="col-md-8">
							<select name="txtIsPermReq" id="txtIsPermReq" class="form-control form-control-sm">
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
							<small class="text-muted">Is this task require's a permission or just be a public task.</small>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div id="loaderCreateTask" class="content-hide">
						<div class="d-flex align-items-center">
							<div class="spinner-border text-info mr-auto" role="status" aria-hidden="true"></div>
						  	<strong> Creating...</strong>
						</div>
					</div>
					<button type="submit" name="btnCreateTask" id="btnCreateTask" class="btn btn-primary btn-sm">Create Task</button>
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- EDIT TASK -->
<div class="modal fade" id="mdlEditTask" tabindex="-1" role="dialog" aria-labelledby="titleEditTask" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-lg" role="document">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header rounded-0 bg-slategray text-white">
				<h5 class="modal-title" id="titleEditTask">Edit Task</h5>
		        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="las la-times"></i></span>
		        </button>
			</div>
			<form id="formEditTask">
				<div class="modal-body px-5">
					<div class="form-group" id="resEditTask"></div>
					<div class="form-group row content-hide">
						<label for="txtEditTaskId" class="font-weight-bold req-after col-md-4">Task Id</label>
						<div class="col-md-8">
							<input type="text" name="txtEditTaskId" id="txtEditTaskId" class="form-control form-control-sm" required>
							<small class="text-muted">Task id auto fetched.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditTaskName" class="font-weight-bold req-after col-md-4">Task name</label>
						<div class="col-md-8">
							<input type="text" name="txtEditTaskName" id="txtEditTaskName" class="form-control form-control-sm" required>
							<small class="text-muted">A meaningful display name of the task.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditTaskCat" class="font-weight-bold req-after col-md-4">Task category</label>
						<div class="col-md-8">
							<input list="listEditTaskCat" name="txtEditTaskCat" id="txtEditTaskCat" class="form-control form-control-sm" autocomplete="off" required>
							<datalist id="listEditTaskCat"></datalist>
							<small class="text-muted">Select task category or enter for new. Example Category, Task_Category</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditClassName" class="font-weight-bold req-after col-md-4">Class/Controller Name</label>
						<div class="col-md-8">
							<input type="text" name="txtEditClassName" id="txtEditClassName" class="form-control form-control-sm" required>
							<small class="text-muted">Class or controller name must be in lower case.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditMethodName" class="font-weight-bold req-after col-md-4">Method/Function Name</label>
						<div class="col-md-8">
							<input type="text" name="txtEditMethodName" id="txtEditMethodName" class="form-control form-control-sm" required>
							<small class="text-muted">Method or function name must be same as in the source code.</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditDir" class="font-weight-bold col-md-4">Controller's parent directory</label>
						<div class="col-md-8">
							<input type="text" name="txtEditDir" id="txtEditDir" class="form-control form-control-sm">
							<!--small class="text-muted">Lower case parent folder followed by (/). Example: directory/name/</small-->
							<small class="text-muted">Parent folder of the controller ending with (/) like example/dir/name/</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEditIsPermReq" class="font-weight-bold req-after col-md-4">Is permission required?</label>
						<div class="col-md-8">
							<select name="txtEditIsPermReq" id="txtEditIsPermReq" class="form-control form-control-sm">
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
							<small class="text-muted">Is this task require's a permission or just be a public task.</small>
						</div>
					</div>
				</div>
				<div class="modal-footer px-5">
					<div id="loaderEditTask" class="content-hide">
						<div class="d-flex align-items-center">
							<div class="spinner-border text-info mr-auto" role="status" aria-hidden="true"></div>
						  	<strong> Updating...</strong>
						</div>
					</div>
					<button type="submit" name="btnUpdateTask" id="btnUpdateTask" class="btn btn-primary btn-sm">Save Changes</button>
					<button type="button" class="btn btn-secondary btn-sm rounded0" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
$this->load->view('settings/tasks_script.php');
$this->load->view('templates/footer'); 
?>
