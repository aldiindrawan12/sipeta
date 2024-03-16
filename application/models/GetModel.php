<?php
// error_reporting(0);
class GetModel extends CI_model
{
    public function getAkunByEmail($akun_email){
        $akun = $this->db->get_where("sipeta_akun",array("akun_email"=>$akun_email))->row_array();
        if($akun["akun_role"]=="Mahasiswa"){
            $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_akun.user_id",'left');
        }else{
            $this->db->join("sipeta_dosen","sipeta_dosen.dosen_nip=sipeta_akun.user_id",'left');
        }
        return $this->db->get_where("sipeta_akun",array("akun_email"=>$akun_email))->row_array();
    }

    public function getAllAkun(){
        return $this->db->get("sipeta_akun")->result_array();
    }
    public function getAllMhs(){
        return $this->db->get("sipeta_mhs")->result_array();
    }

    public function getTaByMhs($mhs_nim,$periode_id){
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->join("sipeta_periode","sipeta_periode.periode_id=sipeta_ta.periode_id",'left');
        $this->db->where("sipeta_ta.periode_id",$periode_id);
        return $this->db->get_where("sipeta_ta",array("sipeta_ta.mhs_nim"=>$mhs_nim))->row_array();
    }
    public function getTaById($ta_id){
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->join("sipeta_periode","sipeta_periode.periode_id=sipeta_ta.periode_id",'left');
        return $this->db->get_where("sipeta_ta",array("sipeta_ta.ta_id"=>$ta_id))->row_array();
    }
    public function getAllDosen(){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen",array("dosen_status"=>"Aktif"))->result_array();
    }
    public function getAllDosenTersedia(){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen",array("dosen_ketersediaan"=>"Tersedia","dosen_status"=>"Aktif"))->result_array();
    }
    public function getDosenByNip($dosen_nip){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->join("sipeta_akun","sipeta_akun.user_id=sipeta_dosen.dosen_nip",'left');
        return $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$dosen_nip))->row_array();
    }
    public function getDosenBaru($kk_id,$tipe,$dosen_lain){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->where("dosen_kuota".$tipe." > 0");
        $this->db->where("dosen_nip != '".$dosen_lain."'");
        return $this->db->get_where("sipeta_dosen",array("sipeta_dosen.kk_id"=>$kk_id))->result_array();
    }
    public function getDosenBaruAll($tipe,$dosen_lain){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_dosen.kk_id",'left');
        $this->db->where("dosen_kuota".$tipe." > 0");
        $this->db->where("dosen_nip != '".$dosen_lain."'");
        return $this->db->get_where("sipeta_dosen")->result_array();
    }

    public function getAllKk(){
        return $this->db->get('sipeta_kk')->result_array();
    }
    
    public function getAllPendaftar($periode_id){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->where("sipeta_ta.ta_progres","Proses Validasi");
        return $this->db->get_where("sipeta_ta",array("periode_id"=>$periode_id))->result_array();
    }
    public function getAllPendaftarDownload($periode_id){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->where("sipeta_ta.ta_progres","Diterima");
        return $this->db->get_where("sipeta_ta",array("periode_id"=>$periode_id))->result_array();
    }
    public function getAllPendaftarValidasi($periode_id){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->where("sipeta_ta.ta_progres","Proses Verifikasi");
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
    public function getAllPendaftarDiajukan($periode_id,$tipe){
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        $this->db->join("sipeta_dosen","sipeta_dosen.dosen_nip=sipeta_ta.dosen".$tipe,'left');
        $this->db->where("dosen".$tipe."_status != 'Diterima'");
        return $this->db->get_where("sipeta_ta",array("periode_id"=>$periode_id))->result_array();
    }

    public function getPeriode(){
        $this->db->where("periode_status","Berlangsung");
        return $this->db->get("sipeta_periode")->row_array();
    }
    public function getPeriodeById($periode_id){
        $this->db->where("periode_id",$periode_id);
        $this->db->where("periode_status","Selesai");
        return $this->db->get("sipeta_periode")->row_array();
    }
}
