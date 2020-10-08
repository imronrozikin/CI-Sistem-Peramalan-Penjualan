<?php $this->load->view('admin/includes/head') ?>
<?php $this->load->view('admin/includes/header') ?>

<div class="breadcome-area mg-t-40 mg-b-20">
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
                                                    <label class="login2 pull-right pull-right-pro">Produk</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="text" class="form-control" name="c_produk" value="<?php echo set_value('c_produk') ?>" />
                                                    <?php echo form_error('c_produk', '', '') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">Merk</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="text" class="form-control" name="merk" value="<?php echo set_value('merk') ?>" />
                                                    <?php echo form_error('merk', '', '') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">tipe</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="text" class="form-control" name="tipe" value="<?php echo set_value('tipe') ?>" />
                                                    <?php echo form_error('tipe', '', '') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">harga</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="number" min=0 class="form-control" name="harga" value="<?php echo set_value('harga') ?>" />
                                                    <?php echo form_error('harga', '', '') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">stok</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="number" min=0 class="form-control" name="stok" value="<?php echo set_value('stok') ?>" />
                                                    <?php echo form_error('stok', '', '') ?>
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