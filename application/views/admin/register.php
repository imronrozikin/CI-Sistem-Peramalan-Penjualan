<?php $this->load->view('admin/includes/head') ?>

    <!-- Breadcome End-->
    <!-- login Start-->
   <div class="login-form-area mg-t-30 mg-b-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <form id="" class="adminpro-form" method="post">
                    <div class="col-lg-6">
                        <div class="login-bg">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="logo">
                                        <a href="#"><img src="<?php echo base_url('template/') ?>img/logo/logo.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-title">
                                        <h1>Registration Form</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p>Full Name</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                            <div class="login-input-area register-mg-rt">
                                                <input type="text" name="nama" value="<?php echo set_value('nama') ?>"/>
                                                <i class="fa fa-user login-user"></i>
                                            </div>
        <?php echo form_error('nama', '', '') ?>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p>Username</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                        <input type="text" name="username" value="<?php echo set_value('username') ?>"/>
                                        <i class="fa fa-user login-user"></i>
                                    </div>
        <?php echo form_error('username', '', '') ?>
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
        <?php echo form_error('password', '', '') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p>Reenter Password</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                        <input type="password" name="repassword" />
                                        <i class="fa fa-lock login-user"></i>
                                    </div>
        <?php echo form_error('repassword', '', '') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <div class="login-button-pro">
                                        <a href="Login" class="login-button login-button-rg">Log In</a>
                                        <button type="submit" class="login-button login-button-lg">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    <!-- login End-->
    <!-- Footer Start-->
    <?php $this->load->view('admin/includes/footer') ?>