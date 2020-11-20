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
                    <h1 class="h3 mb-0 text-gray-800">Enrolled membership lawyer list</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
                <!-- Content Row -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Lawyer</th>
                                <th>Phone</th>
                                <th>Plan</th>
                                <th>Duration</th>
                                <th>Start from</th>
                                <th>End date</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Lawyer</th>
                                <th>Phone</th>
                                <th>Plan</th>
                                <th>Duration</th>
                                <th>Start from</th>
                                <th>End date</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $enroll_membership= mi_db_read_all('enroll_membership');
                            if(!empty($enroll_membership)){
                                foreach ($enroll_membership as $membership){
                                    $member_lawyer=mi_db_read_by_id('lawyer', array('id'=>$membership['lawyer_id']))[0];
                                    $plan_detls=mi_db_read_by_id('membership_plan', array('id'=>$membership['membership_id']))[0];
                                    $start_date = date('F j, Y',strtotime($membership['start_date']));
                                    $end_date = date('F j, Y',strtotime($membership['end_date']));
                                    ?>
                                    <tr>
                                        <td><?=$member_lawyer['name'];?></td>
                                        <td><?=$member_lawyer['phone'];?></td>
                                        <td><?=$plan_detls['plan_name'];?></td>
                                        <td><?=$plan_detls['month'];?> month</td>
                                        <td><?=$start_date;?></td>
                                        <td><?=$end_date;?></td>
                                        <?php if($membership['payment_status']==1){?>
                                        <td><span class="badge badge-warning">Non paid</span></td>
                                        <?php }else{?>
                                            <td><span class="badge badge-success">Paid</span></td>
                                        <?php }?>
                                        <td>
                                            <a href="lawyer_details.php?id=<?=$member_lawyer['id'];?>" class="btn btn-sm btn-info">View</a>
                                            <button type="submit" class="btn btn-sm btn-danger reject-lawyer">Reject</button>
                                        </td>
                                    </tr>
                                <?php }}?>
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


