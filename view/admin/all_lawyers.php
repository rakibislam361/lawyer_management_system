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
                    <h1 class="h3 mb-0 text-gray-800">All Lawyers</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
                <!-- Content Row -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Request date</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>NID number</th>
                                <th>Document</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Request date</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>NID number</th>
                                <th>Document</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $lawyers= mi_db_read_all('lawyer');
                                if(!empty($lawyers)){
                                    foreach ($lawyers as $lawyer){
                                    $request_date = date('F j, Y',strtotime($lawyer['request_date']));
                                ?>
                             <tr>
                                <td><?=$lawyer['name'];?></td>
                                <td><?=$request_date;?></td>
                                <td><?=$lawyer['address'];?></td>
                                <td><?=$lawyer['phone'];?></td>
                                <td><?=$lawyer['nid'];?></td>
                                <td><a href="<?=$lawyer['documents'];?>">Download</a></td>

                                 <?php if($lawyer['status']==1){ ?>
                                        <td><span class="badge badge-danger">Email not verified</span></td>
                                 <?php }elseif($lawyer['status']==2){?>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                 <?php }elseif($lawyer['status']==3){ ?>
                                        <td><span class="badge badge-success">Verified</span></td>
                                 <?php }else{?>
                                     <td><span class="badge badge-danger">Rejected</span></td>
                                 <?php }?>
                                 <?php if($lawyer['status']==2){ ?>
                                    <td>
                                        <a href="lawyer_details.php?id=<?=$lawyer['id'];?>" class="btn btn-sm btn-info">View</a>
                                        <button class="btn btn-sm btn-primary active-lawyer" value="<?=$lawyer['id'];?>">Active</button>
                                    </td>
                                 <?php }elseif($lawyer['status']==3){?>
                                    <td>
                                        <a href="lawyer_details.php?id=<?=$lawyer['id'];?>" class="btn btn-sm btn-info">View</a>
                                        <button class="btn btn-sm btn-danger reject-lawyer" value="<?=$lawyer['id'];?>">Reject</button>
                                    </td>
                                 <?php }elseif($lawyer['status']==1){ ?>
                                    <td>
                                        <a href="lawyer_details.php?id=<?=$lawyer['id'];?>" class="btn btn-sm btn-info">View</a>
                                        <button class="btn btn-sm btn-primary active-lawyer" disabled>Active</button>
                                    </td>
                                 <?php }else{ ?>
                                     <td>
                                         <a href="lawyer_details.php?id=<?=$lawyer['id'];?>" class="btn btn-sm btn-info">View</a>
                                         <button class="btn btn-sm btn-primary active-lawyer" value="<?=$lawyer['id'];?>">Active</button>

                                     </td>
                                 <?php }?>
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

