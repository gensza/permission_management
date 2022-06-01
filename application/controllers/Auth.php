<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        // menjalankan method ketika class Auth dijalankan
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('Admin');
        }

        $data['get_module_role'] = $this->M_admin->get_module_role();

        // validasi inputan
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            // $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            // $this->load->view('templates/auth_footer');
        } else {
            // ketika lolos validasi
            $this->_login();
        }
    }

    private function _login()
    {
        if ($this->session->userdata('username')) {
            redirect('Admin');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // cek username dari inputan
        $user = $this->db->get_where('users', ['username' => $username, 'aktif' => 1])->row_array();
        //jika user nya ada
        if ($user) {
            // jika usernya aktif
            if ($user['aktif'] == 1) {
                // cek password, jika benar akan masuk dan set session lalu di redirect
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'id_module_role' => $user['id_module_role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_module_role'] == 4) { // jika dia guest
                        redirect('Admin/AboutUs');
                    } else {
                        redirect('Admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="danger"> Wrong password!</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="danger"> This email has not been activated!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="danger">Username is not registered!</div>');
            redirect('Auth');
        }
    }

    public function registration()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'id_module_role' => $this->input->post('level'),
            'aktif' => 1,
        ];
        $result = $this->db->insert('users', $data);

        echo json_encode($result);
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('Auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
