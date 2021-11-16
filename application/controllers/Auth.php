<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/auth_header');
            $this->load->view('auth/index');
            $this->load->view('templates/auth_footer');
        }else{
            $this->login();
        }
        
	}

    private function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = $this->db->get_where('user',['email' =>$email])->row_array();
        if($data){
            //jika datanya ada
            if($data['is_active'] == 1){
                // jika akun suda di aktivasi
                if(password_verify($password, $data['password'])){
                    // jika password sesuai
                    // atur session
                   
                       $user = [
                           'email' => $data['email'],
                           'role' => $data['role']
                       ];
                       $this->session->set_userdata($user);
               
                       if($data['role'] == 1){
                            redirect(base_url('Administrator'));
                       }else if($data['role']==2){
                            redirect(base_url('Member'));
                        }    
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Wrong password!
                    </div>');
                    redirect(base_url('Auth'));
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                This account has not been activated!
                </div>');
                redirect(base_url('Auth'));
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            This Email Doesnt Registered!
            </div>');
            redirect(base_url('Auth'));
        }
    }

    public function register(){
        $this->load->view('templates/auth_header');
        $this->load->view('auth/register');
        $this->load->view('templates/auth_footer');
    }

    public function verifregister(){
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email Has Been Used!'
        ]);
        $this->form_validation->set_rules('password','Password','required|trim|min_length[3]',[
            'matches' => "This Password doesn't matches!",
            'min_length' => 'Too Short!'
        ]);
        $this->form_validation->set_rules('password-confirm','Password Confirmation','required|trim|min_length[3]|matches[password]',[
            'matches' => "This Password doesn't matches!",
            'min_length' => 'Too Short!'
        ]);

        if($this->form_validation->run()==false){
            $this->load->view('templates/auth_header');
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        }else{

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'image' => 'avatar-1.png', 
            'role' => 1, 
            'is_active' => 1, 
        ];

        $this->db->insert('user',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Your account has been successfully registered. <b> Please check Email And Activation </b>
            </div>');
        redirect(base_url('Auth'));      
     }
    }
}
