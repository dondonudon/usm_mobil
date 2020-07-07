<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Permohonan_user_model extends CI_Model
{

    public $table = 'permohonan';
    public $id = 'id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // datatables
    public function json()
    {
        $this->datatables->select('permohonan.id,permohonan.notrans,permohonan.id_karyawan,permohonan.tanggal,permohonan.pengikut,
        permohonan.tujuan,permohonan.keterangan,permohonan.bbm,permohonan.is_driver,
        permohonan.status,permohonan.datetime,
        mst_karyawan.nama');
        $this->datatables->from('permohonan');
        //add this line for join
        $this->datatables->join('mst_karyawan', 'permohonan.id_karyawan = mst_karyawan.id');
        $this->datatables->where('status <', 2);
        $this->datatables->add_column('bbm', '$1', 'rename_string_is_bbm(bbm)');
        $this->datatables->add_column('is_driver', '$1', 'rename_string_is_driver(is_driver)');
        $this->datatables->add_column('status', '$1', 'rename_string_status_tolak(status)');
        $this->datatables->add_column('action', anchor(site_url('permohonan_user/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')), 'id');
        return $this->datatables->generate();
    }

    // get all
    public function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    public function get_by_id($id)
    {
        $query = $this->db->select('permohonan.id, permohonan.notrans, permohonan.id_karyawan, permohonan.tanggal, permohonan.pengikut,
        permohonan.tujuan, permohonan.keterangan, permohonan.bbm, permohonan.is_driver, permohonan.datetime,
        permohonan.status, mst_karyawan.nama, mst_karyawan.jabatan')
            ->from('permohonan')
            ->join('mst_karyawan', 'permohonan.id_karyawan = mst_karyawan.id')
            ->where('permohonan.id', $id)
            ->get()->row();
        return $query;
    }

    // get total rows
    public function total_rows($q = null)
    {
        $this->db->like('id', $q);
        $this->db->or_like('notrans', $q);
        $this->db->or_like('id_karyawan', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('pengikut', $q);
        $this->db->or_like('tujuan', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('bbm', $q);
        $this->db->or_like('kupon_bbm', $q);
        $this->db->or_like('id_mobil', $q);
        $this->db->or_like('id_driver', $q);
        $this->db->or_like('keluar_jam', $q);
        $this->db->or_like('masuk_jam', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('datetime', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    public function get_limit_data($limit, $start = 0, $q = null)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('notrans', $q);
        $this->db->or_like('id_karyawan', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('pengikut', $q);
        $this->db->or_like('tujuan', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('bbm', $q);
        $this->db->or_like('kupon_bbm', $q);
        $this->db->or_like('id_mobil', $q);
        $this->db->or_like('id_driver', $q);
        $this->db->or_like('keluar_jam', $q);
        $this->db->or_like('masuk_jam', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('datetime', $q);
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
        $this->db->delete($this->table);
    }

}

/* End of file Permohonan_model.php */
/* Location: ./application/models/Permohonan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 05:49:50 */
/* http://harviacode.com */
