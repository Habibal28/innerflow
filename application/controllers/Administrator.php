<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('sidebarModel');
    }
    public function index()
    {
        $user = $this->db->get('user')->result_array();
        $event = $this->db->get('event')->result_array();
        $members=0;
        $events=0;
        foreach($user as $row) :
            if($row['role'] == 2){
                $members++;
            }
        endforeach;
        foreach($event as $row) :
            $events++;
        endforeach;
        $data = array( 	'title'   => 'Administrator',
                        'content' => 'administrator/index',
                        'members' => $members,
                        'events'   => $events
                    );
        $this->load->view('templates/wrapper', $data);
    }
    // menampilkan view user    
    public function manageUser(){
        if(isset($_POST['submit'])){
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $role = $this->input->post('role');
            $data = [ 
                          'role' => $role,
                          'is_active' => $status   
            ];
            $this->db->where('id',$id);
            $this->db->update('user',$data);
            redirect(base_url('administrator/manageUser'),'refresh');
        }else {
            $data = [ 	'title' 	=> 'Manage User',
                        'content' 	=> 'administrator/management/manage-user/user',
                        'user'      => $this->db->get('user')->result_array()
              ];
              $this->load->view('templates/wrapper', $data);
        }
    }

    // menampilkan view materi
    public function manageMateri(){
        $data = [ 
            'title' 	=> 'Manage Materi',
            'content' 	=> 'administrator/management/manage-materi/materi',
        ]; 
        $this->load->view('templates/wrapper', $data);        
    }

    // menampilkan view event
    public function manageEvent(){
        $query = 'SELECT event.* , user.name FROM event JOIN user ON event.user_id = user.id';
        $data = [ 
            'title' 	=> 'Manage Event',
            'content' 	=> 'administrator/management/manage-event/event',
            'event'     => $this->db->query($query)->result_array()
        ];
        $this->load->view('templates/wrapper', $data);      
    }
    // tambah event baru
    public function addEvent(){
        if(isset($_POST['submit'])){
            $user =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'category' => $this->input->post('category'),
                'status' => $this->input->post('status'),
                'date_created' => time(),
                'user_id' => $user['id']
            ];
            $this->db->insert('event',$data);
              redirect(base_url('Administrator/manageEvent'),'refresh');
        }else{
            $data = [ 
                'title' 	=> 'Add Event',
                'content' 	=> 'administrator/management/manage-event/add-event',
            ];
            $this->load->view('templates/wrapper', $data);      
        }
    }
    // update Event
    public function editEvent(){
        if(isset($_POST['submit'])){
            $user =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
            $id = $this->uri->segment(3);
            $data = [
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'category' => $this->input->post('category'),
                'status' => $this->input->post('status'),
                'date_created' => time(),
                'user_id' => $user['id']
            ];
            $this->db->where('id',$id);
            $this->db->update('event',$data);
            redirect(base_url('Administrator/manageEvent'),'refresh');
        }else{
            $id = $this->uri->segment(3);
            $data = [ 
                'title' 	=> 'Edit Event',
                'content' 	=> 'administrator/management/manage-event/edit-event',
                'event'     => $this->db->get_where('event',['id' => $id])->result_array()
            ];
            $this->load->view('templates/wrapper', $data);      
        }
    }
    // Delete Event 
    public function deleteEvent(){
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('event');
        redirect(base_url('Administrator/manageEvent'),'refresh');
    }
    // view event
    public function viewEvent(){
        $id = $this->uri->segment(3);
        $data = [
            'title'   => 'View Event',
            'content' => 'administrator/management/manage-event/view-event',
            'event'   => $this->db->get_where('event',['id' => $id])->row_array()
        ];
        $this->load->view('templates/wrapper',$data);
    }

    // menampilkan view edit role
    public function manageRole(){
            $data = [ 
                    	'title' 	=> 'Manage Role',
                        'content' 	=> 'administrator/management/manage-role/role',
                        'user'      => $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(),
                        'role'      => $this->db->get('role')->result_array(),
                        'menu'      => $this->db->get('list_menu')->result_array(),
                        'access'    => $this->db->get('access_menu')->result_array()
                    ];
            $this->load->view('templates/wrapper', $data);
    }
    // menampilkan view edit role access
    public function editRole(){
        $data = [ 
                	'title' 	=> 'Manage Role',
                    'content' 	=> 'administrator/management/manage-role/edit',
                    'menu'      => $this->db->get('list_menu')->result_array(),
                    'role_id'   => $this->uri->segment(3),
                    'access'    => $this->db->get('access_menu')->result_array()
                ];
                
        $this->load->view('templates/wrapper', $data);
    }
    // change role access with ajax
    public function ajaxchangeaccess(){
        $list_menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'list_menu_id' => $list_menu_id,
            'role_id' => $role_id
        ];
        $result = $this->db->get_where('access_menu' , $data);
        if($result->num_rows()> 1){
            $this->db->delete('access_menu',$data);
        }else{
            $this->db->insert('access_menu',$data);
        }
    }




}

