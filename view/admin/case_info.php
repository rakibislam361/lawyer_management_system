<?php
    include_once ('body_parts/header.php');
    if(!empty($id = $_GET['id'])) {
        $id = $_GET['id'];
        $case_dtls = mi_db_read_by_id('clients_cases', array('id' =>$id))[0];
    }
?>


    <body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include_once ('body_parts/side_nav.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include_once ('body_parts/top_nav.php')?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Case details
                    <button class="btn btn-danger float-right reject_case" value="<?=$case_dtls['id'];?>" name="reject_case">Reject</button></td>
                    <button class="btn btn-primary float-right active-case" style="margin-right: 5px;" data-status-id="<?=$case_dtls['status'];?>" value="<?=$case_dtls['id'];?>">Active</button>
                </h1>

                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Case Status </div>
                                        <?php if($case_dtls['status']=='1'){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Pending </div>
                                        <?php }elseif($case_dtls['status']=='2'){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Running </div>
                                        <?php }elseif($case_dtls['status']=='3'){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Rejected </div>
                                        <?php }elseif($case_dtls['status']=='5'){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Waiting for approval </div>
                                        <?php }elseif($case_dtls['status']=='6'){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Case send to lawyer </div>
                                        <?php }elseif($case_dtls['status']=='7'){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Case reject from admin </div>
                                       <?php }else{?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Case completed </div>
                                        <?php }?>
                                    </div>
                                    <!--                                 <div class="col-auto">-->
                                    <!--                                     <i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                                    <!--                                 </div>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Client Name</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $client =mi_db_read_by_id('clients', array('id'=>$case_dtls['client_id']))[0]; echo $client['name'];?><br><small><?=$client['address'];?></small> </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Lawyer Name </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $name = mi_db_read_by_id('lawyer', array('id'=>$case_dtls['lawyer_id']))[0];
                                            echo $name['name']; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total case updates</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $case_record =mi_db_tbl_row_count('case_update_information', array('case_id'=>$case_dtls['id'],'status'=>1)); echo $case_record;?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">                 <!-- Illustrations -->
                    <div class="col-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> All information about Case</h6>
                            </div>
                            <div class="card-body">
                                <!--                            <div class="text-center">-->
                                <!--                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">-->
                                <!--                            </div>-->
                                <p> <?=$case_dtls['case_details'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div>

                            <h4>Recent Activity</h4>

                            <!-- end of user messages -->
                            <div class="container bootstrap snippets bootdeys">
                                <div class="col-md-9">
                                    <div class="timeline-centered timeline-sm">
                                        <?php
                                        $data = mi_db_read_by_id('lawyer_case_comnt', array('clints_case_id'=>$case_dtls['id']));
                                        if (count($data)>0) {
                                            foreach ($data as $key => $lawyer) {
                                                $comments_date= date("m/d/y",strtotime($lawyer['comments_date']));
                                                $comments_time= date( "g:i a",strtotime($lawyer['comments_date']));
                                                if($lawyer['type']=='Lawyer'){
                                                    $ldata = mi_db_read_by_id('lawyer', array('id'=>$lawyer['user_id']))[0];
                                                    ?>

                                                    <article class="timeline-entry left-aligned">
                                                        <div class="timeline-entry-inner">
                                                            <time datetime="2014-01-10T03:45" class="timeline-time"><span><?=$comments_time;?></span><span><?=$comments_date;?></span></time>
                                                            <div class="timeline-icon bg-green"><i class="fa fa-group"></i></div>
                                                            <div class="timeline-label bg-green"><h4 class="timeline-title"><?=$ldata['name'];?></h4>

                                                                <p><?=$lawyer['comments'];?>.</p></div>
                                                        </div>
                                                        <?php if (count($data) == ($key+1)){?>
                                                            <div class="timeline-entry-inner">
                                                                <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);" class="timeline-icon comment_modal" mival="<?=$case_dtls['id'];?>">
                                                                    <i class="fa fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </article>
                                                <?php }else{?>
                                                    <article class="timeline-entry">
                                                        <div class="timeline-entry-inner">

                                                            <time datetime="2014-01-09T13:22" class="timeline-time"><span><?=$comments_time;?></span><span><?=$comments_date;?></span></time>
                                                            <div class="timeline-icon bg-orange"><i class="fa fa-paper-plane"></i></div>
                                                            <div class="timeline-label bg-orange"><h4 class="timeline-title"><?=$lawyer['type'];?></h4>

                                                                <p><?=$lawyer['comments'];?>.</p></div>
                                                        </div>
                                                        <?php if (count($data) == ($key+1)){?>
                                                            <div class="timeline-entry-inner">
                                                                <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);" class="timeline-icon comment_modal" mival="<?=$case_dtls['id'];?>">
                                                                    <i class="fa fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </article>
                                                <?php }}}else{?>
                                            <article class="timeline-entry">
                                                <div class="timeline-entry-inner">
                                                    <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);" class="timeline-icon comment_modal" mival="<?=$case_dtls['id'];?>">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <!-- end of user messages -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- Comments Modal -->
            <div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comments box</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="c-form" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <textarea rows="5" style="margin: 15px;" name="comments" class="form-control"></textarea>
                                    <input type="hidden" name="comment_case_id">
                                    <input type="hidden" name="user_id" value="<?=mi_get_session('admin_id');?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="c-submit" value="1">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="c-submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Comments Modal -->
            <!-- Large modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Membership Plan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="m-form" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <?php $mem_plan= mi_db_read_all('membership_plan');
                                    if(count($mem_plan)>0){
                                        foreach ($mem_plan as $row){
                                            ?>
                                            <div class="col-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><?=$row['plan_name'];?>
                                                            <input type="radio" name="m-plan" value="<?=$row['id'];?>" class="float-right"></h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <?=$row['details'];?>
                                                        </div>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }}?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input name="law_id" type="hidden" value="<?=mi_get_session('lawyer_id');?>">
                                <input type="hidden" name="action" value="m-plan">
                                <button type="submit" id="submit" name="m-submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include_once ('body_parts/footer.php')?>

