<?php include_once('body_parts/header.php');?>

    <body id="default_theme" class="contact">
    <!-- loader -->
    <div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /> </div>
    <!-- end loader -->

    <!-- header -->
    <header id="default_header" class="header_style_1">
        <!-- header bottom -->
        <?php include_once('body_parts/top-head-nav.php')?>
        <!-- header bottom end -->
    </header>
    <!-- end header -->

    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section_cases">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Case Details</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li class="active">Case details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <?php
        $id = $_GET['id'];
        if(!empty($id)){
            $data = mi_db_read_by_id('clients_cases', array('id'=>$id))[0];
            $approve_date = date('F j, Y',strtotime($data['status_change_date']));
            $applayed_date = date('F j, Y',strtotime($data['uploaded_date']));
            $next_hearing_date = mi_db_custom_query("SELECT `next_date` FROM `case_update_information` WHERE case_id=".$id." ORDER BY `next_date` DESC LIMIT 1");
            //print_r($next_hearing_date); return;
            foreach ($next_hearing_date as $date){
                if(!empty($next_hearing_date)) {
                    $hearing_date = date('F j, Y',strtotime($date['next_date']));
                }
            }

            $case_hearing = mi_db_read_by_id('case_update_information', array('case_id'=>$data['id']));
            $lawyer = mi_db_read_by_id('lawyer', array('id'=>$data['lawyer_id']))[0];
        }
    ?>

    <!-- section -->
    <div class="section padding_layout_1" style="padding-top: 0px;">
        <div class="container">
            <div class="row" style="margin-top:5%;">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Cases Information </div>
                        <div class="shadow" style="font-size: medium; padding: 10px;">
                            <div class="row">
                                <div class="col-md-5"><strong>Case ID</strong></div>:
                                <div class="col-md-6"><?=$data['case_id'];?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"><strong>Next hearing date</strong></div>:
                                <div class="col-md-6"><?php if(!empty($hearing_date)){ echo $hearing_date;} ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"><strong>Case status</strong></div>:
                                <div class="col-md-6">
                                    <?php
                                    if ($data['status']==1 || $data['status']==5 || $data['status']==6) {
                                        echo "Pending";
                                    }elseif($data['status']==2){
                                        echo "Running";
                                    }elseif($data['status']==4) {
                                        echo "Complete";
                                    }else{
                                        echo "Reject";
                                    }
                                    ?>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-md-5"><strong>Allayed date</strong></div>:
                                <div class="col-md-6"><?=$applayed_date;?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"><strong>Approval date</strong></div>:
                                <?php if(!empty($data['status']) && $data['status']==2){?>
                                    <div class="col-md-6"><?=$approve_date;?></div>
                                <?php }else{?>
                                    <div class="col-md-6"> Not approve yet</div>
                                <?php } ?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5"><strong>Lawyer Name</strong></div>:
                                <div class="col-md-6"><?=$lawyer['name'];?></div>
                            </div>
                            <?php if ($data['status']==2){?>
                                <div class="row">
                                    <div class="col-md-5"><strong>Contact</strong></div>:
                                    <div class="col-md-6"><?=$lawyer['phone'];?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5"><strong>Email address</strong></div>:
                                    <div class="col-md-6"><?=$lawyer['email'];?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5"><strong>Address</strong></div>:
                                    <div class="col-md-6"><?=$lawyer['address'];?></div>
                                </div>
                            <?php }else{?>

                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php
                    if (!empty($data) && $data['status']==2) {
                        $lname= mi_db_read_by_id('lawyer', array('id'=>$data['lawyer_id']))[0];
                        $comments_date = date('F j, Y',strtotime($data['uploaded_date']));
                        ?>
                        <div class="card">
                            <div class="card-header">Case details</div>
                            <div class="card-body">
                                <p><?=$data['case_details'];?> </p>
                            </div>
                        </div>
                        <div class="card" style="margin-top: 50px;">
                            <div class="card-header"> Case's Next hearing date information</div>
                            <div class="card-body">
                                <table id="myDataTable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Next cort Date</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $record = mi_db_read_by_id('case_update_information', array('case_id'=>$data['id']), false, 'id', 'ASC', 5);
                                    //print_r($record);
                                    if (count($record)>0) {
                                        foreach ($record as $case) {
                                            $comments_date = date('F j, Y',strtotime($case['next_date']));
                                            ?>
                                            <tr>
                                                <td><?=$comments_date;?></td>
                                                <td><?=$case['details'];?></td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    <?php }elseif($data['status']==3 || $data['status']==7){?>
                        <div class="card">
                            <div class="card-header">Case details</div>
                            <div class="card-body">
                                <div class="lobibox-box">
                                    <h1>Sorry ! We cannot approve your case right now</h1>
                                </div>
                            </div>
                        </div>
                    <?php }elseif($data['status']==4){?>
                        <div class="card">
                            <div class="card-header">Case details</div>
                            <div class="card-body">
                                <div class="lobibox-box">
                                    <h1> Your case is successfully Done .</h1>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="card">
                            <div class="card-header">Case details</div>
                            <div class="card-body">
                                <div class="lobibox-box">
                                    <h1> PLease wait for Admin approval</h1>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
    <!-- end section -->

<?php include_once('body_parts/footer.php')?>
<?php include_once('body_parts/footer_script.php')?>