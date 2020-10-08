<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{


    public function index()
    {
        $data['gudang_data'] = $this->db
            ->get('gudang')
            ->result();
        $this->load->view('admin/gudang/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/gudang/insert');
        } else {
            $set_users = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->db->insert('gudang', $set_users);

            redirect("Gudang");
        }
    }

    public function update($id_users)
    {
        $this->load->library('form_validation');

      
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
      
        if ($this->form_validation->run() == false) {
            $users_data = $this->db
                ->where('id', $id_users)
                ->get('gudang')
                ->row(0);
            $data['gudang_data'] = $users_data;
            $this->load->view('admin/gudang/update', $data);
        } else {
            $set_users = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->db
                ->where('id', $id_users)
                ->update('gudang', $set_users);

            redirect("Gudang");
        }
    }

    public function delete($id_users)
    {
        $this->db
            ->where('id', $id_users)
            ->delete('gudang');

        redirect("Gudang");
    }
}
