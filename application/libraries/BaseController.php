<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	

	function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tahun
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tanggal
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	function saldoawal(){
		$page = $this->uri->segment(2);
        $tgl_akhir = $this->input->post('tgl_awal');

        $saldoawal = $this->transaksi_model->Getsaldoawal($page, $tgl_akhir);

      	foreach($saldoawal as $s){
            $totalsaldo = $s->debet-$s->kredit;
        }

		return $totalsaldo;
    }

	function saldoawalbukubesar(){
		$page = $this->uri->segment(3);
        $tgl_awal = $this->uri->segment(4);

		if (isset($tgl_akhir)){
			$bln = substr($tgl_akhir, 5, 2);
		}else{
			$bln = date('m');
		}

		if ($bln != 1){
			$bln = $bln - 1;
		}else{
			$bln = 12;
		}

        $saldoawal = $this->transaksi_model->Getsaldoawal($page, $bln, $tgl_awal);

		$saldo = 0;

      	foreach($saldoawal as $s){
            $totalsaldo = $s->debet-$s->kredit;
			$saldoakhir = $saldo + $totalsaldo;
        }
		return $saldoakhir;

    }

	function data(){
        $saldoawal = $this->saldoawal();
		$page = $this->uri->segment(2);
        $akun = $this->input->post('akun'); 
        $tgl_awal = $this->input->post('tgl_awal'); 
        $tgl_akhir = $this->input->post('tgl_akhir');

		$cek = $this->uri->segment(1);


		switch ($cek) {
			case 'jurnal':
				$list_data = $this->transaksi_model->Getjurnal($page, $akun, $tgl_awal,$tgl_akhir);
			break;
			case 'neraca':
				$list_data = $this->transaksi_model->Getneraca($page);
			break;
			default:
				$list_data = $this->transaksi_model->Getbukubesar($page, $akun, $tgl_awal,$tgl_akhir);
			break;
		}

		// $total = $this->transaksi_model->GettotalTransaksi($page, $akun, $tgl_awal,$tgl_akhir);
		// foreach ($total as $t){
		// 	$debet = $t->debet;
		// 	$kredit = $t->kredit;
		// }
		// var_dump($saldo);

		// var_dump($debet);
		// var_dump($kredit);


		if (is_null($tgl_awal) && is_null($tgl_akhir)){
		  $periode =  strftime("%B", strtotime(date("Y/m/d")));
		} else {
		  $periode =  strftime("%d %B %Y", strtotime($tgl_awal))." - ".strftime("%d %B %Y", strtotime($tgl_akhir));
		}

		$data = array(
            'page'      => $page,
            'tgl_awal'  => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'akun'      => $akun,
            'saldoawal' => $saldoawal,
            'periode'   => $periode,
			'list_data' => $list_data,
            'list_akun' => $this->crud_model->tampil_data('tbl_dafakun'),
            );
		return $data;
	}
	
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect ( 'login' );
		} else {
			$this->role = $this->session->userdata ( 'role' );
			$this->vendorId = $this->session->userdata ( 'userId' );
			$this->name = $this->session->userdata ( 'name' );
			$this->roleText = $this->session->userdata ( 'roleText' );
			
			$this->global ['userId'] = $this->vendorId;
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['role_text'] = $this->roleText;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isAdmin() {
		if ($this->role != ROLE_ADMIN) {
			return true;
		} else {
			return false;
		}
	}

	function isAccess() {
		if ($this->role != ROLE_ADMIN || $this->role != ROLE_MANAGER) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isKas() {
		if ($this->role == ROLE_KAS) {
			return true;
		} else {
			return false;
		}
	}

	function isBank() {
		if ($this->role == ROLE_BANK) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to load the set of views
	 */
	function loadThis() {
		$this->global ['pageTitle'] = 'CodeInsect : Access Denied';
		
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'access' );
		$this->load->view ( 'includes/footer' );
	}
	
	/**
	 * This function is used to logged out user from system
	 */


	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }

	function loadViewsExt($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('inputcustomer/include/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('inputcustomer/include/footer', $footerInfo);
    }
	
	/**
	 * This function used provide the pagination resources
	 * @param {string} $link : This is page link
	 * @param {number} $count : This is page count
	 * @param {number} $perPage : This is records per page limit
	 * @return {mixed} $result : This is array of records and pagination data
	 */
	function paginationCompress($link, $count, $perPage = 10) {
		$this->load->library ( 'pagination' );
	
		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = SEGMENT;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( SEGMENT );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
}