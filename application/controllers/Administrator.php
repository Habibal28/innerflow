<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('sidebarModel');
    }
    
    public function index(){
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('administrator/index');
        $this->load->view('templates/dashboard_footer');
    }
    public function manageUser(){
        $data['user'] = $this->db->get('user')->result_array();

        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('administrator/management/manage-user',$data);
        $this->load->view('templates/dashboard_footer');
    }
    public function manageMateri(){
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('administrator/management/manage-materi');
        $this->load->view('templates/dashboard_footer');
    }
    public function manageEvent(){
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('administrator/management/manage-event');
        $this->load->view('templates/dashboard_footer');
    }
    public function manageRole(){
            $data['user'] = $this->db->get_where('user',[
            'email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->db->get('role')->result_array();
            $data['menu'] = $this->db->get('list_menu')->result_array();
            $data['access'] = $this->db->get('access_menu')->result_array();
            
            $this->load->view('templates/dashboard_header');
            $this->load->view('templates/dashboard_navbar');
            $this->load->view('templates/dashboard_sidebar');
            $this->load->view('administrator/management/manage-role',$data);
            $this->load->view('templates/dashboard_footer');
    }

}
