<div class="" style="background: black;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="index.php"><img src="images/logos/logo.png" style="height: 61px; float: left; margin-top: 15px; margin-right: 25px;" alt="logo" /></a>
                <div id="navbar_menu" class="float-right">
                    <ul class="ul">
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='index.php'){?> class="active"<?php }?> href="<?=MI_BASE_URL?>">Home</a></li>
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='about.php'){?> class="active"<?php }?> href="<?=MI_BASE_URL?>about.php">About</a></li>
                        <!--                    <li><a --><?php //if(basename($_SERVER['PHP_SELF'])=='practise_area.php'){?><!-- class="active"--><?php //}?><!-- href="--><?//=MI_BASE_URL?><!--practise_area.php">Practice Area</a></li>-->
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='attorneys.php'){?> class="active"<?php }?> href="<?=MI_BASE_URL?>attorneys.php">Attorneys</a></li>
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='cases.php'){?> class="active"<?php }?> href="<?=MI_BASE_URL?>cases.php">Cases</a></li>
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='blog.php'){?> class="active"<?php }?> href="<?=MI_BASE_URL?>blog.php">Blog</a>
                            <!--                    <li><a --><?php //if(basename($_SERVER['PHP_SELF'])=='blog_detail.php'){?><!-- class="active"--><?php //}?><!-- href="--><?//=MI_BASE_URL?><!--blog_detail.php">Blog Details</a></li>-->
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='contact.php'){?> class="active"<?php }?> href="<?=MI_BASE_URL?>contact.php">Contact us</a></li>
                        <?php if (mi_get_session('id') && !empty(mi_get_session('id'))){?>
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='profile.php'){?> class="active"<?php }?>  href="<?=MI_BASE_URL?>profile.php">Profile</a></li>
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='logout.php'){?> class="active"<?php }?>  href="<?=MI_BASE_URL?>logout.php">logout</a></li>
                        <?php }else{?>
                        <li><a <?php if(basename($_SERVER['PHP_SELF'])=='login.php'){?> class="active"<?php }?>  href="<?=MI_BASE_URL?>login.php">Login</a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>