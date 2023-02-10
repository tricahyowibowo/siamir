<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Akun extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('crud_model');
        $this->load->model('master_model');
        // $this->load->model('transaksi_model');
        $this->isLoggedIn();   
    }

    public function index(){
        redirect('Dataakun');
    }

    public function datasaldoawal(){
        $this->global['pageTitle'] = 'Data Saldo Awal';
        $data['list_data'] = $this->master_model->getDataSaldoAwal();
        $this->loadViews("SaldoAwal/data", $this->global, $data , NULL);
    }

    public function tambahsaldoawal(){
        $this->global['pageTitle'] = 'Tambah Akun';

        $data['list_akun'] = $this->crud_model->tampil_data('tbl_dafakun');

        $this->loadViews("SaldoAwal/tambah_saldoawal", $this->global , $data, NULL);
    }

    public function simpansaldoawal(){
        $akun       = $this->input->post('akun');
        $saldoawal  = $this->input->post('saldoawal');
        $tgl_transaksi  = $this->input->post('tgl_transaksi');
        $user_id    = $this->global ['userId'];



        $data = array(
            'tgl_transaksi'     => $tgl_transaksi,
            'jenis_transaksi'   => "Debet",
            'kode_transaksi'    => "SA",
            'kategori_id'    => " ",
            'akun'              => $akun,
            'nominal_transaksi' => $saldoawal,
            'user_id'           => $user_id
        );

        $this->crud_model->input($data,'tbl_transaksi');

        $this->session->set_flashdata('msg_berhasil','Saldo Awal Berhasil Ditambahkan');
        redirect('Datasaldoawal');
	}

    public function dataakun(){
        $this->global['pageTitle'] = 'Data Akun';
        $data['list_data'] = $this->crud_model->tampil_data('tbl_dafakun');
        $this->loadViews("akun/data", $this->global, $data , NULL);
    }

    public function tambahdata(){
        $this->global['pageTitle'] = 'Tambah Akun';

        $this->loadViews("akun/tambah_akun", $this->global , NULL);
    }

    public function simpan(){
        $this->form_validation->set_rules('nama_akun','nama akun','required');
    
        if($this->form_validation->run() == TRUE)
        {
          $id_akun      = $this->input->post('id_akun',TRUE);
          $nama_akun      = $this->input->post('nama_akun',TRUE);
          $normal_balance       = $this->input->post('normal_balance',TRUE);

    
          $data = array(
                'id_akun'      => $id_akun,
                'nama_akun'      => $nama_akun,
                'normal_balance'       => $normal_balance,
          );
          $this->crud_model->input($data,'tbl_dafakun');
    
          $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
          redirect(base_url('akun/tambahdata'));
        }else {
            redirect('Dataakun');
        }
	}

    public function detail($id_akun){
        $this->global['pageTitle'] = 'Edit Data Akun';

        $where = array('id_akun' => $id_akun);

        $data['list_data'] = $this->crud_model->Getdata($where,'tbl_dafakun');
        $this->loadViews("akun/detail", $this->global, $data , NULL);        
    }

    public function update(){
        $id_akun      = $this->input->post('id_akun');
        $nama_akun      = $this->input->post('nama_akun');
        $normal_balance       = $this->input->post('normal_balance');

        $where = array('id_akun' => $id_akun);
  
        $data = array(
            'id_akun'      => $id_akun,
            'nama_akun'      => $nama_akun,
            'normal_balance'       => $normal_balance,
      );

        $this->crud_model->update($where,$data,'tbl_dafakun');
  
        $this->session->set_flashdata('msg_berhasil','Data Berhasil Diubah');
        redirect('akun/detail/' . $id_akun);
    }

    public function delete($id_akun){
      $where = array('id_akun' => $id_akun);
      $this->crud_model->delete($where , 'tbl_dafakun');
      redirect(base_url('akun'));
    }
}