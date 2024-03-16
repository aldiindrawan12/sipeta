<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {
    //construck
        public function __construct()
        {
            parent::__construct();
            $this->load->model('datatablesmodel');
            $this->load->model('getmodel');
            date_default_timezone_set('Asia/Jakarta');
        }
    //end construck

    public function dosen_tabel(){
        $postData = $this->input->post();
        $data = $this->datatablesmodel->getDosen($postData);
        echo json_encode($data);
    }

    public function daftar_tabel(){
        $dosen_nip = $this->input->post("dosen_nip");
        $tipe = $this->input->post("tipe");
        $postData = $this->input->post();
        $periode = $this->getmodel->getPeriode();
        $data = $this->datatablesmodel->getDaftar($postData,$periode["periode_id"],$dosen_nip,$tipe);
        echo json_encode($data);
    }

    public function arsip_tabel(){
        $postData = $this->input->post();
        $data = $this->datatablesmodel->getArsip($postData);
        echo json_encode($data);
    }
}
