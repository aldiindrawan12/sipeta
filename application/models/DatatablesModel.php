<?php
// error_reporting(0);
class DatatablesModel extends CI_model
{
    function getDosen($postData){
        $tanggal_now = date("Y-m-d");
        $response = array();
    
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start']; // mulai display per page
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index untuk sorting
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name untuk sorting
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
    
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (sipeta_dosen.dosen_nip like '%".$searchValue."%' or 
                sipeta_dosen.dosen_nama like '%".$searchValue."%' or 
                sipeta_kk.kk_nama like '%".$searchValue."%') ";
        }
        $search_arr[] = " sipeta_dosen.dosen_status='Aktif' ";
        if(count($search_arr) > 0){ //gabung kondisi where
            $searchQuery = implode(" and ",$search_arr);
        }
    
        ## Total record without filtering
        $this->db->select('count(*) as allcount');
        $this->db->where("sipeta_dosen.dosen_status='Aktif'");
        $this->db->join("sipeta_kk", "sipeta_kk.kk_id = sipeta_dosen.kk_id", 'left');
        $records = $this->db->get('sipeta_dosen')->result();
        $totalRecords = $records[0]->allcount;
    
        ## Total record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->join("sipeta_kk", "sipeta_kk.kk_id = sipeta_dosen.kk_id", 'left');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        $records = $this->db->get('sipeta_dosen')->result();
        $totalRecordwithFilter = $records[0]->allcount;
    
        ## data hasil record
        $this->db->select('*');
        $this->db->join("sipeta_kk", "sipeta_kk.kk_id = sipeta_dosen.kk_id", 'left');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('sipeta_dosen')->result();
    
        $data = array();
        $n = 1;
        foreach($records as $record ){
            $data[] = array( 
                "no"=>$n,
                "dosen_nip"=>$record->dosen_nip,
                "dosen_nama"=>$record->dosen_nama,
                "dosen_max1"=>$record->dosen_max1,
                "dosen_max2"=>$record->dosen_max2,
                "dosen_ketersediaan"=>$record->dosen_ketersediaan,
                "kk_nama"=>$record->kk_nama,
            ); 
            $n++;
        }
        ## Response
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );
    
        return $response; 
    }
    function getDosenLuar($postData){
        $tanggal_now = date("Y-m-d");
        $response = array();
    
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start']; // mulai display per page
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index untuk sorting
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name untuk sorting
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
    
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (dosen_nip like '%".$searchValue."%' or 
                dosen_nama like '%".$searchValue."%') ";
        }
        $search_arr[] = " dosen_status='Aktif' ";
        if(count($search_arr) > 0){ //gabung kondisi where
            $searchQuery = implode(" and ",$search_arr);
        }
    
        ## Total record without filtering
        $this->db->select('count(*) as allcount');
        $this->db->where("dosen_status='Aktif'");
        $records = $this->db->get('sipeta_dosen_luar')->result();
        $totalRecords = $records[0]->allcount;
    
        ## Total record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        $records = $this->db->get('sipeta_dosen_luar')->result();
        $totalRecordwithFilter = $records[0]->allcount;
    
        ## data hasil record
        $this->db->select('*');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('sipeta_dosen_luar')->result();
    
        $data = array();
        $n = 1;
        foreach($records as $record ){
            $data[] = array( 
                "no"=>$n,
                "dosen_nip"=>$record->dosen_nip,
                "dosen_nama"=>$record->dosen_nama
            ); 
            $n++;
        }
        ## Response
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );
    
        return $response; 
    }
    function getDaftar($postData,$periode,$nip,$tipe){
        $data_periode = $this->db->get_where("sipeta_periode",array("periode_id"=>$periode))->row_array();
        $tanggal_now = date("Y-m-d");
        $response = array();
    
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start']; // mulai display per page
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index untuk sorting
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name untuk sorting
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
    
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (sipeta_ta.mhs_nim like '%".$searchValue."%') ";
        }
        $search_arr[] = " sipeta_ta.periode_id='".$periode."' ";
        if($data_periode["periode_progress"]!="Validasi"){
            $search_arr[] = " sipeta_ta.ta_progres!='Ditolak' ";
        }
        if($nip){
            $search_arr[] = " sipeta_ta.dosen".$tipe."='".$nip."' ";
            $search_arr[] = " sipeta_ta.ta_progres!='Ditolak' ";
        }

        if(count($search_arr) > 0){ //gabung kondisi where
            $searchQuery = implode(" and ",$search_arr);
        }
    
        ## Total record without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        if($data_periode["periode_progress"]!="Validasi"){
            $this->db->where(" sipeta_ta.ta_progres!='Ditolak' ");
        }
        if($nip){
            $this->db->where(" sipeta_ta.dosen".$tipe."='".$nip."' ");
        }
        $this->db->where(" sipeta_ta.periode_id='".$periode."' ");
        $records = $this->db->get('sipeta_ta')->result();
        $totalRecords = $records[0]->allcount;
    
        ## Total record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        $records = $this->db->get('sipeta_ta')->result();
        $totalRecordwithFilter = $records[0]->allcount;
    
        ## data hasil record
        $this->db->select('*');
        $this->db->join("sipeta_kk","sipeta_kk.kk_id=sipeta_ta.kk_id",'left');
        $this->db->join("sipeta_mhs","sipeta_mhs.mhs_nim=sipeta_ta.mhs_nim",'left');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        if($nip){
            $this->db->order_by("sipeta_ta.dosen".$tipe."_status","ASC");
        }else{
            $this->db->order_by("sipeta_ta.ta_progres","DESC");
        }
        $this->db->order_by("ta_status", "DESC");
        $this->db->order_by("ta_tim", "DESC");
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('sipeta_ta')->result();
    
        $data = array();
        $n = 1;
        foreach($records as $record ){
            $pembimbing1 = $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$record->dosen1))->row_array();
            $pembimbing2 = $this->db->get_where("sipeta_dosen",array("dosen_nip"=>$record->dosen2))->row_array();
            if(!$pembimbing2){
                $pembimbing2 = $this->db->get_where("sipeta_dosen_luar",array("dosen_nip"=>$record->dosen2))->row_array();
            }
            $data[] = array( 
                "no"=>$n,
                "ta_id"=>$record->ta_id,
                "ta_judul"=>$record->ta_judul,
                "ta_status"=>$record->ta_status,
                "ta_tim"=>$record->ta_tim,
                "sipeta_ta.mhs_nim"=>$record->mhs_nim,
                "mhs_nama"=>$record->mhs_nama,
                "dosen1"=>$pembimbing1["dosen_nama"],
                "dosen2"=> $pembimbing2["dosen_nama"],
                "dosen1_status"=>$record->dosen1_status,
                "dosen2_status"=>$record->dosen2_status,
                "ta_progres"=>$record->ta_progres,
                "ta_lihat_pembimbing1"=>$record->ta_lihat_pembimbing1,
                "ta_lihat_pembimbing2"=>$record->ta_lihat_pembimbing2,
                "ta_lihat_koordinator"=>$record->ta_lihat_koordinator,
                "periode" => $data_periode["periode_progress"]
            ); 
            $n++;
        }
        ## Response
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );
    
        return $response; 
    }
    function getArsip($postData){
        $tanggal_now = date("Y-m-d");
        $response = array();
    
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start']; // mulai display per page
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index untuk sorting
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name untuk sorting
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
    
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (periode_tahun like '%".$searchValue."%' or 
                periode_semester like '%".$searchValue."%' ) ";
        }
        $search_arr[] = " periode_status='Selesai' ";
        if(count($search_arr) > 0){ //gabung kondisi where
            $searchQuery = implode(" and ",$search_arr);
        }
    
        ## Total record without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('sipeta_periode')->result();
        $totalRecords = $records[0]->allcount;
    
        ## Total record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        $records = $this->db->get('sipeta_periode')->result();
        $totalRecordwithFilter = $records[0]->allcount;
    
        ## data hasil record
        $this->db->select('*');
        if($searchQuery != ''){
            $this->db->where($searchQuery);
        }
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('sipeta_periode')->result();
    
        $data = array();
        $n = 1;
        foreach($records as $record ){
            $data[] = array( 
                "no"=>$n,
                "periode_id"=>$record->periode_id,
                "periode_tahun"=>$record->periode_tahun,
                "periode_semester"=>$record->periode_semester,
                "periode_buka"=>$record->periode_buka,
                "periode_tutup"=>$record->periode_tutup,
                "periode_status"=>$record->periode_status,
            ); 
            $n++;
        }
        ## Response
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );
    
        return $response; 
    }
}