<?php include_once('body_parts/header.php')?>
    <body id="page-top">
<?php
$lawyer = mi_db_read_by_id('lawyer',array('id'=>mi_get_session('lawyer_id')))[0];
$lawyer_of = mi_db_read_by_id('lawyer_category', array('id'=>$lawyer['lawyer_category_id']))[0];
?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once ('body_parts/lawyer_side_nav.php')?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('body_parts/lawyer_top_nav.php')?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container">
                                                <div class="main-body md-8">
                                                    <div class="row gutters-sm">
                                                        <div class="col-md-8 m-auto">
                                                            <?php
                                                                $lawyer_id=$_GET['id'];
                                                                 $law_data=mi_db_read_by_id('enroll_membership', array('lawyer_id'=>$lawyer_id,'payment_status'=>2));
                                                                    if(isset($law_data) && !empty($law_data)){
                                                                        $law_data=mi_db_read_by_id('enroll_membership', array('lawyer_id'=>$lawyer_id))[0];
                                                                        $membership=mi_db_read_by_id('membership_plan', array('id'=>$law_data['membership_id']))[0];
                                                                        $membership_start= date("m/d/y",strtotime($law_data['start_date']));
                                                                        $membership_end= date( "m/d/y",strtotime($law_data['end_date']));
                                                                  ?>

                                                            <h1>Your Membership Plan</h1>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><h5><?=$membership['plan_name'];?> $<?=$membership['price'];?><button class="btn btn-sm btn-primary pull-right">Upgrade your Plan</button></p></h5>
                                                                    <p><?=$membership['details'];?></p>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-4"><h6>Plan start date</h6></div><div>:</div>
                                                                        <div class="col-4"><h6><?=$membership_start?></h6></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4"><h6>Plan End date</h6></div><div>:</div>
                                                                        <div class="col-4"><h6><?=$membership_end?></h6></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                               <?php }else{?>
                                                                <h1>You don't have any membership</h1>
                                                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary m-auto"> APPLY FOR MEMBERSHIP </button>
<!--                                                                <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary">Applied for Membership</button>-->

                                                                <?php }?>
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
                                                                <input type="hidden" name="url" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
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

                <!-- End of Main Content -->

                </div>
                <!-- /.container-fluid -->

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