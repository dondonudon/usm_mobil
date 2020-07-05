<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mst_mobil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->session->set_flashdata('title', 'Daftar Mobil | PT PLN');
        $this->load->model('Mst_mobil_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'mst_mobil/mst_mobil_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Mst_mobil_model->json();
    }

    public function read($id)
    {
        $row = $this->Mst_mobil_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'mobil' => $row->mobil,
                'nopol' => $row->nopol,
            );
            $this->template->load('template', 'mst_mobil/mst_mobil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mst_mobil'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mst_mobil/create_action'),
            'id' => set_value('id'),
            'mobil' => set_value('mobil'),
            'nopol' => set_value('nopol'),
        );
        $this->template->load('template', 'mst_mobil/mst_mobil_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
                'mobil' => $this->input->post('mobil', true),
                'nopol' => $this->input->post('nopol', true),
            );

            $this->Mst_mobil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mst_mobil'));
        }
    }

    public function update($id)
    {
        $row = $this->Mst_mobil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mst_mobil/update_action'),
                'id' => set_value('id', $row->id),
                'mobil' => set_value('mobil', $row->mobil),
                'nopol' => set_value('nopol', $row->nopol),
            );
            $this->template->load('template', 'mst_mobil/mst_mobil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mst_mobil'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id', true));
        } else {
            $data = array(
                'mobil' => $this->input->post('mobil', true),
                'nopol' => $this->input->post('nopol', true),
            );

            $this->Mst_mobil_model->update($this->input->post('id', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mst_mobil'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mst_mobil_model->get_by_id($id);

        if ($row) {
            $this->Mst_mobil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mst_mobil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mst_mobil'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('mobil', 'mobil', 'trim|required');
        $this->form_validation->set_rules('nopol', 'nopol', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mst_mobil.xls";
        $judul = "mst_mobil";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Mobil");
        xlsWriteLabel($tablehead, $kolomhead++, "Nopol");

        foreach ($this->Mst_mobil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->mobil);
            xlsWriteLabel($tablebody, $kolombody++, $data->nopol);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mst_mobil.php */
/* Location: ./application/controllers/Mst_mobil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 03:30:26 */
/* http://harviacode.com */
