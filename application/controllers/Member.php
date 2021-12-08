<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function index(){        
        $data = [
            'title'   => 'Administrator',
            'content' => 'Administrator'
        ];
        $this->load->view('templates/wrapper',$data);
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

    // menampilkan daftar semua materi
    public function materi(){
        $data = [
            'title'   => 'Materi',
            'content' => 'member/materi/materi',
            'materi'  => $this->db->get('materi')->result_array()
        ];
        $this->load->view('templates/wrapper',$data);
    }
    // menampilkan isi tiap materi
    public function viewMateri(){
        $id = $this->uri->segment(3);
        $materi = $this->db->get_where('materi',['id' => $id])->row_array();
        $data = [
            'title'   => 'Preview Materi',
            'file'    => $materi['file'],
            'content' => 'member/materi/view-materi'
        ];
        $this->load->view('templates/wrapper',$data);
    }
}