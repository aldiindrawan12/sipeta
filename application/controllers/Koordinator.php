<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koordinator extends CI_Controller {
    //construck
        public function __construct()
        {
            parent::__construct();
            $this->load->model('getmodel');
            $this->load->model('postmodel');
            $this->load->model('putmodel');
            $this->load->model('deletemodel');
            date_default_timezone_set('Asia/Jakarta');
        }
    //end construck

    //fungsi untuk menampilkan halaman dashboard
	public function index(){
        if(!isset($_SESSION["akun_email"])){ //jika user belum login
            $this->session->set_flashdata('status-login', 'False');
            redirect(base_url());
        }
        if($_SESSION["akun_role"]!="Koordinator"){
            $this->session->set_flashdata('status-redirect', 'False');
            redirect(base_url("index.php/".$_SESSION["akun_role"]));
        }
        $akun_email = $_SESSION["akun_email"];
        $akun = $this->getmodel->getAkunByEmail($akun_email);
        $periode = $this->getmodel->getPeriode();
        $dosen = $this->getmodel->getAllDosen();
        $kk = $this->getmodel->getAllKk();
        $nip = [];
        $email = [];
        foreach($dosen as $value){
            $nip[] = $value["dosen_nip"];
        }
        foreach($dosen as $value){
            $email[] = $value["akun_email"];
        }
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
            'tipe'=>NULL,
            'page' => 'Dashboard Koordinator'
        );
		$this->load->view('views/header',$data);
		$this->load->view('views/sidebar');
		$this->load->view('views/index');
		$this->load->view('views/modal');
		$this->load->view('views/footer');
	}

    // fungsi untuk menyimpan data dosen baru ke database
    public function postdosen(){
        $dosen = array(
            "dosen_nip" => $this->input->post("dosen_nip"),
            "dosen_nama" => $this->input->post("dosen_nama"),
            "dosen_telp" => $this->input->post("dosen_telp"),
            "kk_id" => $this->input->post("kk_id"),
            "dosen_ketersediaan" => $this->input->post("dosen_ketersediaan"),
            "dosen_status" => "Aktif"
        );
        $akun = array(
            "akun_email" => $this->input->post("akun_email"),
            "akun_password" => "Dosen12345678",
            "user_id" => $this->input->post("dosen_nip"),
            "akun_status" => "Offline",
            "akun_role" => $this->input->post("akun_role"),
            "akun_verifikasi" => "True",
        );
        $this->postmodel->insertDosen($dosen);
        $this->postmodel->insertAkun($akun);
        $this->session->set_flashdata("insert-dosen","Berhasil");
        redirect(base_url("index.php/koordinator"));
    }

    // fungsi untuk hapus dosen
    public function deletedosen($dosen_nip){
        $this->deletemodel->deleteDosen(str_replace("%20"," ",$dosen_nip));
        $this->session->set_flashdata("delete-dosen","Berhasil");
        redirect(base_url("index.php/koordinator"));
    }

    // fungsi untuk colect data dosen dari database
    public function ajaxdosen(){
        $dosen_nip = $this->input->get("nip");
        $dosen = $this->getmodel->getDosenByNip($dosen_nip);
        echo json_encode($dosen);
    }

    // fungsi untuk update data dosen di database
    public function updatedosen(){
        $dosen=array(
            "dosen_nip"=>$this->input->post("dosen_nip"),
            "dosen_nama"=>$this->input->post("dosen_nama"),
            "dosen_telp"=>$this->input->post("dosen_telp"),
            "kk_id"=>$this->input->post("kk_id"),
            "dosen_ketersediaan"=>$this->input->post("dosen_ketersediaan"),
        );
        $akun = array(
            "user_id"=>$this->input->post("dosen_nip"),
            "akun_role"=>$this->input->post("akun_role"),
            "akun_email"=>$this->input->post("akun_email")
        );
        if($_SESSION["user_id"] == $this->input->post("dosen_nip_asli")){
            $_SESSION["akun_role"] = $akun["akun_role"];
            $_SESSION["user_id"] = $akun["user_id"];
            $_SESSION["akun_email"]=$akun["akun_email"];
        }
        $this->putmodel->updateDosen($dosen,$akun,$this->input->post("dosen_nip_asli"));
        $this->putmodel->updatePembimbing($dosen["dosen_nip"],$this->input->post("dosen_nip_asli"));
        $this->session->set_flashdata("update-dosen","Berhasil");
        redirect(base_url("index.php/koordinator"));
    }

}
