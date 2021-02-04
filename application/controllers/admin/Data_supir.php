<?php

class Data_supir extends CI_Controller
{
    public function index()
    {
        $data['supir'] =  $this->rental_model->get_data('supir')->result_array();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_supir', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_supir()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_supir');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_supir_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->tambah_supir();
        } else {
            $data = [
                'nama_supir'        => ucfirst($this->input->post('nama_supir')),
                'gender'            => trim($this->input->post('gender')),
                'alamat_supir'      => $this->input->post('alamat_supir'),
                'no_telepon'        => $this->input->post('no_telepon'),
                'status_supir'      => $this->input->post('status_supir'),
                'tarif_supir_dk'    => $this->input->post('tarif_dalam_kota'),
                'tarif_supir_lk'    => $this->input->post('tarif_luar_kota'),

            ];
            $this->rental_model->insert_data($data, 'supir');

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Tambah Data Supir Berhasil!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>');
                redirect('admin/data_supir');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Tambah Data Supir Gagal!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>');
                redirect('admin/data_supir');
            }
        }
    }

    public function update_supir($id)
    {
        $where = [
            'id_supir' => $id
        ];
        $data['supir'] = $this->db->get_where('supir', $where)->row_array();
        $data['gender'] = ['laki-laki', 'perempuan'];
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_supir', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_supir_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->tambah_supir('$id');
        } else {

            $id_supir       = $this->input->post('id_supir');
            $nama_supir     = ucfirst($this->input->post('nama_supir'));
            $gender         = trim($this->input->post('gender'));
            $alamat_supir   = $this->input->post('alamat_supir');
            $no_telepon     = $this->input->post('no_telepon');
            $status_supir     = $this->input->post('status_supir');
            $tarif_dalam_kota     = $this->input->post('tarif_dalam_kota');
            $tarif_luar_kota     = $this->input->post('tarif_luar_kota');
            $data = [
                'id_supir'          => $id_supir,
                'nama_supir'        => $nama_supir,
                'gender'            => $gender,
                'alamat_supir'      => $alamat_supir,
                'no_telepon'        => $no_telepon,
                'status_supir'      => $status_supir,
                'tarif_supir_dk'    => $tarif_dalam_kota,
                'tarif_supir_lk'    => $tarif_luar_kota
            ];
            $where = [
                'id_supir'  => $id_supir
            ];
            $this->rental_model->update_data('supir', $data, $where);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Update Data Supir Berhasil!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>');
                redirect('admin/data_supir');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Update Data Supir Gagal!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>');
                redirect('admin/data_supir');
            }
        }
    }

    public function delete_supir($id)
    {
        $where = [
            'id_supir'  => $id
        ];

        $this->rental_model->delete_data($where, 'supir');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Update Data Supir Berhasil!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
            redirect('admin/data_supir');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Update Data Supir Gagal!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
            redirect('admin/data_supir');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_supir', 'Nama Supir', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('alamat_supir', 'Alamat Supir', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|numeric');
        $this->form_validation->set_rules('status_supir', 'Status Supir', 'required');
        $this->form_validation->set_rules('tarif_dalam_kota', 'Tarif Dalam Kota', 'required');
        $this->form_validation->set_rules('tarif_luar_kota', 'Tarif Luar Kota', 'required');
    }
}
