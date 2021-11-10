<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
    public function index(){
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('administrator/index');
        $this->load->view('templates/dashboard_footer');
    }
}
