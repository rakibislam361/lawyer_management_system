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
    <div id="inner_banner" class="section inner_banner_section_contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Contact us</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Contact us</li>
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
                <div class="col-md-4 offset-md-4 margin_bottom_50_all">
                    <div class="full text_align_center">
                        <img class="img-resposive" src="images/layout_img/law_contact.png" alt="#" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="full">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                                <div class="form_section">
                                    <form id="form_contact" method="post" enctype="multipart/form-data">
                                        <fieldset>
                                            <div class="row">
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="your_name" placeholder="Your Name" type="text" />
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="email_address" placeholder="Email adress" type="email" />
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="subject" placeholder="Subject" type="text" />
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="phone_number" placeholder="Phone number" type="text" />
                                                </div>
                                                <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <textarea class="field_custom" name="message" placeholder="Message"></textarea>
                                                </div>
                                                <div class="center">
                                                    <input type="hidden" name="contact" value="1" />
                                                    <input type="submit" id="contact" value="SUBMIT NOW" class="btn main_bt" />
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
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