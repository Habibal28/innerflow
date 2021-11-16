<?php

function checked($role_id,$menu_id){
    $check = get_instance();
    $result = $check->db->get_where('access_menu', [
        'role_id' => $role_id,
        'list_menu_id' => $menu_id
    ]);
    if($result->num_rows()>0){
        return "checked='checked'";
    }
}