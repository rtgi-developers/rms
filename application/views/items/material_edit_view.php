<?php  
/* Header */
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="resEditMatl"><!-- Edit form processing result --></div>

<?php echo $editmatlform; ?>

<?php 
/* Footer */
$this->load->view('items/categories_create_view', [ 'cat_name' => 'Materials']);
$this->load->view('items/material_edit_script');
$this->load->view('templates/footer'); 
?>