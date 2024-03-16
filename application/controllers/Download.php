<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require("assets/excel/vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Download extends CI_Controller {
    //construck
        public function __construct()
        {
            parent::__construct();
			error_reporting(0);
            $this->load->model('getmodel');
            $this->load->model('postmodel');
            $this->load->model('putmodel');
            date_default_timezone_set('Asia/Jakarta');
        }
    //end construck

    public function daftar(){
		$periode_id = $this->input->get("periode");
		$periode = $this->getmodel->getPeriodeById($periode_id);
		if($periode){
			$daftar = $this->getmodel->getAllPendaftarDownload($periode["periode_id"]);
			if($daftar){
				for($i=0;$i<count($daftar);$i++){
					$pembimbing1 = $this->getmodel->getDosenByNip($daftar[$i]["dosen1"]);
					$pembimbing2 = $this->getmodel->getDosenByNip($daftar[$i]["dosen2"]);
					$daftar[$i]["pembimbing1"] = $pembimbing1["dosen_nama"];
					$daftar[$i]["pembimbing2"] = $pembimbing2["dosen_nama"];
				}
			}else{
				$daftar == NULL;
			}
        }
        $name_file = "Pendaftaran_TA_".$periode_id;
		$excel = new Spreadsheet();

		// 	//set properti
		$excel->getProperties()->setCreator('Koordinator Tugas Akhir IF')
		->setLastModifiedBy('Koordinator Tugas Akhir IF');

			//set tampilan judul file
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "Pendaftaran Tugas Akhir ".$periode["periode_tahun"]." ".$periode["periode_semester"]);
			$excel->getActiveSheet()->mergeCells('A1:F1');
			$excel->getActiveSheet()->mergeCells('A3:B3');
			$excel->getActiveSheet()->mergeCells('A4:B4');
			$excel->getActiveSheet()->mergeCells('A5:B5');
			$excel->getActiveSheet()->mergeCells('A6:B6');
			$excel->getActiveSheet()->mergeCells('C3:D3');
			$excel->getActiveSheet()->mergeCells('C4:D4');
			$excel->getActiveSheet()->mergeCells('C5:D5');
			$excel->getActiveSheet()->mergeCells('C6:D6');
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

			//header tabel
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "Tahun - Semester");
			$excel->setActiveSheetIndex(0)->setCellValue('C3', $periode["periode_tahun"]." - ".$periode["periode_semester"]);
			$excel->setActiveSheetIndex(0)->setCellValue('A4', "Tanggal Mulai");
			$excel->setActiveSheetIndex(0)->setCellValue('C4', $periode["periode_buka"]);
			$excel->setActiveSheetIndex(0)->setCellValue('A5', "Tanggal Selesai");
			$excel->setActiveSheetIndex(0)->setCellValue('C5', $periode["periode_tutup"]);
			$excel->setActiveSheetIndex(0)->setCellValue('A6', "Status");
			$excel->setActiveSheetIndex(0)->setCellValue('C6', $periode["periode_status"]);

			$excel->setActiveSheetIndex(0)->setCellValue('A7', "NOMOR");
			$excel->setActiveSheetIndex(0)->setCellValue('B7', "NIM");
			$excel->setActiveSheetIndex(0)->setCellValue('C7', "NAMA");
			$excel->setActiveSheetIndex(0)->setCellValue('D7', "JUDUL");
			$excel->setActiveSheetIndex(0)->setCellValue('E7', "PEMBIMBING 1");
			$excel->setActiveSheetIndex(0)->setCellValue('F7', "PEMBIMBING 2");

			//isi tabel
			$numrow = 8;
            $i=1;
			foreach($daftar as $value){
				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $i);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $value["mhs_nim"]);
				$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $value["mhs_nama"]);
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $value["ta_judul"]);
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $value["pembimbing1"]);
				$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $value["pembimbing2"]);
                
                $i++;
				$numrow++; // Tambah BARIS
			}

			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(8); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(50); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
			
			// tinggi otomatis
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            $excel->getDefaultStyle()->getAlignment()->setWrapText(true);
			// Set judul file excel nya
			$excel->getActiveSheet(0)->setTitle("TA_Daftar_".date("d-m-Y"));
			$excel->setActiveSheetIndex(0);

			// Proses file excel
			$header = 'Content-Disposition: attachment; filename='.$name_file.'.xlsx';
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header($header);
			header('Cache-Control: max-age=0');

			$write = IOFactory::createWriter($excel, 'Xlsx');
			$write->save('php://output');
    }


	//fungsi tidak digunakan dalam aplikasi
	//digunakan untuk force insert ta
	public function baca(){
		$mhs = $this->getmodel->getAllMhs();

		$dosen = array(
			"Eko Dwi Nugroho" => "19910209 2020 1 279",
			"Aidil Afriansyah" => "19910416 201903 1 015",
			"Andika Setiawan" => "19911127 2022 03 1 007",
			"Andre Febrianto" => "198602142019031008",
			"Ilham Firman Ashari" => "19930314 201903 1 018",
			"Mugi Praseptiawan" => "198509212019031012",
			"Meida Cahyo Untoro" => "19890518 201903 1 011",
			"Miranti Verdiana" => "161170042021",
			"Muhammad Habib Alghifari" => "19910525 2022 03 1 002",
			"Radhinka Bagaskara" => "19941127 202012 1 018",
			"Winda Yulita" => "19930727 2022 03 2 022",
			"Hira Laksmiwati" => "16117004202201902",
			"Sarwono Sutikno" => "16117004202201902",
		);
		
		$inputFileName = 'C:\xampp\htdocs\TugasAkhir\assets\berkas\data.xlsx';
		$inputFileType = IOFactory::identify($inputFileName);

		$objReader =IOFactory::createReader($inputFileType);
		$object = $objReader->load($inputFileName);
		$pem1 = array();
		$pem2 = array();
		$k=1;
		foreach($object->getWorksheetIterator() as $worksheet)
		{
			$k++;
			if($k==4){
				break;
			}
			$highestRow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();	
			$i=1;
			for($row=2; $row<=$highestRow; $row++){
				$judul = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$nama_dosen = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				if($k==2){
					$pem1[] = array(
						"judul" => $judul,
						"pem" => $nama_dosen,
						'nip' => $dosen[$nama_dosen]
					);
				}else if($k==3){
					$pem2[] = array(
						"judul" => $judul,
						"pem" => $nama_dosen,
						'nip' => $dosen[$nama_dosen]
					);
				}
				$i++;
				if($i==150){
					break;
				}
			}
		}
		$l=0;
		$kk = ["AIDE","KASPER","PLSI"];
		foreach($pem1 as $value){
			$nim = $mhs[$l]["mhs_nim"];
			$data = array(
				'ta_id' => "TA".$mhs[$l]["mhs_nim"]."_Periode-2024/03/11-561",
				'mhs_nim' => $nim,
				'dosen1' => $value["nip"],
				'dosen2' => $pem2[$l]["nip"],
				'dosen1_status' => "Diajukan",
				'dosen2_status' => "Diajukan",
				'ta_judul' => $value["judul"],
				'ta_status' => "Diajukan",
				'ta_kebaharuan' => "baru",
				'kk_id' => $kk[rand(0,2)],
				'ta_progres' => "Diajukan",
				'ta_created_at' => date("y-m-d H:i:s"),
				'ta_asal' => "Sendiri",
				'ta_pkl' => "Tidak",
				'ta_tim' => "Regular",
				'periode_id' => "Periode-2024/03/11-561"
			);
			$l++;
			$this->postmodel->insertTa($data);
		}
	}
}
