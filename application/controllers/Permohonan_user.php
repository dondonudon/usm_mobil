<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Permohonan_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_flashdata('title', 'Permohonan User| PT PLN');
        is_login();
        $this->load->model('Permohonan_user_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'permohonan_user/permohonan_user_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Permohonan_user_model->json();
    }

    public function read($id)
    {
        $row = $this->Permohonan_user_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'notrans' => $row->notrans,
                'id_karyawan' => $row->id_karyawan,
                'tanggal' => $row->tanggal,
                'pengikut' => $row->pengikut,
                'tujuan' => $row->tujuan,
                'keterangan' => $row->keterangan,
                'jenis' => $row->jenis,
                'bbm' => $row->bbm,
                'kupon_bbm' => $row->kupon_bbm,
                'id_mobil' => $row->id_mobil,
                'id_driver' => $row->id_driver,
                'keluar_jam' => $row->keluar_jam,
                'masuk_jam' => $row->masuk_jam,
                'status' => $row->status,
                'datetime' => $row->datetime,
            );
            $this->template->load('template', 'permohonan_user/permohonan_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan_user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('permohonan_user/create_action'),
            'id' => set_value('id'),
            'notrans' => set_value('notrans'),
            'id_karyawan' => set_value('id_karyawan'),
            'tanggal' => set_value('tanggal'),
            'pengikut' => set_value('pengikut'),
            'tujuan' => set_value('tujuan'),
            'keterangan' => set_value('keterangan'),
            'bbm' => set_value('bbm'),
            'kupon_bbm' => set_value('kupon_bbm'),
            'id_mobil' => set_value('id_mobil'),
            'id_driver' => set_value('id_driver'),
            'keluar_jam' => set_value('keluar_jam'),
            'masuk_jam' => set_value('masuk_jam'),
            'status' => set_value('status'),
            'is_driver' => set_value('is_driver'),
            'datetime' => set_value('datetime'),
        );
        $this->template->load('template', 'permohonan_user/permohonan_user_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            $is_bbm = $this->input->post('bbm', true);
            $is_driver = $this->input->post('is_driver', true);

            $check_bbm = (isset($is_bbm)) ? 1 : 0;
            $check_driver = (isset($is_driver)) ? 1 : 0;

            $data = array(
                'notrans' => $this->input->post('notrans', true),
                'id_karyawan' => $this->input->post('id_karyawan', true),
                'tanggal' => $this->input->post('tanggal', true),
                'pengikut' => $this->input->post('pengikut', true),
                'tujuan' => $this->input->post('tujuan', true),
                'keterangan' => $this->input->post('keterangan', true),
                'bbm' => $check_bbm,
                'is_driver' => $check_driver,
                // 'kupon_bbm' => $this->input->post('kupon_bbm', true),
                'id_mobil' => $this->input->post('id_mobil', true),
                'id_driver' => $this->input->post('id_driver', true),
                'keluar_jam' => $this->input->post('keluar_jam', true),
                'masuk_jam' => $this->input->post('masuk_jam', true),
                'status' => 1,
                'id_user' => $this->input->post('id_user', true),
                'datetime' => date('Y-m-d H:i:s'),
            );

            $this->Permohonan_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            //UPDATE COUNTER A
            $query = $this->db->query("SELECT counter FROM counter WHERE id='A'");
            $ret = $query->row();
            $_counter = $ret->counter;
            $_counter++;
            $query = $this->db->query("UPDATE counter SET counter = '$_counter' WHERE id='A'");
            //END UPDATE COUNTER A
            redirect(site_url('permohonan_user'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('notrans', 'notrans', 'trim|required');
        $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('pengikut', 'pengikut', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Permohonan_user.php */
/* Location: ./application/controllers/Permohonan_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 05:49:50 */
/* http://harviacode.com */
