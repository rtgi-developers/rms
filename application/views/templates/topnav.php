<style>
.border-top { 
    border-top: 1px solid #e5e5e5; 
}
.border-bottom { 
    border-bottom: 1px solid #e5e5e5; 
}
[data-letters]:before {
    content:attr(data-letters);
    display:inline-block;
    font-weight: bold;
    font-size:0.8em;
    width:2.5em;
    height:2.5em;
    line-height:2.5em;
    text-align:center;
    border-radius:50%;
    background:#16d39a;
    vertical-align:middle;
    margin-right:0em;
    color:#ffffff;
}
</style>

<!-- Top navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-slategray shadow-sm py-1">
    
    <div class="mx-auto rder-0">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('assets/img/logo/rms_logo_hz_light1.png'); ?>" width="180" height="40" class="d-inline-block align-top" alt="Site logo">
        </a>
    </div>
    
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="las la-ellipsis-v"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mt-1">
                <a class="nav-link menu-nav-item" href="#">
                    <i class="lar la-bell text-white" style="font-size: 24px;"></i>
                </a>
            </li>
            <li class="nav-item mt-1">
                <a class="nav-link menu-nav-item" href="<?php echo base_url('settings/menu'); ?>">
                    <i class="la la-cog text-white" style="font-size: 24px;"></i>
                </a>
            </li>
            <li class="nav-item mt-1">
                <a class="nav-link menu-nav-item" href="<?php echo base_url('users/logout'); ?>">
                    <i class="las la-power-off text-white" style="font-size: 24px;"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-nav-item" href="#">
                    <span class="pr-2 text-white"><?php echo $this->session->userdata('_username'); ?></span>
                    <span data-letters="<?php echo substr($this->session->userdata('_username'), 0, 1); ?>"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>