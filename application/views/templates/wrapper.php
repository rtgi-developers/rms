<style>
	[data-icons]:before {
		content:attr(data-icons);
		display:inline-block;
		font-size:1.5em;
		width:1.5em;
		height:1.5em;
		line-height:1.3em;
		text-align:center;
		border-radius:50%;
		background:#ff3e80;
		vertical-align:middle;
		margin-right:0em;
		color:#ffffff;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>

<div class="container-fluid mt-5" id="wrapper">
	<!-- Sidenav -->
	<?php $this->load->view('templates/leftnav'); ?>
		
	<!-- Main -->
	<main role="main" class="pt-3 pr-5" style="margin-left: 225px !important;">

		<!-- Shortcut to create -->
		<div class="dropleft" style="position: fixed !important; right: 5px !important; top: 50% !important; z-index: 9999;">
			<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-decoration-none">
				<span class="shadow-sm" data-icons="+"></span>
			</a>
			<div class="dropdown-menu shadow-sm rounded-0 animated zoomIn mr4 mb3" aria-labelledby="dropdownMenuLink" style="margin-top: -70px;">
				<a class="dropdown-item px-2" href="<?php echo base_url(); ?>"><i class="las la-plus la-lg"></i> Purchase order</a>
				<a class="dropdown-item px-2" href="<?php echo base_url(); ?>"><i class="las la-plus la-lg"></i> Work order</a>
				<a class="dropdown-item px-2" href="<?php echo base_url('orders/sales/view_create_so'); ?>"><i class="las la-plus la-lg"></i> Sales order</a>
				<a class="dropdown-item px-2" href="<?php echo base_url('items/products/view_create_prod'); ?>"><i class="las la-plus la-lg"></i> New product</a>
				<a class="dropdown-item px-2" href="<?php echo base_url('items/materials/view_create_matl'); ?>"><i class="las la-plus la-lg"></i> New material</a>
			</div>
		</div>