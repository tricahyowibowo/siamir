<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class FAQ extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('crud_model');
        // $this->load->model('transaksi_model');
        $this->load->library('form_validation');
        $this->isLoggedIn();   
    }

    public function index(){
        redirect('Datafaq');
    }

    public function datafaq(){
        $this->global['pageTitle'] = 'Data faq';
        $data['list_data'] = $this->crud_model->tampil_data('tbl_faq');
        $this->loadViews("faq/data", $this->global, $data , NULL);
    }

    public function tampilfaq(){
        $this->global['pageTitle'] = 'Data faq';
        $data['list_data'] = $this->crud_model->tampil_data('tbl_faq');
        $this->loadViews("faq/tampil_faq", $this->global, $data , NULL);
    }

    public function tambahdata(){
        $this->global['pageTitle'] = 'Tambah faq';

        $this->loadViews("faq/tambah_faq", $this->global , NULL);
    }

    public function simpan(){
        $this->form_validation->set_rules('pertanyaan','pertanyaan','required');
        $this->form_validation->set_rules('jawaban','jawaban','required');
    
        if($this->form_validation->run() == TRUE)
        {
          $pertanyaan      = $this->input->post('pertanyaan',TRUE);
          $jawaban       = $this->input->post('jawaban',TRUE);

    
          $data = array(
                'pertanyaan'      => $pertanyaan,
                'jawaban'       => $jawaban,
          );
          $this->crud_model->input($data,'tbl_faq');
    
          $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
          redirect(base_url('faq/tambahdata'));
        }else {
            redirect('Datafaq');
        }
	}

    public function detail($id_faq){
        $this->global['pageTitle'] = 'Edit Data faq';

        $where = array('id_faq' => $id_faq);

        $data['list_data'] = $this->crud_model->Getdata($where,'tbl_faq');
        $this->loadViews("faq/detail", $this->global, $data , NULL);        
    }

    public function update(){
        $id_faq      = $this->input->post('id_faq');
        $pertanyaan      = $this->input->post('pertanyaan',TRUE);
        $jawaban       = $this->input->post('jawaban',TRUE);


        $where = array('id_faq' => $id_faq);
  
        $data = array(
            'pertanyaan'      => $pertanyaan,
            'jawaban'       => $jawaban,
        );

        $this->crud_model->update($where,$data,'tbl_faq');
  
        $this->session->set_flashdata('msg_berhasil','Data Berhasil Diubah');
        redirect('faq');
    }

    public function delete($id_faq){
      $where = array('id_faq' => $id_faq);
      $this->crud_model->delete($where , 'tbl_faq');
      redirect(base_url('faq'));
    }
}