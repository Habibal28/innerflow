<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function detailUser($email){
      return  $this->db->get_where('user',['email' =>$email])->row_array();
    }
    public function tambahUser($data){
        $this->db->insert('user',$data);
    }
    public function updateUser($email){
        $this->db->set('is_active' , 1);
        $this->db->where('email',$email);
        $this->db->update('user');
    }

    public function tambahSosialMedia($sosial_media){
        $this->db->insert('sosial_media',$sosial_media);
    }
    public function detailSosialMedia(){
        $query = "SELECT id_sosial_media as id FROM sosial_media ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function detailUserToken($email){
       return $this->db->get_where('user_token' , ['email' => $email])->row_array();
    }
    public function tambahUserToken($user_token){
        $this->db->insert('user_token', $user_token);
    }
    public function hapusToken($token){
        $this->db->delete('user_token',['token' => $token]);
    }
    public function hapusUserToken($email){
        $this->db->delete('user_token',['email' => $email]);
    }

    public function editPassword($email,$password){
        $this->db->set('password' , password_hash($password,PASSWORD_DEFAULT));
        $this->db->where('email',$email);
        $this->db->update('user');
    }



}