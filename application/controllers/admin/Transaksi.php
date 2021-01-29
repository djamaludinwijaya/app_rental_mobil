<?php

class Transaksi extends CI_Controller
{
  public function index()
  {
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs
                                                WHERE tr.id_mobil = mb.id_mobil 
                                                AND tr.id_customer = cs.id_customer")->result_array();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_transaksi', $data);
    $this->load->view('templates_admin/footer');
  }

  public function pembayaran($id)
  {
    $where = [
      'id_rental'         => $id
    ];

    $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental=$id")->result_array();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/konfirmasi_pembayaran', $data);
    $this->load->view('templates_admin/footer');
  }

  public function cek_pembayaran()
  {
    $id                 = $this->input->post('id_rental');
    $status_pembayaran  = $this->input->post('status_pembayaran');

    $data = [
      'status_pembayaran'     => $status_pembayaran
    ];
    $where = [
      'id_rental'         => $id
    ];

    $this->rental_model->update_data('transaksi', $data, $where);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Status Pembayaran Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('admin/transaksi');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Status Pembayaran Gagal Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('admin/transaksi');
    }
  }

  public function download_pembayaran($id)
  {
    $this->load->helper('download');
    $filePembayaran = $this->rental_model->download_pembayaran($id);

    $file = 'assets/upload/' . $filePembayaran['bukti_pembayaran'];

    // fungsi untuk download
    force_download($file, null);
  }

  public function transaksi_selesai($id)
  {
    $where = ['id_rental' => $id];

    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental= $id")->result_array();
    $data['status_pengembalian'] = ['belum kembali', 'kembali'];
    $data['status_rental'] = ['belum selesai', 'selesai'];

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/transaksi_selesai', $data);
    $this->load->view('templates_admin/footer');
  }

  public function transaksi_selesai_aksi()
  {
    $id_rental              = $this->input->post('id_rental');
    $id_mobil               = $this->input->post('id_mobil');
    $tanggal_pengembalian   = $this->input->post('tanggal_pengembalian');
    $status_pengembalian    = $this->input->post('status_pengembalian');
    $status_rental          = $this->input->post('status_rental');
    $tanggal_kembali        = $this->input->post('tanggal_kembali');
    $denda                  = $this->input->post('denda');

    // untuk menghitung denda berdasarkan tgl pengembalian - tanggal kembali * denda
    $x          = strtotime($tanggal_pengembalian);
    $y          = strtotime($tanggal_kembali);
    $selisih    = abs($x - $y) / (60 * 60 * 24);
    $total_denda = $selisih * $denda;


    $data = [
      'tanggal_pengembalian'          => $tanggal_pengembalian,
      'status_pengembalian'           => $status_pengembalian,
      'status_rental'                 => $status_rental,
      'total_denda'                   => $total_denda

    ];

    $where = ['id_rental' => $id_rental];
    $this->rental_model->update_data('transaksi', $data, $where);

    $data = [
      'status'  => '1'
    ];
    $where = [
      'id_mobil'  => $id_mobil
    ];
    $this->rental_model->update_data('mobil', $data, $where);


    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Transaksi Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('admin/transaksi');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Transaksi Gagal Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('admin/transaksi');
    }
  }

  public function transaksi_batal($id)
  {
    $where = [
      'id_rental' => $id
    ];
    $data = $this->rental_model->get_where($where, 'transaksi')->row_array();

    // mengambil id_mobil dari $data transaksi
    $where2 = [
      'id_mobil' => $data['id_mobil']
    ];

    $data2 = [
      'status' => '1'
    ];

    $this->rental_model->update_data('mobil', $data2, $where2);

    $this->rental_model->delete_data($where, 'transaksi');


    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Transaksi Berhasil dibatalkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect('admin/transaksi');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Transaksi Batal Gagal!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect('admin/transaksi');
    }
  }
}
