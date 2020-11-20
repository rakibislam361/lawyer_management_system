<?php include_once('body_parts/header.php')?>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <?php include_once ('body_parts/side_nav.php')?>
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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">All Cases</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
                <!-- Content Row -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Case ID</th>
                                <th>Phone number</th>
                                <th>Lawyer name</th>
                                <th>Lawyer phone</th>
                                <th>Status</th>
                                <th>Payment status</th>
                                <th>Active</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Case ID</th>
                                <th>Phone number</th>
                                <th>Lawyer name</th>
                                <th>Lawyer phone</th>
                                <th>Status</th>
                                <th>Payment status</th>
                                <th>Active</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $cases = mi_db_read_all('clients_cases');
                                if(!empty($cases)){
                                    foreach ($cases as $case){
                                        $client= mi_db_read_by_id('clients', array('id'=>$case['client_id']))[0];
                                        $lawyer = mi_db_read_by_id('lawyer', array('id'=>$case['lawyer_id']))[0];
                                        $payment=mi_db_read_by_id('enroll_membership', array('lawyer_id'=>$lawyer['id']))[0];
                                ?>
                            <tr>
                                <td><?=$case['case_id'];?></td>
                                <td><?=$client['phone'];?></td>
                                <td><?=$lawyer['name'];?></td>
                                <td><?=$lawyer['phone'];?></td>
                                <?php
                                    if ($case['status']==1){?>
                                        <td><span class="badge badge-warning"> Pending from client</span></td>
                                   <?php }elseif($case['status']==2){?>
                                        <td><span class="badge badge-info">Running</span></td>
                                   <?php }elseif($case['status']==3){?>
                                        <td><span class="badge badge-danger">Reject from Lawyer</span></td>
                                   <?php }elseIf($case['status']==4){?>
                                        <td><span class="badge badge-success">Complete</span></td>
                                   <?php }elseif($case['status']==5){?>
                                        <td><span class="badge badge-warning">Waitting Case Approval</span></td>
                                   <?php }elseif($case['status']==6){?>
                                        <td><span class="badge badge-primary">Case sends to Lawyer</span></td>
                                   <?php }else{?>
                                        <td><span class="badge badge-danger">Reject from Admin</span></td>
                                   <?php }?>
                                    <td>
                                        <?php if($payment['payment_status']==1){?>
                                            <span class="badge badge-danger">Incomplete</span>
                                        <?php }else{?>
                                            <span class="badge badge-success">Complete</span>
                                        <?php }?>
                                    </td>
                                <td>
                                        <a href="case_info.php?id=<?=$case['id'];?>" class="btn btn-sm btn-info">View</a>
                                    <?php if(($case['status']==1) || ($case['status']==5 || $case['status']==7)){?>
                                        <button class="btn btn-sm btn-primary active-case" value="<?=$case['id'];?>">Active</button>
                                    <?php }else{?>
                                        <button class="btn btn-sm btn-danger reject_case" value="<?=$case['id'];?>" name="reject_case">Reject</button></td>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php  }}?>
                           </tbody>
                        </table>
                    </div>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include_once ('body_parts/footer.php')?>
<!-- End of Page Wrapper -->
