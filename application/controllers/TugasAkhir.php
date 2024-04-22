<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TugasAkhir extends CI_Controller {
    //construck
        public function __construct()
        {
            parent::__construct();
            error_reporting(0);
            $this->load->model("getmodel");
            $this->load->model("postmodel");
            $this->load->model("putmodel");
            $this->load->model("deletemodel");
            date_default_timezone_set('Asia/Jakarta');
        }
    //end construck

	public function arsip(){
        if(!isset($_SESSION["akun_email"])){ //jika user belum login
            $this->session->set_flashdata('status-login', 'False');
            redirect(base_url());
        }
        $akun_email = $_SESSION["akun_email"];
        $akun = $this->getmodel->getAkunByEmail($akun_email);
        $data = array(
            'akun_role' => $_SESSION["akun_role"],
            'akun_email' => $akun_email,
            'akun' => $akun,
            'page' => "Arsip Pendaftaran Tugas Akhir"
        );
		$this->load->view('views/header',$data);
		$this->load->view('views/sidebar');
		$this->load->view('views/tugasakhir/arsip');
		$this->load->view('views/modal');
		$this->load->view('views/footer');
	}

    //fungsi untuk menampilkan halaman data semua pendaftaran (koordinator)
    public function daftar(){
        if(!isset($_SESSION["akun_email"])){ //jika user belum login
            $this->session->set_flashdata('status-login', 'False');
            redirect(base_url());
        }
        $akun_email = $_SESSION["akun_email"];
        $akun = $this->getmodel->getAkunByEmail($akun_email);
        $periode = $this->getmodel->getPeriode();
        $data = array(
            'akun_role' => $_SESSION["akun_role"],
            'akun_email' => $akun_email,
            'akun' => $akun,
            'periode' => $periode,
            'page' => "Data Pendaftaran Tugas Akhir"
        );
		$this->load->view('views/header',$data);
		$this->load->view('views/sidebar');
		$this->load->view('views/tugasakhir/daftar');
		$this->load->view('views/modal');
		$this->load->view('views/footer');
	}
    //fungsi untuk menampilkan data pendaftaran setiap dosen
    public function daftarsaya($tipe){
        if(!isset($_SESSION["akun_email"])){ //jika user belum login
            $this->session->set_flashdata('status-login', 'False');
            redirect(base_url());
        }
        $akun_email = $_SESSION["akun_email"];
        $akun = $this->getmodel->getAkunByEmail($akun_email);
        $periode = $this->getmodel->getPeriode();
        if($periode){
            $daftar = $this->getmodel->getAllPendaftarValidasi($periode["periode_id"]);
            $dosen_tersedia = $this->getmodel->getAllDosenTersedia();
            $kuota = ceil(count($daftar)/count($dosen_tersedia));
        }else{
            $kuota = 0;
        }
        $data = array(
            'akun' => $akun,
            'periode' => $periode,
            'kuota' => $kuota,
            "tipe" => $tipe,
            'page'=>"Data Pendaftaran Saya"
        );
		$this->load->view('views/header',$data);
		$this->load->view('views/sidebar');
        if($tipe==1){
            $this->load->view('views/tugasakhir/daftarsaya1');
        }else{
            $this->load->view('views/tugasakhir/daftarsaya2');
        }
		$this->load->view('views/modal');
		$this->load->view('views/footer');
	}
    // fungsi untuk update status verifikasi pendaftaran dari hasil pilihan dosen pembimbing
    public function accbimbingan($tipe,$status){
        $ta_id = $this->input->get("ta_id");
        $this->putmodel->accBimbingan($ta_id,$tipe,$status);
        $this->session->set_flashdata("acc","Berhasil");
        redirect(base_url('index.php/TugasAkhir/daftarsaya/'.$tipe));
    }
    // fungsi untuk update status validasi pendaftaran dari hasil pilihan koordinator
    public function accvalidasi($status){
        $ta_id = $this->input->get("id");
        $this->putmodel->accValidasi($ta_id,$status);
        $this->session->set_flashdata("acc-validasi","Berhasil");
        redirect(base_url('index.php/TugasAkhir/daftar'));
    }
    //fungsi untuk dave catatan pendaftaran ta dari koordinator 
    public function catatan(){
        $catatan = $this->input->get("catatan");
        $id = $this->input->get("id");
        $this->putmodel->savecatatan($id,$catatan);
        echo "success";
    }
    //fungsi untuk mendapatkan data pendaftaran tugas akhir dari database
    public function ajaxdaftar(){
        $ta_id = $this->input->get("ta_id");
        $daftar = $this->getmodel->getTaById($ta_id);
        $pembimbing1 = $this->getmodel->getDosenByNip($daftar["dosen1"]);
        $pembimbing2 = $this->getmodel->getDosenByNip($daftar["dosen2"]);
        $daftar["pembimbing1"] = $pembimbing1["dosen_nama"];
        $daftar["pembimbing2"] = $pembimbing2["dosen_nama"];
        echo json_encode($daftar);
    }
    // fungsi untuk menyimpan data pembukaan pendaftaran di database
    public function postperiode(){
        $data=array(
            "periode_id" => "Periode-".date("Y/m/d")."-".rand(0,1000),
            "periode_tahun" => $this->input->post("periode_tahun"),
            "periode_semester" => $this->input->post("periode_semester"),
            "periode_buka" => $this->input->post("periode_buka"),
            "periode_tutup" => $this->input->post("periode_tutup"),
            "periode_status" => "Berlangsung",
            "periode_progress" => "Aktif"
        );
        $this->postmodel->insertPeriode($data);
        $this->session->set_flashdata("insert-periode","Berhasil");
        redirect(base_url("index.php/TugasAkhir/daftar"));
    }
    //fungsi untuk update tanggal pendaftaran di database
    public function updateperiode(){
        $data=array(
            "periode_id"=>$this->input->get("periode_id"),
            "periode_buka"=>$this->input->post("periode_buka"),
            "periode_tutup"=>$this->input->post("periode_tutup"),
        );
        $this->putmodel->updatePeriode($data);
        $this->session->set_flashdata("update-periode","Berhasil");
        redirect(base_url("index.php/TugasAkhir/daftar"));
    }
    // fungsi untuk menutup pendaftaran
    public function closeperiode(){
        $periode = $this->getmodel->getPeriode();
        $this->putmodel->closePeriode($this->input->get('periode_id'));
        $this->session->set_flashdata("close-periode","Berhasil");
        redirect(base_url("index.php/TugasAkhir/daftar"));
    }

    // fungsi untuk menutup validasi
    public function validasiperiode(){
        $periode = $this->getmodel->getPeriode();
        $daftar = $this->getmodel->getAllPendaftar($periode["periode_id"]);
        $dosen_tersedia = $this->getmodel->getAllDosenTersedia();
        $kuota = ceil(count($daftar)/count($dosen_tersedia));

        //fungsi kirim email
        // foreach($dosen_tersedia as $value){
        //     $config = [
        //         'protocol' => "smtp",
        //         'smtp_host' => "ssl://smtp.googlemail.com",
        //         'smtp_user' => "aldiindrawan04@gmail.com",
        //         'smtp_pass' => "hnyd ppva eekl dkxj",
        //         'mailtype' => "html",
        //         'smtp_port' => 465,
        //         'charset' => "utf-8",
        //         'newline' => "\r\n"
        //     ];
        //     $this->email->initialize($config);
        //     $this->email->from("aldiindrawan04@gmail.com", 'SIPETA IF');
        //     $this->email->to($value["akun_email"]);
        //     $this->email->subject('Pemberitahuan Verifikasi Pendaftaran Tugas Akhir');
        //     $this->email->message('Sebuhung dengan berakhirnya masa pendaftaran tugas akhir dan selesainya validasi oleh
        //     koordinator tugas akhir.<br><br>Diharapkan kepada setiap dosen dapat melakukan verifikasi pendaftaran tugas akhir pada:'.
        //     "<br><br>Sistem Informasi Pendaftaran Tugas Akhir<br>Link Sistem Informasi : http://localhost/tugasakhir<br>dengan menggunakan akun yang sudah diterima setiap dosen sebelumnya");
        //     //Send mail
        //     if($this->email->send()){
        //     }
        // }

        $this->putmodel->validasiPeriode($periode['periode_id'],$kuota);
        $this->session->set_flashdata("validasi-periode","Berhasil");
        redirect(base_url("index.php/TugasAkhir/daftar"));
    }

    public function ploting(){
        $periode = $this->getmodel->getPeriode();
        $pembimbing2 = $this->getmodel->getAllPendaftarDiajukan($periode["periode_id"],2);
        $pembimbing1 = $this->getmodel->getAllPendaftarDiajukan($periode["periode_id"],1);
        foreach($pembimbing1 as $value){
            if($value["dosen1_status"]=="Diajukan"){
                $kuota_dosen = $this->getmodel->getDosenByNip($value["dosen1"]);
                if($kuota_dosen["dosen_kuota1"]>0){
                    $this->putmodel->plotPembimbing($value["ta_id"],$value["dosen1"],1,$kuota_dosen["dosen_kuota1"]-1);
                }else{
                    $dosen_baru = $this->getmodel->getDosenBaru($value["kk_id"],1,$value["dosen2"]);
                    if($dosen_baru){
                        $kode = rand(0,count($dosen_baru)-1);
                        $this->putmodel->plotPembimbing($value["ta_id"],$dosen_baru[$kode]["dosen_nip"],1,$dosen_baru[$kode]["dosen_kuota1"]-1);
                    }else{
                        $dosen_baru_all = $this->getmodel->getDosenBaruAll(1,$value["dosen2"]);
                        $kode = rand(0,count($dosen_baru_all)-1);   
                        $this->putmodel->plotPembimbing($value["ta_id"],$dosen_baru_all[$kode]["dosen_nip"],1,$dosen_baru_all[$kode]["dosen_kuota1"]-1);
                    }
                }
            }
        }
        foreach($pembimbing2 as $value){
            if($value["dosen2_status"]=="Diajukan"){
                $kuota_dosen = $this->getmodel->getDosenByNip($value["dosen2"]);
                if($kuota_dosen["dosen_kuota2"]>0){
                    $this->putmodel->plotPembimbing($value["ta_id"],$value["dosen2"],2,$kuota_dosen["dosen_kuota2"]-1);
                }else{
                    $dosen_baru = $this->getmodel->getDosenBaru($value["kk_id"],2,$value["dosen1"]);
                    if($dosen_baru){
                        $kode = rand(0,count($dosen_baru)-1);
                        $this->putmodel->plotPembimbing($value["ta_id"],$dosen_baru[$kode]["dosen_nip"],2,$dosen_baru[$kode]["dosen_kuota2"]-1);
                    }else{
                        $dosen_baru_all = $this->getmodel->getDosenBaruAll(2,$value["dosen1"]);
                        $kode = rand(0,count($dosen_baru_all)-1);   
                        $this->putmodel->plotPembimbing($value["ta_id"],$dosen_baru_all[$kode]["dosen_nip"],2,$dosen_baru_all[$kode]["dosen_kuota2"]-1);
                    }
                }
            }
        }
        $this->putmodel->plotPeriode($periode["periode_id"]);
        $this->session->set_flashdata('status-ploting', 'Selesai');
        redirect(base_url("index.php/TugasAkhir/daftar"));
    }

    public function kunci(){
        $periode = $this->getmodel->getPeriode();
        $this->putmodel->selesaiPeriode($periode["periode_id"]);
        $this->session->set_flashdata('status-kunci', 'Selesai');
        redirect(base_url("index.php/TugasAkhir/daftar"));
    }


    //fungsi untuk testing aja, tidak digunakan dalam aplikasi
    public function update(){
        $dosen = $this->getmodel->getAllDosen();
        $periode = $this->getmodel->getPeriode();
        $ta = $this->getmodel->getAllPendaftar($periode["periode_id"]);
        // foreach($ta as $value){
        //     $this->putmodel->updatetesting($value["ta_id"],$dosen[rand(0,count($dosen)-1)]["dosen_nip"]);
        // }
        echo "Pembimbing 1 <br>";
        foreach($dosen as $value){
            $ta_dosen = $this->getmodel->getAllPendaftarByDosen1($periode["periode_id"],$value["dosen_nip"]);
            foreach($ta_dosen as $ta){
                echo $ta["kk_nama"]."--".$value["dosen_nama"]."--".$value["kk_nama"]."<br>";
            }
        }
        echo "Pembimbing 2 <br>";
        foreach($dosen as $value){
            $ta_dosen = $this->getmodel->getAllPendaftarByDosen2($periode["periode_id"],$value["dosen_nip"]);
            foreach($ta_dosen as $ta){
                echo $ta["kk_nama"]."--".$value["dosen_nama"]."--".$value["kk_nama"]."<br>";
            }
            // echo count($ta_dosen)."--".$ta_dosen["kk_nama"]."--".$value["dosen_nama"]."--".$dosen["kk_nama"]."<br>";
        }
    }
}
