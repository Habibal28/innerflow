<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midtrans extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-xaQlSLuu25I574BCpEF_32FM', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
        $this->load->model('M_midtrans');
		
    }
    public function cekstatus(){
       $order_id = $this->uri->segment(3);
       $this->status($order_id);
       $this->statusUser($order_id);
    }

    private function status($order_id){
       $result = $this->veritrans->status($order_id);
       $dataupdate = [
           'transaction_status' => $result->transaction_status,
           'date_modified' => time()
       ];
       $this->M_midtrans->editStatusPembayaran($order_id,$dataupdate);
    }

    private function statusUser($order_id){
        $pembayaran = $this->M_midtrans->detailPembayaran($order_id);
        $email = $this->session->userdata('email');
        if($pembayaran['transaction_status'] == 'settlement'){
            $dataupdate =[
                'role' => 3
            ];
            $this->M_midtrans->editStatusUser($email,$dataupdate);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Your Account is Upgrade, Please Logged in Again!
            </div>');
            redirect('Auth');
        }else{
            redirect('Member/upgradeAkun/','refresh');
        }
    }
}