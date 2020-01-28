<?php 
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<!-- Content -->
<?php echo $content; ?>

<?php 
$this->load->view('settings/logs_script');
$this->load->view('templates/footer'); 
?>