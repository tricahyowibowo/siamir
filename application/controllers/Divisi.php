<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Divisi extends BaseController
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
        redirect('Datadivisi');
    }

    public function datadivisi(){
        $this->global['pageTitle'] = 'Data divisi';
        $data['list_data'] = $this->crud_model->tampil_data('tbl_divisi');
        $this->loadViews("divisi/data", $this->global, $data , NULL);
    }

    public function tambahdata(){
        $this->global['pageTitle'] = 'Tambah divisi';

        $this->loadViews("divisi/tambah_divisi", $this->global , NULL);
    }

    public function simpan(){
        $this->form_validation->set_rules('id_divisi','nama divisi','required');
        $this->form_validation->set_rules('nama_divisi','nama divisi','required');
    
        if($this->form_validation->run() == TRUE)
        {
          $id_divisi      = $this->input->post('id_divisi',TRUE);
          $nama_divisi      = $this->input->post('nama_divisi',TRUE);

    
          $data = array(
                'id_divisi'      => $id_divisi,
                'nama_divisi'      => $nama_divisi,
          );
          $this->crud_model->input($data,'tbl_divisi');
    
          $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
          redirect('Datadivisi');
        }else {
            $this->session->set_flashdata('msg_gagal','Data Gagal Ditambahkan, periksa kembali');
            redirect(base_url('divisi/tambahdata'));
        }
	}

    public function detail($id_divisi){
        $this->global['pageTitle'] = 'Edit Data divisi';

        $where = array('id_divisi' => $id_divisi);

        $data['list_data'] = $this->crud_model->Getdata($where,'tbl_divisi');
        $this->loadViews("divisi/detail", $this->global, $data , NULL);        
    }

    public function update(){
        $id_divisi      = $this->input->post('id_divisi');
        $nama_divisi      = $this->input->post('nama_divisi');

        $where = array('id_divisi' => $id_divisi);
  
        $data = array(
            'id_divisi'      => $id_divisi,
            'nama_divisi'      => $nama_divisi,
        );

        $this->crud_model->update($where,$data,'tbl_divisi');
  
        $this->session->set_flashdata('msg_berhasil','Data Berhasil Diubah');
        redirect('divisi/detail/' . $id_divisi);
    }

    public function delete($id_divisi){
      $where = array('id_divisi' => $id_divisi);
      $this->crud_model->delete($where , 'tbl_divisi');
      redirect(base_url('divisi'));
    }
}