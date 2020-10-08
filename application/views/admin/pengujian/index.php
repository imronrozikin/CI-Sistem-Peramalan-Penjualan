<?php $this->load->view('admin/includes/head') ?>
<?php $this->load->view('admin/includes/header') ?>

<div class="breadcome-area mg-t-40 mg-b-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="breadcome-heading">
                        <h2>Transaksi Form </h2>
                    </div>
                    <ul class="breadcome-menu">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                        </li>
                        <li><a href="#">Graphs</a> <span class="bread-slash">/</span>
                        </li>
                        <li><span class="bread-blod"> Transaksi Form </span>
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
                                                <div class="col-lg-2">
                                                    <label class="login2 pull-right pull-right-pro">Merk</label>
                                                </div>
                                                <div class="col-lg-5 text-left">
                                                    <select name="merk" id="" class="form-control">
                                                        <option value="">Semua Merk</option>
                                                        <?php foreach ($this->db->group_by('merk')->get('produk')->result() as $key => $value) : ?>
                                                            <option value="<?php echo $value->merk ?>" <?php echo ($value->merk == set_value('merk') ? "selected" : "") ?>><?php echo $value->merk ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-10">
                                                        <div class="login-horizental cancel-wp pull-left">
                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="no" data-editable="true">
                                                        <h5><b>No</b></h5>
                                                    </th>
                                                    <th data-field="tanggal" data-editable="true">
                                                        <h5><b>Periode</b></h5>
                                                    </th>
                                                    <th data-field="Nomer" data-editable="true">
                                                        <h5><b>Aktual</b></h5>
                                                    </th>
                                                    <th data-field="costumer" data-editable="true">
                                                        <h5><b>Predik</b></h5>
                                                    </th>
                                                    <th data-field="Mape" data-editable="true">
                                                        <h5><b>Mape</b></h5>
                                                    </th>
                                                    <th data-field="Mapeper" data-editable="true">
                                                        <h5><b>Mape %</b></h5>
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $data_mape = []; ?>
                                                <?php foreach ($peramalan as $key => $value) : ?>
                                                    <?php $data_mape[] = $value->mape; ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $key + 1 ?></td>
                                                        <td><?php echo $value->keterangan ?></td>
                                                        <td><?php echo $value->aktual ?></td>
                                                        <td><?php echo $value->predik ?></td>
                                                        <td><?php echo number_format($value->mape, 2) ?></td>
                                                        <td><?php echo number_format($value->mape * 100, 0) . "%" ?></td>

                                                    </tr>
                                                <?php endforeach ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-left">
                                        <h3>Total Mape &nbsp;&nbsp; : <?php echo (array_sum($data_mape)/count($data_mape)) ?></h3>
                                        <h3>Total Mape% : <?php echo (array_sum($data_mape)/count($data_mape)*100)."%" ?></h3>
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

<script src="<?php echo base_url("template/") ?>js/charts/Chart.js"></script>
<script src="<?php echo base_url("template/") ?>js/charts/line-chart.js"></script>