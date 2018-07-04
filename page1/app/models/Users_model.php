<?php

class Users_model extends CI_Model {

    private $en = array("title", "subtitle", "duty", "resume");
    private function lang_set($u){
        $r=array();
        $s=lang_sufix();
        foreach( $u as $k=>$v ){
            $flag=true;
            foreach( $this->en as $p ){
                if( $k==$p ){
                    $r[$k.lang_sufix()]=$v;
                    $flag=false;
                    break;
                }
            }
            if( $flag ) $r[$k]=$v;
        }
        return $r;
    }

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
            return lang_select($query->row_array());
        }else{
            return NULL;
        }
    }
    public function insert($u){
        
        $query = $this->db->insert('users', $this->lang_set($u) );
        return $this->db->insert_id();
    }
    public function update($u){
        $query = $this->db->where('userid',$u['userid'])->update('users', $this->lang_set($u) );
        return $this->db->affected_rows();
    }
    public function delete($userid){
        $query = $this->db->where('userid',$userid)->delete( 'users' );
        return $this->db->affected_rows();
    }
    public function get_user_by_uname($uname){
        $query = $this->db->where('uname',$uname)->get('users');
        if( $query->num_rows()==1 ){
            return lang_select($query->row_array());
        }else{
            return NULL;
        }
    }

}