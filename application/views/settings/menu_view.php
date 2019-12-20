<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');

/**
 * Insert menu item
 * 
 * @param  [string] $itemurl   [URL to items settings page]
 * @param  [string] $itemtitle [Setting item title]
 * @param  [string] $itemdesc  [Setting itm description]
 * @return [object]            [Html bootstrap card]
 */
function menu_item($url, $title, $description)
{	
	// Bootstrap card
	$html = '
		<style>
			a.link-menu-item:hover {
				background-color: #f6f8fa;
			}
		</style>
		<div class="col-md-3">
			<a href="'.$url.'" class="card card-link rounded-0 link-menu-item">
				<div class="card-body">
					<h5 class="card-title my-0">'.$title.'</h5>
					<p class="card-text small text-secondary">'.$description.'</p>
				</div>
			</a>
		</div>
	';

	return $html;
}
?>

<!-- Content -->
<div class="row">
	<?php  
		// MENU ITEM :: USER PERMISSIONS
		echo menu_item(base_url('settings/users'), "User Permisssions", "Add or edit user permisssions."); 

		// MENU ITEM :: MANAGE TASKS
		echo menu_item(base_url('settings/tasks'), "Manage Tasks", "Manage tasks and modules."); 
	?>
</div>

<!-- Footer -->
<?php $this->load->view('templates/footer'); ?>

<!-- Javascript -->
<script type="text/javascript">
	$(document).ready(function(){});
</script>