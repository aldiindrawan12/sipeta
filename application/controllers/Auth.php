<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
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

    // LOGIN & LOGOUT
        //fungsi untuk menampilkan halaman login
            public function index(){
                $akun = $this->getmodel->getAllAkun();
                $data['email'] = [];
                foreach($akun as $value){
                    $data['email'][] = $value["akun_email"];
                }
                $data["page"] = "Login";
                $this->load->view('views/header',$data);
                $this->load->view('views/auth/index');
                $this->load->view('views/auth/footer');
            }
        //fungsi untuk proses login
        public function login(){
            $akun_email = $this->input->post("akun_email");
            $akun_password = $this->input->post("akun_password");
            $akun = $this->getmodel->getAkunByEmail($akun_email);
            if($akun){
                $password = $akun["akun_password"];
                $akun_role = $akun["akun_role"];
                if($akun_password == $password){
                    $_SESSION["akun_role"] = $akun_role;
                    $_SESSION["akun_email"] = $akun["akun_email"];
                    $_SESSION["user_id"] = $akun["user_id"];
                    $this->putmodel->setAkunStatus('Online',$akun["akun_email"]);
                    $this->session->set_flashdata('status-login', 'Berhasil');
                    redirect(base_url("index.php/".$akun_role));
                }else{
                    $this->session->set_flashdata('status-login', 'Password');
                    redirect(base_url());                
                }
            }else{
                $this->session->set_flashdata('status-login', 'Username');
                redirect(base_url());
            }
        }
        //fungsi untuk proses logout
            public function logout(){
                //akan ada fungsi update status aktif pengguna
                $this->putmodel->setAkunStatus('Offline',$_SESSION["akun_email"]);
                session_destroy();
                redirect(base_url());
            }
    // END LOGIN & LOGOUT

    // REGISTRASI  
        //fungsi untuk menampilkan halaman registrasi
            public function register(){
                $akun = $this->getmodel->getAllAkun();
                $mhs = $this->getmodel->getAllMhs();
                $data['email'] = [];
                foreach($akun as $value){
                    $data['email'][] = $value["akun_email"];
                }
                $data['mhs'] = [];
                foreach($mhs as $value){
                    $data['mhs'][] = $value["mhs_nim"];
                }
                $data["page"] = "Register";
                $this->load->view('views/header',$data);
                $this->load->view('views/auth/register');
                $this->load->view('views/auth/footer');
            }
        //fungsi untuk insert data registrasi ke database dan kirim OTP registrasi
            public function postregister(){
                $otp = rand(10000000,99999999);
                $akun = array(
                    "akun_email" => $this->input->post("akun_email"),
                    "akun_password" => $this->input->post("akun_password"),
                    "user_id" => $this->input->post("mhs_nim"),
                    "akun_status" => "Offline",
                    "akun_role" => "Mahasiswa",
                    "akun_verifikasi" => "False",
                    "akun_otp" => $otp,
                    "otp_time" => 60
                );
                $mhs = array(
                    "mhs_nim" => $this->input->post("mhs_nim"),
                    "mhs_nama" => $this->input->post("mhs_nama"),
                    "mhs_telp" => $this->input->post("mhs_telp"),
                    "mhs_semester" => $this->input->post("mhs_semester"),
                );
                $config = [
                    'protocol' => "smtp",
                    'smtp_host' => "ssl://smtp.googlemail.com",
                    'smtp_user' => "aldiindrawan04@gmail.com",
                    'smtp_pass' => "hnyd ppva eekl dkxj",
                    'mailtype' => "html",
                    'smtp_port' => 465,
                    'charset' => "utf-8",
                    'newline' => "\r\n"
                ];
                $this->email->initialize($config);
                $this->email->from("aldiindrawan04@gmail.com", 'SIPETA IF');
                $this->email->to($this->input->post("akun_email"));
                $this->email->subject('Kode OTP Registrasi');
                $this->email->message('Berikut kode OTP yang dapat digunakan dalam registrasi<br><br>'.$otp);
                //Send mail
                if($this->email->send()){
                    $this->postmodel->insertMhs($mhs);
                    $this->postmodel->insertAkun($akun);
                    redirect(base_url("index.php/auth/validasi?email=".$this->input->post("akun_email")));
                }

            }
        //fungsi untuk validasi OTP yang dimasukkan pengguna
            public function postvalidasi(){  
                $otp = $this->input->post("akun_otp");
                $email = $this->input->get("email");
                $this->putmodel->validasi($email);
                $this->session->set_flashdata('status-register', 'Berhasil');       
                redirect(base_url());
            }
        //fungsi untuk menampilkan halaman validasi OTP
            public function validasi(){
                $email = $this->input->get("email");
                $data["akun"] = $this->getmodel->getAkunByEmail($email);
                $data["page"] = "OTP";
                $this->load->view('views/header',$data);
                $this->load->view('views/auth/validasi');
                $this->load->view('views/auth/footer');
            }
    // END REGISTRASI

    //LUPA & GANTI PASSWORD
        //fungsi untuk menampilkan halaman lupa password
            public function newpassword(){
                $otp = $this->input->post("akun_otp");
                $email = $this->input->get("email");
                $this->putmodel->validasi($email);
                $data["akun"] = $this->getmodel->getAkunByEmail($email);
                $data["page"] = "New Password";
                $this->load->view('views/header',$data);
                $this->load->view('views/auth/newpassword');
                $this->load->view('views/auth/footer');
            }
        //fungsi untuk mengirim email OTP lupa password
            public function otplupapassword(){
                $otp = rand(10000000,99999999); 
                $email = $this->input->post("email_lupa_password");
                $config = [
                    'protocol' => "smtp",
                    'smtp_host' => "ssl://smtp.googlemail.com",
                    'smtp_user' => "aldiindrawan04@gmail.com",
                    'smtp_pass' => "hnyd ppva eekl dkxj",
                    'mailtype' => "html",
                    'smtp_port' => 465,
                    'charset' => "utf-8",
                    'newline' => "\r\n"
                ];
                $this->email->initialize($config);
                $this->email->from("aldiindrawan04@gmail.com", 'SIPETA IF');
                $this->email->to($email);
                $this->email->subject('Kode OTP');
                $this->email->message('Berikut kode OTP yang dapat digunakan<br><br>'.$otp);
                //Send mail
                if($this->email->send()){
                    $this->putmodel->insertOTP($email,$otp);
                    $this->session->set_flashdata('email-password', 'Berhasil');                    
                    redirect(base_url("index.php/auth/validasilupa?email=".$email));
                }
            }
        //fungsi untuk menampilkan halaman validasi OTP lupa password
            public function validasilupa(){
                $email = $this->input->get("email");
                $data["akun"] = $this->getmodel->getAkunByEmail($email);
                $data["page"] = "OTP";
                $this->load->view('views/header',$data);
                $this->load->view('views/auth/validasilupa');
                $this->load->view('views/auth/footer');
            }
        //fungsi untuk update password pengguna dari lupa password
            public function postnewpassword(){
                $new = $this->input->post("pass_new");
                $email = $this->input->get("email");
                $this->session->set_flashdata('ubah-password', 'Berhasil');                       
                $this->putmodel->newpassword($email,$new);
                redirect(base_url());
            }
        //fungsi untuk update password pengguna dari ganti password
            public function updatepassword(){
                $email = $_SESSION["akun_email"];
                $new = $this->input->post("pass_new");
                $this->putmodel->newpassword($email,$new);
                $this->session->set_flashdata('update-password', 'Berhasil');       
                redirect(base_url("index.php/auth/logout"));
            }
        
    // END LUPA & GANTI PASSWORD


    //fungsi untuk update sisa waktu OTP
        public function updateOTPtime(){
            $email = $this->input->post("email");
            $time = $this->input->post("time");
            $this->putmodel->updateOTPtime($email,$time);
        }

    //fungsi untuk mengirim ulang email otp
        public function resendOTP(){
            $email = $this->input->post("email");
            $otp = rand(10000000,99999999);
            $config = [
                'protocol' => "smtp",
                'smtp_host' => "ssl://smtp.googlemail.com",
                'smtp_user' => "aldiindrawan04@gmail.com",
                'smtp_pass' => "hnyd ppva eekl dkxj",
                'mailtype' => "html",
                'smtp_port' => 465,
                'charset' => "utf-8",
                'newline' => "\r\n"
            ];
            $this->email->initialize($config);
            $this->email->from("aldiindrawan04@gmail.com", 'SIPETA IF');
            $this->email->to($email);
            $this->email->subject('Kode OTP');
            $this->email->message('Berikut kode OTP yang dapat digunakan<br><br>'.$otp);
            //Send mail
            if($this->email->send()){
                $this->putmodel->updateOTP($email,$otp);
            }
        }

    

    
}