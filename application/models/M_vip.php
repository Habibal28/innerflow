<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vip extends CI_Model {

    public function getVidio(){
      return $this->db->get('vidio')->result_array();
    }

    public function getTrabarAnabar(){
       return $this->db->get('trabaranabar')->result_array();
    }
    public function detailTrabarAnabar($id){
       return $this->db->get_where('trabaranabar',['id_trabarAnabar' => $id])->row_array();
    }
  
}