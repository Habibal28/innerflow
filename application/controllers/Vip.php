<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vip extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_vip');
    }

    public function vidio(){
        $data = [
            'title'   => 'Materi',
            'content' => 'vip/vidio',
            'vidio'  => $this->M_vip->getVidio()
        ];
        $this->load->view('templates/wrapper',$data);

    }

    public function trabarAnabar(){
        $data = [
            'title'         => 'Trabar & Anabar',
            'content'       => 'vip/trabar-anabar/trabar-anabar',
            'trabarAnabar'  => $this->M_vip->getTrabarAnabar()
        ];
        $this->load->view('templates/wrapper',$data);
    }
    public function viewtrabarAnabar(){
        $id = $this->uri->segment(3);
        $data = [
            'title'           => 'Preview Trabar & Anabar',
            'content'         => 'vip/trabar-anabar/view-trabar-anabar',
            'trabarAnabar'    => $this->M_vip->detailTrabarAnabar($id)
        ];
        $this->load->view('templates/wrapper',$data);
    }

}
