<?php include_once('body_parts/header.php')?>
<?php
    $id=$_GET['id'];
    $lawyer= mi_db_read_by_id('lawyer', array('id'=>$id))[0];
    $law_cat= mi_db_read_by_id('lawyer_category', array('id'=> $lawyer['lawyer_category_id']))[0];
   // print_r($law_cat['category_name']); return;
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
                <h1 class="h3 mb-4 text-gray-800">Lawyer Page</h1>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="height: 50%"><img src="../<?=$lawyer['image'];?>" alt="" style="height:100% "></div>
                        <labal>Bar council certificate </labal>
                        <div><h5><icon class="fa fa-file"></icon><a href="../<?=$lawyer['documents'];?>"> Flie download </a></h5></div>
                    </div>
                    <div class="col-md-8 card" style="padding: 20px;">
                        <div class="row">
                            <div class="col-sm-4"><strong>Name </strong></div>
                            <div class="col-sm-6"><?=$lawyer['name'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Email </strong></div>
                            <div class="col-md-8"><?=$lawyer['email'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>NID number </strong></div>
                            <div class="col-sm-8"><?=$lawyer['nid'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Phone </strong></div>
                            <div class="col-sm-8"><?=$lawyer['phone'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Lawyer Of </strong></div>
                            <div class="col-sm-8"><?=$law_cat['category_name'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Lawyer type(case) </strong></div>
                            <div class="col-sm-8"><?=$lawyer['case_type'];?></div>
                        </div>
                        <hr><div class="row">
                            <div class="col-sm-4"><strong>Address </strong></div>
                            <div class="col-sm-4"><?=$lawyer['address'];?></div>
                        </div>
                        <hr><div class="row">
                            <div class="col-sm-4"><strong>Division </strong></div>
                            <div class="col-sm-8"><?=$lawyer['service_area'];?></div>
                        </div>
                        <hr><div class="row">
                            <div class="col-sm-4"><strong>Services </strong></div>
                            <div class="col-sm-8"><?php
                                if(!empty($lawyer['services_id'])){
                                    $service= json_decode($lawyer['services_id']);
                                    $srv = $service->service_id;
                                    $srvc= mi_db_read_by_id('service',array('id'=>$srv))[0];
                                    $categorice= $service->category;
                                    $cat= implode(", ", $categorice);
                                    echo $srvc['service_name'];
                                    echo $cat;
                                }
                                ?></div>
                        </div>
                        <hr><div class="row">
                            <div class="col-sm-4"><strong>Bio </strong></div>
                            <div class="col-sm-8"><?=$lawyer['self_details'];?></div>
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

