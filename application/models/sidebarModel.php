
<?php 
class sidebarModel extends CI_Model{
	function get_menu($role_id){
        $data['role'] = $this->db->get_where('role',['id' => $role_id])->row_array();
        return $data;
	}
}

