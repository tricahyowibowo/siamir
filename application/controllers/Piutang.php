<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Piutang extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('crud_model');
        $this->load->model('master_model');
        $this->load->model('M_admin');
        $this->load->model('transaksi_model');
        $this->load->library('Pdf');
        $this->isLoggedIn();   
    }

    public function index(){
        redirect('Datapiutang');
    }

    public function datapiutang(){

        $this->global['pageTitle'] = 'Data Transaksi';
        $data['list_data'] = $this->master_model->Getdetailpiutang();

        $this->loadViews("piutang/data", $this->global, $data , NULL);

    }

    public function detaildatapiutang($nama){

        $NIK = $this->uri->segment(3);
        $data['role'] = $this->global ['role'];

        $this->global['pageTitle'] = 'Data Transaksi';
        $data['list_data'] = $this->master_model->GettransaksiByNIK($NIK);
        $this->loadViews("piutang/detail", $this->global, $data , NULL);
    }

    public function kategori(){
        $this->global['pageTitle'] = 'Kategori';
   
        $data = array(
            'list_kategori'     => $this->crud_model->tampil_data('tbl_kategori')
            );

        $this->loadViews("piutang/kategori", $this->global, $data , NULL);
    }

    public function tambahdata(){
        $this->global['pageTitle'] = 'Tambah Transaksi';

        $id = $this->input->post('kategori');
        // var_dump($id);
        
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        // $rekening = $this->input->post('rek_id');
        $kode_transaksi = $this->input->post('kode_transaksi');


        $kategori = $this->transaksi_model->cekkategori($id);
        // $rekening = $this->transaksi_model->cekrekening($rekening);
        // $tanggal = $this->transaksi_model->cektanggal();

        $bulan = date('m');
        $tahun = date('Y');
                       

        // $tanggal = strftime('%M', strtotime($tgl_transaksi));
        // $tanggal = substr($tgl_transaksi, 5, 2);
        // $tanggal = $this->transaksi_model->cektanggal();
        // var_dump($tanggal);
        $cektanggal = $this->transaksi_model->cekkodebytanggal($kode_transaksi, $bulan, $tahun);
        // var_dump($cektanggal);
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($cektanggal, 4, 3);
        // var_dump($bulan);

        $no_transaksi = $nourut + 1;
        // var_dump($no_transaksi);


        $data = array(
            'id' => $id,
            'kode_transaksi' => $kode_transaksi,
            'no_transaksi' => $no_transaksi,
            'kategori'       => $kategori,
            'tgl_transaksi'  => $tgl_transaksi,
            'list_akun'      => $this->transaksi_model->dataakunpiutang(),
            'list_karyawan'  => $this->crud_model->tampil_data('tbl_karyawan'),
            'list_kategori'  => $this->crud_model->tampil_data('tbl_kategori')
            );

        $this->loadViews("piutang/tambah_piutang", $this->global, $data , NULL);
    }

    public function simpan(){
		// Ambil data yang dikirim dari form
		$kode_transaksi = $_POST['kode_transaksi']; // Ambil data nis dan masukkan ke variabel nis
		$no_transaksi = $_POST['no_transaksi']; // Ambil data nis dan masukkan ke variabel nis
		$kategori_id = $_POST['kategori_id']; // Ambil data nis dan masukkan ke variabel nis
		$tgl_transaksi = $_POST['tgl_transaksi']; // Ambil data nama dan masukkan ke variabel nama
		$akun = $_POST['akun']; // Ambil data nama dan masukkan ke variabel nama
		$jenis_transaksi = $_POST['jenis_transaksi']; // Ambil data telp dan masukkan ke variabel telp
		$kategori_id = $_POST['kategori_id']; 
		$nominal_transaksi = $_POST['nominal_transaksi']; 
		$keterangan = $_POST['keterangan'];
        $user_id = $this->global ['userId']; 
        

		$data = array();

		$index = 0; // Set index array awal dengan 0
		foreach ($kode_transaksi as $kode_transaksi) { // Kita buat perulangan berdasarkan nis sampai data terakhir
			array_push($data, array(
				'kode_transaksi' => $kode_transaksi,
				'no_transaksi' => $no_transaksi[$index],
				'tgl_transaksi' => $tgl_transaksi[$index],  // Ambil dan set data nama sesuai index array dari $index
				'jenis_transaksi' => $jenis_transaksi[$index],  // Ambil dan set data telepon sesuai index array dari $index
				'akun' => $akun[$index],  // Ambil dan set data telepon sesuai index array dari $index
				'kategori_id' => $kategori_id[$index],  // Ambil dan set data alamat sesuai index array dari $index
				'nominal_transaksi' => $nominal_transaksi[$index],  // Ambil dan set data alamat sesuai index array dari $index
				'keterangan' => $keterangan[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'user_id' => $user_id,
			));

            $total    = array_sum($nominal_transaksi);

			$index++;
		}

        $karyawan = $this->input->post('karyawan');

        $tgl = implode(" ",$tgl_transaksi);
        $tgl = substr($tgl, 0, 10);

        $jenis_transaksi = implode(" ",$jenis_transaksi);

        $kategori = implode(" ",$kategori_id);
        $kategori = substr($kategori, 0, 1);


        $no_transaksi = implode(" ",$no_transaksi);
        $no_transaksi = substr($no_transaksi, 0, 7);

            $data2 = array(
            'kode_transaksi' => $kode_transaksi,
			'no_transaksi' => $no_transaksi,
            'tgl_transaksi' => $tgl,
            'jenis_transaksi' => "Kredit",
            'akun' => 11202,
            'nominal_transaksi' => $total,
            'kategori_id' => $kategori,
            'keterangan' => $karyawan,
            'user_id' => $user_id,
            );

		$sql = $this->crud_model->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)
        $this->crud_model->input($data2 , 'tbl_transaksi');


		// Cek apakah query insert nya sukses atau gagal
		if ($sql) { // Jika sukses
			$this->session->set_flashdata('msg_berhasil', 'Data Berhasil disimpan');  
            redirect('transaksi/datatransaksi/'.$kategori);
		} else { // Jika gagal
			echo "<script>alert('Data gagal disimpan');window.location = '" .  redirect('transaksi/kategori') . "';</script>";
		}
	}

    public function cetak(){

        $id = $this->uri->segment(3);
        $kode_transaksi = substr($id, 0, 4);
        $no_transaksi = substr($id, 4, 7);

        // $ls   = array('kode_transaksi' => $kode_transaksi ,'no_transaksi' => $no_transaksi);
        $data = $this->transaksi_model->GettransaksiByID($no_transaksi);
        
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


        $pdf->setHeaderFont(Array('helvetica','',14));
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
            <h1 align="center">'.$id->nama_kategori.'</h1>
            <p><span align="center">No. Transaksi: '.$id->kode_transaksi.$id->no_transaksi.'</span></p>

            <table cellpadding="10" border="1" align="center">
            <tr>
                <th width="40" align="center">No</th>
                <th width="100" align="center">Tanggal</th>
                <th width="50" align="center">Akun</th>
                <th width="220" align="center">Keterangan</th>
                <th align="center">Debit</th>
                <th align="center">Kredit</th>
            </tr>';

            $no = 1;
            $debet = 0; 
            $kredit = 0; 
            $saldo = 0;
            foreach($data as $d){

                if($d->jenis_transaksi == "Debet"){
                    $nominal = "Rp. ".number_format($d->nominal_transaksi)." ,-";
                    $saldo+=$d->nominal_transaksi;
                    $debet+=$d->nominal_transaksi;
                }else{
                    $nominal = "-";
                }

                if($d->jenis_transaksi == "Kredit"){
                    $kred = "Rp. ".number_format($d->nominal_transaksi)." ,-";
                    $saldo+=$d->nominal_transaksi;
                    $kredit+=$d->nominal_transaksi;
                }else{
                    $kred = "-";
                }

                $html .= '<tr>';
                $html .= '<td align="center" style="height:40px;">'.$no.'</td>';
                $html .= '<td align="center">'.strftime('%d %b %y', strtotime($d->tgl_transaksi)).'</td>';
                $html .= '<td align="center">'.$d->akun.'</td>';
                $html .= '<td align="left">'.$d->nama_akun.' '.$d->keterangan.'</td>';
                $html .= '<td align="center">'.$nominal. '</td>';
                $html .= '<td align="center">'.$kred. '</td>';
                $html .= '</tr>';                
                $no++;
            }

            $html .= '<tr>';
            $html .= '<td align="right" colspan="4"><b>Jumlah</b></td>';
            $html .= '<td align="center">'."Rp. ".number_format($debet)." ,-".'</td>';
            $html .= '<td align="center">'."Rp. ".number_format($kredit)." ,-".'</td>';
            $html .= '</tr>
            </table><br><br><br>
            </div>';



            $html .='
            <table cellpadding="10" border="1" align="center">
            <tr>
                <th>Disetujui Oleh</th>
                <th>Diterima Oleh</th>
                <th>Dibukukan Oleh</th>
                <th>Tgl Pembukuan</th>
            </tr>
            <tr>
                <td style="height:100px;"></td>
                <td></td>
                <td></td>
                <td>'.strftime('%d %B %Y', strtotime(date('d.m.y'))).'</td>
            </tr>
            </table>';
        
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        

        $pdf->Output($id->kode_transaksi.$id->no_transaksi."-".date("d.m.y").'.pdf','I');
        redirect('transaksi/kategori');
    }
}