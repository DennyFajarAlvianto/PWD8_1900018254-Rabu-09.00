<?php
    // memanggil library FPDF
    require('fpdf/fpdf.php');
    // intance object dan memberikan pengaturan halaman PDF
    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    // mencetak string
    $pdf->Cell(190,7,'PROGRAM STUDI TEKNIK INFORMATIKA',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR MAHASISWA MAKUL PEMROGRAMAN WEB DINAMIS',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'NIM',1,0);
    $pdf->Cell(50,6,'NAMA MAHASISWA',1,0);
    $pdf->Cell(25,6,'KODE',1,0);
    $pdf->Cell(50,6,'NAMA MATKUL',1,0);
    $pdf->Cell(30,6,'NILAI',1,1);
    $pdf->SetFont('Arial','',10);
    include 'koneksi.php';
    $mahasiswa = mysqli_query($con, "select mahasiswa.nim, mahasiswa.nama_mhs, khs.kodemk, matakuliah.nama, khs.nilai from mahasiswa inner join khs on mahasiswa.nim = khs.nim inner join matakuliah on matakuliah.kode=khs.kodemk");
    while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['nim'],1,0);
    $pdf->Cell(50,6,$row['nama_mhs'],1,0);
    $pdf->Cell(25,6,$row['kodemk'],1,0);
    $pdf->Cell(50,6,$row['nama'],1,0);
    $pdf->Cell(30,6,$row['nilai'],1,1);
    }
    $pdf->Output();
?>