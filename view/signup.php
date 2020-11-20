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
                            <h1 class="page-title">Sign up</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Sign up</li>
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
<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="full">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                            <div class="col-lg-12" style="margin:auto; padding:10px;" >
                                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Client</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lawyer</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <h3 class="register-heading">Create your profile as a Client</h3>
                                        <form method="post" id="cForm" enctype="multipart/form-data">
                                            <div class="row register-form">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" placeholder="Name *" />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="email" placeholder="Email *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3" name="address" placeholder="Address *"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="maxl">
                                                            <label class="radio inline">
                                                                <input type="radio" name="gender" value="male" checked>
                                                                <span> Male </span>
                                                            </label>
                                                            <label class="radio inline">
                                                                <input type="radio" name="gender" value="female">
                                                                <span>Female </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="save" value="1" />
                                                    <input type="submit" class="btn btn-primary" id="save" value="Save" />

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="phone" class="form-control" name="phone" placeholder="Phone number *" value=""  />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="password" placeholder="Password *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password *" value=""  />
                                                    </div><br/><br/>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <h3 class="register-heading">Create your profile as a Lawyer</h3>
                                        <form method="post" id="myForm" enctype="multipart/form-data">
                                            <div class="row register-form">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" placeholder="Name *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone" placeholder="Phone *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" placeholder="Email *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="nid" placeholder="NID number *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Your image</label>
                                                        <input type="file" class="form-control" name="image" placeholder="" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3" name="address" value="" placeholder="Address..."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="password" placeholder="Password *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="maxl">
                                                            <label class="radio inline">
                                                                <input type="radio" name="gender" value="male" checked>
                                                                <span> Male </span>
                                                            </label>
                                                            <label class="radio inline">
                                                                <input type="radio" name="gender" value="female">
                                                                <span>Female </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="btn btn-primary" name="lawyer_reg" value="1" />
                                                    <input type="submit" class="btn btn-primary" id="lawyer_reg"  value="Register" />

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <select class="form-control" id="area" name="area">
                                                            <option value="" selected>Your Woking Devision</option>
                                                            <option value="dhaka">Dhaka Division</option>
                                                            <option value="Barisal">Barisal Division</option>
                                                            <option value="Mymensingh">Mymensingh Divisioni</option>
                                                            <option value="Chittagong">Chittagong Division</option>
                                                            <option value="Khulna">Khulna Division</option>
                                                            <option value="Rangpur">Rangpur Division</option>
                                                            <option value="Rangpur">Rangpur Division</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" name="self-desc" placeholder="Describe yourself here..."></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control" name="category">
                                                            <option value="" selected>Lawyer of </option>
                                                            <?php
                                                            $category = mi_db_read_all('lawyer_category');
                                                            foreach($category as $cat){
                                                                if($category==true){ ?>
                                                                    <option value="<?php echo $cat['id'];?>" ><?php echo $cat['category_name'];?></option>
                                                                <?php }else{
                                                                    echo 'it not working';
                                                                }
                                                            }?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="maxl">
                                                            <label class="radio inline">
                                                                <input type="radio" name="type" id="criminal" value="2" checked>
                                                                <span> Criminal</span>

                                                                <input type="radio" name="type" id="civil" value="1" onchange="">
                                                                <span>Civil </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control" id="service" name="service" onchange="mservice(this.value)">
                                                            <option value="" selected>Your practices area</option>
                                                            <?php
                                                            $allService = mi_db_read_all('service');
                                                            foreach ($allService as $service) {?>
                                                                <option value="<?php echo $service['id'];?>"><?php echo $service['service_name'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group" name="services" id="services">

                                                    </div>

                                                    <div class="form-group">
                                                        <label> Bar council certificate</label>
                                                        <input type="file" class="form-control" name="document" placeholder="Your document*" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->

<?php include_once('body_parts/footer.php')?>
<?php include_once('body_parts/footer_script.php')?>