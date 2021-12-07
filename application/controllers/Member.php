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

        if(isset($_POST['submit'])){
            $id   = $this->uri->segment(3);
            $name  =  $this->input->post('name');
            $email =  $this->input->post('email');
            $phone =  $this->input->post('phone');
            $data = [ 
                          'name' => $name,
                          'email' => $email,
                          'phone' => $phone         
            ];
            $this->db->where('id',$id);
            $this->db->update('user',$data);
            redirect(base_url('member/profile'),'refresh');
        }else {
            $data = [	'title' 	=> 'Member',
                        'content' 	=> 'member/profile',
                        'profile'   => $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array()
            ];
            $this->load->view('templates/wrapper', $data);
        }                                            
           
    }
    public function event(){
        $data = [	'title' 	=> 'Member',
                    'content' 	=> 'member/event',
                    'event'     => $this->db->get('event')->result_array()
        ];
        $this->load->view('templates/wrapper', $data);
    }
}