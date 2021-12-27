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
        $data = [
            'halaman' => 'Login'
        ];

        if($this->form_validation->run()==false){
            $this->load->view('templates/auth_header',$data);
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
                       }else if($data['role']==2 || 3){
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
            $secret = '6LePwrkdAAAAAGGwvwHZiyusvA7eXlcI7e9PI68D';
            $verifcaptcha =file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $response = json_decode($verifcaptcha,true);
            
            if($response['success'] == true){
                  // data sosial media kosong
                $sosial_media = [
                    'facebook' => '',
                    'twitter' => '',
                    'github' => '',
                    'instagram' => '',
                ];
                $this->db->insert('sosial_media',$sosial_media);
                $query = "SELECT id_sosial_media as id FROM sosial_media ORDER BY id DESC LIMIT 1";
                $sosial_media = $this->db->query($query)->row_array();
                // data user
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                    'date_created' => date('Y-m-d'), 
                    'image' => 'avatar-1.png', 
                    'sosial_media_id' => $sosial_media['id'], 
                    'role' => 3, 
                    'is_active' => 0, 
                ];
                // token verify
                $token = base64_encode(random_bytes(32));
                $user_token =[
                    'email' =>$this->input->post('email'),
                    'token' => $token,
                    'date_created' => time()
                ];
                
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($user_token,'verify');
                $this->db->insert('user',$data);
                
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Your account has been successfully registered. <b> Please check Email And Activation </b>
                </div>');
                redirect(base_url('Auth'));      
            }else{
                redirect(base_url('Auth/register'));      
            } 
        }
    }

    private function _sendEmail($user_token,$type){

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'emzob30@gmail.com',
            'smtp_pass' => 'emzob432211',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email',$config); 
        $this->email->initialize($config);
        $this->email->from('emzob30@gmail.com', 'Innerflow Trading');
        $this->email->to($user_token['email']);

        if($type == 'verify'){
            $this->email->subject('Verifikasi Email');
            $this->email->message('click to verifikasi email :  <a href ="' . base_url() . 'Auth/verify?email=' . $user_token['email'] . '&token=' . $user_token['token'] .'" >here!</a>  ');
            
        }else if($type =='forgot password'){
            $this->email->subject('Verifikasi Email');
            $this->email->message(' Click to Forget Password :  <a href ="' . base_url() . 'Auth/newPassword?email=' . $user_token['email'] . '&token=' . $user_token['token'] .'" >here!</a>  ');
        }
        
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die;
        }
    }

    // verify aktivasi user
    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $data = $this->db->get_where('user_token' , ['email' => $email])->row_array();
        if($token == $data['token'] ){
            if(time() - $data['date_created'] <  60*60*60){
                $this->db->set('is_active' , 1);
                $this->db->where('email',$email);
                $this->db->update('user');
                // hapus user token
                $this->db->delete('user_token',['token' => $token]);
                
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Your Account has been Active. Please Login!
                </div>');
                redirect(base_url('Auth'));      
            }else{

                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Token is Expired!
                </div>');
                $this->db->delete('user_token',['email' => $email]);
                redirect(base_url('Auth'));      
            }
            
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Wrong Token!
                </div>');
                $this->db->delete('user_token',['email' => $email]);
                redirect(base_url('Auth'));
        }
    }







    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('notificationSuccess','<div class="alert alert-success" role="alert">
        Your account successfully logged out!
            </div>');
        redirect(base_url('Auth'));
    }
}
