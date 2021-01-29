<?php

class Rental_model extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ambil_id_mobil($id)
    {
        $hasil = $this->db->where('id_mobil', $id)->get('mobil');
        if ($hasil->num_rows() > 0) {
            return $hasil->result_array();
        } else {
            return false;
        }
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cek_login($username, $password)
    {
        $result = $this->db
            ->where('username', $username)
            ->limit(1)
            ->get('customer')->row_array();
        if (password_verify($password, $result['password'])) {
            if (count($result) > 0) {
                return $result;
            } else {
                return FALSE;
            }
        }
    }

    public function update_password($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function download_pembayaran($id)
    {
        $query = $this->db->get_where('transaksi', ['id_rental' => $id]);
        return $query->row_array();
    }
}
