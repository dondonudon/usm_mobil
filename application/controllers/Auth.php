<?php
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->session->set_flashdata('title', 'Login');

    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function cheklogin()
    {
        $full_name = $this->input->post('full_name');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password', true);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $test = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('full_name', $full_name);
        $this->db->where('is_aktif', 'y');
        //$this->db->where('password',  $test);
        $users = $this->db->get('tbl_user');
        if ($users->num_rows() > 0) {
            $user = $users->row_array();
            if (password_verify($password, $user['password'])) {
                // retrive user data to session
                $this->session->set_userdata($user);
                redirect('welcome');

            } else {
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('status_login', 'user atau password yang anda input salah');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
