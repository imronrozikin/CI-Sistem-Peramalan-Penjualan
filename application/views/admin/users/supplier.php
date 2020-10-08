<?php $this->load->view('admin/includes/head') ?>
<?php $this->load->view('admin/includes/header') ?>

<div class="breadcome-area mg-t-40 mg-b-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcome-list shadow-reset">
                        <div class="breadcome-heading">
                            <h2>Users Form</h2>
                        </div>
                        <ul class="breadcome-menu">
                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                            </li>
                            <li><span class="bread-blod">Users Form</span>
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
                            <h1>Projects <span class="table-project-n">Data</span> Table</h1><br/>
                            <a href="Supplier/insert" style="margin-left" class="btn btn-primary">Tambah Suppllier</a>
                            <div class="sparkline13-outline-icon">
                                <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                <span><i class="fa fa-wrench"></i></span>
                                <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                          
                            <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                             <table id="table" data-toggle="table" data-key-events="true" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="nama" data-editable="true"><h5><b>Nama</b></h5></th>
                                        <th data-field="alamat" data-editable="true"><h5><b>Alamat</b></h5></th>
                                        <th data-field="telepon" data-editable="true"><h5><b>Telepon</b></h5></th>
                                        <th data-field="username" data-editable="true"><h5><b>Username</b></h5></th>
                                        <th><h5><b>Level</b></h5></th>
                                        <th></th>
                                        <th data-field="action"><h5><b>Action</b></h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users_data as $key => $value): ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $value->nama ?></td>
                                            <td><?php echo $value->alamat ?></td>
                                            <td><?php echo $value->telepon ?></td>
                                            <td><?php echo $value->username ?></td>
                                            <td><?php echo $value->level ?></td>
                                            <td>
                                                <img src="<?php echo base_url("storage/users/".$value->gambar) ?>" width="100px">
                                            </td>
                                            <td class="datatable-ct">
                                                <a class="btn btn-primary" href="Users/update/<?php echo $value->id ?>" class="datatable-ct"><i class="fa fa-pencil">Update</i></a>
                                                <a class="btn btn-danger" href="Users/delete/<?php echo $value->id ?>" class="datatable-ct"><i class="fa fa-trash">Hapus</i></a>
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
<?php $this->load->view('admin/includes/footer') ?>