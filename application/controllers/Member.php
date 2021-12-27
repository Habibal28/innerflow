<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function index(){      
        $queryEvent = "SELECT count(*) event FROM event WHERE status = 1";
        $queryLearning = "SELECT count(*) learning FROM materi WHERE status = 1";
        $events =  $this->db->query($queryEvent)->row_array();  
        $learnings =  $this->db->query($queryLearning)->row_array();    
        $data = [
            'title'   => 'Member',
            'content' => 'member/index',
            'events'   => $events,
            'learnings'   => $learnings
        ];
        $this->load->view('templates/wrapper',$data);
    }
    public function profile(){

        if(isset($_POST['submit'])){
            $id   = $this->uri->segment(3);
            $user = $this->db->get_where('user',['id' =>$id])->row_array();
            
                $config['upload_path'] = './assets/img/foto-profile';
                $config['allowed_types'] = 'jpg|png';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('image')){
                    $imageName = $user['image'];
                }else{
                    $imageName = $this->upload->data('file_name');
                }
                // set data user
            $data = [ 
                          'name' =>  $this->input->post('name'),
                          'email' =>  $this->input->post('email'),
                          'phone' =>  $this->input->post('phone'),
                          'image' => $imageName   ,    
                          'description' =>  $this->input->post('content')
                ];
            $this->db->where('id',$id);
            $this->db->update('user',$data);
                // set data sosial media
            $dataSosialMedia = [ 
                'facebook'   =>  $this->input->post('facebook'),
                'twitter'    =>  $this->input->post('twitter'),
                'github'     =>  $this->input->post('github'),
                'instagram'  =>  $this->input->post('instagram')
            ];
            $this->db->where('id_sosial_media',$user['sosial_media_id']);
            $this->db->update('sosial_media',$dataSosialMedia);
            // pindahkan ke halaman profile dan refresh
            redirect(base_url('member/profile'),'refresh');
        }else {
            $email = $this->session->userdata('email');
            $query = "SELECT user.*,sosial_media.* FROM user JOIN sosial_media ON sosial_media.id_sosial_media = user.sosial_media_id WHERE user.email = '$email'";
            $profile = $this->db->query($query)->row_array();
            $data = [	'title' 	=> 'Member',
                        'content' 	=> 'member/profile',
                        'profile'   => $profile
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

    public function upgradeAkun(){
        $data = [
            'title'   => 'Upgrade Akun',
            'content' => 'member/upgrade-akun'
        ];
        $this->load->view('templates/wrapper',$data);
    }
}