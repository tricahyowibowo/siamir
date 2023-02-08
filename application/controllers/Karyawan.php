<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Karyawan extends BaseController
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
        redirect('Datakaryawan');
    }

    public function datakaryawan(){
        $this->global['pageTitle'] = 'Data karyawan';
        $data['list_data'] = $this->master_model->getDataKaryawan();
        $this->loadViews("karyawan/data", $this->global, $data , NULL);
    }

    public function tambahdata(){
        $this->global['pageTitle'] = 'Tambah karyawan';

        $data['list_divisi'] = $this->crud_model->tampil_data('tbl_divisi');
        $this->loadViews("karyawan/tambah_karyawan", $this->global , $data, NULL);
    }

    public function simpan(){
        $this->form_validation->set_rules('nama_karyawan','nama karyawan','required');
        $this->form_validation->set_rules('NIK','NIK','required');
        $this->form_validation->set_rules('divisi_id','id karyawanDivisi','required');
    
        if($this->form_validation->run() == TRUE)
        {
          $nama_karyawan    = $this->input->post('nama_karyawan',TRUE);
          $NIK              = $this->input->post('NIK',TRUE);
          $divisi_id        = $this->input->post('divisi_id',TRUE);

          $data = array(
                'nama_karyawan'      => $nama_karyawan,
                'NIK'      => $NIK,
                'divisi_id'      => $divisi_id,
          );
          $this->crud_model->input($data,'tbl_karyawan');
    
          $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
            redirect('Datakaryawan');
            
        }else {
            $this->session->set_flashdata('msg_gagal','Data Gagal Ditambahkan, periksa kembali');
            redirect(base_url('karyawan/tambahdata'));
        }
	}

    public function detail($NIK){
        $this->global['pageTitle'] = 'Edit Data karyawan';

        $where = array('NIK' => $NIK);

        $data['list_data'] = $this->crud_model->Getdata($where,'tbl_karyawan');
        $data['list_divisi'] = $this->crud_model->tampil_data('tbl_divisi');

        $this->loadViews("karyawan/detail", $this->global, $data , NULL);        
    }

    public function update(){
        $NIK      = $this->input->post('NIK');
        $nama_karyawan      = $this->input->post('nama_karyawan');
        $divisi_id      = $this->input->post('divisi_id');

        $where = array('NIK' => $NIK);
  
        $data = array(
            'nama_karyawan' => $nama_karyawan,
            'NIK'           => $NIK,
            'divisi_id'     => $divisi_id,
        );

        $this->crud_model->update($where,$data,'tbl_karyawan');
  
        $this->session->set_flashdata('msg_berhasil','Data Berhasil Diubah');
        redirect('karyawan/detail/' . $NIK);
    }

    public function delete($NIK){
      $where = array('NIK' => $NIK);
      $this->crud_model->delete($where , 'tbl_karyawan');
      redirect(base_url('karyawan'));
    }
}