<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
    $this->load->database();
    }

    public function Gettransaksi($id){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.akun, a.tgl_transaksi, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('kategori_id', $id);
        // $this->db->group_by('a.keterangan');
        $this->db->order_by('a.id_transaksi', 'desc');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function GettransaksiByNo($id){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.id_transaksi, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.akun, a.tgl_transaksi, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('no_transaksi', $id);
        $this->db->order_by('a.id_transaksi', 'desc');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function GettransaksiByID($kode_transaksi, $no_transaksi){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.akun, a.tgl_transaksi, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->where('no_transaksi', $no_transaksi);
        // $this->db->group_by('a.keterangan');
        $this->db->order_by('a.akun', 'desc');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function cekkodetransaksi($id)
    {
        $this->db->select('MAX(kode_transaksi) as kodemsk');
        $this->db->from('tbl_transaksi');
        $this->db->where('kategori_id',$id);
        
        $query = $this->db->get();
        
        $hasil = $query->row();
        return $hasil->kodemsk;
    }

    public function cekkodebytanggal($kode, $bulan,$tahun)
    {
        // $query = $this->db->query("SELECT MAX(kode_transaksi) as kodemsk from tbl_transaksi");
        $this->db->select('MAX(no_transaksi) as kodemsk');
        $this->db->from('tbl_transaksi');
        $this->db->where('kode_transaksi',$kode);
        $this->db->where('MONTH(tgl_transaksi)',$bulan);
        $this->db->where('YEAR(tgl_transaksi)',$tahun);
        $query = $this->db->get();
        
        $hasil = $query->row();
        return $hasil->kodemsk;
    }


    public function cekkategori($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->where('id_kategori',$id);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function GetAkun()
    {
        $this->db->select('*');
        $this->db->from('tbl_dafakun');
        $this->db->where('jenis_akun != "kas" AND jenis_akun != "bank"');


        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function GetAkunByPage($page)
    {
        $this->db->select('*');
        $this->db->from('tbl_dafakun');
        
        if($page != "kas"){
            $this->db->where('id_akun >= 11103');
            $this->db->where('id_akun <= 11116');
        }else{
            $this->db->where('id_akun < 11103');
        }



        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function dataakun($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_dafakun');

        if($id_kategori < 3){
            $this->db->where('id_akun >= 11103');
        }
        // elseif($id_kategori = 3 || $id_kategori = 4){
        //     $this->db->where('id_akun <= 11102 OR id_akun > 11117');
        // }

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function dataakunpiutang()
    {
        $this->db->select('*');
        $this->db->from('tbl_dafakun');
        // $this->db->like('id_akun','21','after');
        // $this->db->or_like('id_akun','112','after');
        // $this->db->or_like('id_akun','22','after');
        $this->db->where('id_akun < 11202 OR id_akun > 11204');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function cekrekening($rekening)
    {
        $this->db->select('*');
        $this->db->from('tbl_dafbank');
        $this->db->where('id_rek',$rekening);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function ceksumber($rekening)
    {
        $this->db->select('*');
        $this->db->from('tbl_dafakun');
        $this->db->where('id_akun',$rekening);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    public function Getjurnal($page, $akun=0, $tgl_awal=0,$tgl_akhir=0){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.tgl_transaksi, a.akun, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');

        if($page === "kas"){
            $this->db->where('a.kategori_id != 3 AND a.kategori_id != 4 AND a.kategori_id != 5');
        }else{
            $this->db->where('a.kategori_id != 1 AND a.kategori_id != 2 AND a.kategori_id != 5');
        }


        if ($akun !=0 ){
            $this->db->where('a.akun', $akun);
        }

        if($tgl_awal != 0 && $tgl_akhir != 0 ){
            $this->db->where('a.tgl_transaksi >=', $tgl_awal);
            $this->db->where('a.tgl_transaksi <=', $tgl_akhir);
        }else{  
            $this->db->where('MONTH(a.tgl_transaksi)',date('m'));
            $this->db->where('YEAR(a.tgl_transaksi)',date('Y'));
        }
        $this->db->order_by('a.id_transaksi', 'asc');  


        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function Getbukubesar($page,$akun=0, $tgl_awal=0,$tgl_akhir=0){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.tgl_transaksi, a.akun, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        // $this->db->where('a.akun >', 11117);

        if($page === "kas"){
            $this->db->where('a.akun >', 11112);
            $this->db->where('a.kategori_id != 3 AND a.kategori_id != 4 AND a.kategori_id != 5 AND a.kategori_id != 6 AND a.kategori_id != 7');
        }
        else{
            // $this->db->where('a.akun < 11103 OR a.akun > 11117');
            $this->db->where('a.akun != 11110 AND a.akun != 11114');
            $this->db->where('a.kategori_id != 1 AND a.kategori_id != 2 AND a.kategori_id != 5 AND a.kategori_id != 6 AND a.kategori_id != 7');
        }
        
        $this->db->order_by('a.tgl_transaksi', 'asc');  

        if ($akun !=0 ){
            $this->db->where('a.akun', $akun);
        }

        if($tgl_awal != 0 && $tgl_akhir != 0 ){
            $this->db->where('a.tgl_transaksi >=', $tgl_awal);
            $this->db->where('a.tgl_transaksi <=', $tgl_akhir);
        }else{
            $this->db->where('MONTH(a.tgl_transaksi)',date('m'));
        }

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function Getfilterakun($page, $filterakun, $tgl_awal=0, $tgl_akhir=0){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.tgl_transaksi, a.akun, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('a.akun', $filterakun);
        $this->db->where('a.kategori_id <= 5');

        if($page === "kas"){
            $this->db->where('a.kategori_id != 3 AND a.kategori_id != 4 AND a.kategori_id != 6');
        }elseif($page === "bank"){
            $this->db->where('a.kategori_id > 2');
        }


        if($tgl_awal != 0 && $tgl_akhir != 0 ){
            $this->db->where('a.tgl_transaksi >=', $tgl_awal);
            $this->db->where('a.tgl_transaksi <=', $tgl_akhir);
        }else{
            $this->db->where('MONTH(a.tgl_transaksi)',date('m'));
        }


        $this->db->order_by('a.tgl_transaksi', 'asc');  

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function GetTransaksiByKode($kode_transaksi, $no_transaksi, $filter, $tgl_awal=0, $tgl_akhir=0){
        $this->db->select('SUM(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, SUM(case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.akun, a.tgl_transaksi, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->where('no_transaksi', $no_transaksi);
        $this->db->where('a.kategori_id <= 5');
        $this->db->where('a.akun !=', $filter);

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function Getneraca($page){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.jenis_transaksi, a.no_transaksi, a.tgl_transaksi, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');

        if($page === "kas"){
            $this->db->where('a.akun >', 11112);
            $this->db->where('a.kategori_id != 3 AND a.kategori_id != 4 AND a.kategori_id != 5 AND a.kategori_id != 6 AND a.kategori_id != 7');
        }
        else{
            // $this->db->where('a.akun < 11103 OR a.akun > 11117');
            $this->db->where('a.akun != 11110 AND a.akun != 11114');
            $this->db->where('a.kategori_id != 1 AND a.kategori_id != 2 AND a.kategori_id != 5 AND a.kategori_id != 6 AND a.kategori_id != 7');
        }
        $this->db->group_by('c.id_akun');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    // ------------------TRANSAKSI PIUTANG--------------------------------------


    public function Getsaldoawal($page, $akun, $tgl_akhir){
        $this->db->select('SUM(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, SUM(case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.tgl_transaksi, a.akun, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('a.akun', $akun);
        // $this->db->order_by('tgl_transaksi', 'desc');
        $this->db->where('a.tgl_transaksi <', $tgl_akhir);

        if($page === "kas"){
            $this->db->where('a.kategori_id < 3 OR a.kategori_id > 4 ');
        }elseif($page === "bank"){
            $this->db->where('a.kategori_id > 2');
        }

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function Getsaldoawalneraca($page){
        $this->db->select('SUM(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, SUM(case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.tgl_transaksi, a.akun, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');

        if($page === "kas"){
            $this->db->where('a.akun <=', 11102);
        }else{
            $this->db->where('a.akun >=', 11103);
            $this->db->where('a.akun <=', 11117);
        }
        
        if($page === "kas"){
            $this->db->where('a.kategori_id',6);
        }elseif($page === "bank"){
            $this->db->where('a.kategori_id',7);
        }

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function GettotalTransaksi($page, $bln, $tgl_akhir){
        $this->db->select('SUM(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, SUM(case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.tgl_transaksi, a.akun, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        
        if($page === "kas"){
            $this->db->where('a.akun <=', 11102);
        }else{
            $this->db->where('a.akun >=', 11103);
            $this->db->where('a.akun <=', 11117);
        }

        if($tgl_akhir != 0){
            $this->db->where('a.tgl_transaksi <=', $tgl_akhir);
        }else{
        $this->db->where('MONTH(a.tgl_transaksi) <=', $bln);
        }
        
        // $this->db->where('a.kategori_id',0);
        if($page === "kas"){
            $this->db->where('a.kategori_id != 3 AND a.kategori_id != 4 AND a.kategori_id != 5 AND a.kategori_id != 7');
            // $this->db->where('a.kategori_id',6);
        }elseif($page === "bank"){
            $this->db->where('a.kategori_id != 1 AND a.kategori_id != 2 AND a.kategori_id != 5 AND a.kategori_id != 6');
        }

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function Gettransaksipiutang($akun=0, $tgl_awal=0,$tgl_akhir=0){
        $this->db->select('*');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('a.akun > 11117');
        $this->db->where('a.kategori_id', '5');

        if ($akun !=0 ){
            $this->db->where('a.akun', $akun);
        }

        if($tgl_awal != 0 && $tgl_akhir != 0 ){
            $this->db->where('a.tgl_transaksi >=', $tgl_awal);
            $this->db->where('a.tgl_transaksi <=', $tgl_akhir);
        }

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    // ------------------/TRANSAKSI PIUTANG-------------------------------------- //

}