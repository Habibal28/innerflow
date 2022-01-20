<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Templates extends CI_Controller { 
    public function __construct()
    {
        parent::__construct();// you have missed this line. 
        $this->load->library('session');  
        $this->load->model('M_templates');
    }
    public function index($role){
        if($role == 3){
            $query = "SELECT * FROM sub_menu WHERE role >=$role";
        }else{
            $query = "SELECT * FROM sub_menu WHERE role =$role";
        }
        // return  $this->db->query($query)->result_array();
    }
}