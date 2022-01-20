<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_snap extends CI_Model {

    public function tambahPembayaran($data){
        $this->db->insert('pembayaran',$data);
    }
}