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
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Profile</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Profile</li>
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
                        <h2>Attorney's Profile</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $id = $_GET['id'];
            $data = mi_db_read_by_id('lawyer', array('id'=>$id ,'status'=>3))[0];
            $lawyer_type = mi_db_read_by_id('lawyer_category', array('id'=>$data['lawyer_category_id']))[0];
        ?>
        <div class="row">
            <div class="col-md-4">
                <section>
                    <div id="single_attorney">
                        <img id="single_img" src="<?=$data['image'];?>" style="" alt="#" />
                    </div>
                    <br>
                    <h5>lawyer of</h5>
                    <p style="text-transform:uppercase; margin-top: 5px;">
                        <?=$lawyer_type['category_name'];?>
                        <br>
                        <i class="fa fa-map-marker-alt"><?=$data['address'];?></i>
                    </p>
                    <hr>
                    <h5>service area</h5>

                    <p>
                        <?php
                        if(!empty($data['services_id'])){
                            $service=json_decode($data['services_id']);
                            $srv = $service->service_id;
                            $srvc=mi_db_read_by_id('service',array('id'=>$srv))[0];
                            $categories = $service->category;
                        }
                        ?>
                        <a href="" class="badge badge-pill badge-secondary">
                            <?=$srvc['service_name'];?>
                        </a>
                        <?php
                        foreach ($categories as $cat){
                            ?>
                            <a href="" class="badge badge-pill badge-secondary">
                                <?=$cat;?>
                            </a>
                        <?php }?>
                    </p>
                    <br>
                    <h5>Contact</h5>
                    <hr>
                    <p><i class="glyphicon glyphicon-gift"></i>  <?php
                        $datas =  $data['phone'];
                        $result = substr($datas, 0, 2);
                        $result .= "*******";
                        $result .= substr($datas, 7, 4);
                        echo $result;
                        ?><br>
                    example@gmail.com</p>
                </section>
            </div>
            <div class="col-md-8">
                <?php if(mi_get_session('id') && !empty(mi_get_session('id'))){?>
                    <button type="submit" class="btn btn-secondary pull-right popupBtn" value="<?=$data['id'];?>"> HIRE NOW</button>
               <?php }else{ ?>
                    <button type="submit" class="btn btn-secondary pull-right loginPopup" value="<?=$data['id'];?>" >HIRE NOW</button>
                <?php }?>

                <section>
                    <h3><?=$data['name'];?></h3>
                    <p id="small_tag" style="">Associate Lawyer</p>
                    <hr>
                    <p><?=$data['self_details'];?></p>
                    <br>
                    <h5>Education & Bar Admission</h5>
                    <hr>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et
                        quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti</p>
                    <br>
                    <h5>Membership & Awards </h5>
                    <hr>
                    <h6><strong>Membership</strong></h6>
                    <ul>
                        <li><h6> > Enrolled as Advocate of the Appellate Division of the Supreme Court of Bangladesh.</h6></li>
                        <li><h6> > Enrolled as Advocate of the High Court Division of the Supreme Court of Bangladesh.</h6></li>
                        <li><h6> > Enrolled as Advocate of the Courts subordinate to the High Division of the Supreme Court of Bangladesh.</h6></li>
                        <li><h6> > Member, International Bar Association</h6></li>
                        <li><h6> > Member, Inter Pacific Bar Association</h6></li>
                        <li><h6> > Life member of the Honorable Society of Lincoln's Inn, UK; and</h6></li>
                        <li><h6> > Member, Supreme Court Bar Association of Bangladesh</h6></li>
                        <li><h6> > Member, Dhaka Bar Association of Bangladesh</h6></li>

                    </ul>
                    <h6><strong>Awards</strong></h6>
                    <ul>
                        <li><h6> > Venture Capital Law - Barrister of the Year - Bangladesh - Lawyer Monthly</h6></li>
                        <li><h6> > Mergers & Acquisitions-Lawyer of the year 2017 by Finance Monthly</h6></li>
                        <li><h6> > Recommended lawyer by Legal 500</h6></li>
                        <li><h6> > Winner of International Advisory Experts Award for 2017</h6></li>
                        <li><h6> > Lawyer Monthly, Private Client 2017- "Lawyer of the Year" for 2017.</h6></li>
                        <li><h6> > Finance Monthly Legal Award 2016- "Best Commercial Lawyer".</h6></li>
                        <li><h6> > Recommended lawyer by British High Commission</h6></li>
                    </ul>
                    <br>
                    <h5>Case progress</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Complete Cases</div>
                        <div class="col-md-12">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%; background: #c19d30;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                            </div>
                        </div>
                    </div>
                   <br>
                    <div class="row">
                        <div class="col-md-3">Clients satisfaction</div>
                        <div class="col-md-12">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%; background: #c19d30;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Case completed</div>
                        <div class="col-md-12">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%; background: #c19d30;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">95%</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your case details and file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    $id = mi_get_session('id');
                    $data = mi_db_read_by_id('clients', array('id'=>$id));
                    foreach($data as $row){
                ?>
                <div class="modal-body">
                    <form id="casedetails" method="post" id="modal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Upload your case document</label>
                            <input type="file" class="form-control" name="document" style="overflow: hidden;" placeholder="Your document*" value="" />
                            <input type="hidden" class="form-control" name="id" placeholder="Name *" value="<?=$row['id']; ?>" />
                            <input type="hidden" class="form-control" name="lid" placeholder="id *" value="<?=$lid ;?>" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="case_details"  placeholder="Please tell us your case details in short..."></textarea>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="hidden" name="upload-file" value="1">
                        <button type="submit" id="upload-file" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>

</section>
<!-- end section -->


<!-- footer -->
<?php include_once('body_parts/footer.php')?>
<?php include_once('body_parts/footer_script.php')?>