<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function index(){
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('member/index');
        $this->load->view('templates/dashboard_footer');
    }
    public function profile(){
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('member/profile');
        $this->load->view('templates/dashboard_footer');
    }
    public function event(){
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_navbar');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('member/event');
        $this->load->view('templates/dashboard_footer');
    }
}