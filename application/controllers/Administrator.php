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
        $queryMember = "SELECT count(*) member FROM user WHERE role = 2 AND 3";
        $queryEvent = "SELECT count(*) event FROM event WHERE status = 1";
        $queryLearning = "SELECT count(*) learning FROM materi WHERE status = 1";
        $members =  $this->db->query($queryMember)->row_array();  
        $events =  $this->db->query($queryEvent)->row_array();  
        $learnings =  $this->db->query($queryLearning)->row_array();  
        $data = array( 	'title'   => 'Administrator',
                        'content' => 'administrator/index',
                        'members' => $members,
                        'events'   => $events,
                        'learnings'   => $learnings
                    );
                    // var_dump($data);die;
        $this->load->view('templates/wrapper', $data);
    }
    // chart
    public function chart(){
        $type = $this->uri->segment(3);
        if($type == 'pie'){
            $queryvip = "SELECT count(role) as vip FROM user WHERE role = 2";
            $querymember = "SELECT count(role) as member FROM user WHERE role = 3";
            $data = [
                'vip' => $this->db->query($queryvip)->row_array(),
                'member' =>  $this->db->query($querymember)->row_array(),
            ];
            echo json_encode($data);
        }else if($type == 'bar'){
            // mencari bulan per user
            $query = "SELECT date_created From user WHERE role >= 2";
            $temp = $this->db->query($query)->result_array();
            $i=0;
            foreach($temp as $row) :
                $tes[] = explode('-',$row['date_created']);
                $bulan[] = $tes[$i][1];
                $i++;
            endforeach;
            
            for($i=1;$i<=12;$i++){
                $query = "SELECT count(*) as bulan$i FROM user where MONTH(date_created) = $i";
                $data[] = $this->db->query($query)->row_array();
            }
            echo json_encode($data);
        }
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

    // menampilkan list materi
    public function manageMateri(){

        $data = [ 
            'title' 	=> 'Manage Materi',
            'content' 	=> 'administrator/management/manage-materi/materi',
            'materi'    => $this->db->get('materi')->result_array()
        ];
        if($this->uri->segment(3)){
            $this->session->set_flashdata('message','');
        }
        
        $this->load->view('templates/wrapper', $data);        
    }
    // menambahkan materi baru
    public function addMateri(){
            if(isset($_POST['submit'])){
                $file = $_FILES['file'];
                if($file==''){
                    }else{
                        $config['upload_path'] = './assets/materi';
                        $config['allowed_types'] = 'pdf';

                        $this->load->library('upload', $config);
                        if(!$this->upload->do_upload('file')){
                            redirect(base_url('Administrator/manageMateri'),'refresh');
                        }else{
                            $fileName = $this->upload->data('file_name');
                        }
                 }
                 $data = [
                    'title' => $this->input->post('title'),
                    'file'   => $fileName,
                    'category' => $this->input->post('category'),
                    'date_created' => time(),
                    'status' => $this->input->post('status')
                ];
                $this->db->insert('materi',$data);
                $this->session->set_flashdata('message','Ditambahkan');
                  redirect(base_url('Administrator/manageMateri'),'refresh');
        }else{
            $data = [
                'title'     => 'Add New Materi',
                'content'   => 'administrator/management/manage-materi/add-materi',
            ];
            $this->load->view('templates/wrapper',$data);
        }
    }
    // menampilkan materi
    public function viewMateri(){
        $id = $this->uri->segment(3);
        $data = [
            'title'   => 'View Materi',
            'content' => 'administrator/management/manage-materi/view-materi',
            'materi'   => $this->db->get_where('materi',['id' => $id])->row_array()
        ];
        $this->load->view('templates/wrapper',$data);

    }
    // update materi
    public function editMateri(){
        if(isset($_POST['submit'])){
            $id = $this->uri->segment(3);

            $config['upload_path'] = './assets/materi';
            $config['allowed_types'] = 'pdf';
            $this->load->library('upload', $config); 
             if(!$this->upload->do_upload('content')){
                $data = $this->db->get_where('materi',['id' =>$id])->row_array();
                $fileName = $data['file'];
             }else{
                $fileName = $this->upload->data('file_name');
             }
            $data = [
                'title'         => $this->input->post('title'),
                'file'         => $fileName,
                'category'      => $this->input->post('category'),
                'date_created'  => time(),
                'status'        => $this->input->post('status')
            ];
            $this->db->where('id',$id);
            $this->db->update('materi',$data);
            $this->session->set_flashdata('message','Diedit');
            redirect(base_url('Administrator/manageMateri'),'refresh');
        }else{
            $id = $this->uri->segment(3);
            $data = [ 
                'title' 	=> 'Edit Materi',
                'content' 	=> 'administrator/management/manage-materi/edit-materi',
                'materi'     => $this->db->get_where('materi',['id' => $id])->result_array()
            ];
            $this->load->view('templates/wrapper', $data);      
        }
    }
    // delete materi
    public function deleteMateri(){
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('materi');
        redirect(base_url('Administrator/manageMateri'),'refresh');
    }


    // menampilkan list event
    public function manageEvent(){
        $query = 'SELECT event.* , user.name, user.image FROM event JOIN user ON event.user_id = user.id';
        $data = [ 
            'title' 	=> 'Manage Event',
            'content' 	=> 'administrator/management/manage-event/event',
            'event'     => $this->db->query($query)->result_array()
        ];
        if($this->uri->segment(3)){
            $this->session->set_flashdata('message','');
        }
        $this->load->view('templates/wrapper', $data);      
    }
    // tambah event baru
    public function addEvent(){
        if(isset($_POST['submit'])){
            $user =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
            $image = $_FILES['image'];
            if($image==''){
                }else{
                    $config['upload_path'] = './assets/img/event-thumbnail';
                    $config['allowed_types'] = 'jpg|png';
                    $this->load->library('upload', $config);
                    if(!$this->upload->do_upload('image')){
                        redirect(base_url('Administrator/manageEvent'),'refresh');
                    }else{
                        $imageName = $this->upload->data('file_name');
                    }
             }
            $data = [
                'title' => $this->input->post('title'),
                'Description' => $this->input->post('Description'),
                'content' => $this->input->post('content'),
                'category' => $this->input->post('category'),
                'status' => $this->input->post('status'),
                'date_created' => time(),
                'user_id' => $user['id'],
                'image'   => $imageName
            ];
              $this->db->insert('event',$data);
              $this->session->set_flashdata('message','Ditambahkan');
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

            $config['upload_path'] = './assets/img/event-thumbnail';
            $config['allowed_types'] = 'jpg|png';
            $this->load->library('upload', $config); 

             if(!$this->upload->do_upload('image')){
                $data = $this->db->get_where('event',['id' =>$id])->row_array();
                $imageName = $data['image'];
             }else{
                $imageName = $this->upload->data('file_name');
             }
            $data = [
                'title'         => $this->input->post('title'),
                'Description'   => $this->input->post('Description'),
                'content'       => $this->input->post('content'),
                'category'      => $this->input->post('category'),
                'status'        => $this->input->post('status'),
                'date_created'  => time(),
                'user_id'       => $user['id'],
                'image'         => $imageName
            ];
            $this->db->where('id',$id);
            $this->db->update('event',$data);
            $this->session->set_flashdata('message','Diedit');
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
                	'title' 	=> 'Manage Role Access',
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

    // list of vidio
    public function manageVidio(){
        $data = [ 
            'title' 	=> 'Manage Vidio',
            'content' 	=> 'administrator/management/manage-vidio/vidio',
            'vidio'    => $this->db->get('vidio')->result_array()
        ];
        if($this->uri->segment(3)){
            $this->session->set_flashdata('message','');
        }
        $this->load->view('templates/wrapper', $data);        
    }
    // menambahkan vidio
    public function addVidio(){
        if(isset($_POST['submit'])){
             $config['upload_path'] = './assets/img/vidio-thumbnail';
             $config['allowed_types'] = 'jpg|png|jpeg';
             $this->load->library('upload', $config);
             if(!$this->upload->do_upload('thumbnail')){
                 redirect(base_url('Administrator/manageVidio'),'refresh');
                 $this->session->set_flashdata('message','Gagal Diupload');
             }else{
                 $imageName = $this->upload->data('file_name');
             }
             $data = [
                'judul' => $this->input->post('judul'),
                'link' => $this->input->post('link'),
                'thumbnail' => $imageName,
                'date_created' => time(),
                'status' => $this->input->post('status')
            ];
            $this->db->insert('vidio',$data);
            $this->session->set_flashdata('message','Ditambahkan');
            redirect(base_url('Administrator/manageVidio'),'refresh');
    }else{
        $data = [
            'title'     => 'Add New Vidio',
            'content'   => 'administrator/management/manage-vidio/add-vidio',
        ];
        $this->load->view('templates/wrapper',$data);
    }
 }
    // mengedit vidio
    public function editVidio(){
        if(isset($_POST['submit'])){
            $id = $this->uri->segment(3);
            $config['upload_path'] = './assets/img/vidio-thumbnail';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config); 
             if(!$this->upload->do_upload('thumbnail')){
                $data = $this->db->get_where('vidio',['id_vidio' =>$id])->row_array();
                $imageName = $data['thumbnail'];
             }else{
                $imageName = $this->upload->data('file_name');
             }
            $data = [
                'judul' => $this->input->post('judul'),
                'link' => $this->input->post('link'),
                'thumbnail' => $imageName,
                'date_created' => time(),
                'status' => $this->input->post('status')
            ];
            $this->db->where('id_vidio',$id);
            $this->db->update('vidio',$data);
            $this->session->set_flashdata('message','Diedit');
            redirect(base_url('Administrator/manageVidio'),'refresh');
        }else{
            $id = $this->uri->segment(3);
            $data = [ 
                'title' 	=> 'Edit Vidio',
                'content' 	=> 'administrator/management/manage-vidio/edit-vidio',
                'vidio'     => $this->db->get_where('vidio',['id_vidio' => $id])->result_array()
            ];
            // var_dump($data);die;
            $this->load->view('templates/wrapper', $data);      
        }
    }
    // delete vidio
    public function deleteVidio(){
        $id = $this->uri->segment(3);
        $this->db->where('id_vidio',$id);
        $this->db->delete('vidio');
        $this->session->set_flashdata('message','Dihapus');
        redirect(base_url('Administrator/manageVidio'),'refresh');
    }

    // list of Trabar & Anabar
    public function manageTrabarAnabar(){
        $query = 'SELECT trabaranabar.* , user.name, user.image FROM trabaranabar JOIN user ON trabaranabar.user_id = user.id';
        $data = [ 
            'title' 	=> 'Manage Trabar & Anabar',
            'content' 	=> 'administrator/management/manage-trabarAnabar/trabar-anabar',
            'trabarAnabar'    => $this->db->query($query)->result_array()
        ];
        if($this->uri->segment(3)){
            $this->session->set_flashdata('message','');
        }
        $this->load->view('templates/wrapper', $data);        
    }
    // menambahan kegiatan Trabar & Anabar baru
    public function addTrabarAnabar(){
        if(isset($_POST['submit'])){
            $user =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
            $config['upload_path'] = './assets/img/trabarAnabar-thumbnail';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('thumbnail')){
                redirect(base_url('Administrator/manageTrabarAnabar'),'refresh');
            }else{
                $imageName = $this->upload->data('file_name');
            }
            $data = [
                'title' => $this->input->post('title'),
                'Description' => $this->input->post('Description'),
                'content' => $this->input->post('content'),
                'thumbnail'   => $imageName,
                'date_created' => time(),
                'status' => $this->input->post('status'),
                'user_id' => $user['id']
            ];
              $this->db->insert('trabaranabar',$data);
              $this->session->set_flashdata('message','Ditambahkan');
              redirect(base_url('Administrator/manageTrabarAnabar'),'refresh');
        }else{
            $data = [ 
                'title' 	=> 'Add Trabar & Anabar',
                'content' 	=> 'administrator/management/manage-trabarAnabar/add-trabarAnabar',
            ];
            $this->load->view('templates/wrapper', $data);      
        }
    }
    // edit Trabar & Anabar
    public function editTrabarAnabar(){
        if(isset($_POST['submit'])){
            $id = $this->uri->segment(3);
            $user =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
            $config['upload_path'] = './assets/img/trabarAnabar-thumbnail';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config); 
             if(!$this->upload->do_upload('thumbnail')){
                $data = $this->db->get_where('trabaranabar',['id_TrabarAnabar'=>$id])->row_array();
                $imageName = $data['thumbnail'];    
             }else{
                $imageName = $this->upload->data('file_name');
             }
            $data = [
                'title' => $this->input->post('title'),
                'Description' => $this->input->post('Description'),
                'content' => $this->input->post('content'),
                'thumbnail'   => $imageName,
                'date_created' => time(),
                'status' => $this->input->post('status'),
                'user_id' => $user['id']
            ];
            $this->db->where('id_trabarAnabar',$id);
            $this->db->update('trabaranabar',$data);
            $this->session->set_flashdata('message','Diedit');
            redirect(base_url('Administrator/manageTrabarAnabar'),'refresh');
        }else{  
            $id = $this->uri->segment(3);
            $data = [ 
                'title' 	=> 'Edit Trabar & Anabar',
                'content' 	=> 'administrator/management/manage-trabarAnabar/edit-trabarAnabar',
                'trabarAnabar'  => $this->db->get_where('trabaranabar',['id_TrabarAnabar' => $id])->result_array()
            ];
            $this->load->view('templates/wrapper', $data);      
        }
    }
     // delete Trabar & Anabar
    public function deleteTrabarAnabar(){
        $id = $this->uri->segment(3);
        $this->db->where('id_trabarAnabar',$id);
        $this->db->delete('trabaranabar');
        $this->session->set_flashdata('message','Dihapus');
        redirect(base_url('Administrator/manageTrabarAnabar'),'refresh');
    }




}

