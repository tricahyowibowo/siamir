<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Transaksi extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('crud_model');
        $this->load->model('M_admin');
        $this->load->model('transaksi_model');
        $this->load->model('master_model');
        $this->load->library('Pdf');
        $this->load->helper('tgl_indo');
        $this->isLoggedIn();   
    }

    public function index(){
        redirect('Datatransaksi');
    }

    public function datatransaksi($id){

        $id = $this->uri->segment(3);

        $data['role'] = $this->global ['role'];

        $this->global['pageTitle'] = 'Data Transaksi';
        $data['list_data'] = $this->transaksi_model->Gettransaksi($id);
        $data['list_akun'] = $this->crud_model->tampil_data('tbl_dafakun');

        $this->loadViews("transaksi/data", $this->global, $data , NULL);
    }

    public function edittransaksi($id){

        $id = $this->uri->segment(3);
        $data['role'] = $this->global ['role'];

        $this->global['pageTitle'] = 'Data Transaksi';
        $data['list_data'] = $this->transaksi_model->GettransaksiByNo($id);
        $data['list_akun'] = $this->crud_model->tampil_data('tbl_dafakun');
        
        $this->loadViews("transaksi/edit", $this->global, $data , NULL);
    }

    public function kategori($page){

        $page = $this->uri->segment(2);

        $this->global['pageTitle'] = 'Kategori ';

        $data = array(
            'list_bank'      => $this->master_model->getDataSumber($page),
            'list_kategori'  => $this->master_model->getDataKategori($page),
            'page'  => $page,
            );

        $this->loadViews("transaksi/kategori", $this->global, $data , NULL);
    }

    public function updatedata(){
        $this->global['pageTitle'] = 'Update Transaksi';

        $id_transaksi = $this->input->post('id_transaksi');
        $no_transaksi = $this->input->post('no_transaksi');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $akun = $this->input->post('akun');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $nominal_transaksi = $this->input->post('nominal_transaksi');

        $data = array();
		$index = 0; // Set index array awal dengan 0
		foreach ($no_transaksi as $no_transaksi) { // Kita buat perulangan berdasarkan kode transaksi sampai data terakhir
            
            $data[] = array(
				'no_transaksi' => $no_transaksi,
				'id_transaksi' => $id_transaksi[$index],
				'tgl_transaksi' => $tgl_transaksi[$index], 
				'akun' => $akun[$index], 
				'jenis_transaksi' => $jenis_transaksi[$index], 
				'nominal_transaksi' => $nominal_transaksi[$index],
			);   

		$index++;
		}

        $this->db->update_batch('tbl_transaksi', $data, 'id_transaksi');
        $this->session->set_flashdata('msg_berhasil','Data Berhasil Diubah');
        redirect('transaksi/edittransaksi/'.$no_transaksi);
    }

    public function tambahdata(){
        $this->global['pageTitle'] = 'Tambah Transaksi';

        $id = $this->input->post('kategori');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $sumber = $this->input->post('sumber');
        $kode_transaksi = $this->input->post('kode_transaksi');


        $kategori = $this->transaksi_model->cekkategori($id);
        foreach ($kategori as $k){
            $id_kategori = $k->id_kategori;
            $nama_kategori = $k->nama_kategori;
            $kode_kategori = $k->kode_kategori;
            $jenis_kategori = $k->normal_balance;
        }

        $sumber = $this->transaksi_model->ceksumber($sumber);
        foreach ($sumber as $s){
            $id_sumber = $s->id_akun;
            $nama_sumber = $s->nama_akun;
        }

        $cek=substr($nama_sumber, 0, 4);
        switch ($cek) {
        case "BANK":
            $kode1= substr($nama_sumber, 0, 1);
            $kode2= substr($nama_sumber, 5, 1);

            $cekbank = substr($nama_sumber, 5, 5);

            if($cekbank == "NIAGA"){
                $kode3= substr($nama_sumber,11, 1);
            }else{
                $kode3= substr($nama_sumber,13, 1);
            }
            break;
        case "DEPO":
            $kode1= substr($nama_sumber, 0, 1);
            $kode2= substr($nama_sumber, 1, 1);
            $kode3= substr($nama_sumber, 2, 1);
            break;
        default:
            $kode1= substr($nama_sumber, 0, 1);
            $kode2= substr($nama_sumber, 1, 1);
            $kode3= substr($nama_sumber, 4, 1);
        }

        $kode_sumber = $kode1.$kode2.$kode3;

        $kode = $kode_kategori.$kode_sumber;

        $tanggal = strftime('%m%Y', strtotime($tgl_transaksi));
        $bln = substr($tanggal, 0, 2);
        $thn = substr($tanggal, 2, 7);
        // // $tanggal = $this->transaksi_model->cektanggal();

        $cektanggal = $this->transaksi_model->cekkodebytanggal($kode, $bln, $thn);
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($cektanggal, 4, 3);
        $no_transaksi = $nourut + 1;


        $data = array(
            'id' => $id,
            'kode_transaksi' => $kode_transaksi,
            'kode_kategori' => $kode_kategori,
            'id_kategori' => $id_kategori,
            'jenis_kategori' => $jenis_kategori,
            'no_transaksi' => $no_transaksi,
            'tgl_transaksi'  => $tgl_transaksi,
            'id_sumber'    => $id_sumber,
            'kode_sumber'    => $kode_sumber,
            'list_akun'      => $this->transaksi_model->dataakun($id_kategori),
            'list_karyawan'  => $this->crud_model->tampil_data('tbl_karyawan'),
            'list_kategori'  => $this->crud_model->tampil_data('tbl_kategori'),
            );

        $this->loadViews("transaksi/tambah_transaksi", $this->global, $data , NULL);
    }

    public function simpan(){
		// Ambil data yang dikirim dari form
		$kode_transaksi = $_POST['kode_transaksi']; // Ambil data nis dan masukkan ke variabel nis
		$no_transaksi = $_POST['no_transaksi']; // Ambil data nis dan masukkan ke variabel nis
		$tgl_transaksi = $_POST['tgl_transaksi']; // Ambil data nama dan masukkan ke variabel nama
		$akun = $_POST['akun']; // Ambil data nama dan masukkan ke variabel nama
		$jenis_transaksi = $_POST['jenis_transaksi']; // Ambil data telp dan masukkan ke variabel telp
		$nominal_transaksi = $_POST['nominal_transaksi']; 
		$keterangan = $_POST['keterangan'];
        $user_id = $this->global ['userId']; 
        $rek_id = $this->uri->segment(3);
        $kategori_id = $this->uri->segment(4);

		$data = array();

		$index = 0; // Set index array awal dengan 0
        $debet = 0;   
        $kredit = 0;   
		foreach ($kode_transaksi as $kode_transaksi) { // Kita buat perulangan berdasarkan kode transaksi sampai data terakhir
            
            array_push($data, array(
				'kode_transaksi' => $kode_transaksi,
				'no_transaksi' => $no_transaksi[$index],
				'tgl_transaksi' => $tgl_transaksi[$index], 
				'jenis_transaksi' => $jenis_transaksi[$index],  
				'akun' => $akun[$index], 
				'kategori_id' => $kategori_id, 
				'nominal_transaksi' => $nominal_transaksi[$index],
				'keterangan' => $keterangan[$index],
                'user_id' => $user_id,
			));   

            // $total = array_sum($nominal_transaksi);
            if($data[$index]['jenis_transaksi'] === "Debet"){  
                $debet = $debet + $data[$index]['nominal_transaksi'];
            }else{
                $kredit = $kredit + $data[$index]['nominal_transaksi'];
            }

		$index++;
		}

        if($debet <= $kredit){
            $total = $kredit - $debet;
        }else{
            $total = $debet - $kredit;
        }

        $nominal_transaksi = implode(" ",$nominal_transaksi);


        $tanggal = implode(" ",$tgl_transaksi);
        $tgl = substr($tanggal, 0, 10);

        $sumber = $this->transaksi_model->ceksumber($rek_id);
        foreach ($sumber as $s){
            $akun_sumber = $s->id_akun;
        }

        $id = $kategori_id;
        $kategori = $this->transaksi_model->cekkategori($id);
        foreach ($kategori as $k){
            $id_kategori = $k->id_kategori;
            $jenis_kategori = $k->normal_balance;
        }

        $no_transaksi = implode(" ",$no_transaksi);
        $no_transaksi = substr($no_transaksi, 0, 7);

        if ($jenis_kategori === "Kredit" ){
            $data2 = array(
            'kode_transaksi' => $kode_transaksi,
			'no_transaksi' => $no_transaksi,
            'tgl_transaksi' => $tgl,
            'jenis_transaksi' => "Kredit",
            'akun' => $akun_sumber,
            'nominal_transaksi' => $total,
            'kategori_id' => $id_kategori,
            'keterangan' => "",
            'user_id' => $user_id,
            );
        } else{
            $data2 = array(
            'kode_transaksi' => $kode_transaksi,
            'no_transaksi' => $no_transaksi,
            'tgl_transaksi' => $tgl,
            'jenis_transaksi' => "Debet",
            'akun' => $akun_sumber,
            'nominal_transaksi' => $total,
            'kategori_id' => $id_kategori,
            'keterangan' => "",
            'user_id' => $user_id,
            );
        }

		$sql = $this->crud_model->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)
        $this->crud_model->input($data2, 'tbl_transaksi');

		// Cek apakah query insert nya sukses atau gagal
		if ($sql) { // Jika sukses
			$this->session->set_flashdata('msg_berhasil', 'Data Berhasil disimpan');  
            redirect('transaksi/datatransaksi/'.$kategori_id);
		} else { // Jika gagal
			echo "<script>alert('Data gagal disimpan');window.location = '" .  redirect('transaksi/kategori') . "';</script>";
		}
	}

    public function tambahdataexcel(){
        $this->global['pageTitle'] = 'Tambah bahan';

        $this->loadViews("transaksi/import_excel", $this->global , NULL);
    }

    public function format_excel(){
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="format input data transaksi.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Kode Transaksi');
		$sheet->setCellValue('B1', 'No Transaksi');
		$sheet->setCellValue('C1', 'Tanggal Transaksi');
		$sheet->setCellValue('D1', 'Jenis Transaksi');
		$sheet->setCellValue('E1', 'akun');
		$sheet->setCellValue('F1', 'Kategori');
		$sheet->setCellValue('G1', 'Nominal');
		$sheet->setCellValue('H1', 'Keterangan');


		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

    public function spreadsheet_import(){
		$upload_file=$_FILES['upload_file']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$kode_transaksi=$sheetdata[$i][0];
				$no_transaksi=$sheetdata[$i][1];
				$tgl_transaksi=$sheetdata[$i][2];
                $jenis_transaksi=$sheetdata[$i][3];
				$akun=$sheetdata[$i][4];
				$kategori_id=$sheetdata[$i][5];
                $nominal_transaksi=$sheetdata[$i][6];
				$keterangan=$sheetdata[$i][7];

				$data[]=array(
					'kode_transaksi'=>$kode_transaksi,
					'no_transaksi'=>$no_transaksi,
					'tgl_transaksi'=>$tgl_transaksi,
                    'jenis_transaksi'=>$jenis_transaksi,
					'akun'=>$akun,
                    'kategori_id'=>$kategori_id,
					'nominal_transaksi'=>$nominal_transaksi,
					'keterangan'=>$keterangan,
					'user_id'=>$this->global ['userId'],
				);
			}
			$inserdata=$this->crud_model->save_batch($data);
			if($inserdata)
			{
				$this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
				redirect('transaksi/tambahdataexcel');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('transaksi/tambahdataexcel');
			}
		}
	}

    public function delete($kode_transaksi){
      $where = array('kode_transaksi' => $kode_transaksi);
      $this->crud_model->delete($where , 'tbl_transaksi');
      redirect(base_url('transaksi'));
    }

    public function kategori_sumber(){


        $this->global['pageTitle'] = 'Data Transaksi';
        $page = $this->uri->segment(2);

        $data['list_bank'] = $this->transaksi_model->GetAkunByPage($page);
        $data['page'] = $page;

        $this->loadViews("transaksi/kategori_sumber", $this->global, $data , NULL);
    }

    public function halamanlaporan(){
        $filterakun = $this->input->post('bank');

        if(is_null($filterakun)){
            $filterakun = $this->uri->segment(3);
        }

        $page = $this->uri->segment(2);
        $this->global['pageTitle'] = 'Laporan '.$page;

        $data['page'] = $page;
        $data['filter'] = $filterakun;
        $this->loadViews("laporan/halamanlaporan", $this->global, $data , $data, NULL);
    }

    public function laporantransaksi(){
        $data = $this->data();
        $page = $this->uri->segment(2);
        $this->global['pageTitle'] = 'Laporan '.$page;

        $this->loadViews("laporan/data", $this->global, $data , $data, NULL);
    }

    public function cetak(){
        $id = $this->uri->segment(3);
        $cek = substr($id, 0, 2);

        if($cek === "PK"){
        $kode_transaksi = substr($id, 0, 3);
        $no_transaksi = substr($id, 3, 7);
        }else{
        $kode_transaksi = substr($id, 0, 5);
        $no_transaksi = substr($id, 5, 7);  
        }
        // var_dump($kode_transaksi);
        // var_dump($no_transaksi);

        // $ls   = array('kode_transaksi' => $kode_transaksi ,'no_transaksi' => $no_transaksi);
        $data = $this->transaksi_model->GettransaksiByID($kode_transaksi, $no_transaksi);
        $id = $data[0];
        // var_dump($id);

        // $elemen = each ($data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // document informasi
        $pdf->SetCreator('SI AMIR | Sistem Akutansi Mirota');
        $pdf->SetTitle('Laporan '.$id->nama_kategori);
        $pdf->SetSubject($id->nama_kategori);

        //header Data
        $pdf->SetHeaderData('Mirota.PNG',30,'PT Mirota KSM','JL. Raya Yogya-Solo Km. 9', array(50,54,57),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


        $pdf->setHeaderFont(Array('helvetica','',12));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 1,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        //FONT Subsetting
        $pdf->setFontSubsetting(true);

        $pdf->SetFont('helvetica','',9,'',true);
        $pdf->AddPage('L','A5');


        $html=
        '<div> 
            <h1 align="center">Bukti '.$id->nama_kategori.'</h1>
            <p><span align="center">No. Transaksi: '.$id->kode_transaksi.$id->no_transaksi.'</span></p>

            <table cellpadding="10" border="1" align="center">
            <tr>
                <th width="40" align="center">No</th>
                <th width="70" align="center">Tanggal</th>
                <th width="55" align="center">Akun</th>
                <th width="160" align="center">Keterangan</th>
                <th width="140" align="center">Debit</th>
                <th width="140" align="center">Kredit</th>
            </tr>';

            $no = 1;
            $debet = 0; 
            $kredit = 0; 
            $saldo = 0;
            foreach($data as $d){

                if($d->jenis_transaksi == "Debet"){
                    $nominal = "Rp. ".number_format($d->debet,2,",",".");
                    $saldo+=$d->debet;
                    $debet+=$d->debet;
                }else{
                    $nominal = "-";
                }

                if($d->jenis_transaksi == "Kredit"){
                    $kred = "Rp. ".number_format($d->kredit,2,",",".");
                    $saldo+=$d->kredit;
                    $kredit+=$d->kredit;
                }else{
                    $kred = "-";
                }

                // var_dump($saldo);
 
                $html .= '<tr>';
                $html .= '<td align="center" style="height:40px;">'.$no.'</td>';
                // $html .= '<td align="center">'.$d->kode_transaksi.$d->no_transaksi.'</td>';
                $html .= '<td align="center">'.strftime('%d %b %y', strtotime($d->tgl_transaksi)).'</td>';
                $html .= '<td align="center">'.$d->akun.'</td>';
                if($d->keterangan == ""){
                $html .= '<td align="left">'.$d->nama_akun.'</td>';
                }else{
                $html .= '<td align="left">'.$d->keterangan.'</td>';
                }
                $html .= '<td align="center">'.$nominal. '</td>';
                $html .= '<td align="center">'.$kred. '</td>';

                // $html .= '<td class="text-center">'.$d->jenis_transaksi == "Kredit" ? $d->jenis_transaksi : '-'; '</td>';
                // $html .= '<td align="center">'.$d->nominal_transaksi.'</td>';
                // $html .= '<td align="center">'.$d->nominal_transaksi.'</td>';
                $html .= '</tr>';                
                $no++;
            }

            $html .= '<tr>';
            $html .= '<td align="right" colspan="4"><b>Jumlah</b></td>';
            $html .= '<td align="center">'."Rp. ".number_format($debet,2,",",".").'</td>';
            $html .= '<td align="center">'."Rp. ".number_format($kredit,2,",",".").'</td>';
            $html .= '</tr>
            </table><br><br><br>
            </div>';



            $html .='
            <table cellpadding="5" border="0" align="center">
            <tr>
                <th>Dibukukan Oleh</th>
                <th>Tgl Pembukuan</th>
            </tr>
            <tr>
                <td>'.$this->global['name'].'</td>
                <td>'.strftime('%d %b %y', strtotime($d->tgl_transaksi)).'</td>
            </tr>
            </table>';
        
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        

        $pdf->Output($id->kode_transaksi.$id->no_transaksi."-".date("d.m.y").'.pdf','I');
        redirect('transaksi/kategori');
    }

    public function jurnal(){
        $data = $this->data();
        $page = $this->uri->segment(2);
        $this->global['pageTitle'] = 'Jurnal '.$page;

        $this->loadViews("laporan/jurnal", $this->global, $data , NULL);
    }
    
    public function bukubesar(){
        $data = $this->data();
        $page = $this->uri->segment(2);
        $this->global['pageTitle'] = 'Buku besar '.$page;

        $this->loadViews("laporan/bukubesar", $this->global, $data , NULL);
    }
    
    public function neraca(){
        // $data = $this->data();
        $page = $this->uri->segment(2);
        $this->global['pageTitle'] = 'Laporan Neraca '.$page;

        $akun = $this->input->post('akun'); 
        $tgl_awal = $this->input->post('tgl_awal'); 
        $tgl_akhir = $this->input->post('tgl_akhir');

        $saldoawal = $this->transaksi_model->Getsaldoawalneraca($page);

        foreach($saldoawal as $s){
            $totalsaldo = $s->debet-$s->kredit;
        }

        // var_dump($totalsaldo);


        $data = array(
            'page' => $page,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'akun'   => $akun,
            'saldoawal'  => $totalsaldo,
            'list_data'  => $this->transaksi_model->Getneraca($page),
            'list_akun'  => $this->crud_model->tampil_data('tbl_dafakun')
            );

        $this->loadViews("laporan/neraca", $this->global, $data , NULL);
    }
// LAPORAN EXCEL//

    //JURNAL----//
        public function jurnalexcel(){
            $page = $this->uri->segment(3);
            $filterakun = $this->uri->segment(4);
            $tgl_awal = $this->uri->segment(5); 
            $tgl_akhir = $this->uri->segment(6);
            $awal = strftime('%d/%b/%Y', strtotime($tgl_awal));
            $akhir = strftime('%d/%b/%Y', strtotime($tgl_akhir));
            $periode = strftime("%B", strtotime(date("Y/m/d")));

        
        
            $transaksi = $this->transaksi_model->Getfilterakun($page, $filterakun, $tgl_awal,$tgl_akhir);
            // $transaksi = $this->transaksi_model->Getbukubesar($page, $akun, $tgl_awal,$tgl_akhir);
        
            if(is_null($tgl_awal)){
                $tgl = "01";
                $bln = date("m");
                $thn = date("Y");
        
                $tgl_awal = $thn.'-'.$bln.'-'.$tgl;
            };
        
        
            $saldoawal = $this->transaksi_model->Getsaldoawal($page, $filterakun, $tgl_awal);
        
            foreach($saldoawal as $s){
                $saldoawal = $s->debet - $s->kredit;
            };

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $styleRight = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
            

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        

        $sheet->setCellValue('B2', 'Laporan Data Jurnal '.$page.' PT. MIROTA KSM'); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('B2:E2'); // Set Merge Cell pada kolom A1 sampai E1

        if (isset($tgl_awal) && isset($tgl_akhir)){
            $sheet->setCellValue('B3', 'Periode : '.$awal.' - '.$akhir);
        }else{
            $sheet->setCellValue('B3', 'Periode : '.$periode);
        }

        $sheet->mergeCells('B3:D3');

        $sheet->setCellValue('B5', 'No');
        $sheet->setCellValue('C5', 'Kode');
        $sheet->setCellValue('D5', 'Tanggal');
        $sheet->setCellValue('E5', 'Akun');
        $sheet->setCellValue('F5', 'Keterangan');
        $sheet->setCellValue('G5', 'Debet (Rp)');
        $sheet->setCellValue('H5', 'Kredit (Rp)');

        $sheet->getStyle('B5')->applyFromArray($style_col);
        $sheet->getStyle('C5')->applyFromArray($style_col);
        $sheet->getStyle('D5')->applyFromArray($style_col);
        $sheet->getStyle('E5')->applyFromArray($style_col);
        $sheet->getStyle('F5')->applyFromArray($style_col);
        $sheet->getStyle('G5')->applyFromArray($style_col);
        $sheet->getStyle('H5')->applyFromArray($style_col);

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
        $numrow2 = 7;
        $debet = 0;
        $kredit = 0;
        $saldo = 0;


        foreach($transaksi as $dd){ // Lakukan looping

            $kode_transaksi = $dd->kode_transaksi;
            $no_transaksi = $dd->no_transaksi;

            $detailtransaksi = $this->transaksi_model->GetTransaksiByKode($kode_transaksi, $no_transaksi, $filterakun, $tgl_awal, $tgl_akhir);

            foreach($detailtransaksi as $dt){               
                $sheet->setCellValue('B'.$numrow, $no);
                $sheet->setCellValue('C'.$numrow, $dt->kode_transaksi.$dt->no_transaksi);
                $sheet->setCellValue('D'.$numrow, strftime('%d %B %Y', strtotime($dt->tgl_transaksi)));
                $sheet->setCellValue('E'.$numrow, $dt->id_akun);
                $sheet->setCellValue('F'.$numrow, $dt->nama_akun." ".$dt->keterangan);
                $sheet->setCellValue('G'.$numrow, "Rp. ".number_format($dt->debet,2,",","."));
                $sheet->setCellValue('H'.$numrow, "Rp. ".number_format($dt->kredit,2,",","."));
                

                $sheet->getColumnDimension('B')->setAutoSize(true);
                $sheet->getColumnDimension('C')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('E')->setWidth(40, 'pt');
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
                $sheet->getColumnDimension('H')->setAutoSize(true);

                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);

                $sheet->setCellValue('B'.$numrow2, $no);
                $sheet->setCellValue('C'.$numrow2, $dd->kode_transaksi.$dd->no_transaksi);
                $sheet->setCellValue('D'.$numrow2, strftime('%d %B %Y', strtotime($dd->tgl_transaksi)));
                $sheet->setCellValue('E'.$numrow2, $dd->id_akun);
                $sheet->setCellValue('F'.$numrow2, $dd->nama_akun." ".$dd->keterangan);
                $sheet->setCellValue('G'.$numrow2, "Rp. ".number_format($dd->debet,2,",","."));
                $sheet->setCellValue('H'.$numrow2, "Rp. ".number_format($dd->kredit,2,",","."));

                $sheet->getColumnDimension('B')->setAutoSize(true);
                $sheet->getColumnDimension('C')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('E')->setWidth(40, 'pt');
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
                $sheet->getColumnDimension('H')->setAutoSize(true);

                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $sheet->getStyle('B'.$numrow2)->applyFromArray($style_row);
                $sheet->getStyle('C'.$numrow2)->applyFromArray($style_row);
                $sheet->getStyle('D'.$numrow2)->applyFromArray($style_row);
                $sheet->getStyle('E'.$numrow2)->applyFromArray($style_row);
                $sheet->getStyle('F'.$numrow2)->applyFromArray($style_row);
                $sheet->getStyle('G'.$numrow2)->applyFromArray($style_row);
                $sheet->getStyle('H'.$numrow2)->applyFromArray($style_row);
            };

            $no++; // Tambah 1 setiap kali looping
            $numrow = $numrow+2; // Tambah 1 setiap kali looping
            $numrow2 = $numrow2+2; // Tambah 1 setiap kali looping
        };

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');

        if (isset($tgl_awal) && isset($tgl_akhir)){
            header('Content-Disposition: attactchment;filename="Jurnal"'.$page.' '.$awal.' - '.$akhir.'.xlsx');
        }else{
            header('Content-Disposition: attactchment;filename="Jurnal"'.$page.'_'.$periode.'.xlsx');
        }

        header('Cache-Control: max-age=0');
        $writer->save("php://output");
        exit();
        }
    //----JURNAL//

    //BUKU BESAR---//
    public function bukubesarexcel(){
        $page = $this->uri->segment(3);
        $filterakun = $this->uri->segment(4);
        $tgl_awal = $this->uri->segment(5); 
        $tgl_akhir = $this->uri->segment(6);
        $awal = strftime('%d/%b/%Y', strtotime($tgl_awal));
        $akhir = strftime('%d/%b/%Y', strtotime($tgl_akhir));
        $periode = strftime("%B", strtotime(date("Y/m/d")));

        $sumber = $this->transaksi_model->ceksumber($filterakun);
        foreach ($sumber as $s){
            $id_sumber = $s->id_akun;
            $nama_sumber = $s->nama_akun;
        }

		$ceksumber=substr($nama_sumber, 0, 4);
        switch ($ceksumber) {
        case "BANK":
            $kode1= substr($nama_sumber, 0, 1);
            $kode2= substr($nama_sumber, 5, 1);

            $cekbank = substr($nama_sumber, 5, 5);

            if($cekbank == "NIAGA"){
                $kode3= substr($nama_sumber,11, 1);
            }else{
                $kode3= substr($nama_sumber,13, 1);
            }
            break;
        case "DEPO":
            $kode1= substr($nama_sumber, 0, 1);
            $kode2= substr($nama_sumber, 1, 1);
            $kode3= substr($nama_sumber, 2, 1);
            break;
        default:
            $kode1= substr($nama_sumber, 0, 1);
            $kode2= substr($nama_sumber, 1, 1);
            $kode3= substr($nama_sumber, 4, 1);
        }
		

        $kode_sumber = $kode1.$kode2.$kode3;
        $datatransaksi = $this->transaksi_model->GettransaksiByKodetransaksi($filterakun, $kode_sumber, $tgl_awal, $tgl_akhir);

        if(is_null($tgl_awal)){
            $tgl = "01";
            $bln = date("m");
            $thn = date("Y");

            $tgl_awal = $thn.'-'.$bln.'-'.$tgl;
        };


        $saldoawal = $this->transaksi_model->Getsaldoawal($page, $filterakun, $tgl_awal);

        foreach($saldoawal as $s){
            $saldoawal = $s->debet - $s->kredit;
        };

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $styleRight = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
            

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $sheet->setCellValue('B2', 'Laporan Data Buku Besar '.$page); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('B2:E2'); // Set Merge Cell pada kolom A1 sampai E1

        if (isset($tgl_awal) && isset($tgl_akhir)){
            $sheet->setCellValue('B3', 'Periode : '.$awal.' - '.$akhir);
        }else{
            $sheet->setCellValue('B3', 'Periode : '.$periode);
        }

        $sheet->mergeCells('B3:D3');

        $sheet->setCellValue('B4', 'Saldo Awal');
        $sheet->setCellValue('I4', "Rp. ".number_format($saldoawal,2,",","."));
        $sheet->mergeCells('B4:H4');
        $sheet->getStyle('B4:H4')->applyFromArray($style_col);
        $sheet->getStyle('B4')->applyFromArray($styleRight);  
        $sheet->getStyle('I4')->applyFromArray($style_col);  

        $sheet->setCellValue('B5', 'No');
        $sheet->setCellValue('C5', 'Kode');
        $sheet->setCellValue('D5', 'Tanggal');
        $sheet->setCellValue('E5', 'Akun');
        $sheet->setCellValue('F5', 'Keterangan');
        $sheet->setCellValue('G5', 'Debet (Rp)');
        $sheet->setCellValue('H5', 'Kredit (Rp)');
        $sheet->setCellValue('I5', 'Saldo (Rp)');

        $sheet->getStyle('B5')->applyFromArray($style_col);
        $sheet->getStyle('C5')->applyFromArray($style_col);
        $sheet->getStyle('D5')->applyFromArray($style_col);
        $sheet->getStyle('E5')->applyFromArray($style_col);
        $sheet->getStyle('F5')->applyFromArray($style_col);
        $sheet->getStyle('G5')->applyFromArray($style_col);
        $sheet->getStyle('H5')->applyFromArray($style_col);
        $sheet->getStyle('I5')->applyFromArray($style_col);

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
        $debet = 0;
        $kredit = 0;
        $saldo = 0;
        $saldo = $saldo + $saldoawal;

        foreach($datatransaksi as $dt){ // Lakukan looping              
            $sheet->setCellValue('B'.$numrow, $no);
            $sheet->setCellValue('C'.$numrow, $dt->kode_transaksi.$dt->no_transaksi);
            $sheet->setCellValue('D'.$numrow, strftime('%d %B %Y', strtotime($dt->tgl_transaksi)));
            $sheet->setCellValue('E'.$numrow, $dt->id_akun);
            $sheet->setCellValue('F'.$numrow, $dt->nama_akun." ".$dt->keterangan);
            $sheet->setCellValue('G'.$numrow, "Rp. ".number_format($dt->kredit,2,",","."));
            $sheet->setCellValue('H'.$numrow, "Rp. ".number_format($dt->debet,2,",","."));

            $debet = $debet + $dt->debet;
            $kredit = $kredit + $dt->kredit;
            $saldo = $saldo+($dt->kredit-$dt->debet);

            $sheet->setCellValue('I'.$numrow, "Rp. ".number_format($saldo,2,",","."));

            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setWidth(40, 'pt');
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getColumnDimension('H')->setAutoSize(true);
            $sheet->getColumnDimension('I')->setAutoSize(true);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        };

        $sheet->setCellValue('F'.$numrow, 'Total Akhir');
        $sheet->setCellValue('G'.$numrow, "Rp. ".number_format($debet,2,",","."));
        $sheet->setCellValue('H'.$numrow, "Rp. ".number_format($kredit,2,",","."));
        $sheet->getStyle('F'.$numrow)->applyFromArray($styleRight);
        $sheet->getStyle('G'.$numrow)->applyFromArray($style_col);
        $sheet->getStyle('H'.$numrow)->applyFromArray($style_col);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');

            if (isset($tgl_awal) && isset($tgl_akhir)){
            header('Content-Disposition: attactchment;filename="Buku Besar "'.$page.'_'.$awal.' - '.$akhir.'.xlsx');
            }else{
            header('Content-Disposition: attactchment;filename="Buku Besar"'.$page.'_'.$periode.'.xlsx');
            }

        header('Cache-Control: max-age=0');
        $writer->save("php://output");
        exit();
    }
    //----BUKU BESAR//
// END LAPORAN//
}