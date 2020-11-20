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

                    <?php $lawyer = mi_db_read_by_id('lawyer',array('id'=>$law_id))[0];?>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="card m-auto">
                            <div class="card-body">
                                <form  method="post" id="update_lawyer_form" enctype="multipart/form-data">
                                    <div class="row register-form m-auto">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Your Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name *" value="<?=$lawyer['name'];?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone *" value="<?=$lawyer['phone'];?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email *" value="<?=$lawyer['email'];?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>NID number</label>
                                                <input type="number" class="form-control" name="nid" placeholder="NID number *" value="<?=$lawyer['nid'];?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Your image</label>
                                                <input type="file" class="form-control" name="image" style="overflow: hidden">
                                            </div>
                                            <div class="form-group">
                                                <label>Full address</label>
                                                <textarea class="form-control" rows="3" name="address" value="" placeholder="Address..."><?=$lawyer['address'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="male" checked>
                                                        <span> Male </span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="female">
                                                        <span>Female </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="update_lawyer" value="1">
                                            <input type="hidden" name="lawyer_id" value="<?=$lawyer['id'];?>">
                                            <input type="submit" class="btn btn-primary" id="update_lawyer" value="Update" />
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Service area</label>
                                                <select class="form-control" name="area">
                                                    <option value="<?=$lawyer['service_area'];?>"><?=$lawyer['service_area'];?></option>
                                                    <option value="dhaka">Dhaka Division</option>
                                                    <option value="Barisal">Barisal Division</option>
                                                    <option value="Mymensingh">Mymensingh Divisioni</option>
                                                    <option value="Chittagong">Chittagong Division</option>
                                                    <option value="Khulna">Khulna Division</option>
                                                    <option value="Rangpur">Rangpur Division</option>
                                                    <option value="Rangpur">Rangpur Division</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Write about your self</label>
                                                <textarea class="form-control" rows="5" name="self-desc" placeholder="Describe yourself here..."><?=$lawyer['self_details'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="category">
                                                    <option value="<?=$lawyer['lawyer_category_id'];?>">
                                                        <?php $lawyer_cat = mi_db_read_by_id('lawyer_category', array('id'=>$lawyer['lawyer_category_id']))[0]; echo $lawyer_cat['category_name'];?>
                                                    </option>
                                                    <?php
                                                    $category = mi_db_read_all('lawyer_category');
                                                    foreach($category as $cat){
                                                        if($category==true){ ?>
                                                            <option value="<?php echo $cat['id'];?>"><?=$cat['category_name'];?></option>
                                                        <?php }else{
                                                            echo 'it not working';
                                                        }
                                                    }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <label class="radio inline">
                                                        <input type="radio" name="case_type" id="criminal" value="2" checked>
                                                        <span> Criminal</span>

                                                        <input type="radio" name="case_type" id="civil" value="1">
                                                        <span>Civil </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="service" name="service" onchange="mservice(this.value)">
                                                    <?php
                                                        $service=json_decode($lawyer['services_id']);
                                                        $srvc= $service->service_id;
                                                        $srv=mi_db_read_by_id('service',array('id'=>$srvc))[0];

                                                    $allService = mi_db_read_all('service');
                                                    foreach ($allService as $service) {?>
                                                        <?php
                                                        if($srv['service_name'] == $service['service_name']){ ?>
                                                            <option value="<?=$service['id'];?>" selected><?=$service['service_name'];?></option>
                                                            <?php }else{ ?>
                                                            <option value="<?=$service['id'];?>"><?=$service['service_name'];?></option>
                                                            <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group" id="services">
                                                <?php
                                                    $result= mi_db_read_by_id('services', array('service_id'=>$srv['id']));
                                                    $checked = json_decode($lawyer['services_id'], true)['category'];
                                                    foreach ($result as $key => $rs) { ?>
                                                        <input type="checkbox" name="services[]" value="<?=$rs['services_name'];?>"
                                                            <?=(in_array($rs['services_name'], $checked))?'checked':'';?>>
                                                        <label for="vehicle1"><?=$rs['services_name'];?></label><br>
                                                    <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label> Bar council certificate</label>
                                                <input type="file" class="form-control" name="document" style="overflow: hidden">
                                            </div>
                                        </div>
                                    </div>
                                </form>

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