<?php
//deklarasi FPDF
//deklarasi FPDF
class PDF extends FPDF {
	function Header() {
		
		$this->Image('./uploads/uin_mini.png',1,1.1);
		$this->SetFont('Arial','',15);
		$this->Cell(0,1,'KEMENTRIAN AGAMA',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(0,1,'UNIVERSITAS ISLAM NEGERI UIN SUNAN KALIJAGA',0,0,'C');
		$this->Ln(0.5);
		$this->SetFont('Arial','b',15);
		$this->Cell(0,1,'LEMBAGA PENGABDIAN KEPADA MASYARAKAT',0,0,'C');
		$this->Image('./uploads/uin_mini.png',18,1);
		$this->Ln(1.7);
		$this->Image('./uploads/bismillah.png',8,3);
		$this->Ln(1);
		$this->SetFont('Arial','b',30);
		$this->Cell(0,1,'SERTIFIKAT',0,0,'C');

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
		$nim			= $mahasiswa['NIM'];
		$nama			= $mahasiswa['NAMA'];
		$kelompok		= $mahasiswa['NAMA_KELOMPOK'];
		$fak			= $mahasiswa['FAK'];
		$ttl			= $mahasiswa['TTL'];
		$pathfoto		= $mahasiswa['PATH_FOTO'];
		//$nilai		= $mahasiswa['NILAI'];
		$rw				= $mahasiswa['RW'];
		$desa			= $mahasiswa['DESA'];
		$nm_kec			= $mahasiswa['NM_KEC'];
		$nm_kab			= $mahasiswa['NM_KAB'];
		$nm_prop		= $mahasiswa['NM_PROP'];
		$angkatan		= $mahasiswa['ANGKATAN'];
		$periode		= $mahasiswa['PERIODE'];
		$ta				= $mahasiswa['TA'];
		$sk_sertifikat	= $mahasiswa['SK_SERTIFIKAT']; 
		$tema			= $mahasiswa['TEMA_KKN'];
		$tgl_mulai		= $mahasiswa['TANGGAL_MULAI'];
		$tgl_selesai	= $mahasiswa['TANGGAL_SELESAI'];
	
	}
		$nilai	= 90;
		$foto=$pathfoto;
		$pdf->Image('./uploads/foto/'.$foto,2,22,3,4);
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Nomor	: ' .$sk_sertifikat,0,0,'C');
		$pdf->SetFont('Arial','b',12);
	
		$pdf->Ln(1);
		$pdf->SetFont('Arial','b',10);
		//$pdf->Cell(0,1,'TANDA TERIMA',0,0,'C');
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Lembaga Pengabdian kepada Masyarakat UIN Sunan Kalijaga Yogyakarta memberikan sertifikat kepada:',0,0,'L');
	
		//$pdf->Cell(0,1,'INDEX KINERJA DOSEN SEMESTER '.$mahasiswa->NO.);
		$pdf->Ln(1);
		
		
		$pdf->Cell(9,1,'Nama ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nama,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Tempat, dan Tanggal Lahir ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$ttl,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Nomor Induk Mahasiswa ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nim,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Fakultas',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$fak,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Yang Telah melaksanakan Kuliah Kerja Nyata (KKN) Integrasi-Interkoneksi',0,0,'L');
		$pdf->Ln(0.5);
		$pdf->Cell(0,1,'Yang Bertemakan '.$tema.  ', Periode '.$periode.', Tahun Akademik '.$ta.', Angkatan ke- '.$angkatan.', di:',0,0,'L');
		
		$pdf->Ln(1);
		
		
		$pdf->Cell(9,1,'Lokasi ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$desa.' '.$rw,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Kecamatan ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nm_kec,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Kabupaten ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nm_kab,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Propinsi',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$nm_prop,0,0,'L');
		$pdf->Ln(0.6);
		
		$pdf->Ln(1);
		
		$nilai		=$nilai;
		if(($nilai>=85) &&($nilai<=100)){
			$nilai_huruf="A";
			$status_lulus="LULUS";
		}else if(($nilai>=70) && ($nilai<84)){
			$nilai_huruf="B";
			$status_lulus="LULUS";
		}else if(($nilai>=60) && ($nilai<69)){
			$nilai_huruf="C";
			$status_lulus="LULUS";
		}else if(($nilai>=50) && ($nilai<59)){
			$nilai_huruf="D";
			$status_lulus="TIDAK LULUS";
		}else {
			$nilai_huruf="E";
			$status_lulus="TIDAK LULUS";
		}
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'dari tanggal '.$tgl_mulai.' s/d. '.$tgl_selesai.' dan dinyatakan '.$status_lulus.' dengan nilai '.$nilai.' ('.$nilai_huruf.'). ',0,0,'L');
		$pdf->Ln(0.5);
		$pdf->Cell(0,1,'Sertifikat ini diberikan sebagai bukti yang bersangkutan telah melaksanakan Kuliah Kerja Nyata (KKN) ',0,0,'L');
		$pdf->Ln(0.5);
		$pdf->Cell(0,1,'dengan status intrakurikuler dan sebagai syarat untuk dapat mengikuti ujian Munaqosyah Skripsi',0,0,'L');
		
		$pdf->Ln(1);
		
		
		
		//'.$mahasiswa->TEMA_KKN.'Periode'.$mahasiswa->PERIODE.'Tahun Akademik'.$mahasiswa->TA.'Angkatan ke- '.$mahasiswa->ANGKATAN
	
		//$pdf->Cell(0,1,'INDEX KINERJA DOSEN SEMESTER '.$mahasiswa->NO.);
		$pdf->Ln(1);
		
		$tanggal = date("d/m/Y");
		
		
		//$pdf->Image('./uploads/uin_mini.png',1,1.1);
		$pdf->Cell(0,4,'Yogyakarta, '.$tanggal,0,0,'R');
		$pdf->Ln(0.6);
		$pdf->Cell(0,4,'Ketua, ',0,0,'R');
		$pdf->Ln(0.9);
		$pdf->Ln(0.9);
		$pdf->Cell(0,5,'-----------------------------------',0,0,'R');
		$pdf->Ln(0.6);
		

$pdf->Output('Sertifikat KKN','I'); 

