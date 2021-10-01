<?php
include '../koneksi/koneksi.php';
session_start();
include "login/ceksession.php";
include "../template/assets/PHPExcel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Rifki")
                         ->setLastModifiedBy("Rifki");

// Mengambil data dari tabel
                $bulan=$_POST['bulan'];
                $tahun=$_POST['tahun'];
                $sql1  		= "SELECT * FROM tb_delegasimasuk where MONTH(tgl_laporan)='$bulan' AND YEAR(tgl_laporan) = '$tahun'";                       
                $query1  	= mysqli_query($db, $sql1);

                            if ($bulan == '01') {
                              $bulan = "JANUARI";
                            } elseif ($bulan == '02') {
                              $bulan = "FEBRUARI";
                            } elseif ($bulan == '03') {
                              $bulan = "MARET";
                            } elseif ($bulan == '04') {
                              $bulan = "APRIL";
                            } elseif ($bulan == '05') {
                              $bulan = "MEI";
                            } elseif ($bulan == '06') {
                              $bulan = "JUNI";
                            } elseif ($bulan == '07') {
                              $bulan = "JULI";
                            } elseif ($bulan == '08') {
                              $bulan = "AGUSTUS";
                            } elseif ($bulan == '09') {
                              $bulan = "SEPTEMBER";
                            } elseif ($bulan == '10') {
                              $bulan = "OKTOBER";
                            } elseif ($bulan == '11') {
                              $bulan = "NOVEMBER";
                            } elseif ($bulan == '12') {
                              $bulan = "DESEMBER";
                            }
                $nama_file = 'Surat Masuk-'.$bulan.'-'.$tahun;

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A2:H2');
$excelku->getActiveSheet()->setCellValue('A2', "PENGADILAN AGAMA MAJALENGKA");
$excelku->getActiveSheet()->mergeCells('A3:H3');
$excelku->getActiveSheet()->setCellValue('A3', "PENGADILAN AGAMA KOTA MAJALENGKA");
$excelku->getActiveSheet()->mergeCells('A4:H4');
$excelku->getActiveSheet()->setCellValue('A4', "BAGIAN DELEGASI MASUK");
$excelku->getActiveSheet()->mergeCells('A5:H5');
$excelku->getActiveSheet()->setCellValue('A5', "Jl. Panyingkiran No. 1, Kota Majalengka, Jawa Barat ");
$excelku->getActiveSheet()->mergeCells('A6:H6');
$excelku->getActiveSheet()->setCellValue('A6', "DATA SURAT MASUK BULAN $bulan TAHUN $tahun");
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('A2:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->mergeCells('A8:A9');
$excelku->getActiveSheet()->setCellValue('A8', "NO");
$excelku->getActiveSheet()->setCellValue('B8', "NO URUT");
$excelku->getActiveSheet()->setCellValue('C8', "Nama Pengadilan");
/* $excelku->getActiveSheet()->getStyle('C8:F8')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN); */
/* $excelku->getActiveSheet()->mergeCells('G8:G9'); */
$excelku->getActiveSheet()->setCellValue('D8', "Nomor Perkara");
/* $excelku->getActiveSheet()->mergeCells('H8:H9'); */
$excelku->getActiveSheet()->setCellValue('E8', "Nama Pihak");
/* $excelku->getActiveSheet()->mergeCells('I8:N8'); */
$excelku->getActiveSheet()->setCellValue('F8', "Alamat");
/* $excelku->getActiveSheet()->getStyle('A8:N9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excelku->getActiveSheet()->getStyle('A8:N9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->getStyle('A8:N9')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN); */

// Buat Kolom judul tabel
/* $SI = $excelku->setActiveSheetIndex(0);
 $SI->setCellValue('C9', "ALAMAT PENGIRIM");
 $SI->setCellValue('D9', "NOMOR SURAT");
 $SI->setCellValue('E9', "TANGGAL SURAT");
 $SI->setCellValue('F9', "PERIHAL");
 $SI->setCellValue('I9', "I");
 $SI->setCellValue('J9', "TGL I");
 $SI->setCellValue('K9', "II");
 $SI->setCellValue('L9', "TGL II");
 $SI->setCellValue('M9', "III");
 $SI->setCellValue('N9', "TGL III"); */


//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'    => PHPExcel_Style_Fill::FILL_SOLID,
		  'color'   => array('argb' => 'FFEEEEEE')),
		  'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
	));
	
$bodyStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
		  'color'	=> array('argb' => 'FFFFFFFF')),
		  'borders' => array(
						'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
    ));
    
    $excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
    $excelku->getActiveSheet()->getPageMargins()->setTop(0.75);
    $excelku->getActiveSheet()->getPageMargins()->setRight(0.7);
    $excelku->getActiveSheet()->getPageMargins()->setLeft(0.7);
    $excelku->getActiveSheet()->getPageMargins()->setBottom(0.75);
    $excelku->getActiveSheet()->getPageSetup()->setFitToWidth(1);
    $excelku->getActiveSheet()->getPageSetup()->setFitToHeight(0);


$baris  = 10; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
$no     = 1;

while ($data = $query1->fetch_assoc()) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$data['no_urut']); 
  $SI->setCellValue("C".$baris,$data['nama_pengadilan']); 
  $SI->setCellValue("D".$baris,$data['no_perkara']); 
  $SI->setCellValue("E".$baris,$data['nama-pihak']); 
  $SI->setCellValue("F".$baris,$data['alamat']); 
  $SI->setCellValue("G".$baris,$data['no_surat']); 
  $SI->setCellValue("H".$baris,$data['nama_js']); 
  $SI->setCellValue("I".$baris,$data['no_telpon']); 
  $SI->setCellValue("J".$baris,$data['wilayah_js']); 
  $SI->setCellValue("K".$baris,$data['keterangan']); 
  $SI->setCellValue("L".$baris,$data['nama_js']); 
  $SI->setCellValue("M".$baris,$data['nama_js']); 
  $SI->setCellValue("N".$baris,$data['nama_js']); 
  $baris++; //looping untuk barisnya
  
  // Set lebar kolom

    $excelku->getActiveSheet()->getColumnDimension('A')->setWidth(8.14);
    $excelku->getActiveSheet()->getColumnDimension('B')->setWidth(13);
    $excelku->getActiveSheet()->getColumnDimension('C')->setWidth(29);
    $excelku->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $excelku->getActiveSheet()->getColumnDimension('E')->setWidth(16);
    $excelku->getActiveSheet()->getColumnDimension('F')->setWidth(39);
    $excelku->getActiveSheet()->getColumnDimension('G')->setWidth(28);
    $excelku->getActiveSheet()->getColumnDimension('H')->setWidth(18);
    $excelku->getActiveSheet()->getColumnDimension('I')->setWidth(21);
    $excelku->getActiveSheet()->getColumnDimension('J')->setWidth(21);
    $excelku->getActiveSheet()->getColumnDimension('K')->setWidth(21);
    $excelku->getActiveSheet()->getColumnDimension('L')->setWidth(21);
    $excelku->getActiveSheet()->getColumnDimension('M')->setWidth(21);
    $excelku->getActiveSheet()->getColumnDimension('N')->setWidth(21);
    $excelku->getActiveSheet()->getStyle('A10:N'.$baris.'')->getFont()->setName('Calibri');
    $excelku->getActiveSheet()->getStyle('A10:N'.$baris.'')->getFont()->setSize(11);
    $excelku->getActiveSheet()->getRowDimension($baris)->setRowHeight(-1); 
    $excelku->getActiveSheet()->getStyle('C10:C'.$baris.'')->getAlignment()->setWrapText(true); // wraptext
    $excelku->getActiveSheet()->getStyle('F10:F'.$baris.'')->getAlignment()->setWrapText(true);
    $excelku->getActiveSheet()->getStyle('A10:B'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excelku->getActiveSheet()->getStyle('D10:E'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excelku->getActiveSheet()->getStyle('G10:N'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excelku->getActiveSheet()->getStyle('A10:N'.$baris.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $excelku->getActiveSheet()->getStyle('A10:N'.$baris.'')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    
    
   
}

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('DataSuratKeluar');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nama_file.'".xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>