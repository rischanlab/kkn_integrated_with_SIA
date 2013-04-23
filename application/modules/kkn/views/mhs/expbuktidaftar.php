<?php
//deklarasi FPDF
//deklarasi FPDF
class PDF extends FPDF {
	function Header() {
		

	}
}

	
	
	$pdf=new PDF('P','cm','A4');
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	//setting margin kertas
	$pdf->SetMargins(1.5,1,1.5); 
	$pdf->SetFont('Arial','B',12);
	//membuat kop tabel
	
	$x=$pdf->GetY(); 
	$pdf->SetY($x+1);
	foreach($data as $gembus=>$mahasiswa)
	{
		$nim		= $mahasiswa['NIM'];
		$nama		= $mahasiswa['NAMA'];
		$kelompok	= $mahasiswa['NAMA_KELOMPOK'];
		$fak		= $mahasiswa['FAK'];
		$nm_dosen	= $mahasiswa['NM_DOSEN'];
		$rw			= $mahasiswa['RW'];
		$desa		= $mahasiswa['DESA'];
		$nm_kec		= $mahasiswa['NM_KEC'];
		$nm_kab		= $mahasiswa['NM_KAB'];
		$angkatan	= $mahasiswa['ANGKATAN'];
		$periode	= $mahasiswa['PERIODE'];
		$ta			= $mahasiswa['TA'];
	
	}
		$pdf->SetFont('Arial','b',12);
		$pdf->Cell(0,1,"PANITIA PELAKSANA KKN PERIODE  ".$periode." TAHUN AKADEMIK ".$ta,0,0,'C');
		$pdf->SetFont('Arial','b',12);
	//	$pdf->Cell(0,1,,0,0,'');
	//	$this->Image('./asset/images/LogoISO.jpg',6.3,1.1);
		$pdf->Ln(1);
		$pdf->SetFont('Arial','b',10);
		$pdf->Cell(0,1,'TANDA TERIMA',0,0,'C');
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Telah terima berkas pendaftaran Calon Peserta KKN Angkatan ke-' .$angkatan,0,0,'L');
		$pdf->Ln(0.6);
		//$pdf->Cell(0,1,'INDEX KINERJA DOSEN SEMESTER '.$mahasiswa->NO.);
		
		
		
		$pdf->Cell(0,1,'NIM ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nim,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Nama ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nama,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Fakultas ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$fak,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Lokasi KKN',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,'RW '.$rw.','.$desa.','.$nm_kec.','.$nm_kab,0,0,'L');
		$pdf->Ln(0.6);
		
		$pdf->Cell(0,1,'DPL (Dosen Pembimbing Lapangan)',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nm_dosen,0,0,'L');
		$pdf->Ln(4);

		
		$tanggal = date("d/m/Y");
		
		
		
		$pdf->Cell(0,1,'Yogyakarta, '.$tanggal,0,0,'R');
		$pdf->Ln(0.6);
		$pdf->Cell(0,1,'Bidang Sekretariat/Petugas',0,0,'R');
		$pdf->Ln(0.9);
		$pdf->Ln(0.9);
		$pdf->Cell(0,1,'-----------------------------------',0,0,'R');
		$pdf->Ln(0.6);
		
		
		
								

		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'Tanda terima ini berfungsi juga :',0,0,'L');
		$pdf->Ln(0.6);
		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'1.	Tanda peserta Pembekalan KKN.',0,0,'L');
		$pdf->Ln(0.6);
		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'2.	Untuk pengambilan Buku Pedoman KKN.',0,0,'L');
		$pdf->Ln(0.6);
		
		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'Print Tanda Bukti ini kemudian di serahkan ke LPM untuk pengambilan Buku Pedoman KKN',0,0,'L');
		$pdf->Ln(0.6);




$pdf->Output('Bukti Pendaftaran KKN','I'); 

