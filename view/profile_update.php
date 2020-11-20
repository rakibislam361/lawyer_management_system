<?php include_once('body_parts/header.php');?>

    <body id="default_theme" class="contact">
    <!-- loader -->
    <div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /> </div>
    <!-- end loader -->

    <!-- header -->
    <header id="default_header" class="header_style_1">
        <!-- header bottom -->
        <?php include_once('body_parts/top-head-nav.php')?>
        <!-- header bottom end -->
    </header>
    <!-- end header -->

    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">User Profile</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li class="active">Profile update</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <!-- section -->
    <div class="section padding_layout_1" style="padding-top: 0px;">
        <div class="container">
            <div class="row" style="margin-top: 5%; margin-bottom: 20%">
                <div class="col-lg-6" style="margin:auto; padding:10px;" >
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading" style="margin-left: 30%; text-transform: uppercase">Update your profile</h3>
                            <form method="post" id="pform" enctype="multipart/form-data">
                                <?php
                                $id = mi_get_session('id');
                                $data = mi_db_read_by_id('clients', array('id'=>$id));
                                if (count($data)>0) {
                                    foreach ($data as $row) {
                                        ?>
                                        <div class="row register-form">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""> Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Name *" value="<?=$row['name']; ?>" />
                                                    <input type="hidden" class="form-control" name="id" placeholder="Name *" value="<?=$row['id']; ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" name="email" placeholder="Email *" value="<?=$row['email']; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Phone number</label>
                                                    <input type="phone" class="form-control" name="phone" placeholder="Phone number *" value="<?=$row['phone']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <textarea name="address" class="form-control" id="address" cols="30" rows="6" value="<?=$row['address'];?>"><?=$row['address'];?></textarea>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="form-group pull-right">
                                            <a href="profile.php" type="submit" class="btn btn-info" id="" name=""> Back</a>
                                            <input name="update" type="hidden" value="1">
                                            <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
                                        </div>
                                        <?php
                                    }
                                }?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

<?php include_once('body_parts/footer.php')?>
<?php include_once('body_parts/footer_script.php')?>