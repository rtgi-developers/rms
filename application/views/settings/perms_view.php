<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resUserPermsChanges"></div>

<?php echo $tasks; ?>

<?php 
$this->load->view('settings/perms_script');
$this->load->view('templates/footer'); 
?>


