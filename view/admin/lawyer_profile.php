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
                                        <div class="main-body">
                                            <div class="row gutters-sm">
                                                <div class="col-md-4 mb-4">
                                                    <div class="">
                                                        <div class="card-body">
                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                <img src="../<?=$lawyer['image'];?>" alt="Lawyer" class="rounded-circle" width="150">
                                                                <h4><?=$lawyer['name'];?></h4>
                                                                <p class="text-secondary mb-1"><?=$lawyer_of['category_name'];?></p>
                                                                <p class="text-muted font-size-sm"><?=$lawyer['address'];?></p>
                                                                <?php if (!empty($lawyer['education']) && !empty($lawyer['awards']) && !empty($lawyer['law_member'])){?>
                                                                    <a href="upgrade_profile.php" class="btn btn-sm btn-warning">Updata Education</a>
                                                                <?php }else{?>
                                                                    <a href="upgrade_profile.php" class="btn btn-sm btn-warning">Complete your profile</a>
                                                                <?php }?>

                                                            </div>
                                                            <div class="mt-3">
                                                                <ul class="list-group list-group-flush">
                                                                    <a href="lawyer_member_info.php?id=<?=$lawyer['id'];?>" style="color: black">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                        <h6 class="mb-0"></svg>Membership</h6>
                                                                        <?php $mdata=mi_db_read_by_id('enroll_membership', array('lawyer_id'=>mi_get_session('lawyer_id')))[0]; if($mdata['payment_status']==2){?>
                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                        <?php }else{?>
                                                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                                                        <?php }?>
                                                                    </li>
                                                                    </a>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                                                        <span class="text-secondary">@bootdey</span>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                                                        <span class="text-secondary">bootdey</span>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                                                        <span class="text-secondary">bootdey</span>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="mb-4">
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <a href="update_profile.php" class="btn btn-primary float-right"><icon class="fa fa-pencil"></icon> Edit</a>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-3">Profile complete</div>
                                                                <div class="col-md-12">
                                                                    <?php
                                                                        $bar= 0;
                                                                        if (!empty($lawyer['education'])){
                                                                            $bar += 1;
                                                                        }
                                                                        if (!empty($lawyer['awards'])){
                                                                            $bar += 1;
                                                                        }
                                                                        if (!empty($lawyer['law_member'])) {
                                                                            $bar += 1;
                                                                        }
                                                                      ?>
                                                                    <div class="progress">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated <?=($bar == 1?'progress-ber80':($bar == 2?'progress-ber90':($bar == 3?'progress-ber100':'progress-ber70')));?>" role="progressbar"
                                                                             aria-valuenow="<?=($bar == 1?'80':($bar == 2?'90':($bar == 3?'100':'70')));?>" aria-valuemin="0"
                                                                             aria-valuemax="100"><?=($bar == 1?'80%':($bar == 2?'90%':($bar == 3?'100%':'70%')));?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Email</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['email'];?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Phone</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['phone'];?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">NID</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['nid'];?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Gender</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['gender'];?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Case Type</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?php if($lawyer['case_type']==1){
                                                                        echo 'Civil';
                                                                    }else{
                                                                        echo 'Criminal';
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Providing services</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?php
                                                                        if(!empty($lawyer['services_id'])){
                                                                            $service= json_decode($lawyer['services_id']);
                                                                            $srv = $service->service_id;
                                                                            $srvc= mi_db_read_by_id('service',array('id'=>$srv))[0];
                                                                            $categorice= $service->category;
                                                                            $cat= implode(", ", $categorice);
                                                                            echo $srvc['service_name'];
                                                                            echo $cat;
                                                                        }
                                                                     ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Services Area</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['service_area'];?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Education</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['education'];?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">Award & membership</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['awards'];?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h6 class="mb-0">About my self (Bio)</h6>
                                                                </div>
                                                                <div class="col-sm-8 text-secondary">
                                                                    <?=$lawyer['self_details'];?>
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
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">

                </div>

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