<?php 
/* Header */
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<?php echo $table_notifs; ?>

<?php 
/* Footer */
$this->load->view('systems/notifs_script'); 
$this->load->view('templates/footer'); 
?>