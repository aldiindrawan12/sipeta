<?php
// error_reporting(0);
class AuthModel extends CI_model
{
    //ambil data akun berdasarkan email yang diberikan
    public function getAkunByEmail($akun_email){
        return $this->db->get_where("sipeta_akun",array("akun_email"=>$akun_email))->row_array();
    }

    //ambil semua data akun
    public function getAllAkun(){
        return $this->db->get("sipeta_akun")->result_array();
    }

    //update status online/offline akun
    public function setAkunStatus($status,$akun_email){
        $this->db->set("akun_status",$status);
        if($status=="Online"){
            $this->db->set("akun_lastlogin",date("Y-m-d H:i:s"));            
        }else{
            $this->db->set("akun_lastlogout",date("Y-m-d H:i:s"));
        }
        $this->db->where("akun_email",$akun_email);
        return $this->db->update("sipeta_akun");
    }

    //insert data pendaftar mahasiswa
    public function insertMhs($data){
        $this->db->insert("sipeta_mhs",$data);
    }

    //update otp akun
    public function insertOTP($email,$otp){
        $this->db->set("akun_otp",$otp);
        $this->db->set("otp_time",60);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }

    //update password akun
    public function newpassword($email,$new){
        $this->db->set("akun_password",$new);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }

    //insert data akun
    public function insertAkun($data){
        $this->db->insert("sipeta_akun",$data);
    }

    //update waktu otp akun
    public function updateOTPtime($email,$time){
        $this->db->set("otp_time",$time);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }

    //update kode otp akun
    public function updateOTP($email,$otp){
        $this->db->set("otp_time",60);
        $this->db->set("akun_otp",$otp);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }

    //update otp dan waktu otp setelah validasi otp
    public function validasi($email){
        $this->db->set("otp_time",0);
        $this->db->set("akun_otp",NULL);
        $this->db->set("akun_verifikasi","True");
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }
}