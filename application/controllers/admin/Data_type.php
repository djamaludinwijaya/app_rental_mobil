<?php
class Data_type extends CI_Controller
{
    public function index()
    {
        $data['type'] = $this->rental_model->get_data('type')->result_array();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_type', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_type()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_type');
        $this->load->view('templates_admin/footer');
    }
    public function tambah_type_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_type();
        } else {
            $kode_type      = trim($this->input->post('kode_type'));
            $nama_type      = trim($this->input->post('nama_type'));
            $data = [
                'kode_type'     => $kode_type,
                'nama_type'     => $nama_type
            ];
            $this->rental_model->insert_data($data, 'type');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/data_type');
        }
    }

    public function update_type($id)
    {

        $data['type'] = $this->db->query("SELECT * FROM type WHERE id_type = '$id'")->row_array();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_type', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_type_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->update_type('$id');
        } else {
            $id            = $this->input->post('id_type');
            $kode_type     = trim($this->input->post('kode_type'));
            $nama_type     = trim($this->input->post('nama_type'));

            $data = [
                'kode_type'     => $kode_type,
                'nama_type'     => $nama_type
            ];
            $where = [
                'id_type'       => $id
            ];
            $this->rental_model->update_data('type', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/data_type');
        }
    }

    public function delete_type($id)
    {
        $where = [
            'id_type'   => $id
        ];
        $this->rental_model->delete_data($where, 'type');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/data_type');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('nama_type', 'Nama Type', 'required');
    }
}
