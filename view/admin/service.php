<?php include_once('body_parts/header.php')?>
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
                <h1 class="h3 mb-4 text-gray-800">Services Page </h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form method="post" id="add_services" enctype="multipart/form-data">
                                <div class="form-group">
                                    <select name="service" class="form-control">
                                        <option value="">Select service name</option>
                                        <?php
                                            $service=mi_db_read_all('service');
                                        foreach ($service as $srv){
                                        ?>
                                        <option value="<?=$srv['id'];?>"><?=$srv['service_name'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="service_type" class="form-control">
                                        <option value="">Select service type</option>
                                        <option value="1">Civil</option>
                                        <option value="2">Criminal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="services" placeholder="Services name..."/>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="service_image" placeholder="Services image" />
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="service_insert" value="1">
                                    <button type="submit" id="service_insert" class="btn btn-primary">Save </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Main/Sub</th>
                                        <th>s name</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Main/Sub</th>
                                        <th>Services name</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $services= mi_db_read_all('services');
                                        foreach ($services as $service){
                                            $srv=mi_db_read_by_id('service',array('id'=>$service['service_id']))[0];
                                        ?>
                                    <tr>
                                        <th><?=(isset($service['service_id']) &&!empty($service['service_id'])?$srv['service_name']:'')?></th>
                                        <th><?=(isset($service['service_id'])&&!empty($service['service_id'])?'Sub':'Main')?></th>
                                        <th><?=$service['services_name'];?>
                                        <th><?=(isset($srv['image']) &&!empty($srv['image'])?$srv['image']:'')?></td>
                                        <th>
                                            <select name="" id="">
                                                <option value="1" class="form-control">active</option>
                                                <option value="2" class="form-control">deactive</option>
                                            </select>
                                        </th>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

