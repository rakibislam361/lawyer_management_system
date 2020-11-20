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
                    <h1 class="h3 mb-0 text-gray-800">Case Hearing details</h1>
                </div>

                <!-- Content Row -->
                <?php
                $id= $_GET['id'];
                $case_information = mi_db_read_by_id('clients_cases', array('id'=>$id))[0];
                ?>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Basic Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">CASE INFORMATION</h6>
                            </div>
                            <div class="card-body">
                                <?=$case_information['case_details'];?>
                            </div>
                        </div>
                        <?php
                            $id= $_GET['id'];
                            $case_information = mi_db_read_by_id('clients_cases', array('id'=>$id))[0];
                            $case_hearing = mi_db_read_by_id('case_update_information',array('case_id'=>$case_information['id']));
                        ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Default Card Example -->
                                    <button class="btn btn-sm btn-primary" style=" margin-bottom: 15px;" onclick="myFunction()">Case history (show/hide)</button>
                                    <div class="card" id="myDIV" style="margin-bottom: 15px;">
                                        <div class="card-body">
                                             <div class="table-responsive">
                                                <table class="table table-striped" id="indexdataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>Next hearing date</th>
                                                        <th>Message</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Next hearing date</th>
                                                        <th>Message</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    <?php
                                                    foreach ($case_hearing as $cases){
                                                    $case_cmnt_date= date("m/d/y",strtotime($cases['comments_date']));
                                                    $case_cmnt_time= date( "g:i a",strtotime($cases['comments_date']));
                                                    ?>
                                                    <tr>
                                                        <td><?=$case_cmnt_date;?></td>
                                                        <td><?=$cases['details'];?>.</td>
                                                        <td>
                                                            <?php if($cases['case_status']=='pending'){?>
                                                            <span class="badge badge-rounded badge-warning">Pending</span>
                                                            <?php }elseif($cases['case_status']=='reject'){?>
                                                            <span class="badge badge-rounded badge-danger">Reject</span>
                                                            <?php }elseif($cases['case_status']=='complete'){?>
                                                                <span class="badge badge-rounded badge-danger">Complete</span>
                                                            <?php }else{?>
                                                            <span class="badge badge-rounded badge-success">Running</span>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="container bootstrap snippets bootdeys">
                            <h4>Recent Activity</h4>
                            <hr>
                            <div class="timeline-centered timeline-sm">
                                <?php
                                $data = mi_db_read_by_id('lawyer_case_comnt', array('user_id'=>$case_information['lawyer_id']));
                                if (count($data)>0) {
                                    foreach ($data as $key => $lawyer) {
                                        $ldata = mi_db_read_by_id('lawyer', array('id'=>$lawyer['user_id']))[0];
                                        $comments_date= date("m/d/y",strtotime($lawyer['comments_date']));
                                        $comments_time= date( "g:i a",strtotime($lawyer['comments_date']));
                                        if($lawyer['type']=='Lawyer'){

                                            ?>

                                            <article class="timeline-entry left-aligned">
                                                <div class="timeline-entry-inner">
                                                    <time datetime="2014-01-10T03:45" class="timeline-time"><span><?=$comments_time;?></span><span><?=$comments_date;?></span></time>
                                                    <div class="timeline-icon bg-green"><i class="fa fa-group"></i></div>
                                                    <div class="timeline-label bg-green"><h4 class="timeline-title"><?=$ldata['name'];?></h4>

                                                        <p><?=$lawyer['comments'];?>.</p></div>
                                                </div>
                                                <?php if (count($data) == ($key+1)){?>
                                                    <div class="timeline-entry-inner">
                                                        <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);" class="timeline-icon comment_modal" mival="<?=$id;?>">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </article>
                                        <?php }else{?>
                                            <article class="timeline-entry">
                                                <div class="timeline-entry-inner">
                                                    <time datetime="2014-01-09T13:22" class="timeline-time"><span><?=$comments_time;?></span><span><?=$comments_date;?></span></time>
                                                    <div class="timeline-icon bg-orange"><i class="fa fa-paper-plane"></i></div>
                                                    <div class="timeline-label bg-orange"><h4 class="timeline-title"><?=$lawyer['type'];?></h4>
                                                        <p><?=$lawyer['comments'];?>.</p></div>
                                                </div>
                                                <?php if (count($data) == ($key+1)){?>
                                                    <div class="timeline-entry-inner">
                                                        <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);" class="timeline-icon comment_modal" mival="<?=$id;?>">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </article>
                                        <?php }}}else{?>
                                    <article class="timeline-entry left-aligned">
                                        <div class="timeline-entry-inner text-center">
                                            <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);" class="timeline-icon comment_modal" mival="<?=$id;?>">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </div>
                                    </article>
                                <?php }?>
                            </div>
                        </div>


                    </div>

                    <div class="col-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Next hearing information</h6>
                            </div>

                            <div class="card-body">
                                <form id="next_hearing" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="date">Next hearing date:</label>
                                        <input type="date" name="ndate" id="datepicker" class="form-control"  min="<?php echo date('Y-m-d'); ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="Text">Case hearing information (optional)</label>
                                        <textarea type="text" name="case_information" rows="4" class="form-control" id="details"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="case_status">
                                            <option> Select a option</option>
                                            <option value="running"> Case running </option>
                                            <option value="pending"> Case pending </option>
                                            <option value="complete"> Complete </option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="case_id" value="<?=$case_information['id'];?>"/>
                                    <input type="hidden" name="lawyer_id" value="<?=$case_information['lawyer_id'];?>">
                                    <input type="hidden" name="hearing_submit" value="1">
                                    <button type="submit" class="btn btn-primary" id="hearing_submit"> Save </button>
                                    <button type="button" class="btn btn-danger reject"> CASE REJECT </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- Comments Modal -->
        <div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-m" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comments box</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="c-form" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <textarea rows="5" style="margin: 15px;" name="comments" class="form-control"></textarea>
                                <input type="hidden" name="comment_case_id">
                                <input type="hidden" name="user_id" value="<?=mi_get_session('lawyer_id');?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="c-submit" value="1">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="c-submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Comments Modal -->


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