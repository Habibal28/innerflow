<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Controller {
    public function sidebar(){
        $role = $this->session->userdata['role'];
        $query = " SELECT lm.menu, lm.id
            FROM access_menu as am 
            JOIN list_menu as lm 
            ON  lm.id = am.list_menu_id
            WHERE am.role_id = $role
            ";
        $menu = $this->db->query($query)->result_array();
        $this->load->view('templates/dashboard_sidebar');
    }
}