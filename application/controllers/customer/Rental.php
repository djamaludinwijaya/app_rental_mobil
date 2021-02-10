<?php

class Rental extends CI_Controller
{
  public function tambah_rental($id)
  {
    $data['detail'] = $this->rental_model->ambil_id_mobil($id);

    // untuk random supir
    $data['supir'] = $this->db->query('SELECT * FROM `supir` WHERE 
                    `status_supir` = 1 ORDER BY RAND()
                    LIMIT 1')->row_array();


    $this->load->view('templates_customer/header');
    $this->load->view('customer/tambah_rental', $data);
    $this->load->view('templates_customer/footer');
  }

  public function tambah_rental_aksi()
  {

    $id_customer        = $this->session->userdata('id_customer');
    $id_mobil           = $this->input->post('id_mobil');
    $tanggal_rental     = $this->input->post('tanggal_rental');
    $tanggal_kembali    = $this->input->post('tanggal_kembali');
    $ket                = $this->input->post('ket');
    $jangkauan_supir    = $this->input->post('jangkauan_supir');

    $hargaDenda = $this->rental_model->ambil_id_mobil($id_mobil);
    foreach ($hargaDenda as $hD) {
      $denda              = $hD['denda'];
      $harga              = $hD['harga'];
    }

    $x        = strtotime($tanggal_kembali);
    $y        = strtotime($tanggal_rental);
    $jmlHari  = abs(($x - $y) / (60 * 60 * 24));


    // jika keterangan tidak menggunakan supir maka cukup masukkan harga mobil
    // selain itu ditambahkan biaya supir
    if (isset($_POST['ket']) == '0') {
      (int)$harga * $jmlHari;
    } else {
      $harga =  ((int)$harga + (int)$jangkauan_supir) * $jmlHari;
    }

    $data = [
      'id_customer'           => $id_customer,
      'id_mobil'              => $id_mobil,
      'id_supir'              => $ket,
      'tanggal_rental'        => $tanggal_rental,
      'tanggal_kembali'       => $tanggal_kembali,
      'denda'                 => $denda,
      'harga'                 => $harga,
      'tanggal_pengembalian'  => '-',
      'status_pengembalian'   => 'belum kembali',
      'status_rental'         => 'belum selesai',
      'total_denda'           =>  0
    ];


    $this->rental_model->insert_data($data, 'transaksi');
    // setelah di insert database status yang tersedia diupdate menjadi tidak tersedia
    $status = [
      'status' => '0'
    ];
    $id = [
      'id_mobil'  => $id_mobil
    ];
    $this->rental_model->update_data('mobil', $status, $id);

    // jika status ket lebih dari nol artinya pakai supir
    // update statusnya
    if ($ket > 0) {
      $status_supir = ['status_supir' => '0'];
      $id_supir = ['id_supir' => $ket];
      $this->rental_model->update_data('supir', $status_supir, $id_supir);
    }


    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Transaksi Berhasil, Silahkan Checkout!. 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('customer/data_mobil');
  }
}
