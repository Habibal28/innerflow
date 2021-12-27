<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vip extends CI_Controller {
    public function vidio(){
        $data = [
            'title'   => 'Materi',
            'content' => 'vip/vidio',
            'vidio'  => $this->db->get('vidio')->result_array()
        ];
        $this->load->view('templates/wrapper',$data);

    }

    public function trabarAnabar(){
        $data = [
            'title'   => 'Trabar & Anabar',
            'content' => 'vip/trabar-anabar/trabar-anabar',
            'trabarAnabar'  => $this->db->get('trabarAnabar')->result_array()
        ];
        $this->load->view('templates/wrapper',$data);
    }
    public function viewtrabarAnabar(){
        $id = $this->uri->segment(3);
        $data = [
            'title'   => 'Preview Trabar & Anabar',
            'content' => 'vip/trabar-anabar/view-trabar-anabar',
            'trabarAnabar'    => $this->db->get_where('trabaranabar',['id_trabarAnabar' => $id])->row_array()
        ];
        $this->load->view('templates/wrapper',$data);
    }
}
