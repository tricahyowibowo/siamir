<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class HapusData extends BaseController
{
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
        redirect('Hapusdata');
    }

    public function kategori(){
        $page = $this->uri->segment(2);

        $this->global['pageTitle'] = 'Kategori ';

        $data = array(
            'list_bank'      => $this->master_model->getDataSumberAll(),
            'list_kategori'  => $this->master_model->getDataKategoriAll(),
            'page'  => $page,
            );

        $this->loadViews("hapusData/kategori", $this->global, $data , NULL);
    }

    public function Data(){

        $this->global['pageTitle'] = 'Data Transaksi';

        $kategori = $this->input->post('kategori');
        $sumber = $this->input->post('sumber');
        $tanggal = $this->input->post('tanggal');

        $kategori = $this->transaksi_model->cekkategori($kategori);
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

        $kas=substr($nama_sumber, 0, 3);
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


        $data = array(
            'list_data'  => $this->master_model->getTransaksiByKode($kode, $tanggal),
            );

            var_dump($kode);

        $this->loadViews("hapusData/data", $this->global, $data , NULL);
    }

}