<?php $this->load->view('admin/includes/head') ?>
<?php $this->load->view('admin/includes/header') ?>
<div class="breadcome-area mg-t-40 mg-b-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcome-list shadow-reset">
                        <div class="breadcome-heading">
                            <h2>Login Form</h2>
                        </div>
                        <ul class="breadcome-menu">
                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                            </li>
                            <li><a href="#">Graphs</a> <span class="bread-slash">/</span>
                            </li>
                            <li><span class="bread-blod">Login Form</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="data-table-area mg-b-40">
    <div class="container">
     <div class="row">
        <div class="col-lg-12">
            <div class="sparkline12-list shadow-reset mg-t-30">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>All Form Element</h1>
                        <div class="sparkline12-outline-icon">
                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                            <span><i class="fa fa-wrench"></i></span>
                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="all-form-element-inner">
                                    <?php echo form_open_multipart('') ?>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">Nama</label>
                                            </div>
                                            <div class="col-lg-9 text-left">
                                                <input type="text" class="form-control" name="nama" value="<?php echo $users_data->nama ?>"/>
                                                <?php echo form_error('nama', '', '') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">alamat</label>
                                            </div>
                                            <div class="col-lg-9 text-left">
                                                <input type="text" class="form-control" name="alamat" value="<?php echo $users_data->alamat ?>"/>
                                                <?php echo form_error('alamat', '', '') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">telepon</label>
                                            </div>
                                            <div class="col-lg-9 text-left">
                                                <input type="text" class="form-control" name="telepon" value="<?php echo $users_data->telepon ?>"/>
                                                <?php echo form_error('telepon', '', '') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">username</label>
                                            </div>
                                            <div class="col-lg-9 text-left">
                                                <input type="text" class="form-control" name="username" value="<?php echo $users_data->username ?>"/>
                                                <?php echo form_error('username', '', '') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">password</label>
                                            </div>
                                            <div class="col-lg-9 text-left">
                                                <input type="text" class="form-control" name="password" value=""/>
                                                <?php echo form_error('password', '', '') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="login2 pull-right pull-right-pro">repassword</label>
                                            </div>
                                            <div class="col-lg-9 text-left">
                                                <input type="text" class="form-control" name="repassword" value=""/>
                                                <?php echo form_error('repassword', '', '') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Select</label>
                                                        </div>
                                                        <div class="col-lg-9 text-left">
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value" name="level">
                                                                <?php if(user_allow([1],false)): ?>
                                                                    <option value="1" <?php echo $users_data->level == '1' ? 'selected' : ''  ?>>Administration</option>
                                                                <?php endif ?>
                                                                    <option value="2" <?php echo $users_data->level == '2' ? 'selected' : ''  ?>>Karyawan</option>
                                                                </select>
                                                            </div>
                                                <?php echo form_error('level', '', '') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Gambar</label>
                                            </div>
                                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                              <input type="file" name="gambar">
    <?php echo form_error('gambar', '', '') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-9">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button class="btn btn-white" type="submit">Cancel</button>
                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Breadcome End-->
<!-- login Start-->

<!-- login End-->
<!-- Footer Start-->
<?php $this->load->view('admin/includes/footer') ?>