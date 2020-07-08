<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mst_mobil_model extends CI_Model
{

    public $table = 'mst_mobil';
    public $id = 'id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // datatables
    public function json()
    {
        $this->datatables->select('id,mobil,nopol');
        $this->datatables->from('mst_mobil');
        $this->datatables->where('aktif', 1);
        //add this line for join
        //$this->datatables->join('table2', 'mst_mobil.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('mst_mobil/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . "
            " . anchor(site_url('mst_mobil/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . "
                " . anchor(site_url('mst_mobil/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    public function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get excel
    public function get_excel()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('aktif', 1);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    public function total_rows($q = null)
    {
        $this->db->like('id', $q);
        $this->db->or_like('mobil', $q);
        $this->db->or_like('nopol', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    public function get_limit_data($limit, $start = 0, $q = null)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('mobil', $q);
        $this->db->or_like('nopol', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $data = array(
            'aktif' => 0,
        );
        $this->db->update($this->table, $data);
    }

    // used data
    public function used($id)
    {
        $this->db->where($this->id, $id);
        $data = array(
            'used' => 0,
        );
        $this->db->update($this->table, $data);
    }

    // unused data
    public function unused($id)
    {
        $this->db->where($this->id, $id);
        $data = array(
            'used' => 1,
        );
        $this->db->update($this->table, $data);
    }

}

/* End of file Mst_mobil_model.php */
/* Location: ./application/models/Mst_mobil_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 03:30:26 */
/* http://harviacode.com */
