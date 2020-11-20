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
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">User Profile</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <!-- section -->
    <div class="section padding_layout_1" style="padding-top: 0px;">
        <div class="container">
            <div class="row" style="margin-top:5%; margin-bottom: 20%;">
                <div class="col-md-4">
                    <div class="card">
                        <?php
                        $id = mi_get_session('id');
                        $row = mi_db_read_by_id('clients', array('id'=>$id))[0];
                        ?>
                        <div class="shadow" style="padding: 10px">
                            <div class="row m-auto">
                                <div class="col-md-12">
                                    <h4>Mr.<?=$row['name'];?></h4>
                                </div>
                            </div>

                            <div class="row m-auto">
                                <div class="col-md-4">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-4">
                                    <p style="margin-top: 0px;"><?php echo $row['phone'];?></p>
                                </div>
                            </div>

                            <div class="row m-auto">
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin-top: 0px;"><?php echo $row['email'];?></p>
                                </div>
                            </div>

                            <div class="row m-auto">
                                <div class="col-md-4">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin-top: 0px;"><?php echo $row['address'];?></p>
                                </div>

                                <form method="post" style="margin-left: 15px; margin-bottom: 20px" action="profile_update.php">
                                    <input type="submit" id="edit" class="btn btn-success" name="btnAddMore" value="Edit Profile"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h4>All Cases list</h4>
                    <hr>
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Lawyer name</th>
                            <th>Case documents</th>
                            <th>Applyed date</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $id = mi_get_session('id');
                        $data = mi_db_read_by_id('clients_cases', array('client_id'=>$id));

                        if (count($data)>0) {
                            foreach ($data as $row) {
                                $lname= mi_db_read_by_id('lawyer', array('id'=>$row['lawyer_id']))[0];
                                $comments_date = date('F, j,Y',strtotime($row['uploaded_date']));

                                ?>
                                <tr>
                                    <td><?=$lname['name'];?></td>
                                    <td><a href="<?=$row['case_document'];?>"><i class="fa fa-file" aria-hidden="true">Your File</i></a></td>
                                    <td><?= $comments_date;?></td>
                                    <?php if ($row['status']==1 || $row['status']==5 || $row['status']==6) {?>
                                        <td><labal class="badge badge-warning">Pending</labal></td>
                                    <?php } elseif ($row['status']==2) {?>
                                        <td><labal class="badge badge-primary">Running</labal></td>
                                    <?php } elseif ($row['status']==3) {?>
                                        <td><labal class="badge badge-danger">Rejected</labal></td>
                                    <?php } elseif ($row['status']==4) {?>
                                        <td><labal class="badge badge-success">Completed</labal></td>
                                    <?php } else {?>
                                        <td><labal class="badge badge-danger">Rejected</labal></td>
                                    <?php } ?>
                                    <td>
                                        <a href="case_details.php?id=<?=$row['id'];?>" class="btn-sm btn-info">View</a>
                                        <a href="#" class="btn-sm btn-primary"> Edit</a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

<?php include_once('body_parts/footer.php')?>
<?php include_once('body_parts/footer_script.php')?>