<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $mobil = $this->db->get('mobil');
        $type = $this->db->get('type');
        $supir = $this->db->get('supir');
        $customer = $this->db->get('customer');

        $data['mobil'] = $mobil->num_rows();
        $data['type'] = $type->num_rows();
        $data['supir'] = $supir->num_rows();
        $data['customer'] = $customer->num_rows();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
