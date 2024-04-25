<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koordinator extends CI_Controller {
    //construck
        public function __construct()
        {
            parent::__construct();
            error_reporting(0);
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
        // $config = [
        //     'protocol' => "smtp",
        //     'smtp_host' => "ssl://smtp.googlemail.com",
        //     'smtp_user' => "aldiindrawan04@gmail.com",
        //     'smtp_pass' => "hnyd ppva eekl dkxj",
        //     'mailtype' => "html",
        //     'smtp_port' => 465,
        //     'charset' => "utf-8",
        //     'newline' => "\r\n"
        // ];
        // $this->email->initialize($config);
        // $this->email->from("aldiindrawan04@gmail.com", 'SIPETA IF');
        // $this->email->to($akun["akun_email"]);
        // $this->email->subject('Akun Sistem Informasi Pendaftaran Tugas Akhir');
        // $this->email->message('Email anda sudah didaftarkan dalam sistem informasi pendaftaran dengan detail sebagai berikut :<br><br>'.
        // '<br><br>Sistem Informasi Pendaftaran Tugas Akhir<br>Link Sistem Informasi : http://sipeta.noz.co.id<br>Email : '.$akun["akun_email"].'<br>password : Dosen12345678');
        // //Send mail
        // $this->email->send()
        
        $this->postmodel->insertDosen($dosen);
        $this->postmodel->insertAkun($akun);
        $this->session->set_flashdata("insert-dosen","Berhasil");
        redirect(base_url("index.php/koordinator"));
    }

     // fungsi untuk menyimpan data dosen luar baru ke database
     public function postdosenluar(){
        $dosen = array(
            "dosen_nip" => $this->input->post("dosen_nip"),
            "dosen_nama" => $this->input->post("dosen_nama"),
            "dosen_telp" => $this->input->post("dosen_telp"),
            "dosen_email" => $this->input->post("dosen_email"),
        );
        $this->postmodel->insertDosenLuar($dosen);
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

    // fungsi untuk update data maksimal bimbingan dosen di database
    public function updatemakspemb(){
        $dosen=array(
            "dosen_nip"=>$this->input->post("dosen_nip_max"),
            "dosen_max1"=>$this->input->post("dosen_max1"),
            "dosen_max2"=>$this->input->post("dosen_max2"),
        );
        $this->putmodel->updateMaxDosen($dosen);
        $this->session->set_flashdata("update-max-dosen","Berhasil");
        redirect(base_url("index.php/koordinator"));
    }
}
