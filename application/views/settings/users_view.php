<?php 
// Header
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader');
?>

<!-- Page content -->
<?php echo $content; ?>

<?php 
// Footer
$this->load->view('settings/users_script');
$this->load->view('templates/footer'); 
?>

