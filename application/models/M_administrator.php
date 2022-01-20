<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_administrator extends CI_Model {
    //dashboard 
    public function dashboardAdmin(){
        $queryMember = "SELECT count(*) member FROM user WHERE role = 2 OR 3";
        $queryEvent = "SELECT count(*) event FROM event WHERE status = 1";
        $queryLearning = "SELECT count(*) learning FROM materi WHERE status = 1";
        $data = [
            'members'   => $this->db->query($queryMember)->row_array(),
            'events'    => $this->db->query($queryEvent)->row_array(),
            'learnings' => $this->db->query($queryLearning)->row_array()
        ];
        return $data;
    }
    public function chart($type)
    {
        if($type == 'pie'){
            $queryvip = "SELECT count(role) as vip FROM user WHERE role = 2";
            $querymember = "SELECT count(role) as member FROM user WHERE role = 3";
            $data = [
                'vip' => $this->db->query($queryvip)->row_array(),
                'member' =>  $this->db->query($querymember)->row_array(),
            ];
            return $data;
        }else if($type == 'bar'){
            $query = "SELECT date_created From user WHERE role >= 2";
            $result =  $this->db->query($query)->result_array();
            return $result;
        }   
    }
    public function hitungBulan_forChart($i){
        $query = "SELECT count(*) as bulan$i FROM user where MONTH(date_created) = $i";
        $data = $this->db->query($query)->row_array();
        return $data;
    }

    // user
    public function getUser(){
        return $this->db->get('user')->result_array();
    }
    public function editUser($id,$data){
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }

    public function getMateri(){
        return $this->db->get('materi')->result_array();
    }
    public function tambahMateri($data){
        $this->db->insert('materi',$data);
    }
    public function detailMateri($id){
     return $this->db->get_where('materi',['id' => $id])->row_array();
    }
    public function editMateri($id,$data){
        $this->db->where('id',$id);
        $this->db->update('materi',$data);
    }
    public function hapusMateri($id){
        $this->db->where('id',$id);
        $this->db->delete('materi');
    }

    // event
    public function getEventAdminCreated(){
        $query = 'SELECT event.* , user.name, user.image FROM event JOIN user ON event.user_id = user.id';
        return $this->db->query($query)->result_array();
    }
    public function detailEvent($id){
        return $this->db->get_where('event',['id' => $id])->result_array();
    }
    public function tambahEvent($data){
        $this->db->insert('event',$data);
    }
    public function editEvent($id,$data){
        $this->db->where('id',$id);
        $this->db->update('event',$data);
    }
    public function deleteEvent($id){
        $this->db->where('id',$id);
        $this->db->delete('event');
    }

    // vidio
    public function getVidio(){
       return  $this->db->get('vidio')->result_array();
    }
    public function detailVidio($id){
     return $this->db->get_where('vidio',['id_vidio' =>$id])->row_array();
    }
    public function tambahVidio($data){
        $this->db->insert('vidio',$data);
    }
    public function editVidio($id,$data){
        $this->db->where('id_vidio',$id);
        $this->db->update('vidio',$data);
    }
    public function hapusVidio($id){
        $this->db->where('id_vidio',$id);
        $this->db->delete('vidio');
    }

    // trabar & anabar 
    public function getTrabarAnabarAdminCreated(){
        $query = 'SELECT trabaranabar.* , user.name, user.image FROM trabaranabar JOIN user ON trabaranabar.user_id = user.id';
        return $this->db->query($query)->result_array();
    }
    public function detailTrabarAnabar($id){
       return $this->db->get_where('trabaranabar',['id_TrabarAnabar'=>$id])->row_array();
    }
    public function tambahTrabarAnabar($data){
        $this->db->insert('trabaranabar',$data);
    }
    public function editTrabarAnabar($id,$data){
        $this->db->where('id_trabarAnabar',$id);
        $this->db->update('trabaranabar',$data);
    }
    public function hapusTrabarAnabar($id){
        $this->db->where('id_trabarAnabar',$id);
        $this->db->delete('trabaranabar');
    }
}