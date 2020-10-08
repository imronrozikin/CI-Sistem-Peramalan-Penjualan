<?php $this->load->view('admin/includes/head') ?>
<?php $this->load->view('admin/includes/header') ?>
<div class="breadcome-area mg-t-40 mg-b-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="breadcome-heading">
                        <h2>Update Transaksi</h2>
                    </div>
                    <ul class="breadcome-menu">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                        </li>
                        <li><a href="#">Graphs</a> <span class="bread-slash">/</span>
                        </li>
                        <li><span class="bread-blod">Update Transaksi</span>
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
                                                    <input type="date" class="form-control" name="tgl" value="<?php echo $transaksi_data->tgl == "" ? date("Y-m-d") : $transaksi_data->tgl ?>" value="<?php echo date("Y-m-d") ?>" />
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
                                                    <input type="text" class="form-control" name="nomer" value="<?php echo $transaksi_data->nomer == "" ? $kode : $transaksi_data->nomer ?>" />
                                                    <?php echo form_error('nomer', '', '') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">Customer</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="text" class="form-control" name="customer" value="<?php echo $transaksi_data->customer ?>" />
                                                    <?php echo form_error('customer', '', '') ?>
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
                                                    </select>a
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="login2 pull-right pull-right-pro">Harga</label>
                                                </div>
                                                <div class="col-lg-9 text-left">
                                                    <input type="number" name="harga" class="form-control" value="<?php echo $transaksi_data->harga ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <?php $no = 0; $p=0;
                                         foreach ($this->db->query("SELECT detailtransaksi.id AS idtrans, detailtransaksi.*, produk.* FROM `detailtransaksi` INNER JOIN produk ON detailtransaksi.fk_produk = produk.id where fk_transaksi = '$transaksi_data->id'")->result() as $key => $value) : ?>
                                        <div id="container-produk">               
                                         <div class="form-group-inner">
                                         <div class="row produk_data">
                                            <div class="col-lg-3">
                                               <label class="login2 pull-right pull-right-pro">Produk</label>
                                            </div>
                                         <div class="col-lg-3 text-left">
                                         
                                         <input type="hidden" name="id_detail[<?php echo $no; ?>]" value="<?php echo $value->idtrans ?>">
                                         <select name="updateProduk[<?php echo $no; ?>]" class="form-control form-produk" onchange="reset_harga()">
                                         <option class="form-control" data-harga="<?php echo $value->harga ?>" value="<?php echo $value->id?>"><?php echo $value->c_produk . " : " . $value->merk . " - " . $value->tipe . " STOK:" . $value->stok . "| RP." . $value->harga ?></option>
                                        <?php foreach ($this->db->get('produk')->result() as $keyP => $valueP): ?>
                                        <?php if($value->id != $valueP->id) : ?>
                                        <option  class="form-control" value="<?php echo $valueP->id?>" data-harga="<?php echo $valueP->harga ?>"><?php echo $valueP->c_produk . " : " . $valueP->merk . " - " . $valueP->tipe . " STOK:" . $valueP->stok . "| RP." . $valueP->harga ?> </option><?php endif ?>
                                        <?php endforeach ?> 
                                        </select>
                                        </div>
                                        <div class="col-lg-3 text-left">
                                            <input type="number" name="jumlah[<?php echo $no; ?>]" class="form-control form-jumlah" value="<?php echo $value->jumlah ?>" onchange="reset_harga()"></input>
                                        </div>
                                        <!-- <div class="col-lg-3 text-left">
                                            <button type="button" onclick="$(this).parents('.form-group-inner').remove()" class="btn btn-sm btn-danger">X</button>
                                        </div>
 -->                                        </div>
                                        </div>
                                        <?php $no++; $p++;
                                        endforeach ?>
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
            url: "<?php echo base_url("Transaksi/form_update_produk") ?>",
            type: "POST",
            data: {
                id: idx,
            },
            success: (data) => {
                $('#container-produk').append(data);
                $idx++;
            }
        })
    }
    var reset_harga = () => {
        let total = 0;
        $('#container-produk').find('.produk_data').each(function(i,item){
            let harga = $(item).find(".form-produk").find(":selected").data('harga');
            let jumlah = $(item).find('.form-jumlah').val();
            total += parseInt(harga)*parseInt(jumlah);            
        });
        $('[name="harga"]').val(total);
        console.log(jumlah);
    }
</script>