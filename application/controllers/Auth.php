<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('form_login');
            $this->load->view('templates_admin/footer');
        } else {
            $username = trim($this->input->post('username'));
            $password = $this->input->post('password');

            $cek = $this->rental_model->cek_login($username, $password);

            if ($cek == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('auth');
            } else {
                $this->session->set_userdata('id_customer', $cek['id_customer']);
                $this->session->set_userdata('username', $cek['username']);
                $this->session->set_userdata('role_id', $cek['role_id']);
                $this->session->set_userdata('nama', $cek['nama']);

                switch ($cek['role_id']) {
                    case 1:
                        redirect('admin/dashboard');
                        break;

                    case 2:
                        redirect('customer/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout_customer()
    {
        $this->session->unset_userdata('id_customer');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><center>Anda telah logout!</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

        redirect('customer/dashboard');
    }

    public function logout_admin()
    {
        $this->session->unset_userdata('id_customer');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><center>Anda telah logout!</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

        redirect('auth');
    }

    public function ganti_password()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('ganti_password');
        $this->load->view('templates_admin/footer');
    }

    public function ganti_password_aksi()
    {
        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('ganti_password');
            $this->load->view('templates_admin/footer');
        } else {
            $pass_baru = password_hash($this->input->post('pass_baru'), PASSWORD_DEFAULT);
            $ulang_pass = $this->input->post('ulang_pass');

            $data = [
                'password'      => $pass_baru,
            ];
            $id = [
                'id_customer' => $this->session->userdata('id_customer')
            ];
            $this->rental_model->update_password($id, $data, 'customer');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Berhasil diupdate, Silahkan Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('auth');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // untuk ganti password

    }
}
