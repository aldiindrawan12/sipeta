<?php
// error_reporting(0);
class DeleteModel extends CI_model
{
    public function deleteDosen($dosen_nip){
        $this->db->where("user_id",$dosen_nip);
        $this->db->delete("sipeta_akun");
        
        $this->db->set("dosen_nip",$dosen_nip."-arsip");
        $this->db->set("dosen_status","Tidak Aktif");
        $this->db->where("dosen_nip",$dosen_nip);
        $this->db->update("sipeta_dosen");

        $this->db->set("dosen1",$dosen_nip."-arsip");
        $this->db->where("dosen1",$dosen_nip);
        $this->db->update("sipeta_ta");

        $this->db->set("dosen2",$dosen_nip."-arsip");
        $this->db->where("dosen2",$dosen_nip);
        return $this->db->update("sipeta_ta");
    }
}