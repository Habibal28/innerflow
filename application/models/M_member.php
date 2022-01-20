<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {

    public function dashboardMember(){
        $queryEvent = "SELECT count(*) event FROM event WHERE status = 1";
        $queryLearning = "SELECT count(*) learning FROM materi WHERE status = 1";
        $data =[
            'events'    => $this->db->query($queryEvent)->row_array(),
            'learnings' => $this->db->query($queryLearning)->row_array()
        ];
        return $data;
    }

    public function detailUser($id){
       return $this->db->get_where('user',['id' =>$id])->row_array();
    }
    public function detailUserSosialMedia($email){
        $query = "SELECT user.*,sosial_media.* FROM user JOIN sosial_media ON sosial_media.id_sosial_media = user.sosial_media_id WHERE user.email = '$email'";
        return $this->db->query($query)->row_array();
    }
    public function editProfile($id,$data){
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }
    public function editSosialMedia($user,$dataSosialMedia){
        $this->db->where('id_sosial_media',$user['sosial_media_id']);
        $this->db->update('sosial_media',$dataSosialMedia);
    }

    public function getEvent(){
      return  $this->db->get('event')->result_array();
    }
    public function detailEvent($id){
       return $this->db->get_where('event',['id' => $id])->row_array();
    }

    public function getMateri(){
      return $this->db->get('materi')->result_array();
    }
    public function detailMateri($id){
       return $this->db->get_where('materi',['id' => $id])->row_array();
    }
}