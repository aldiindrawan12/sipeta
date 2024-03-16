<?php
// error_reporting(0);
class KoordinatorModel extends CI_model
{
    public function getAkunByEmail($akun_email){
        $this->db->join("sipeta_dosen","sipeta_dosen.dosen_nip=sipeta_akun.user_id",'left');
        return $this->db->get_where("sipeta_akun",array("akun_email"=>$akun_email))->row_array();
    }
    public function getDosenByNip($dosen_nip){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$dosen_nip))->row_array();
    }
    public function getAllDosen(){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen")->result_array();
    }
    public function updateDosen($dosen,$akun,$nip){
        $this->db->set($akun);
        $this->db->where("user_id",$nip);
        $this->db->update("sipeta_akun");

        $this->db->set($dosen);
        $this->db->where("dosen_nip",$nip);
        return $this->db->update("sipeta_dosen");
    }
    public function getPeriodeAktif(){
        return $this->db->get_where("sipeta_periode",array("periode_status"=>"Aktif"))->row_array();
    }
    public function insertPeriode($data){
        return $this->db->insert("sipeta_periode",$data);
    }
    public function updatePeriode($data){
        $this->db->set($data);
        $this->db->where("periode_id",$data["periode_id"]);
        return $this->db->update("sipeta_periode");
    }
    public function closePeriode($periode_id,$kuota){
        $this->db->set("dosen_kuota1",$kuota);
        $this->db->set("dosen_kuota2",$kuota);
        $this->db->where("dosen_ketersediaan","Tersedia");
        $this->db->update("sipeta_dosen");

        $this->db->set("periode_status","Tidak Aktif");
        $this->db->set("periode_tutup",date("Y-m-d H:i:s"));
        $this->db->where("periode_id",$periode_id);
        return $this->db->update("sipeta_periode");
    }
    public function getAllKk(){
        return $this->db->get('sipeta_kk')->result_array();
    }
    public function insertDosen($data){
        return $this->db->insert("sipeta_dosen",$data);
    }
    public function insertAkun($data){
        return $this->db->insert("sipeta_akun",$data);
    }
    public function deleteDosen($dosen_nip){
        $this->db->where("user_id",$dosen_nip);
        $this->db->delete("sipeta_akun");

        $this->db->where("dosen_nip",$dosen_nip);
        $this->db->delete("sipeta_dosen");
    }
}