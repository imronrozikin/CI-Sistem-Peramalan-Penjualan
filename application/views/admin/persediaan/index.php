<?php $this->load->view('admin/includes/head') ?>
<?php $this->load->view('admin/includes/header') ?>

<div class="breadcome-area mg-t-40 mg-b-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcome-list shadow-reset">
                        <div class="breadcome-heading">
                            <h2>Persediaan Form</h2>
                        </div>
                        <ul class="breadcome-menu">
                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                            </li>
                            <li><span class="bread-blod">Persediaan Form</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="basic-form-area mg-b-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list shadow-reset">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Projects <span class="table-project-n">Data</span> Table</h1><br>
                            <a href="Persediaan/insert" style="margin-left" class="btn btn-primary">Tambah Persediaan</a>
                            <!-- <a href="Persediaan/insert" style="margin-left" class="btn btn-primary">Tambah Persediaan</a> -->
                            <div class="sparkline13-outline-icon">
                                <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                <span><i class="fa fa-wrench"></i></span>
                                <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            
                        <!-- <a href="Persediaan/insert">Tambah</a> -->
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
                                        <th data-field="no" data-editable="true"><h5><b>No</b></h5></th>
                                        <th data-field="tanggal" data-editable="true"><h5><b>Tanggal</b></h5></th>
                                        <th data-field="Nomer" data-editable="true"><h5><b>Nomer</b></h5></th>
                                        <th data-field="supplier" data-editable="true"><h5><b>Supplier</b></h5></th>
                                        <th data-field="karyawan" data-editable="true"><h5><b>Karyawan</b></h5></th>
                                        <th data-field="detail" data-editable="true"><h5><b>Detail</b></h5></th>
                                        <th data-field="action"><h5><b>Action</b></h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($persediaan_data as $key => $value): ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $value->tgl ?></td>
                                            <td><?php echo $value->nomer ?></td>
                                            <td><?php echo $value->supplier ?></td>
                                            <td><?php echo $value->nama_karyawan ?></td>
                                            <td><?php echo $value->detail ?></td>
                                            <td class="datatable-ct">
                                                <a href="Persediaan/update/<?php echo $value->id ?>" class="datatable-ct"><i class="fa fa-pencil"></i>Update</a>
                                            </td>
                                            <td class="datatable-ct">
                                                <a href="Persediaan/delete/<?php echo $value->id ?>" class="datatable-ct"><i class="fa fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
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
<?php $this->load->view('admin/includes/footer') ?>S