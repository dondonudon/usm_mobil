<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mst_karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->session->set_flashdata('title', 'Daftar Karyawan | PT PLN');
        $this->load->model('Mst_karyawan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'mst_karyawan/mst_karyawan_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Mst_karyawan_model->json();
    }

    public function read($id)
    {
        $row = $this->Mst_karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'jabatan' => $row->jabatan,
            );
            $this->template->load('template', 'mst_karyawan/mst_karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mst_karyawan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mst_karyawan/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'jabatan' => set_value('jabatan'),
        );
        $this->template->load('template', 'mst_karyawan/mst_karyawan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'jabatan' => $this->input->post('jabatan', true),
            );

            $this->Mst_karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mst_karyawan'));
        }
    }

    public function update($id)
    {
        $row = $this->Mst_karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mst_karyawan/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'jabatan' => set_value('jabatan', $row->jabatan),
            );
            $this->template->load('template', 'mst_karyawan/mst_karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mst_karyawan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id', true));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'jabatan' => $this->input->post('jabatan', true),
            );

            $this->Mst_karyawan_model->update($this->input->post('id', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mst_karyawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mst_karyawan_model->get_by_id($id);

        if ($row) {
            $this->Mst_karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mst_karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mst_karyawan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mst_karyawan.xls";
        $judul = "mst_karyawan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");

        foreach ($this->Mst_karyawan_model->get_excel() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mst_karyawan.php */
/* Location: ./application/controllers/Mst_karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-06 03:11:09 */
/* http://harviacode.com */
