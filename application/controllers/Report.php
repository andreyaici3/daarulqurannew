<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	 function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
    	redirect('');
    }

    public function formulir($id)
    {
    	$new_id = base64_decode(urldecode($id));
    	$siswa = $this->db->get_where('master_data_siswa',['id_siswa'=> $new_id])->row_array();

    	if ($siswa['jenis_kelamin'] == "L") {
    		$jk = "Laki - Laki";
    	} else {
    		$jk = "Perempuan";
    	}

    	if ($siswa['jenis_pendaftaran'] == 'ponpes') {
    		$jp = "PONDOK PESANTREN";
    		$logo = base_url('assets/images/report/dq.jpg');
    	} else if ($siswa['jenis_pendaftaran'] == 'mts') {
    		$jp = "MTS";
    		$logo = base_url('assets/images/report/mts.jpg');
    	} else {
    		$jp = "MA";
    		$logo = base_url('assets/images/report/ma.png');
    	}

    	if ($siswa['penghasilan_perbulan_ibu'] != 0) {
    		$ppi = $this->rupiah($siswa['penghasilan_perbulan_ibu']);
    	} else {
    		$ppi = "Tidak Berpenghasilan";
    	}

     	$pdf = new FPDF('p','cm','A4');
    	$pdf->AddPage();
    	$pdf->Image($logo,2,1,2,2);
    	$pdf->SetFont('Times','B',20);
    	$pdf->setY(1);
    	$pdf->setX(1);
    	$pdf->Cell(20,1,'FORMULIR PENDAFTARAN',0,1,'C');
    	$pdf->SetFont('Times','',14);
    	$pdf->Cell(20,0.5,'Yayasan Pondok Pesantren Daarul Quran',0,1,'C');
    	$pdf->SetFont('Times','',12);
    	$pdf->Cell(20,0.8,'Jl. Pondok Pesantren RT01/02 Desa Cikubangmulya, 45593',0,1,'C');
    	// $pdf->Cell(10,7,'',0,1);
    	$pdf->Line(1,3.5,20,3.5);
    	$pdf->SetFont('Times','',11);
    	$pdf->Cell(0,1.5,'CALON PESERTA DIDIK BARU '. $jp .' DAARUL QURAN',0,0.5,'C');
    	$pdf->SetFont('Times','',11);
    	$pdf->Cell(0,-0.5,'TAHUN AJARAN 2020/2021',0,0,'C');
    	$pdf->Cell(-11.8,2,'A. IDENTITAS CALON PESERTA DIDIK',50,1,'R');
    	
    	$pdf->setY(6.4);
    	$pdf->Cell(0,0,'     1. Nama Lengkap ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['nama_siswa'],0,0);

    	$pdf->setY(7);
    	$pdf->Cell(0,0,'     2. Tempat, Tanggal Lahir ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['tempat_lahir'] . ', ' . date('d-m-Y', $siswa['tanggal_lahir']),0,0);

    	$pdf->setY(7.6);
    	$pdf->Cell(0,0,'     3. Nomor Telephone ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['no_whatsapp'],0,0);

    	$pdf->setY(8.2);
    	$pdf->Cell(0,0,'     4. Email ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['email'],0,0);

    	$pdf->setY(8.8);
    	$pdf->Cell(0,0,'     4. NIK ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['nik'],0,0);

    	$pdf->setY(9.4);
    	$pdf->Cell(0,0,'     5. Alamat ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,'Dusun ' . $siswa['dusun'] . ' RT.' . $siswa['rt'] . ' RW.' . $siswa['rw'] . ' Desa ' . $siswa['desa'],0,0);

    	$pdf->setY(10);
    	$pdf->Cell(0,0,'      ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,'',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,'Kec. ' . $siswa['kec'] . ' Kab.' . $siswa['kota'] . ', ' . $siswa['prov'],0,0);

    	$pdf->Cell(-9.5,2,'B. IDENTITAS ORANG TUA CALON PESERTA DIDIK',50,1,'R');

    	$pdf->setY(11.6);
    	$pdf->Cell(0,0,'     1. Nama Ayah ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['nama_ayah'],0,0);

    	$pdf->setY(12.2);
    	$pdf->Cell(0,0,'     2. Tempat, Tanggal Lahir ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['tempat_lahir_ayah'] . ', ' . date('d-m-Y', $siswa['tanggal_lahir_ayah']),0,0);

    	$pdf->setY(12.8);
    	$pdf->Cell(0,0,'     3. Pendidikan Terakhir ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['pendidikan_terakhir_ayah'],0,0);

    	$pdf->setY(13.4);
    	$pdf->Cell(0,0,'     4. Pekerjaan ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['pekerjaan_ayah'],0,0);

    	$pdf->setY(14);
    	$pdf->Cell(0,0,'     5. Penghasilan Perbulan ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$this->rupiah($siswa['penghasilan_perbulan_ayah']),0,0);

    	$pdf->setY(14.6);
    	$pdf->Cell(0,0,'     6. No Hp ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['hp_wa_ayah'],0,0);
    	// 15.3
    	$pdf->setY(15.3);
    	$pdf->Cell(0,0,'     7. Nama Ibu ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['nama_ibu'],0,0);

    	$pdf->setY(15.9);
    	$pdf->Cell(0,0,'     8. Tempat, Tanggal Lahir ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['tempat_lahir_ibu'] . ', ' . date('d-m-Y', $siswa['tanggal_lahir_ibu']),0,0);

       	$pdf->setY(16.5);
    	$pdf->Cell(0,0,'     9. Pendidikan Terakhir ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['pendidikan_terakhir_ibu'],0,0);

    	$pdf->setY(17.1);
    	$pdf->Cell(0,0,'   10. Pekerjaan ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['pekerjaan_ibu'],0,0);

    	$pdf->setY(17.7);
    	$pdf->Cell(0,0,'   11. Penghasilan Perbulan ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$ppi,0,0);

    	$pdf->setY(18.3);
    	$pdf->Cell(0,0,'   12. No Hp ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['hp_wa_ibu'],0,0);

    	// Asal SEKOLAH
    	$pdf->Cell(-10,2,'C. IDENTITAS SEKOLAH CALON PESERTA DIDIK',50,1,'R');
    	$pdf->setY(19.9);
    	$pdf->Cell(0,0,'     1. Asal Sekolah ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['asal_sekolah'],0,0);

    	$pdf->setY(20.5);
    	$pdf->Cell(0,0,'     2. Email Sekolah ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['email_sekolah'],0,0);

    	$pdf->setY(21.1);
    	$pdf->Cell(0,0,'     3. Alamat Sekolah ',0,0);
    	$pdf->setX(6);

    	$pdf->Cell(0,0,':',0,0);
    	$pdf->setX(6.3);
    	$pdf->Cell(0,0,$siswa['alamat_sekolah'],0,0);

    	$pdf->setY(22.3);
    	$pdf->Cell(0,0,'               Dengan ini saya menyatakan bahwa data yang saya berikan sudah benar, apabila terdapat kesalahan siswa',0,0,'J');
    	$pdf->setX(6);

    	$pdf->setY(22.8);
    	$pdf->Cell(0,0,'     dapat mengajukan perbaikan identitas dilain waktu selama data tersebut belum digunakan, dan pihak sekolah',0,0);
    	$pdf->setX(6);

    	$pdf->setY(23.3);
    	$pdf->Cell(0,0,'     tidak bertanggung jawab apabila data yang diberikan ada kesalahan. ',0,0);
    	$pdf->setX(6);

    	$pdf->setY(24.5);
    	$pdf->setX(15);
    	$pdf->Cell(0,0,'Kuningan, April 2020',0,0);
    	$pdf->setX(6);
    	$pdf->setY(25.1);
    	$pdf->setX(15);
    	$pdf->Cell(0,0,'Tanda Tangan',0,0);
    	$pdf->setX(6);

    	$pdf->setY(27.5);
    	$pdf->setX(15);
    	$pdf->Cell(0,0,$siswa['nama_siswa'],0,0);
    	$pdf->setX(6);

    	
		
    	$pdf->Output('D','Formulir-' . $siswa['jenis_pendaftaran'] . '-' . uniqid() .'.pdf');


    	
    }

    public function rupiah($angka)
    {
    	return "Rp. " . number_format($angka,2,',','.');
    }

    
}