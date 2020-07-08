<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Permohonan_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_flashdata('title', 'Permohonan Admin| PT PLN');
        is_login();
        $this->load->model('Permohonan_admin_model');
        $this->load->model('Mst_mobil_model');
        $this->load->model('Mst_driver_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'permohonan_admin/permohonan_admin_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Permohonan_admin_model->json();
    }

    public function update($id)
    {
        $row = $this->Permohonan_admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Approve',
                'action' => site_url('permohonan_admin/update_action'),
                'id' => set_value('id', $row->id),
                'notrans' => set_value('notrans', $row->notrans),
                'id_karyawan' => set_value('id_karyawan', $row->nama),
                'jabatan' => set_value('jabatan', $row->jabatan),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'pengikut' => set_value('pengikut', $row->pengikut),
                'tujuan' => set_value('tujuan', $row->tujuan),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'bbm' => set_value('bbm', $row->bbm),
                'is_driver' => set_value('is_driver', $row->is_driver),
                'status' => set_value('status', $row->status),
                'datetime' => set_value('datetime', $row->datetime),
            );
            $this->template->load('template', 'permohonan_admin/permohonan_admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan_admin'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id', true));
        } else {
            $kupon_bbm = $this->input->post('kupon_bbm', true);
            $id_driver = $this->input->post('id_driver', true);

            $check_kupon = (isset($kupon_bbm)) ? $kupon_bbm : null;
            $check_driver = (isset($id_driver)) ? $id_driver : null;

            $data = array(
                'status' => 3,
                'kupon_bbm' => $check_kupon,
                'id_driver' => $check_driver,
                'id_admin' => $this->input->post('id_user', true),
                'id_mobil' => $this->input->post('id_mobil', true),
                'datetime' => date('Y-m-d H:i:s'),
            );

            $this->Permohonan_admin_model->update($this->input->post('id', true), $data);
            // USED ID
            $this->Mst_mobil_model->used($this->input->post('id_mobil', true));
            if (isset($check_driver)) {
                $this->Mst_driver_model->used($check_driver);
            }
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permohonan_admin'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file permohonan_atasan.php */
/* Location: ./application/controllers/permohonan_atasan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 05:49:50 */
/* http://harviacode.com */
