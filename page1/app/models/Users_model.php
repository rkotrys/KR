<?php

class Users_model extends CI_Model {
    
    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function get_users(){
        $users = array();
        $query = $this->db->get('users');
        foreach( $query->result_array() as $row ){
            $users[$row['userid']] = lang_select($row);
        }
        return $users;
    }
    public function get_user($userid){
        $query = $this->db->where('userid',$userid)->get('users');
        if( $query->num_rows()==1 ){
            return $query->row_array();
        }else{
            return NULL;
        }
    }

}