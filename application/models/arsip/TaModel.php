<?php
// error_reporting(0);
class TaModel extends CI_model
{
    public function getDosenByNip($dosen_nip){
        return $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$dosen_nip))->row_array();
    }

    public function getAllPendaftar($periode_id){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        return $this->db->get_where("sipeta_ta",array("periode_id"=>$periode_id))->result_array();
    }

    public function getAllPendaftarByDosen1($periode_id,$dosen_nip){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        return $this->db->get_where("sipeta_ta",array("periode_id"=>$periode_id,"dosen1"=>$dosen_nip))->result_array();
    }

    public function getAllPendaftarByDosen2($periode_id,$dosen_nip){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        return $this->db->get_where("sipeta_ta",array("periode_id"=>$periode_id,"dosen2"=>$dosen_nip))->result_array();
    }

    public function getPeriodeTidakAktif(){
        return $this->db->get_where("sipeta_periode",array("periode_status"=>"Tidak Aktif"))->row_array();
    }

    public function getPeriodeAktif(){
        return $this->db->get_where("sipeta_periode",array("periode_status"=>"Aktif"))->row_array();
    }

    public function accBimbingan($ta_id,$tipe,$status){
        $kuota = $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$_SESSION["user_id"]))->row_array();
        $ta = $this->db->get_where("sipeta_ta",array("ta_id"=>$ta_id))->row_array();
        if($status == "MENOLAK"){
            $status = "Ditolak";
            if($ta["dosen".$tipe."_status"]=="Diterima"){
                $kuota_now = $kuota["dosen_kuota".$tipe]+1;
            }else{
                $kuota_now = $kuota["dosen_kuota".$tipe];
            }
        }else if($status == "TERIMA"){
            $status = "Diterima";
            $kuota_now = $kuota["dosen_kuota".$tipe]-1;
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
    public function getTaById($ta_id){
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->join("sipeta_periode","sipeta_periode.periode_id=sipeta_ta.periode_id",'left');
        return $this->db->get_where("sipeta_ta",array("sipeta_ta.ta_id"=>$ta_id))->row_array();
    }
}