<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Laporan_history_model extends CI_Model
{

    public $table = 'laporan_history';
    public $id = 'id';

    //var $table = 'customers';
    public $column_order = array('id','notrans','tanggal','nama_karyawan','status'); //set column field database for datatable orderable
    public $column_search = array('ket', 'tanggal'); //set column field database for datatable searchable
    //var $order = array('id' => 'asc'); // default order
    //public $order = 'DESC';

    //var $table = 'customers';

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {

        //add custom filter here
        $tgl_a = $this->input->post('tgl_a');
        $tgl_b = $this->input->post('tgl_b');
        $id_karyawan = $this->input->post('id_karyawan');

        // $tgl_a = $this->input->post('tgl_a');
        // $tgl_b = $this->input->post('tgl_b');
        if ($this->input->post('tgl_a') && $this->input->post('tgl_b')) {
            $this->db->where('laporan_history.tanggal >=', $tgl_a);
            $this->db->where('laporan_history.tanggal <=', $tgl_b);
        }
        if ($this->input->post('id_karyawan')) {
            $this->db->where('id_karyawan', $id_karyawan);
        }

        $this->db->from($this->table);
        //$this->db->join('master_kasir', 'master_kasir.kode_m_kasir = trans.kode_m_kasir');
        //$this->db->join('tab_barang', 'tab_barang.kode_barang = trans_detail.kode_barang');
        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        //$query = $this->db->query("SELECT t.no_po, t.kode_m_kasir, t.jumlah, DATE(t.datetime) as datetime, mk.nama FROM trans t INNER JOIN master_kasir mk ON t.kode_m_kasir=mk.kode_m_kasir");
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function excel($tanggal_a, $tanggal_b)
    {
        $tgl_a = $tanggal_a;
        $tgl_b = $tanggal_b;
        if (empty($tanggal_a) || empty($tanggal_b)) {
            $query = $this->db->query("SELECT *
                                        FROM po
                                        INNER JOIN po_detail ON po.no_po = po_detail.no_po");
        } else {
            $query = $this->db->query("SELECT *
                                        FROM po
                                        INNER JOIN po_detail ON po.no_po = po_detail.no_po
                                        WHERE datetime BETWEEN '$tgl_a' AND '$tgl_b' ");
        }
        return $query->result();
    }
}

/* End of file Trans_model.php */
/* Location: ./application/models/Trans_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-13 14:18:36 */
/* http://harviacode.com */
