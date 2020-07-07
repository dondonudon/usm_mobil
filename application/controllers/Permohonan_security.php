<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Permohonan_security extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_flashdata('title', 'Permohonan Security| PT PLN');
        is_login();
        $this->load->model('Permohonan_security_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    // public function index()
    // {
    //     $this->template->load('template', 'permohonan_security/permohonan_security_list');
    // }

    public function jam_masuk()
    {
        $this->template->load('template', 'permohonan_security/permohonan_security_list_masuk');
    }

    public function jam_keluar()
    {
        $this->template->load('template', 'permohonan_security/permohonan_security_list_keluar');
    }

    public function json_keluar()
    {
        header('Content-Type: application/json');
        echo $this->Permohonan_security_model->json_keluar();
    }

    public function json_masuk()
    {
        header('Content-Type: application/json');
        echo $this->Permohonan_security_model->json_masuk();
    }

    public function update($id)
    {
        $row = $this->Permohonan_security_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Approve',
                'action' => site_url('permohonan_security/update_action'),
                'id' => set_value('id', $row->id),
                'notrans' => set_value('notrans', $row->notrans),
                'id_karyawan' => set_value('id_karyawan', $row->nama),
                'jabatan' => set_value('jabatan', $row->jabatan),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'pengikut' => set_value('pengikut', $row->pengikut),
                'tujuan' => set_value('tujuan', $row->tujuan),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'id_mobil' => set_value('id_mobil', $row->nopol),
                'kupon_bbm' => set_value('kupon_bbm', $row->kupon_bbm),
                'id_driver' => set_value('id_driver', $row->driver),
                'bbm' => set_value('bbm', $row->bbm),
                'is_driver' => set_value('is_driver', $row->is_driver),
                'status' => set_value('status', $row->status),
                'datetime' => set_value('datetime', $row->datetime),
            );
            $this->template->load('template', 'permohonan_security/permohonan_security_keluar', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan_security/jam_keluar'));
        }
    }

    public function update_masuk($id)
    {
        $row = $this->Permohonan_security_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Approve',
                'action' => site_url('permohonan_security/update_action_masuk'),
                'id' => set_value('id', $row->id),
                'notrans' => set_value('notrans', $row->notrans),
                'id_karyawan' => set_value('id_karyawan', $row->nama),
                'jabatan' => set_value('jabatan', $row->jabatan),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'pengikut' => set_value('pengikut', $row->pengikut),
                'tujuan' => set_value('tujuan', $row->tujuan),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'id_mobil' => set_value('id_mobil', $row->nopol),
                'kupon_bbm' => set_value('kupon_bbm', $row->kupon_bbm),
                'id_driver' => set_value('id_driver', $row->driver),
                'bbm' => set_value('bbm', $row->bbm),
                'is_driver' => set_value('is_driver', $row->is_driver),
                'status' => set_value('status', $row->status),
                'datetime' => set_value('datetime', $row->datetime),
                'keluar_jam' => set_value('datetime', $row->keluar_jam),
            );
            $this->template->load('template', 'permohonan_security/permohonan_security_masuk', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan_security/jam_masuk'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id', true));
        } else {
            $data = array(
                'status' => 5,
                'keluar_jam' => $this->input->post('keluar_jam', true),
                // 'masuk_jam' => $this->input->post('masuk_jam', true),
                'id_security' => $this->input->post('id_user', true),
                'datetime' => date('Y-m-d H:i:s'),
            );

            $this->Permohonan_security_model->update($this->input->post('id', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permohonan_security/jam_keluar'));
        }
    }

    public function update_action_masuk()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id', true));
        } else {
            $data = array(
                'status' => 5,
                // 'keluar_jam' => $this->input->post('keluar_jam', true),
                'masuk_jam' => $this->input->post('masuk_jam', true),
                'id_security' => $this->input->post('id_user', true),
                'datetime' => date('Y-m-d H:i:s'),
            );

            $this->Permohonan_security_model->update($this->input->post('id', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permohonan_security/jam_masuk'));
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
