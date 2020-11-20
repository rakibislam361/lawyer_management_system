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
            <?php include_once ('body_parts/lawyer_top_nav.php')?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Totall cases</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $total_cases = mi_db_tbl_row_count('clients_cases', array('lawyer_id'=>$law_id));
                                                    if(!empty($total_cases)){
                                                        echo $total_cases ;
                                                    }else{
                                                        false ;
                                                    }
                                                ?>
                                        </div>
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
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total pending cases</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $total_pending = mi_db_tbl_row_count('clients_cases', array('lawyer_id'=>mi_get_session('lawyer_id'), 'status'=>6));
                                                if(!empty($total_pending)){
                                                    echo $total_pending ;
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Running cases</div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $total_runging = mi_db_tbl_row_count('clients_cases', array('lawyer_id'=>$law_id , 'status'=>2));
                                                        if(!empty($total_runging)){
                                                            echo $total_runging ;}else{false ;
                                                        }
                                                        ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Complete cases</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $completes = mi_db_tbl_row_count('clients_cases', array('lawyer_id'=>$law_id,'status'=>4));
                                            if(!empty($completes)){ echo $completes ;}else{false ;}?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="card" style="margin-bottom: 40px;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="indexdataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Case details</th>
                                    <th>Files</th>
                                    <th>Request date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Case details</th>
                                    <th>Files</th>
                                    <th>Request date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $id = mi_get_session('lawyer_id');
                                $result = mi_db_read_by_id('clients_cases', array('lawyer_id'=>$id));
                                if (count($result)>0) {
                                    foreach ($result as $row) {
                                        $cdata= mi_db_read_by_id('clients', array('id'=>$row['client_id']))[0];
                                        if($row['status']=='2' || $row['status']=='3' || $row['status']=='4' || $row['status']=='5' || $row['status']=='6' || $row['status']=='7'){
                                            ?>
                                            <tr>
                                                <td><?=$cdata['name'];?></td>
                                                <td><?=$cdata['address'];?></td>
                                                <td><a href="../<?=$row['case_document'];?>">Download</a></td>
                                                <td><?=$row['uploaded_date'];?></td>
                                                <?php if($row['status']=='6'){?>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                <?php }elseif($row['status']=='2'){?>
                                                    <td><span class="badge badge-primary">Running</span></td>
                                                <?php }elseif($row['status']=='3'){?>
                                                    <td><span class="badge badge-danger ">Rejected</span></td>
                                                <?php }elseif($row['status']=='5'){?>
                                                    <td><span class="badge badge-warning">Processing</span></td>
                                                <?php }elseif($row['status']=='7'){?>
                                                    <td><span class="badge badge-danger ">Rejected from Admin</span></td>

                                                <?php }else{?>
                                                    <td>Complete</td>
                                                <?php }?>
                                                <td style="width:157px;">
                                                    <a href="case_details.php?id=<?=$row['id'];?>"><button class="btn-sm btn-info">View</button></a>
                                                    <button valueid="<?=$row['id'];?>" class="btn-sm btn-danger reject">Reject</button>
                                                </td>
                                            </tr>
                                        <?php }}
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