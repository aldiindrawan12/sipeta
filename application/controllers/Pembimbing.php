<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing extends CI_Controller {
    //construck
        public function __construct()
        {
            parent::__construct();
            error_reporting(0);
            $this->load->model('getmodel');
            $this->load->model('postmodel');
            $this->load->model('putmodel');
            $this->load->model('deletemodel');
            $this->load->model('datatablesmodel');
            date_default_timezone_set('Asia/Jakarta');
        }
    //end construck

    //fungsi untuk menampilkan halaman dashboard
	public function index(){
        if(!isset($_SESSION["akun_email"])){ //jika user belum login
            $this->session->set_flashdata('status-login', 'False');
            redirect(base_url());
        }
        if($_SESSION["akun_role"]!="Pembimbing"){
            $this->session->set_flashdata('status-redirect', 'False');
            redirect(base_url("index.php/".$_SESSION["akun_role"]));
        }
        $akun_email = $_SESSION["akun_email"];
        $akun = $this->getmodel->getAkunByEmail($akun_email);
        $periode = $this->getmodel->getPeriode();
        $dosen = $this->getmodel->getAllDosen();
        $nip = [];
        $email = [];
        foreach($dosen as $value){
            $nip[] = $value["dosen_nip"];
        }
        foreach($dosen as $value){
            $email[] = $value["akun_email"];
        }
        $kk = $this->getmodel->getAllKk();
        $data = array(
            'akun_role' => $_SESSION["akun_role"],
            'akun_email' => $akun_email,
            'akun' => $akun,
            'periode' => $periode,
            'dosen' => $dosen,
            'kk' => $kk,
            'nip' => $nip,
            'email' => $email,
            'ta'=>NULL,
            'page' => 'Dahsboard Pembimbing'
        );
		$this->load->view('views/header',$data);
		$this->load->view('views/sidebar');
		$this->load->view('views/index');
		$this->load->view('views/modal'); 
		$this->load->view('views/footer');
	}
}
