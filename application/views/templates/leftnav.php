<style>
/*
 * leftnav
 */

.leftnav {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 0;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

.leftnav-sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 55px; /* Height of navbar */
  height: calc(100vh - 55px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

.leftnav .nav-link {
  font-weight: 500;
  color: #333;
}

.leftnav .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.leftnav .nav-link.active {
  color: #007bff;
}

.leftnav .nav-link:hover .feather,
.leftnav .nav-link.active .feather {
  color: inherit;
}

.leftnav-heading {
  font-size: .75rem;
  text-transform: uppercase;
}

</style>

<!-- Side navbar -->
<nav class="col-md-2 d-none d-md-block bg-whitesmoke leftnav">
	<div class="leftnav-sticky">
    	<ul class="nav flex-column">
    		<li class="nav-item">
        		<a class="nav-link" href="#">
        			<i class="las la-home la-lg"></i> Dashboard <span class="sr-only">(current)</span>
        		</a>
        	</li>
        	<li class="nav-item">
        		<a class="nav-link clearfix" href="#submenuItems" data-toggle="collapse" aria-expanded="false">
        			<span class="float-left"><i class="las la-box la-lg"></i> Items</span>
                    <span class="float-right">
                        <i class="las la-angle-right"></i>
                        <!-- <i class="las la-angle-down content-hide"></i> -->
                    </span>
        		</a>
                <ul class="collapse flex-column list-unstyled pl-4 pb3" id="submenuItems">
                    <li class="nav-item side-nav-item"><a href="<?php echo base_url(); ?>" class="nav-link text-muted side-nav-link">Products</a></li>
                    <li class="nav-item side-nav-item"><a href="<?php echo base_url(); ?>" class="nav-link text-muted side-nav-link">Materials</a></li>
                    <li class="nav-item side-nav-item"><a href="<?php echo base_url(); ?>" class="nav-link text-muted side-nav-link">Category</a></li>
                </ul>
        	</li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="las la-people-carry la-lg"></i> Manufacture
                </a>
            </li>
        	<li class="nav-item">
        		<a class="nav-link" href="#">
        			<i class="las la-cubes la-lg"></i> Stocks
        		</a>
        	</li>
        	<li class="nav-item">
                <a class="nav-link clearfix" href="#">
                    <span class="float-left"><i class="las la-clipboard-list la-lg"></i> Orders</span>
                    <span class="float-right">
                        <i class="las la-angle-right"></i>
                        <i class="las la-angle-down content-hide"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link clearfix" href="#submenuContacts" data-toggle="collapse" aria-expanded="false">
                    <span class="float-left"><i class="lar la-id-card la-lg"></i> Contacts</span>
                    <span class="float-right">
                        <i class="las la-angle-right"></i>
                        <i class="las la-angle-down content-hide"></i>
                    </span>
                </a>
                <ul class="collapse flex-column list-unstyled pl-4 pb3" id="submenuContacts">
                    <li class="nav-item side-nav-item"><a href="<?php echo base_url(); ?>" class="nav-link text-muted side-nav-link">Customer</a></li>
                    <li class="nav-item side-nav-item"><a href="<?php echo base_url(); ?>" class="nav-link text-muted side-nav-link">Supplier</a></li>
                </ul>
            </li>
    	</ul>
    </div>
</nav>

<script>
    $(document).ready(function(){
        $('.nav-link').each(function(){
            $(this).click(function(){
                $(this).closest('li').find('i').toggleClass('la-angle-right la-angle-down');
            });
        });
    });
</script>