<?php include_once('body_parts/header.php');?>

<body id="default_theme" class="about">
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
    <div id="inner_banner" class="section inner_banner_section_attorney">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Attorneys</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Attorneys</li>
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
    <section class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2>Our Attorneys</h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php $datas = mi_db_read_by_id('lawyer', array('status'=>3));
            if (!empty($datas)) {
                foreach ($datas as $key=> $data) {
                    if($key %2==0){
                        ?>
                        <div class="row margin_bottom_30_all">
                            <div class="col-md-4 right-padding_0">
                                <div class="full team_img_blog">
                                    <img class="img-responsive" src="<?=$data['image'];?>" style="height: 380px; max-height: 380px"alt="#" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="team_info_blog">
                                    <h3><a href="single_attorney.php?id=<?=$data['id'];?>" style="color: white;"><?=$data['name'];?></a></h3>
                                    <p class="_small_tag">Associate Lawyer</p>
                                    <p>
                                        <?php
                                        if(!empty($data['services_id'])){
                                            $service=json_decode($data['services_id']);
                                            $srv = $service->service_id;
                                            $srvc=mi_db_read_by_id('service',array('id'=>$srv))[0];
                                            $categories = $service->category;
                                        }
                                        ?>
                                        <a href="" class="badge badge-pill badge-light">
                                            <?=$srvc['service_name'];?>
                                        </a>
                                        <?php
                                        foreach ($categories as $cat){
                                            ?>
                                            <a href="" class="badge badge-pill badge-light">
                                                <?=$cat;?>
                                            </a>
                                        <?php }?>
                                    </p>
                                    <p><?=(strlen($data['self_details'])>250?substr($data['self_details'],'0', '250').'<a href="single_attorney.php?id='.$data['id'].'" style="color: white;"> see more...</a>':$data['self_details'])?></p>
                                    <div class="social_icon_team">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>

                        <div class="row margin_bottom_30_all">
                            <div class="col-md-8 left_side">
                                <div class="team_info_blog">
                                    <h3><a href="single_attorney.php?id=<?=$data['id'];?>" style="color: white;"><?=$data['name'];?></a></h3>
                                    <p class="_small_tag">Associate Lawyer</p>
                                    <p>
                                        <?php
                                        if(!empty($data['services_id'])){
                                            $service=json_decode($data['services_id']);
                                            $srv = $service->service_id;
                                            $srvc=mi_db_read_by_id('service',array('id'=>$srv))[0];
                                            $categories = $service->category;
                                        }
                                        ?>
                                        <a href="" class="badge badge-pill badge-light">
                                            <?=$srvc['service_name'];?>
                                        </a>
                                        <?php
                                        foreach ($categories as $cat){
                                            ?>
                                            <a href="" class="badge badge-pill badge-light">
                                                <?=$cat;?>
                                            </a>
                                        <?php }?>
                                    </p>
                                    <p><?=(strlen($data['self_details'])>250?substr($data['self_details'],'0', '250').'<a href="single_attorney.php?id='.$data['id'].'" style="color: white;"> see more...</a>':$data['self_details'])?></p>

                                    <div class="social_icon_team">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 left-padding_0">
                                <div class="full team_img_blog right_side">
                                    <img class="img-responsive" src="<?=$data['image'];?>" style="height: 380px; max-height: 380px"alt="#" />
                                </div>
                            </div>
                        </div>
                    <?php }}} ?>
        </div>
    </section>
    <!-- end section -->
    <!-- section -->
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col padding_0">
                    <div class="full step_section step1">
                        <div class="full text_align_center">
                            <div class="icon">
                                <img src="images/layout_img/step1_icon.png" alt="#" />
                            </div>
                            <h2>550+<br><span class="small">Cases Won</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col padding_0">
                    <div class="full step_section step2">
                        <div class="full text_align_center">
                            <div class="icon">
                                <img src="images/layout_img/step2_icon.png" alt="#" />
                            </div>
                            <h2>480+<br><span class="small">Case Dismissed</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col padding_0">
                    <div class="full step_section step3">
                        <div class="full text_align_center">
                            <div class="icon">
                                <img src="images/layout_img/step3_icon.png" alt="#" />
                            </div>
                            <h2>640+<br><span class="small">Charges Dropped</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col padding_0">
                    <div class="full step_section step4">
                        <div class="full text_align_center">
                            <div class="icon">
                                <img src="images/layout_img/step4_icon.png" alt="#" />
                            </div>
                            <h2>850+<br><span class="small">Happy Client’s</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col padding_0">
                    <div class="full step_section step5">
                        <div class="full text_align_center">
                            <div class="icon">
                                <img src="images/layout_img/step5_icon.png" alt="#" />
                            </div>
                            <h2>950+<br><span class="small">Qualified Lawyers</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- section -->
    <section class="section padding_layout_1 padding_b20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading">
                            <h2 class="text_align_left"><span>Our Recent Cases</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="padding: 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="full recent_slider">
                        <div class="owl-carousel owl_half_slider owl-theme">
                            <div class="item">
                                <img src="images/layout_img/slide1.png" class="img-responsive" alt="#" />
                                <div class="recent_slider_blog">
                                    <h3>Sed ut perspiciatis..</h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                        <br> blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                                        <br> et quas molestias excepturi sint occaecati..
                                    </p>
                                    <a class="blog_read_more" href="#">Read More ></a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/layout_img/slide2.png" class="img-responsive" alt="#" />
                                <div class="recent_slider_blog">
                                    <h3>Sed ut perspiciatis..</h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                        <br> blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                                        <br> et quas molestias excepturi sint occaecati..
                                    </p>
                                    <a class="blog_read_more" href="#">Read More ></a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/layout_img/slide3.png" class="img-responsive" alt="#" />
                                <div class="recent_slider_blog">
                                    <h3>Sed ut perspiciatis..</h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                        <br> blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                                        <br> et quas molestias excepturi sint occaecati..
                                    </p>
                                    <a class="blog_read_more" href="#">Read More ></a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/layout_img/slide1.png" class="img-responsive" alt="#" />
                                <div class="recent_slider_blog">
                                    <h3>Sed ut perspiciatis..</h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                        <br> blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                                        <br> et quas molestias excepturi sint occaecati..
                                    </p>
                                    <a class="blog_read_more" href="#">Read More ></a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/layout_img/slide2.png" class="img-responsive" alt="#" />
                                <div class="recent_slider_blog">
                                    <h3>Sed ut perspiciatis..</h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                        <br> blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                                        <br> et quas molestias excepturi sint occaecati..
                                    </p>
                                    <a class="blog_read_more" href="#">Read More ></a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/layout_img/slide3.png" class="img-responsive" alt="#" />
                                <div class="recent_slider_blog">
                                    <h3>Sed ut perspiciatis..</h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                        <br> blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                                        <br> et quas molestias excepturi sint occaecati..
                                    </p>
                                    <a class="blog_read_more" href="#">Read More ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- footer -->
<?php include_once('body_parts/footer.php')?>
<?php include_once('body_parts/footer_script.php')?>

