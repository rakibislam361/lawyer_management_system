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
                            <h1 class="page-title">Login</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Login</li>
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
                            <div class="row text-center">
                                <div class="container register-form" style="margin: 2%;">
                                    <div class="md-cal-12">
                                        <div class="note">
                                            <p>Please login.</p>
                                        </div>
                                        <div class="form-content">
                                            <form id="lform" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <div class="maxl">
                                                        <label class="radio inline">
                                                            <input type="radio" name="check" value="client" checked>
                                                            <span>Client </span>

                                                        </label>

                                                        <label class="radio inline">
                                                            <input type="radio" name="check" value="lawyer">
                                                            <span>Lawyer </span>

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin: auto;">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email.. " value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password.. " value=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="login">
                                                <button type="submit" class="btn btn-primary" id="login">Submit</button>
                                                <a href="signup.php" class="btn btn-info">Create account</a>
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
</div>
<!-- end section -->

<?php include_once('body_parts/footer.php')?>
<?php include_once('body_parts/footer_script.php')?>