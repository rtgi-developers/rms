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
    border: white 1px solid;
    background:#0ca940;
    vertical-align:middle;
    margin-right:0em;
    color:#ffffff;
}

span.notif-badge {
    position: relative;
    top: -14px;
    right: 15px;
    border: white 1px solid;
    font-size:11px;
    margin-right: -14px;
}
</style>

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark shadow-sm py-1" id="topNav">
    <div class="container-fluid px-0">
        <div class="mr-auto" style="min-width: 220px; max-width: 220px;">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('assets/img/logo/rms_logo_hz_light1.png'); ?>" width="180" height="40" class="d-inline-bloc aligntop" alt="Website logo">
            </a>
        </div>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <i class="las la-bars la-lg text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="nav navbar-nav d-flex flex-row justify-content-center ml-auto">
            <li class="nav-item mt-1 pl-1">
                <a class="nav-link" id="navLinkNotif" href="<?php echo base_url('systems/notifs'); ?>">
                    <i class="lar la-bell text-white" style="font-size: 24px;"></i>
                </a>
            </li>
            <li class="nav-item mt-1 pl-1">
                <a class="nav-link" href="<?php echo base_url('settings/menu'); ?>">
                    <i class="la la-cog text-white" style="font-size: 24px;"></i>
                </a>
            </li>
            <li class="nav-item mt-1 pl-1">
                <a class="nav-link" href="<?php echo base_url('users/logout'); ?>">
                    <i class="las la-power-off text-white" style="font-size: 24px;"></i>
                </a>
            </li>
            <li class="nav-item pl-1">
                <a class="nav-link" href="#">
                    <span class="text-white pr-1"><?php echo $this->session->userdata('_username'); ?></span>
                    <span data-letters="<?php echo substr($this->session->userdata('_username'), 0, 1); ?>"></span>
                </a>
            </li>
        </ul>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function(){
        /**
         * Get number of unread notifications
         */
        $.ajax({
            type: "get", 
            url: "<?php echo base_url('systems/notifs/count_unread_notif');  ?>", 
            dataType: "json", 
            success: function(resp)
            {   
                if(resp.status == 'success') $('#navLinkNotif').html(resp.data);
                else $('#navLinkNotif').html(resp.data);
            }
        });
    }); 
</script>