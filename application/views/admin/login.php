<?php $this->load->view('admin/includes/head') ?>

    <!-- Breadcome End-->
    <!-- login Start-->
    <div class="login-form-area mg-t-30 mg-b-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <form id="" class="adminpro-form" method="post">
                    <div class="col-lg-4">
                        <div class="login-bg">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="logo">
                                        <a href="#"><img src="<?php echo base_url('template/'); ?>img/logo/logo.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-title">
                                        <h1>Login Form</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p>E-mail</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                        <input type="text" name="username" value="<?php echo set_value('username') ?>"/>
                                        <i class="fa fa-envelope login-user" aria-hidden="true"></i>
                                    </div>
        <?php echo form_error('username','','') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p>Password</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                        <input type="password" name="password" />
                                        <i class="fa fa-lock login-user"></i>
                                    </div>
        <?php echo form_error('username','','') ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="forgot-password">
                                                <a href="#">Forgot password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-keep-me">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="remember" checked><i></i>Keep me logged in
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">

                                </div>
                                <div class="col-lg-8">
                                    <div class="login-button-pro">
                                        <a href="Register" type="submit" class="login-button login-button-rg">Register</a>
                                        <button type="submit" class="login-button login-button-lg">Log in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
    <!-- login End-->
    <!-- Footer Start-->
    <?php $this->load->view('admin/includes/footer') ?>