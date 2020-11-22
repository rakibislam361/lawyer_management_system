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
                        <div class="col-md-12 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form  method="post" id="upgrade_lawyer_form" enctype="multipart/form-data">
                                       <div class="row">
                                           <div class="col-4">
                                               <div class="form-group">
                                                   <label>Education History</label>
                                                   <textarea type="text" cols="30" rows="10" class="form-control" name="education" value="<?=(isset($lawyer['education'])&&!empty($lawyer['education'])?$lawyer['education']:'')?>" placeholder="education...."><?=(isset($lawyer['education'])&&!empty($lawyer['education'])?$lawyer['education']:'')?></textarea>
                                               </div>
                                           </div>
                                           <div class="col-4">
                                               <div class="form-group">
                                                   <label>Member oF</label>
                                                   <textarea type="text" cols="30" rows="10" class="form-control" name="member" value="<?=(isset($lawyer['law_member'])&&!empty($lawyer['law_member'])?$lawyer['law_member']:'')?>" placeholder="member of...."><?=(isset($lawyer['law_member'])&&!empty($lawyer['law_member'])?$lawyer['law_member']:'')?></textarea>
                                               </div>
                                           </div>
                                           <div class="col-4">
                                               <div class="form-group">
                                                   <label>Award</label>
                                                   <textarea type="text" cols="30" rows="10" class="form-control" name="award" value="<?=(isset($lawyer['awards'])&&!empty($lawyer['awards'])?$lawyer['awards']:'')?>" placeholder="what type of award you achieved.... "><?=(isset($lawyer['awards'])&&!empty($lawyer['awards'])?$lawyer['awards']:'')?></textarea>
                                               </div>
                                           </div>
                                       </div>
                                        <div class="row" style="flex-flow: row-reverse;">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a href="lawyer_profile.php" class="btn btn-danger form-control">BACK</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" name="upgrade-form" value="1">
                                                <input type="hidden" name="lawyer-id" value="<?=$lawyer['id'];?>">
                                                <button type="submit" class="btn btn-primary form-control" style="margin-left: 25px;" name="save" id="upgrade-form">SAVE</button>
                                            </div>
                                        </div>
                                    </form>
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