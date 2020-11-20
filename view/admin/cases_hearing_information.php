<?php include_once('body_parts/header.php')?>
    <body id="page-top">

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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"> All cases list</h1>
                </div>

                <!-- Content Row -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Case ID</th>
                                    <th>Client address</th>
                                    <th>Files</th>
                                    <th>Request date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Case ID</th>
                                    <th>Client address</th>
                                    <th>Files</th>
                                    <th>Request date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php

                                $id = mi_get_session('lawyer_id');
                                $result = mi_db_read_by_id('clients_cases', array('lawyer_id'=>$id, 'status'=>2));
                                if (count($result)>0) {
                                    foreach ($result as $row) {
                                        $cdata= mi_db_read_by_id('clients', array('id'=>$row['client_id']))[0];
                                        $rqst_date= date("m/d/y",strtotime($row['status_change_date']));
                                        $rqst_time= date( "g:i a",strtotime($row['status_change_date']));
                                        ?>
                                        <tr>
                                            <td><?=$row['case_id'];?></td>
                                            <td><?=$cdata['address'];?></td>
                                            <td><a href="../<?=$row['case_document'];?>">Download</a></td>
                                            <td><?=$rqst_date;?> <span><?=$rqst_time;?></span></td>
                                            <?php if($row['status']=='1'){?>
                                                <td>Pending</td>
                                            <?php }elseif($row['status']=='2'){?>
                                                <td><span class="badge badge-primary">Running</span></td>
                                            <?php }elseif($row['status']=='3'){?>
                                                <td><span class="badge badge-danger">Reject</span></td>
                                            <?php }elseif($row['status']=='5'){?>
                                                <td><span class="badge badge-warning">Processing</span></td>
                                            <?php }else{?>
                                                <td>Complete</td>
                                            <?php }?>
                                            <td style="width:157px;">
                                                <a href="single_case_history.php?id=<?=$row['id'];?>"><button class="btn-sm btn-info">View</button>
                                                    <button class="btn-sm btn-danger">Reject</button>
                                            </td>
                                        </tr>
                                    <?php }
                                }?>
                                </tbody>
                            </table>
                        </div>
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
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include_once ('body_parts/footer.php')?>

