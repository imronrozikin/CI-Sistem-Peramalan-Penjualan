<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persediaan extends CI_Controller
{

    public function index()
    {
        $persediaan_data = $this->db
    	->select('*,(select nama from users where id=persediaan.fk_user_karyawan) as nama_karyawan')
    	->get('persediaan')
        ->result();
        
        foreach($persediaan_data as $key => $value){
            $detail = $this->db
            ->select("detailpersediaan.*,produk.c_produk nama_produk")
            ->join('produk','detailpersediaan.fk_produk=produk.id')
            ->where('fk_persediaan',$value->id)
            ->get('detailpersediaan')->result();

            $string_detail = "";
            foreach($detail as $k => $v){
                $string_detail .= $v->nama_produk."[".$v->jumlah."]; ";
            }
            $persediaan_data[$key]->detail = $string_detail;
        }
    	$data['persediaan_data'] = $persediaan_data;

        $this->load->view('admin/persediaan/index',$data);
    }

    public function insert()
    {
    	$this->load->library('form_validation');

        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $data['kode'] = $this->generate_id();
            $this->load->view('admin/persediaan/insert',$data);
        } else {
            $set = [
                'tgl' => $this->input->post('tgl'),
                'nomer' => $this->input->post('nomer'),
                'supplier' => $this->input->post('supplier'),
                'fk_user_karyawan' => $this->input->post('fk_user_karyawan'),
                'harga' => $this->input->post('harga'),
            ];

            $this->db->insert('persediaan', $set);

            $id_persediaan = $this->db->insert_id();

            $produk = $this->input->post('produk');
            foreach($produk as $key => $value){
            	$set_ = [
            		'fk_persediaan' => $id_persediaan,
            		'fk_produk' => $value['fk_produk'],
            		'jumlah' => $value['jumlah']
            	];
            	$this->db->insert('detailpersediaan',$set_);

                $data_produk = $this->db->where('id',$value['fk_produk'])->get('produk')->row(0);

                $new_stok = $data_produk->stok+$value['jumlah'];
                $this->db->where('id',$value['fk_produk'])->update("produk",['stok' => $new_stok]);                
            }

            redirect("Persediaan");
        }
    }
    public function update($id_persediaan)
    {
        $this->load->library('form_validation');

        $persediaan_data = $this->db
            ->where('id', $id_persediaan)
            ->get('persediaan')
            ->row(0);

        $unique_persediaan = "";
        if ($this->input->post('id') != $persediaan_data->id) {
            $unique_username = '|is_unique[transaksi.id]';
        }

        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('fk_user_karyawan', 'fk_user_karyawan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $persediaan_data = $this->db
                ->where('id', $id_persediaan)
                ->get('persediaan')
                ->row(0);
            $data['persediaan_data'] = $persediaan_data;
            $this->load->view('admin/persediaan/update', $data);
        } else {
            $set_persediaan = [
                'tgl' => $this->input->post('tgl'),
                'fk_user_karyawan' => $this->input->post('fk_user_karyawan')
            ];
            $this->db
                ->where('id', $id_persediaan)
                ->update('persediaan', $set_persediaan);
            
            $id_persediaan = $this->input->post('id_detail');
            $jumlah = $this->input->post('jumlah');
            $produk = $this->input->post('updateProduk');
            for($j=0;$j<count($produk);$j++){             
                $set_ = [
                    'fk_produk' => $produk[$j],
                    'jumlah' => $jumlah[$j]
                ];

            $data_produk = $this->db->where('id',$produk[$j])->get('produk')->row(0);
            $data_stok = $this->db->where('id',$id_persediaan[$j])->get('detailpersediaan')->row(0);
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
             $this->db->where('id', $id_persediaan[$j])->update('detailpersediaan',$set_);
            // echo "<prev>";
            // var_dump($C_stok);
            // die();
            // echo "</prev>";
        }
           redirect('Persediaan');
        }
    }

    public function form_insert_produk()
    {
    	$id = $this->input->post('id');
    	$data['id'] = $id;
    	$this->load->view('admin/persediaan/form_insert_produk',$data);
    }

    public function delete($id_persediaan)
    {
        $this->db->where('fk_persediaan', $id_persediaan)->delete('detailpersediaan');
        $this->db->where('id', $id_persediaan)->delete('persediaan');
        redirect("Persediaan");
    }

    function generate_id()
    {
        $last_row = $this->db->order_by('id', 'desc')->get('persediaan')->row(0);
        if ($last_row == null) {
            $last_kode = "0000";
            $last_kode = (int) $last_kode;
            $last_kode++;
            $last_kode = substr("0000" . $last_kode, -4);
            $new_kode = "PRS-" . date("dmy") . "-" . $last_kode;
        } else {
            $last_kode = substr($last_row->nomer, -4);
            $last_kode = (int) $last_kode;
            $last_kode++;
            $last_kode = substr("0000" . $last_kode, -4);
            $new_kode = "PRS-" . date("dmy") . "-" . $last_kode;
        }
        return $new_kode;
    }
}