<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function index()
    {
        $this->load->view('admin/dashboard');
    }

    public function site()
    {
        $this->load->view('home');
    }
    public function karyawan()
    {
    	$this->load->view('admin/karyawan');
    }
    public function home1()
    {
  		$this->load->view('admin/home');
   
    }
}