<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    //construck
        public function __construct()
        {
            parent::__construct();
            error_reporting(0);
            $this->load->model('getmodel');//load model
            $this->load->model('postmodel');//load model
            $this->load->model('putmodel');//load model
            $this->load->model('deletemodel');//load model
            date_default_timezone_set('Asia/Jakarta');
        }
    //end construck

    //fungsi menampilkan halaman dashboard mahasiswa
	public function index(){
        if(!isset($_SESSION["akun_email"])){ //jika user belum login
            $this->session->set_flashdata('status-login', 'False');
            redirect(base_url());
        }
        if($_SESSION["akun_role"]!="Mahasiswa"){
            $this->session->set_flashdata('status-redirect', 'False');
            redirect(base_url("index.php/".$_SESSION["akun_role"]));
        }
        $akun_email = $_SESSION["akun_email"];
        $mhs = $this->getmodel->getAkunByEmail($akun_email);
        $dosen = $this->getmodel->getAllDosen();
        $periode = $this->getmodel->getPeriode();
        if($periode){
            $ta = $this->getmodel->getTaByMhs($mhs["mhs_nim"],$periode["periode_id"]);
        }else{
            $ta = NULL;
        }

        if ($ta){
            $dosen1 = $this->getmodel->getDosenByNip($ta["dosen1"]);
            $dosen2 = $this->getmodel->getDosenByNip($ta["dosen2"]);
        } else {
            $dosen1 = NULL;
            $dosen2 = NULL;        
        }
        $data = array(
            'akun_role' => $_SESSION["akun_role"],
            'akun_email' => $akun_email,
            'akun' => $mhs,
            'ta' => $ta,
            'dosen' => $dosen,
            'dosen1' => $dosen1,
            'dosen2' => $dosen2,
            'periode' => $periode,
            'page' => "Dashboard Mahasiswa"
        );
        $this->load->view('views/header',$data);
        $this->load->view('views/sidebar');
        $this->load->view('views/index');
		$this->load->view('views/modal');
        $this->load->view('views/footer');
    }
        
    // fungsi untuk menampilkan halaman pendaftaran tugas akhir
    public function daftar(){
        if(!isset($_SESSION["akun_email"])){ //jika user belum login
            $this->session->set_flashdata('status-login', 'False');
            redirect(base_url());
        }
        if($_SESSION["akun_role"]!="Mahasiswa"){
            $this->session->set_flashdata('status-redirect', 'False');
            redirect(base_url("index.php/".$_SESSION["akun_role"]));
        }
        $akun_email = $_SESSION["akun_email"];
        $mhs = $this->getmodel->getAkunByEmail($akun_email);
        $dosen = $this->getmodel->getAllDosenTersedia();
        $kk = $this->getmodel->getAllKk();
        $periode = $this->getmodel->getPeriode();
        if(!$periode){
            redirect(base_url("index.php/mahasiswa"));
        }
        $data = array(
            'akun_role' => $_SESSION["akun_role"],
            'akun_email' => $akun_email,
            'akun' => $mhs,
            'dosen' => $dosen,
            'periode' => $periode,
            'kk' => $kk,
            'page' => "Daftar Tugas Akhir"
        );
        $this->load->view('views/header',$data);
        $this->load->view('views/sidebar');
        $this->load->view('views/mahasiswa/pendaftaran');
		$this->load->view('views/modal');
        $this->load->view('views/footer');
    }

    // fungsi untuk menyimpan data pendaftaran baru ke database
    public function postta(){
        $akun_email = $_SESSION["akun_email"];
        $mhs = $this->getmodel->getAkunByEmail($akun_email);
        $periode = $this->getmodel->getPeriode();
        //SET STATUS TA
        if($this->input->post("ta_status") == "Dispensasi" || $this->input->post("ta_tim") == "Tim"){
            $status = "Diterima";
            $dosen1_status = "Diterima";
            $dosen2_status = "Diterima";
        }else{
            $status = "Diajukan";
            $dosen1_status = "Diajukan";
            $dosen2_status = "Diajukan";
        }
        // DRAFT TA FILE
        $config['upload_path'] = './assets/berkas/draft'; //letak folder file yang akan diupload
        $config['allowed_types'] = 'pdf'; //jenis file yang dapat diterima
        $config['max_size'] = '1000'; // kb
        $config['file_name'] = $mhs["mhs_nim"]."_".$mhs["mhs_nama"];
        $file_draft="";
        $this->load->library('upload', $config); //deklarasi library upload (config)
        if ($this->upload->do_upload('ta_draft')) {
            $this->upload->data();
            $file_draft =  base_url("assets/berkas/draft/").$this->upload->data('file_name');
        }
        // PENDUKUNG FILE
        $config2['upload_path'] = './assets/berkas/pendukung'; //letak folder file yang akan diupload
        // $config2['max_size'] = '1000'; // kb
        $config2['file_name'] = $mhs["mhs_nim"]."_".$mhs["mhs_nama"];
        $file_pendukung="";
        $this->load->library('upload', $config2); //deklarasi library upload (config)
        $this->upload->initialize($config2);
        $this->upload->set_allowed_types('*');
        if ($this->upload->do_upload('ta_pendukung')) {
            $this->upload->data();
            $file_pendukung =  base_url("assets/berkas/pendukung/").$this->upload->data('file_name');
        }
        // DISPENSASI FILE
        $config3['upload_path'] = './assets/berkas/dispensasi'; //letak folder file yang akan diupload
        $config3['allowed_types'] = 'pdf'; //jenis file yang dapat diterima
        $config3['max_size'] = '1000'; // kb
        $config3['file_name'] = $mhs["mhs_nim"]."_".$mhs["mhs_nama"];
        $file_dispensasi="";
        $this->load->library('upload', $config3); //deklarasi library upload (config)
        $this->upload->initialize($config3);
        if ($this->upload->do_upload('ta_dispensasi')) {
            $this->upload->data();
            $file_dispensasi =  base_url("assets/berkas/dispensasi/").$this->upload->data('file_name');
        }
        $data = array(
            'ta_id' => "TA".$mhs["mhs_nim"]."_".$periode["periode_id"],
            'mhs_nim' => $mhs["mhs_nim"],
            'dosen1' => $this->input->post("dosen1"),
            'dosen2' => $this->input->post("dosen2"),
            'dosen1_status' => $dosen1_status,
            'dosen2_status' => $dosen2_status,
            'ta_judul' => $this->input->post("ta_judul"),
            'ta_status' => $this->input->post("ta_status"),
            'ta_kebaharuan' => $this->input->post("ta_kebaharuan"),
            'kk_id' => $this->input->post("kk_id"),
            'ta_progres' => $status,
            'ta_created_at' => date("y-m-d H:i:s"),
            'ta_asal' => $this->input->post("ta_asal"),
            'ta_pkl' => $this->input->post("ta_pkl"),
            'ta_tim' => $this->input->post("ta_tim"),
            'ta_tim_nama' => $this->input->post("ta_tim_nama"),
            'ta_draft' => $file_draft,
            'ta_pendukung' => $file_pendukung,
            'ta_dispensasi' => $file_dispensasi,
            'periode_id' => $this->input->post("periode_id")
        );
        $this->postmodel->insertTa($data);
        $this->session->set_flashdata('insert-ta', 'Berhasil');
        redirect(base_url("index.php/mahasiswa"));
	}

    //fungsi untuk membuka halaman baru untuk menampilkan isi file pdf
    public function openpdf(){
        $link = $this->input->get("url");
        header("content-type: application/pdf");
        readfile($link);
    }
}