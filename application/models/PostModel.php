<?php
// error_reporting(0);
class PostModel extends CI_model
{
    public function insertTa($data){
        return $this->db->insert("sipeta_ta",$data);
    }
    public function insertMhs($data){
        return $this->db->insert("sipeta_mhs",$data);
    }
    public function insertAkun($data){
        return $this->db->insert("sipeta_akun",$data);
    }
    public function insertPeriode($data){
        return $this->db->insert("sipeta_periode",$data);
    }
    public function insertDosen($data){
        return $this->db->insert("sipeta_dosen",$data);
    }
}