<!--login form-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="lform" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="md-form mb-4">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control validate">
                    </div>

                    <div class="md-form mb-4">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control validate">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input type="hidden" name="check" value="client" checked>
                    <input type="hidden" name="login">
                    <button type="submit" class="btn btn-primary" id="login">SUBMIT</button>
                    <a href="signup.php" class="btn btn-info pull-right" style="color: white;">SIGN UP</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--login form end-->

<footer class="footer_blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-3">
                        <div class="full text-align_center_rs">
                            <img src="images/layout_img/footer_logo.png" alt="#" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="full left-padding_15 d-none d-sm-block text-align_center_rs">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupt quos dolores et quas molestias..</p>
                        </div>
                        <div class="full left-padding_15">
                            <div class="social_icon_team">
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter_form">
                            <h3>subscribe for newsletter</h3>
                            <form action="#">
                                <fieldset>
                                    <div class="field">
                                        <input type="email" placeholder="Enter Your E-mail....." name="email" required="" />
                                        <button><img src="images/layout_img/newslettr_icon.png" alt="#" /></button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6 d-none d-sm-block offset-lg-1">
                        <div class="full">
                            <h3>Usefull Link</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="cases.php">Cases</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 d-none d-sm-block offset-lg-1">
                        <div class="full">
                            <h3>Practice Area</h3>
                            <ul>
                                <li><a href="practise_area.php#bl">Business Law</a></li>
                                <li><a href="practise_area.php#fl">Family Law</a></li>
                                <li><a href="practise_area.php#cl">Criminal Law</a></li>
                                <li><a href="practise_area.php#pi">Personal Injury</a></li>
                                <li><a href="practise_area.php#re">Real Estate</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 offset-lg-1">
                        <div class="cpy full text_align_center">
                            <p>Designed and developed by <a href="https://softminion.com/">Softminion</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- js section -->
