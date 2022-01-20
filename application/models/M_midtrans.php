<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_midtrans extends CI_Model {

    public function editStatusPembayaran($order_id,$dataupdate){
        $this->db->where('order_id',$order_id);
        $this->db->update('pembayaran',$dataupdate);
    }
    public function detailPembayaran($order_id){
       return $this->db->get_where('pembayaran',['order_id' => $order_id])->row_array();
    }
    public function editStatusUser($email,$dataupdate){
        $this->db->where('email',$email);
        $this->db->update('user',$dataupdate);
    }
}