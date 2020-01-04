<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader');
?>

<!-- ACTIONS -->


<div class="clearfix mb-3">
	<div class="float-left">
		<div class="form-inline">
			<!-- <div class="form-group mr-2">
				<a href="#" class="btn btn-sm btn-primary" id="linkCreateNewTask" data-toggle="modal" data-target="#mdlCreateTask" data-backdrop="static" data-keyboard="false">Create Task</a>
			</div> -->
			<div class="form-group mr-2">
				<input type="text" id="txtSearchTasks" class="form-control form-control-sm rounded0 border border-info" placeholder="Search tasks">
			</div>
		</div>
	</div>
	<div class="float-right">
		<a href="#" class="btn btn-sm btn-primary" id="linkCreateNewTask" data-toggle="modal" data-target="#mdlCreateTask" data-backdrop="static" data-keyboard="false">Create Task</a>
	</div>
</div>

<!-- TASKS TABLE -->
<div id="resTasksTable"></div>

<!-- CREATE TASK -->
<div class="modal fade" id="mdlCreateTask" tabindex="-1" role="dialog" aria-labelledby="titleCreateTask" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
					<div class="form-group">
						<label for="txtTaskName" class="font-weight-bold req-after">Task Name</label>
						<input type="text" name="txtTaskName" id="txtTaskName" class="form-control form-control-sm" required>
						<!-- <small class="text-muted">A meaningful name of the task.</small> -->
					</div>
					<div class="form-group">
						<label for="txtTaskCat" class="font-weight-bold req-after">Task Category</label>
						<input list="listTaskCat" name="txtTaskCat" id="txtTaskCat" class="form-control form-control-sm" autocomplete="off" required>
						<datalist id="listTaskCat"></datalist>
						<small class="text-muted">Select task category or enter for new.</small>
					</div>
					<div class="form-group">
						<label for="txtClassName" class="font-weight-bold req-after">Class Name</label>
						<input type="text" name="txtClassName" id="txtClassName" class="form-control form-control-sm" required>
						<!-- <small class="text-muted">Lower case same as controller's class name.</small> -->
					</div>
					<div class="form-group">
						<label for="txtMethodName" class="font-weight-bold req-after">Method Name</label>
						<input type="text" name="txtMethodName" id="txtMethodName" class="form-control form-control-sm" required>
						<!-- <small class="text-muted">Lower case same as method name of the class.</small> -->
					</div>
					<div class="form-group">
						<label for="txtDir" class="font-weight-bold">Parent Directory</label>
						<input type="text" name="txtDir" id="txtDir" class="form-control form-control-sm">
						<small class="text-muted">Lower case parent folder followed by (/). Example: directory/name/</small>
					</div>
				</div>
				<div class="modal-footer">
					<div id="loaderCreateTask" class="content-hide">
						<div class="d-flex align-items-center">
							<div class="spinner-border text-info mr-auto" role="status" aria-hidden="true"></div>
						  	<strong> Updating...</strong>
						</div>
					</div>
					<button type="submit" name="btnCreateTask" id="btnCreateTask" class="btn btn-primary btn-sm rounded-0">Create Task</button>
					<button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- EDIT TASK -->
<div class="modal fade" id="mdlEditTask" tabindex="-1" role="dialog" aria-labelledby="titleEditTask" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header rounded-0 bg-slategray text-white">
				<h5 class="modal-title" id="titleEditTask">Create Task Category</h5>
		        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="las la-times"></i></span>
		        </button>
			</div>
			<form id="formEditTask">
				<div class="modal-body px-5">
					<div class="form-group" id="resEditTask"></div>
					<div class="form-group content-hide">
						<label for="txtEditTaskId" class="font-weight-bold req-after">Task Id</label>
						<input type="text" name="txtEditTaskId" id="txtEditTaskId" class="form-control form-control-sm" required>
					</div>
					<div class="form-group">
						<label for="txtEditTaskName" class="font-weight-bold req-after">Task Name</label>
						<input type="text" name="txtEditTaskName" id="txtEditTaskName" class="form-control form-control-sm" required>
						<!-- <small class="text-muted">A meaningful name of the task.</small> -->
					</div>
					<div class="form-group">
						<label for="txtEditTaskCat" class="font-weight-bold req-after">Task Category</label>
						<input list="listEditTaskCat" name="txtEditTaskCat" id="txtEditTaskCat" class="form-control form-control-sm" autocomplete="off" required>
						<datalist id="listEditTaskCat"></datalist>
						<small class="text-muted">Select task category or enter for new.</small>
					</div>
					<div class="form-group">
						<label for="txtEditClassName" class="font-weight-bold req-after">Class Name</label>
						<input type="text" name="txtEditClassName" id="txtEditClassName" class="form-control form-control-sm" required>
						<!-- <small class="text-muted">Lower case same as controller's class name.</small> -->
					</div>
					<div class="form-group">
						<label for="txtEditMethodName" class="font-weight-bold req-after">Method Name</label>
						<input type="text" name="txtEditMethodName" id="txtEditMethodName" class="form-control form-control-sm" required>
						<!-- <small class="text-muted">Lower case same as method name of the class.</small> -->
					</div>
					<div class="form-group">
						<label for="txtEditDir" class="font-weight-bold">Parent Directory</label>
						<input type="text" name="txtEditDir" id="txtEditDir" class="form-control form-control-sm">
						<small class="text-muted">Lower case parent folder followed by (/). Example: directory/name/</small>
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
