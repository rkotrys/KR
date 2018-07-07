<?php
class Page {
    public $pid = NULL;
    public $userid = 0;
    public $lang = "pl";
    public $status = 0;
    public $acr = LEVEL_GUEST;
    public $edr = LEVEL_STAFF;
    public $lastedit = NULL;
    public $startdate = '0000-00-00 00:00:00';
    public $stopdate = '0000-00-00 00:00:00';
    public $ackey = NULL;
    public $title = "";
    public $content = "";
}

class Service_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function get_page($pid){
        $query = $this->db->where("pid",$pid).get('page');
        if( $query->num_rows()==1 ){
            return $query->custom_row_object("Page");
        }else{
            return NULL;
        }
    }

    public function get_pages($where=NULL,$order=NULL,$limit=NULL,$offset=NULL){
        $this->db->where($where);
        $this->db->order($order);
        $query = $this->db->get("page",$limit,$offset);
        if( $query->num_rows()>0 ){
            return $query->custom_result_object("Page");
        }else{
            return NULL;
        }
    }

    public function insert_page( $page ){
        $query = $this->db->insert($page,"page");
    }

    public function update_page( $page ){
        $this->db->where('pid', $page->pid);
        $query = $this->db->update("page",$page);
    }

    public function delete_page($pid){
        $this->db->where("pid",$pid);
        $query = $this->db->delete("page");
    }
}