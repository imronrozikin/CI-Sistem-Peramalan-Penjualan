<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
melakukan Users

file terkait
views :
- Users/*
*/

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        user_allow([1, 2]);
    }

    public function index()
    {
        $data['produk_data'] = $this->db
            ->get('produk')
            ->result();
        $this->load->view('admin/produk/index', $data);
    }
    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('c_produk', 'c_produk', 'trim|required');
        $this->form_validation->set_rules('merk', 'merk', 'trim|required');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('stok', 'stok', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/produk/insert');
        } else {
            $error = false;
            if ($_FILES['gambar']['name'] != "") {
                $config['upload_path']          = './storage/produk/';
                $config['allowed_types']        = 'gif|jpg|png|JPEG|jpeg';
                $config['max_size']             = 5000;
                $config['file_ext_tolower']     = true;
                $config['encrypt_name']         = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data['error_gambar'] = $this->upload->display_errors('', '');
                    $this->load->view('admin/produk/insert', $data);
                    $error = true;
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            } else {
                $gambar = "default.png";
            }

            if (!$error) {
                $set_produk = [
                    'c_produk' => $this->input->post('c_produk'),
                    'merk' => $this->input->post('merk'),
                    'tipe' => $this->input->post('tipe'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                ];
                $this->db->insert('produk', $set_produk);
                $insert_id = $this->db->insert_id();


                $set_produk = [
                    'gambar' => $gambar
                ];
                $this->db
                    ->where('id', $insert_id)
                    ->update('produk', $set_produk);

                redirect("produk");
            }
        }
    }
    public function update($id_produk)
    {
        $this->load->library('form_validation');

        $produk_data = $this->db
            ->where('id', $id_produk)
            ->get('produk')
            ->row(0);

        $unique_produk = "";
        if ($this->input->post('c_produk') != $produk_data->c_produk) {
            $unique_username = '|is_unique[produk.c_produk]';
        }

        $this->form_validation->set_rules('c_produk', 'c_produk', 'trim|required');
        $this->form_validation->set_rules('merk', 'merk', 'trim|required');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('stok', 'stok', 'trim|required');

        $this->form_validation->set_rules('gambar', 'gambar', 'callback_upload_gambar[' . $id_produk . ']');

        if ($this->form_validation->run() == false) {
            $produk_data = $this->db
                ->where('id', $id_produk)
                ->get('produk')
                ->row(0);
            $data['produk_data'] = $produk_data;
            $this->load->view('admin/produk/update', $data);
        } else {
            $set_produk = [
                'c_produk' => $this->input->post('c_produk'),
                'merk' => $this->input->post('merk'),
                'tipe' => $this->input->post('tipe'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
            ];
            $this->db
                ->where('id', $id_produk)
                ->update('produk', $set_produk);


            redirect('Produk');
        }
    }
    function upload_gambar($gambar, $id_produk)
    {
        if ($_FILES['gambar']['name'] != "") {
            $config['upload_path']          = './storage/produk/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['file_ext_tolower']     = true;
            $config['encrypt_name']         = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->form_validation->set_message('upload_gambar', "{field} : " . $this->upload->display_errors('', ''));
                return false;
            } else {
                $produk_data = $this->db
                    ->where('id', $id_users)
                    ->get('produk')
                    ->row(0);
                if ($produk_data->gambar != 'default.png') {
                    unlink('storage/users/' . $produk_data->gambar);
                }

                $set_produk = [
                    'gambar' => $this->upload->data('file_name')
                ];
                $this->db
                    ->where('id', $id_produk)
                    ->update('produk', $set_produk);

                $session_data = $this->session->userdata('userlogin');
                $session_data['gambar'] = $this->upload->data('file_name');
                $this->session->set_userdata('userlogin', $session_data);
            }
        }
        return true;
    }
    public function delete($id_produk)
    {
        ##unlink gambar
        $produk_data = $this->db
            ->where('id', $id_produk)
            ->get('produk')
            ->row(0);
        if ($produk_data->gambar != 'default.png') {
            unlink('storage/produk/' . $users_data->gambar);
        }

        $this->db
            ->where('id', $id_produk)
            ->delete('produk');

        redirect("Produk");
    }
}
