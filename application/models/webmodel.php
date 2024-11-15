<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webmodel extends CI_Model{

    public function get_data($table){
        return $this->db->get($table)->result_array();
    }

    public function get_where_data($table, $where){
        return $this->db->get_where($table,$where);
    }

    public function insert_data($table, $data)
    {
        return $this->db->insert($table,$data);
    }

    public function update_data($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    public function delete_data($table, $where)
    {
        return $this->db->delete($table,$where);
    }

    public function get_data_periksa(){
        $this->db->select('dokter.nama as nama_dokter, dokter.*, pasien.nama as nama_pasien, pasien.*, periksa.id as id_periksa, periksa.*');
        $this->db->from('periksa');
        $this->db->join('dokter','periksa.id_dokter = dokter.id');
        $this->db->join('pasien','periksa.id_pasien = pasien.id');
        return $this->db->get()->result_array();
    }

}