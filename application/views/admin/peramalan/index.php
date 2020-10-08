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
                                                <div class="col-lg-1">
                                                    <label class="login2 pull-right pull-right-pro">Merk</label>
                                                </div>
                                                <div class="col-lg-5 text-left">
                                                    <select name="merk" id="" required class="form-control">
                                                        <option value="">Semua Merk</option>
                                                        <?php foreach ($this->db->group_by('merk')->get('produk')->result() as $key => $value) : ?>
                                                            <option value="<?php echo $value->merk ?>" <?php echo ($value->merk == set_value('merk') ? "selected" : "") ?>><?php echo $value->merk ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-1">
                                                    <label class="login2 pull-right pull-right-pro">Tahun</label>
                                                </div>
                                                 <div class="col-lg-5 text-left">
                                                 <select name="tahun" id="" required class="form-control">
                                                    <option value="">Semua Tahun</option>
                                                        <?php foreach ($this->db->query("SELECT YEAR(tgl) as thn FROM `transaksi` GROUP BY YEAR(tgl)")->result() as $key => $value) : ?>
                                                            <option value="<?php echo $value->thn ?>" ><?php echo $value->thn ?></option>
                                                        <?php endforeach ?>
                                                </select>  
                                            </div>
                                        </div>



                                        <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-10">
                                                        <div class="login-horizental cancel-wp pull-left">
                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="button" onclick="get_peramalan()">Save Change</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="basic-chart"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                        <canvas id="peramalanchart" width="515" height="257" style="display: block; width: 515px; height: 257px;"></canvas>
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
<script type="text/javascript">
    $(document).ready(function() {

    });

    var ctx;
    var peramalanchart;

    var get_peramalan = () => {
        var merk = $('[name="merk"]').val();
        var tahun = $('[name="tahun"]').val();
        $.ajax({
            url: "<?php echo base_url("Peramalan/hitung") ?>",
            type: "POST",
            data: {
                merk: merk,
                tahun: tahun
            },
            dataType: "JSON",
            success: (data) => {
                if (data.error == 0) {
                    if(peramalanchart != null){
                        peramalanchart.destroy();
                    }
                    ctx = document.getElementById("peramalanchart");
                    peramalanchart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.chart.label,
                            datasets: [{
                                label: "Aktual",
                                fill: false,
                                backgroundColor: '#303030',
                                borderColor: '#303030',
                                data: data.chart.aktual
                            }, {
                                label: "Peramalan",
                                fill: false,
                                backgroundColor: '#03a9f4',
                                borderColor: '#03a9f4',
                                data: data.chart.predik

                            }]
                        },
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Basic Line Chart'
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Month'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Value'
                                    }
                                }]
                            }
                        }
                    });
                } else {
                    alert(data.message);
                }
            }
        })
    }
</script>