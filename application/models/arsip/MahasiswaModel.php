<?php
// error_reporting(0);
class MahasiswaModel extends CI_model
{
    public function getAkunByEmail($akun_email){
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_akun.user_id",'left');
        return $this->db->get_where("sipeta_akun",array("akun_email"=>$akun_email))->row_array();
    }
    public function getTaByMhs($mhs_nim){
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->join("sipeta_periode","sipeta_periode.periode_id=sipeta_ta.periode_id",'left');
        return $this->db->get_where("sipeta_ta",array("sipeta_ta.mhs_nim"=>$mhs_nim))->row_array();
    }
    public function getAllDosen(){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen")->result_array();
    }
    public function getAllDosenTersedia(){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen",array("dosen_ketersediaan"=>"Tersedia"))->result_array();
    }
    public function getDosenByNip($dosen_nip){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$dosen_nip))->row_array();
    }
    public function getPeriodeAktif(){
        return $this->db->get_where("sipeta_periode",array("periode_status"=>"Aktif"))->row_array();
    }
    public function getAllKk(){
        return $this->db->get('sipeta_kk')->result_array();
    }
    public function insertTa($data){
        return $this->db->insert("sipeta_ta",$data);
    }
}