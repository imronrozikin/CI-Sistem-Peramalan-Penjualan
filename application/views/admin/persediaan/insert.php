<?php $this->load->view('admin/includes/head') ?>
<?php $this->load->view('admin/includes/header') ?>

<div class="breadcome-area mg-t-40 mg-b-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="breadcome-heading">
                        <h2>Persediaan Form </h2>
                    </div>
                    <ul class="breadcome-menu">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                        </li>
                        <li><a href="#">Graphs</a> <span class="bread-slash">/</span>
                        </li>
                        <li><span class="bread-blod"> Persediaan Form </span>
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
                                                    <label class="login2 pull-right pull-right-pro">Tanggal</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="date" class="form-control" name="tgl" value="<?php echo (set_value('tgl') == "" ? date("Y-m-d") : set_value('tgl')) ?>" value="<?php echo date("Y-m-d") ?>" />
                                                    <?php echo form_error('tgl', '', '') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">Nomer</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="text" class="form-control" name="nomer" value="<?php echo (set_value('nomer') == "" ? $kode : set_value('nomer')) ?>" />
                                                    <?php echo form_error('nomer', '', '') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">Supplier</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="text" name="supplier" class="form-control" list="supplier">
                                                    <datalist id="supplier">
                                                        <?php foreach ($this->db->group_by('supplier')->get('persediaan')->result() as $key => $value) : ?>
                                                            <option><?php echo $value->supplier ?></option>
                                                        <?php endforeach ?>
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">Karyawan</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <select name="fk_user_karyawan" class="form-control">
                                                        <?php foreach ($this->db->where('level', 2)->get('users')->result() as $key => $value) : ?>
                                                            <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">Harga</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="number" name="harga" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <h4>Detail Produk</h4>

                                        <div id="container-produk">

                                        </div>
                                        <button type="button" onclick="add_produk()" class="btn btn-primary">Add Produk</button>

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

<?php $this->load->view('admin/includes/footer') ?>
<script type="text/javascript">
    $(document).ready(function() {

    });

    var idx = 1;
    var add_produk = () => {
        $.ajax({
            url: "<?php echo base_url("Persediaan/form_insert_produk") ?>",
            type: "POST",
            data: {
                id: idx,
            },
            success: (data) => {
                $('#container-produk').append(data);
                idx++;
            }
        })
    }
</script>