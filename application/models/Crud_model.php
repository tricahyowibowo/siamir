<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    function tampil_data($table){
		$this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
        
	}

    function input($data,$table){
        $this->db->insert($table,$data);
    }

    public function save_batch($data){
		return $this->db->insert_batch('tbl_transaksi', $data);
	}

    public function update_batch($where, $data, $table){
		$this->db->where($where);
		return $this->db->update_batch($table, $data);
	}

    function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function delete($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function Getdata( $where, $table){
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
	}

    
}