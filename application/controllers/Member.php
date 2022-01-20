<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_member');
    }

    public function index(){      
        $result = $this->M_member->dashboardMember();
        $data = [
            'title'   => 'Member',
            'content' => 'member/index',
            'events'   => $result['events']['event'],
            'learnings'   =>  $result['learnings']['learning']
        ];
        $this->load->view('templates/wrapper',$data);
    }
    public function profile(){

        if(isset($_POST['submit'])){
            $id   = $this->uri->segment(3);
            $user = $this->M_member->detailUser($id);
            
                $config['upload_path'] = './assets/img/foto-profile';
                $config['allowed_types'] = 'jpg|png|jpeg';
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
                $this->M_member->editProfile($id,$data);
                // set data sosial media
            $dataSosialMedia = [ 
                'facebook'   =>  $this->input->post('facebook'),
                'twitter'    =>  $this->input->post('twitter'),
                'github'     =>  $this->input->post('github'),
                'instagram'  =>  $this->input->post('instagram')
            ];
            $this->M_member->editSosialMedia($user,$dataSosialMedia);
            // pindahkan ke halaman profile dan refresh
            redirect(base_url('member/profile'),'refresh');
        }else {
            $email = $this->session->userdata('email');
            $profile = $this->M_member->detailUserSosialMedia($email);
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
                    'event'     => $this->M_member->getEvent()
        ];
        $this->load->view('templates/wrapper', $data);
    }
     // menampilkan isi tiap event
     public function viewEvent(){
        $id = $this->uri->segment(3);
        $data = [
            'title'   => 'Preview Event',
            'content' => 'member/events/view-event',
            'event'    => $this->M_member->detailEvent($id)
        ];
        $this->load->view('templates/wrapper',$data);
    }

    // menampilkan daftar semua materi
    public function materi(){
        $data = [
            'title'   => 'Materi',
            'content' => 'member/materi/materi',
            'materi'  => $this->M_member->getMateri()
        ];
        $this->load->view('templates/wrapper',$data);
    }
    // menampilkan isi tiap materi
    public function viewMateri(){
        $id = $this->uri->segment(3);
        $materi = $this->M_member->detailMateri($id);
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