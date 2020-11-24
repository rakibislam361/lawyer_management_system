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
                    <h1 class="h3 mb-0 text-gray-800">All Clients</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
                <!-- Content Row -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <?php
                            $clients= mi_db_read_all('clients');
                            foreach ($clients as $client){
                            ?>
                            <tbody>
                            <tr>
                                <td><?=$client['name'];?></td>
                                <td><?=$client['email'];?></td>
                                <td><?=$client['phone'];?></td>
                                <td><?=$client['address'];?></td>
                                <td><?=$client['gender'];?></td>
                                <?php if($client['status']==1){?>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                <?php }else{ ?>
                                    <td><span class="badge badge-success">Verified</span></td>
                                <?php }?>
                                <?php if($client['status']==1){?>
                                    <td>
                                        <a href="#?id=<?=$client['id'];?>" class="btn btn-sm btn-info">View</a>
                                        <button class="btn btn-sm btn-primary active-clients" value="<?=$client['id'];?>">Active</button>
                                    </td>
                                <?php }else{?>
                                    <td>
                                        <a href="#?id=<?=$client['id'];?>" class="btn btn-sm btn-info">View</a>
                                        <button class="btn btn-sm btn-danger reject_client" value="<?=$client['id'];?>" name="reject_clients">Reject</button>
                                    </td>
                                <?php }?>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>            </div>
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



