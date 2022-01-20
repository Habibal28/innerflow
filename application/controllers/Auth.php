<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');
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
        $data = $this->M_auth->detailUser($email);
        if($data){
            //jika datanya ada
            if($data['is_active'] == 1){
                // jika akun suda di aktivasi
                if(password_verify($password, $data['password'])){
                    // jika password sesuai
                    // atur session
                   
                       $user = [
                           'email' => $data['email'],
                           'role' => $data['role'],
                           'name' => $data['name'],
                           'image' => $data['image']
                       ];
                    //    var_dump($user);die;
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
        $data = [
            'halaman' => 'Register Account'
        ];
        $this->load->view('templates/auth_header',$data);
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
                $this->M_auth->tambahSosialMedia($sosial_media);
                $sosial_media = $this->M_auth->detailSosialMedia();
                // data user
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                    'date_created' => date('Y-m-d'), 
                    'image' => 'avatar-1.png', 
                    'sosial_media_id' => $sosial_media['id'], 
                    'role' => 2, 
                    'is_active' => 0, 
                ];
                // token verify
                $token = base64_encode(random_bytes(32));
                $user_token =[
                    'email' =>$this->input->post('email'),
                    'token' => $token,
                    'date_created' => time()
                ];
                
                $this->M_auth->tambahUserToken($user_token);
                $this->_sendEmail($user_token,'verify');
                $this->M_auth->tambahUser($data);
                
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
            $this->email->subject('forget password');
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
        $data = $this->M_auth->detailUserToken($email);
        if($token == $data['token'] ){
            if(time() - $data['date_created'] <  60*60*60){
                $this->M_auth->updateUser($email);
                // hapus user token
                $this->M_auth->hapusToken($token);
                
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Your Account has been Active. Please Login!
                </div>');
                redirect(base_url('Auth'));      
            }else{

                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Token is Expired!
                </div>');
                $this->M_auth->hapusUserToken($email);
                redirect(base_url('Auth'));      
            }
            
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Wrong Token!
                </div>');
                $this->M_auth->hapusUserToken($email);
                redirect(base_url('Auth'));
        }
    }

    public function forgetPassword(){
        if(isset($_POST['submit'])){
            $token = base64_encode(random_bytes(32));
            $user_token =[
                'email' =>$this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];
            $this->M_auth->tambahUserToken($user_token);
            $this->_sendEmail($user_token,'forgot password');
                            
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Please check Email And make a new password !
            </div>');
            redirect(base_url('Auth/forgetPassword'));      
        }else{
            $data = [
                'halaman' => 'Forget Password'
            ];
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/forget-password');
            $this->load->view('templates/auth_footer');
        }
    }
    public function newPassword(){
        if(isset($_POST['submit'])){
            $email = $this->input->post('email');
            $token = $this->input->post('token');
            $password = $this->input->post('password');
            // update password
            $this->M_auth->editPassword($email,$password);
            // hapus user token
            $this->M_auth->hapusToken($token);
            
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Your Password has been Change. Please Login!
            </div>');
            redirect(base_url('Auth'));      
        }else{
            $email = $this->input->get('email');
            $token = $this->input->get('token');
            // var_dump($token);
            $data = $this->M_auth->detailUserToken($email);
            
            if($token == $data['token'] ){
                if(time() - $data['date_created'] <  60*60*60){
                    $data = [
                        'halaman' => 'New Password',
                        'email'   => $email,
                        'token'   => $token
                    ];
                    $this->load->view('templates/auth_header',$data);
                    $this->load->view('auth/new-password');
                    $this->load->view('templates/auth_footer');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Token is Expired!
                    </div>');
                    $this->M_auth->hapusUserToken($email);
                    redirect(base_url('Auth'));      
                }

            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Wrong Token!
                    </div>');
                    $this->M_auth->hapusUserToken($email);
                    redirect(base_url('Auth'));
            }

        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $uri = $this->uri->segment(3);
        if($uri == 'pembayaran'){
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            please loggin Again!
            </div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Your account successfully logged out!
            </div>');
        }
        redirect(base_url('Auth'));
    }
}
