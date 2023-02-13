<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function __construct()
    {
    $this->load->database();
    }

    public function getDataSaldoAwal(){
<<<<<<< HEAD
        $this->db->select('a.akun, a.kategori_id, a.nominal_transaksi, a.tgl_transaksi, b.nama_akun');
=======
        $this->db->select('a.akun, a.kategori_id, SUM(a.nominal_transaksi) as nominal_transaksi, b.nama_akun');
>>>>>>> ac845fb8fef675566049afc7d9e8ffd4e60ac9f4
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_dafakun b','b.id_akun = a.akun');
        $this->db->where('kategori_id', 0);
        $this->db->group_by('a.akun');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function getDataKategori($role){
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->where('id_kategori != 0');

        if($role === "4"){
            $this->db->where('id_kategori != 1 AND id_kategori != 2 AND id_kategori != 5');
        }else{
            $this->db->where('id_kategori != 5');
        }
        
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function getDataSumber($role){
        $this->db->select('*');
        $this->db->from('tbl_dafakun');

        if($role === "3"){
            $this->db->where('id_akun <= 11102 OR id_akun > 11102 AND id_akun <= 11116');
        }elseif($role === "4"){
            $this->db->where('id_akun > 11102 AND id_akun <= 11117');
        }

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function getDataKaryawan(){
        $this->db->select('*');
        $this->db->from('tbl_karyawan a');
        $this->db->join('tbl_divisi b','b.id_divisi = a.divisi_id');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function Getdatapiutang(){
        $this->db->select('SUM(case when c.jenis_transaksi="Debet" then c.nominal_transaksi end) as debet, SUM(case when c.jenis_transaksi="kredit" then c.nominal_transaksi end) as kredit, a.NIK, a.nama_karyawan, b.nama_divisi, c.jenis_transaksi');
        $this->db->from('tbl_karyawan a');
        $this->db->join('tbl_divisi b','b.id_divisi = a.divisi_id');
        $this->db->join('tbl_transaksi c','c.keterangan = a.nama_karyawan');
        $this->db->where('c.akun','11202'); 
        $this->db->group_by('a.nama_karyawan');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function Getdetailpiutang(){
        $this->db->select('SUM(case when c.jenis_transaksi="Debet" then c.nominal_transaksi end) as debet, SUM(case when c.jenis_transaksi="kredit" then c.nominal_transaksi end) as kredit, a.NIK, a.nama_karyawan, b.nama_divisi, c.jenis_transaksi');
        $this->db->from('tbl_karyawan a');
        $this->db->join('tbl_divisi b','b.id_divisi = a.divisi_id');
        $this->db->join('tbl_transaksi c','c.keterangan = a.nama_karyawan');
        $this->db->where('c.akun','11202'); 
        $this->db->group_by('a.nama_karyawan');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function GettransaksiByNama($nama){
        $this->db->select('(case when a.jenis_transaksi="Debet" then a.nominal_transaksi end) as debet, (case when a.jenis_transaksi="kredit" then a.nominal_transaksi end) as kredit, a.kode_transaksi, a.no_transaksi, a.jenis_transaksi, a.akun, a.tgl_transaksi, c.id_akun, c.nama_akun, b.nama_kategori, a.keterangan');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('keterangan', $nama);
        $this->db->order_by('a.id_transaksi', 'desc');

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    
    public function GettransaksiByID($no_transaksi){
        $this->db->select('*');
        $this->db->from('tbl_transaksi a');
        $this->db->join('tbl_kategori b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_dafakun c','c.id_akun=a.akun');
        $this->db->where('no_transaksi', $no_transaksi);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
}