<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Kategori extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('crud_model');
        // $this->load->model('transaksi_model');
        $this->isLoggedIn();   
    }

    public function index(){
        redirect('Datakategori');
    }

    public function datakategori(){
        $this->global['pageTitle'] = 'Data Kategori';
        $data['list_data'] = $this->crud_model->tampil_data('tbl_kategori');
        $this->loadViews("kategori/data", $this->global, $data , NULL);
    }

    public function tambahdata(){
        $this->global['pageTitle'] = 'Tambah Kategori';

        $this->loadViews("kategori/tambah_kategori", $this->global , NULL);
    }

    public function simpan(){
        $this->form_validation->set_rules('nama_kategori','nama kategori','required');
        $this->form_validation->set_rules('kode_kategori','Kode kategori','required');
        $this->form_validation->set_rules('normal_balance','Normal Balance','required');
    
        if($this->form_validation->run() == TRUE)
        {
          $nama_kategori      = $this->input->post('nama_kategori',TRUE);
          $kode_kategori       = $this->input->post('kode_kategori',TRUE);
          $normal_balance       = $this->input->post('normal_balance',TRUE);

    
          $data = array(
                'nama_kategori'      => $nama_kategori,
                'kode_kategori'       => $kode_kategori,
                'normal_balance'       => $normal_balance,
          );
          $this->crud_model->input($data,'tbl_kategori');
    
          $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
          redirect(base_url('kategori/tambahdata'));
        }else {
            redirect('Datakategori');
        }
	}

    public function detail($id_kategori){
        $this->global['pageTitle'] = 'Edit Data Kategori';

        $where = array('id_kategori' => $id_kategori);

        $data['list_data'] = $this->crud_model->Getdata($where,'tbl_kategori');
        $this->loadViews("kategori/detail", $this->global, $data , NULL);        
    }

    public function update(){
        $id_kategori      = $this->input->post('id_kategori');
        $nama_kategori      = $this->input->post('nama_kategori');
        $kode_kategori       = $this->input->post('kode_kategori');
        $normal_balance       = $this->input->post('normal_balance');


        $where = array('id_kategori' => $id_kategori);
  
        $data = array(
            'id_kategori'      => $id_kategori,  
            'nama_kategori'      => $nama_kategori,
            'kode_kategori'       => $kode_kategori,
            'normal_balance'       => $normal_balance,
        );

        $this->crud_model->update($where,$data,'tbl_kategori');
  
        $this->session->set_flashdata('msg_berhasil','Data Berhasil Diubah');
        redirect('kategori');
    }

    public function delete($id_kategori){
      $where = array('id_kategori' => $id_kategori);
      $this->crud_model->delete($where , 'tbl_kategori');
      redirect(base_url('kategori'));
    }
}