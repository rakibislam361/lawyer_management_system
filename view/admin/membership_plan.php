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
            <h1 class="h3 mb-4 text-gray-800">Membership plan</h1>
                <div class="card-body">
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >CREAT NEW PLAN</button><br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Plan Name</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Stats</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $membership= mi_db_read_all('membership_plan');
                            if(!empty($membership)){
                                foreach ($membership as $plan){
                                    ?>
                                    <tr>
                                        <td><?=$plan['plan_name'];?></td>
                                        <td style="width: 56%;"><?=$plan['details'];?></td>
                                        <td><?=$plan['price'];?></td>
                                        <?php if ($plan['status']==1){?>
                                        <td><span class="badge badge-danger">Stop</span></td>
                                        <?php }else{?>
                                          <td><span class="badge badge-success">Running</span></td>
                                        <?php }?>
                                        <td>
                                            <button class="btn btn-sm btn-info" onclick="membership(this.value)" value="<?=$plan['id'];?>"><icon class="fa fa-pencil"></icon>Edit</button>
                                        <?php if ($plan['status']==1){?>
                                            <button type="submit" class="btn btn-sm btn-primary membership-plan-active" value="<?=$plan['id'];?>">Active</button>
                                        <?php }else{?>
                                            <button type="submit" class="btn btn-sm btn-danger membership-plan-active" value="<?=$plan['id'];?>">Stop</button>
                                        <?php }?>
                                        </td>
                                    </tr>
                                <?php }} ?>
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
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!--Membership Edit plan Modal -->
<div class="modal fade" id="membership-edit" tabindex="-1" role="dialog" aria-labelledby="membership-edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="membership-edit">Create plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" id="membership-edit-form" enctype="multipart/form-data">
                    <div id="plan_details">

                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>


<!-- Create membership -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" id="membership-modal" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="input" class="form-control" name="name" placeholder="Plan name"/>
                    </div>
                    <div class="form-group">
                        <input type="input" class="form-control" name="price" placeholder="Price" />
                    </div>
                    <div class="form-group">
                        <select name="month" class="form-control">
                            <option value="1">month 1</option>
                            <option value="2">month 2</option>
                            <option value="3">month 3</option>
                            <option value="4">month 4</option>
                            <option value="5">month 5</option>
                            <option value="6">month 6</option>
                            <option value="7">month 7</option>
                            <option value="8">month 8</option>
                            <option value="9">month 9</option>
                            <option value="10">month 10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" name="plan_details" placeholder="Plan details ..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" name="membership-plan" value="1">
                        <button type="submit" id="membership-plan" class="btn btn-primary">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once ('body_parts/footer.php')?>

