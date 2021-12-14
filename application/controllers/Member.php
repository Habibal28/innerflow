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
            $image = $_FILES['image'];

            if($image==''){
            }else{
                $config['upload_path'] = './assets/img/foto-profile';
                $config['allowed_types'] = 'jpg|png';
                // $config['max_size']     = '1000';
                // $config['max_width'] = '1024';
                // $config['max_height'] = '768';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('image')){
                    redirect(base_url('Member/event'));
                }else{
                    $imageName = $this->upload->data('file_name');
                }
             }
            $data = [ 
                          'name' => $name,
                          'email' => $email,
                          'phone' => $phone,
                          'image' => $imageName       
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

    // menampilkan list event
    public function event(){
        $data = [	'title' 	=> 'Event',
                    'content' 	=> 'member/events/event',
                    'event'     => $this->db->get('event')->result_array()
        ];
        $this->load->view('templates/wrapper', $data);
    }
     // menampilkan isi tiap event
     public function viewEvent(){
        $id = $this->uri->segment(3);
        $data = [
            'title'   => 'Preview Event',
            'content' => 'member/events/view-event',
            'event'    => $this->db->get_where('event',['id' => $id])->row_array()
        ];
        $this->load->view('templates/wrapper',$data);
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