<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
    }
    public function index()
    {
        $transaksi_data = $this->db
            ->select('*,(select nama from users where id=transaksi.fk_user_karyawan) as nama_karyawan')
            ->get('transaksi')
            ->result();

        foreach ($transaksi_data as $key => $value) {
            $detail = $this->db
                ->select("detailtransaksi.*,produk.c_produk nama_produk")
                ->join('produk', 'detailtransaksi.fk_produk=produk.id')
                ->where('fk_transaksi', $value->id)
                ->get('detailtransaksi')->result();

            $string_detail = "";
            foreach ($detail as $k => $v) {
                $string_detail .= $v->nama_produk . "[" . $v->jumlah . "]; ";
            }
            $transaksi_data[$key]->detail = $string_detail;
        }
        $data['transaksi_data'] = $transaksi_data;

        $this->load->view('admin/transaksi/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['kode'] = $this->generate_id();
            $this->load->view('admin/transaksi/insert', $data);
        } else {
            $set = [
                'tgl' => $this->input->post('tgl'),
                'nomer' => $this->input->post('nomer'),
                'customer' => $this->input->post('customer'),
                'fk_user_karyawan' => $this->input->post('fk_user_karyawan'),
                'harga' => $this->input->post('harga'),
            ];
             
            $this->db->insert('transaksi', $set);

            $id_transaksi = $this->db->insert_id();

            $produk = $this->input->post('produk');
            foreach ($produk as $key => $value) {
                $set_ = [
                    'fk_transaksi' => $id_transaksi,
                    'fk_produk' => $value['fk_produk'],
                    'jumlah' => $value['jumlah']
                ];
                $this->db->insert('detailtransaksi', $set_);

                $data_produk = $this->db->where('id', $value['fk_produk'])->get('produk')->row(0);

                $new_stok = $data_produk->stok - $value['jumlah'];
                $this->db->where('id', $value['fk_produk'])->update("produk", ['stok' => $new_stok]);

               
            
            }
            redirect('Transaksi');
        }
    }
     public function update($id_transaksi)
    {
        $this->load->library('form_validation');

        $transaksi_data = $this->db
            ->where('id', $id_transaksi)
            ->get('transaksi')
            ->row(0);

        $unique_transaksi = "";
        if ($this->input->post('id') != $transaksi_data->id) {
            $unique_username = '|is_unique[transaksi.id]';
        }

        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('nomer', 'nomer', 'trim|required');
        $this->form_validation->set_rules('customer', 'customer', 'trim|required');
        $this->form_validation->set_rules('fk_user_karyawan', 'fk_user_karyawan', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        

        if ($this->form_validation->run() == false) {
            $transaksi_data = $this->db
                ->where('id', $id_transaksi)
                ->get('transaksi')
                ->row(0);
            $data['transaksi_data'] = $transaksi_data;
            $this->load->view('admin/transaksi/update', $data);
        } else {
            $set_transaksi = [
                'tgl' => $this->input->post('tgl'),
                'nomer' => $this->input->post('nomer'),
                'customer' => $this->input->post('customer'),
                'fk_user_karyawan' => $this->input->post('fk_user_karyawan'),
                'harga' => $this->input->post('harga')
            ];
            $this->db
                ->where('id', $id_transaksi)
                ->update('transaksi', $set_transaksi);
            
            $id_transaksi = $this->input->post('id_detail');
            $jumlah = $this->input->post('jumlah');
            $produk = $this->input->post('updateProduk');
            for($j=0;$j<count($produk);$j++){             
                $set_ = [
                    'fk_produk' => $produk[$j],
                    'jumlah' => $jumlah[$j]
                ];

            $data_produk = $this->db->where('id',$produk[$j])->get('produk')->row(0);
            $data_stok = $this->db->where('id',$id_transaksi[$j])->get('detailtransaksi')->row(0);
            $stokB = $data_produk->stok;
            $C_stok = $data_stok->jumlah;
            $B_stok = 0;
            if ($jumlah[$j] == 0) {
                $new_stok = $stokB + $C_stok;
            }else if($C_stok > $jumlah[$j]){
                $B_stok = $C_stok - $jumlah[$j]; 
                $new_stok =  $stokB + $B_stok;
            }else if($C_stok < $jumlah[$j]){
                $B_stok = $jumlah[$j] - $C_stok;
                $new_stok = $stokB - $B_stok;
            }else{
                $new_stok = $stokB;
            }
             $this->db->query("UPDATE produk SET stok = '$new_stok' WHERE id = '$produk[$j]'");
             $this->db->where('id', $id_transaksi[$j])->update('detailtransaksi',$set_);
            // echo "<prev>";
            // var_dump($C_stok);
            // die();
            // echo "</prev>";
        }
           redirect('Transaksi');
        }
    }


    public function form_insert_produk()
    {
        $id = $this->input->post('id');
        $data['id'] = $id;
        $this->load->view('admin/transaksi/form_insert_produk', $data);
    }
    public function form_update_produk()
    {
        $id = $this->input->post('id');
        $data['id'] = $id;
        $this->load->view('admin/transaksi/form_update_produk', $data);
    }

    public function delete($id_transaksi)
    {
        $this->db->where('id', $id_transaksi)->delete('transaksi');
        redirect("Transaksi");
    }
    public function cetak($id_transaksi)
    {
        $this->load->library('pdf');
            $pdf = new FPDF('l','mm','A5');
            // membuat halaman baru
            $pdf->AddPage();
              // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',16);
            // mencetak string 
            $pdf->Cell(190,7,'Struk Pembelian UD. Rama Jaya',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'Produk : ',0,1,'C');
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(60,6,'tgl',1,0);
            $pdf->Cell(35,6,'nomer',1,0);
            $pdf->Cell(27,6,'customer',1,0);
            $pdf->Cell(40,6,'fk_user_karyawan',1,0);
            $pdf->Cell(27,6,'harga',1,1);
            $pdf->SetFont('Arial','',10);
            $transaksi = $this->db->where('id', $id_transaksi)->get('transaksi')->result();
            foreach ($transaksi as $row){
            $pdf->Cell(60,6,$row->tgl,1,0);
            $pdf->Cell(35,6,$row->nomer,1,0);
            $pdf->Cell(27,6,$row->customer,1,0);
            $pdf->Cell(40,6,$row->fk_user_karyawan,1,0);
            $pdf->Cell(27,6,$row->harga,1,1); 
     
        }
               $pdf->Output('struk.pdf', 'D');
    }


    function generate_id()
    {
        $last_row = $this->db->order_by('id', 'desc')->get('transaksi')->row(0);
        if ($last_row == null) {
            $last_kode = "0000";
            $last_kode = (int) $last_kode;
            $last_kode++;
            $last_kode = substr("0000" . $last_kode, -4);
            $new_kode = "TRN-" . date("dmy") . "-" . $last_kode;
        } else {
            $last_kode = substr($last_row->nomer, -4);
            $last_kode = (int) $last_kode;
            $last_kode++;
            $last_kode = substr("0000" . $last_kode, -4);
            $new_kode = "TRN-" . date("dmy") . "-" . $last_kode;
        }
        return $new_kode;
    }

    public function import()
    {
        $config['upload_path']          = './storage/excel_tmp/';
        $config['allowed_types']        = 'xls|xlsx';
        $config['max_size']             = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            echo json_encode([
                'type' => "error",
                'text' => $this->upload->display_errors('', ''),
                'title' => "Import"
            ]);
        } else {
            $file_name = $this->upload->data('file_name');

            $this->load->library('excelreader');

            //choose format
            $inputFileName = './storage/excel_tmp/' . $file_name;
            $inputFileType = 'xls';
            $is_error = false;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);

                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                $fetch_excel = $sheet->rangeToArray('B4:' . 'F' . $highestRow, NULL, TRUE, FALSE);

                unlink($inputFileName);

                $data_excel = [];
                foreach ($fetch_excel as $key => $value) {
                    $data_excel[] = [
                        'tanggal' => $this->excelreader->excelDateConvert("Y-m-d", $value['0']),
                        'nomer' => $value['1'],
                        'customer' => $value['2'],
                        'total' => $value['3'],
                        'detail' => $value['4'],
                    ];
                }

                $undefined_produk = [];

                $data_transaksi = [];
                $data_detail_transaksi = [];
                foreach ($data_excel as $key => $value) {
                    $data_transaksi[$key] = [
                        'tgl' => $value['tanggal'],
                        'nomer' => $value['nomer'],
                        'customer' => $value['customer'],
                        'fk_user_karyawan' => $this->session->userlogin['id'],
                        'harga' => $value['total'],
                    ];

                    $ex_detail = explode("; ", $value['detail']);
                    foreach ($ex_detail as $produk) {
                        $ex_produk = explode(" @", $produk);
                        $c_produk = $ex_produk[0];
                        $jumlah = $ex_produk[1];

                        $db_produk = $this->db->where('c_produk', trim($c_produk))->get('produk');

                        if ($db_produk->num_rows() == 0) {
                            $undefined_produk[] = $c_produk;
                        }

                        $data_detail_transaksi[$key][] = [
                            'c_produk' => $c_produk,
                            'jumlah' => $jumlah
                        ];
                    }
                }
                if (count($undefined_produk) == 0) {
                    foreach ($data_transaksi as $key => $value) {
                        $this->db->insert('transaksi', $value);
                        $id = $this->db->insert_id();

                        foreach ($data_detail_transaksi[$key] as $k => $v) {

                            $db_produk = $this->db->where('c_produk', trim($v['c_produk']))->get('produk')->row(0);
                            $set_detail = [
                                'fk_transaksi' => $id,
                                'fk_produk' => $db_produk->id,
                                'jumlah' => $v['jumlah']
                            ];
                            $this->db->insert('detailtransaksi',$set_detail);
                        }
                    }
                }else{
                    $message = implode(", ",$undefined_produk);
                    $this->session->set_flashdata('message',[
                        'type' => "warning",
                        'title' => "Import Gagal",
                        'message' => "Produk ini tidak ada : ".$message,
                    ]);
                }

                redirect("Transaksi");
            } catch (Exception $e) {
                $is_error = true;
                $data['error_info'] = 'Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage();

                echo json_encode([
                    'type' => "error",
                    'text' => $data['error_info'],
                    'title' => "Import"
                ]);
            }
        }
    }
}
