<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Stok extends CI_Controller
{


    public function index()
    {
        $data['stok_data'] = $this->db
            ->select('*,(select nama from gudang where id=stok.id) as gudang_nama, (select merk from produk where id=stok.fk_produk) as produk_nama')
            ->get('stok')
            ->result();
        $this->load->view('admin/stok/index', $data);
    }

}
