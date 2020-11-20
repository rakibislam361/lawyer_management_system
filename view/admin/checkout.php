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
            <?php include_once ('body_parts/lawyer_top_nav.php')?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Checkout</h1>
                <?php if(mi_get_session('member_id') && !empty(mi_get_session('member_id'))) {
                    $member_data =mi_get_session('member_id');
                    $lawyer=mi_db_read_by_id('lawyer', array('id'=>$member_data['lawyer_id']))[0];
                    $membership_plan=mi_db_read_by_id('membership_plan', array('id'=>$member_data['membership_id']))[0];
                }?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">Plan Name</div>
                                                <div>:</div>
                                                <div class="col-md-7"><?=$membership_plan['plan_name'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Price</div>
                                                <div>:</div>
                                                <div class="col-md-7"><?=$membership_plan['price'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Details</div>
                                                <div>:</div>
                                                <div class="col-md-7"><?=$membership_plan['details'];?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <form id="payment_form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                <input type='hidden' id="business" name="business" value="sb-ndksn3706470@business.example.com">
                                                <input type='hidden' id="user_id" name="user_id" value="<?=$lawyer['id'];?>">
                                                <input type='hidden' id="item_id" name="item_number" value="<?=$membership_plan['id'];?>">
                                                <input type='hidden' id="item_name" name="item_name" value="<?=$membership_plan['plan_name'];?>">
                                                <input type='hidden' id="price" name="amount" value="<?=$membership_plan['price'];?>">
                                                <input type='hidden' name='no_shipping' value='1'>
                                                <input type='hidden' name='currency_code' value='USD'>
                                                <input type="hidden" name="transaction_id" id="transaction_id">
                                                <input type="hidden" name="transaction_status" id="transaction_status">
                                                <input type="hidden" name="pay_now" value="1">
                                                <button style="display: none;" type="submit" id="pay_now"></button>
                                                <div class="col-md-8 m-auto" id="paypal-button-container"></div>
                                            </form>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- DataTales Example -->
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