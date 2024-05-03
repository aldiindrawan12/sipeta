<?php
// error_reporting(0);
class PutModel extends CI_model
{
    public function accBimbingan($ta_id,$tipe,$status){
        $kuota = $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$_SESSION["user_id"]))->row_array();
        $ta = $this->db->get_where("sipeta_ta",array("ta_id"=>$ta_id))->row_array();
        if($status == "TERIMA"){
            $status = "Diterima";
            $kuota_now = $kuota["dosen_kuota".$tipe]-1;
        }else if($status=="TOLAK"){
            $status = "Ditolak";
            if($ta["dosen".$tipe."_status"]=="Diterima"){
                $kuota_now = $kuota["dosen_kuota".$tipe]+1;
            }else{
                $kuota_now = $kuota["dosen_kuota".$tipe];
            }
        }else{
            $status = "Diajukan";
            if($ta["dosen".$tipe."_status"]=="Diterima"){
                $kuota_now = $kuota["dosen_kuota".$tipe]+1;
            }else{
                $kuota_now = $kuota["dosen_kuota".$tipe];
            }
        }
        if($tipe == 1){
            $this->db->set("dosen_kuota1",$kuota_now);
            $this->db->where("dosen_nip",$_SESSION["user_id"]);
            $this->db->update("sipeta_dosen");

            $this->db->set("dosen1_status",$status);
        }else{
            $this->db->set("dosen_kuota2",$kuota_now);
            $this->db->where("dosen_nip",$_SESSION["user_id"]);
            $this->db->update("sipeta_dosen");

            $this->db->set("dosen2_status",$status);
        }
        $this->db->where("ta_id",$ta_id);
        return $this->db->update("sipeta_ta");
    }
    public function accValidasi($ta_id,$status){
        if($status == "TOLAK"){
            $status = "Ditolak";
        }else{
            $status = "Proses Validasi";
        }
        $this->db->set("ta_progres",$status);
        $this->db->where("ta_id",$ta_id);
        return $this->db->update("sipeta_ta");
    }
    public function savecatatan($id,$catatan){
        $this->db->set("ta_catatan",$catatan);
        $this->db->where("ta_id",$id);
        return $this->db->update("sipeta_ta");
    }
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
    public function insertOTP($email,$otp){
        $this->db->set("akun_otp",$otp);
        $this->db->set("otp_time",60);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }
    public function newpassword($email,$new){
        $this->db->set("akun_password",$new);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }
    public function updateOTPtime($email,$time){
        $this->db->set("otp_time",$time);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }
    public function updateOTP($email,$otp){
        $this->db->set("otp_time",60);
        $this->db->set("akun_otp",$otp);
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }
    public function validasi($email){
        $this->db->set("otp_time",0);
        $this->db->set("akun_otp",NULL);
        $this->db->set("akun_verifikasi","True");
        $this->db->where("akun_email",$email);
        $this->db->update("sipeta_akun");
    }
    public function updateDosen($dosen,$akun,$nip){
        $this->db->set($akun);
        $this->db->where("user_id",$nip);
        $this->db->update("sipeta_akun");

        $this->db->set($dosen);
        $this->db->where("dosen_nip",$nip);
        return $this->db->update("sipeta_dosen");
    }
    public function updateMaxDosen($dosen){
        $this->db->set($dosen);
        $this->db->where("dosen_nip",$dosen["dosen_nip"]);
        return $this->db->update("sipeta_dosen");
    }
    public function updatePembimbing($dosen,$nip){
        $this->db->set("dosen1",$dosen);
        $this->db->where("dosen1",$nip);
        $this->db->update("sipeta_ta");

        $this->db->set("dosen2",$dosen);
        $this->db->where("dosen2",$nip);
        return $this->db->update("sipeta_ta");
    }
    public function updatePeriode($data){
        $this->db->set($data);
        $this->db->where("periode_id",$data["periode_id"]);
        return $this->db->update("sipeta_periode");
    }
    public function updateBuka($ta_id,$tipe){
        if($tipe==0){
            $this->db->set("ta_lihat_koordinator","True");
        }else{
            $this->db->set("ta_lihat_pembimbing".$tipe,"True");
        }
        $this->db->where("ta_id",$ta_id);
        return $this->db->update("sipeta_ta");
    }
    public function closePeriode($periode_id){
        $this->db->set("ta_progres","Proses Validasi");
        $this->db->where("periode_id",$periode_id);
        $this->db->update("sipeta_ta");

        $this->db->set("periode_progress","Validasi");
        $this->db->set("periode_tutup",date("Y-m-d H:i:s"));
        $this->db->where("periode_id",$periode_id);
        return $this->db->update("sipeta_periode");
    }

    public function setMaksimalBimbingan($nip,$id,$kuota){
        $this->db->set("dosen_kuota".$id,$kuota);
        $this->db->where("dosen_nip",$nip);
        $this->db->update("sipeta_dosen");
    }
    public function validasiPeriode($periode_id,$kuota){
        $this->db->set("ta_progres","Proses Verifikasi");
        $this->db->where("periode_id",$periode_id);
        $this->db->where("ta_progres","Proses Validasi");
        $this->db->update("sipeta_ta");
        
        $this->db->set("periode_progress","Verifikasi");
        $this->db->where("periode_id",$periode_id);
        return $this->db->update("sipeta_periode");
    }

    public function selesaiPeriode($periode_id){
        $this->db->set("ta_progres","Diterima");
        $this->db->where("ta_progres!='Ditolak'");
        $this->db->where("periode_id",$periode_id);
        $this->db->update("sipeta_ta");

        $this->db->set("periode_status","Selesai");
        $this->db->set("periode_progress","Arsip");
        $this->db->where("periode_id",$periode_id);
        $this->db->update("sipeta_periode");
    }

    //ploting bimbingan
    public function plotPembimbing($ta_id,$dosen_nip,$tipe,$kuota){
        $this->db->set("dosen_kuota".$tipe,$kuota);
        $this->db->where("dosen_nip",$dosen_nip);
        $this->db->update("sipeta_dosen");

        $this->db->set("dosen".$tipe,$dosen_nip);
        $this->db->set("dosen".$tipe."_status","Diterima");
        $this->db->where("ta_id",$ta_id);
        return $this->db->update("sipeta_ta");
    }
    public function plotPeriode($periode_id){
        $this->db->set("periode_progress","Ploting");
        $this->db->where("periode_id",$periode_id);
        return $this->db->update("sipeta_periode");
    }

    //fungsi untuk testing aja, tidak digunakan dalam aplikasi
    public function updatetesting($ta,$dosen){
        $this->db->set("dosen2_status","Diajukan");
        $this->db->set("dosen2",$dosen);
        $this->db->where("ta_id",$ta);
        $this->db->update("sipeta_ta");
    }
}