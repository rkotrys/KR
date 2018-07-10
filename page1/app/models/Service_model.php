<?php
class Page {
    public $pid = NULL;
    public $userid=-1;
    public $lang = "pl";
    public $status = STATUS_PUBLIC;
    public $acr = LEVEL_GUEST;
    public $edr = LEVEL_OWNER;
    public $lastedit = NULL;
    public $startdate = '0000-00-00 00:00:00';
    public $stopdate = '0000-00-00 00:00:00';
    public $ackey = NULL;
    public $title = "";
    public $content = "";
    public function __construct()
    {
        $this->lang = isset($_SESSION["language"])?$_SESSION["language"]:"pl";
        //$this->userid = isset($_SESSION["user"])?$_SESSION["user"]:0;
    }    

}

class Service_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function get_page($pid){
        
        $query = $this->db->where("pid",$pid)->get('page');
        if( $query->num_rows()==1 ){
            $p = $query->custom_row_object(0,"Page");
            $p->startdate = substr($p->startdate, 0, 10);
            $p->stopdate = substr($p->stopdate, 0, 10);
            return $p;
        }else{
            return NULL;
        }
    }

    public function get_pages($where=NULL,$order=NULL,$limit=NULL,$offset=NULL){
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get("page",$limit,$offset);
        if( $query->num_rows()>0 ){
            $r = $query->custom_result_object("Page");
            foreach($r as $k=>$v){
                $r[$k]->startdate = substr($v->startdate, 0, 10);
                $r[$k]->stopdate = substr($v->stopdate, 0, 10);
            }
            return $r;
        }else{
            return NULL;
        }
    }

    public function insert_page( $page ){
        if( $this->db->insert("page", $page) )
           return $this->db->insert_id();
        else
           return FALSE;   
    }

    public function update_page( $page ){
        $this->db->where('pid', $page->pid);
        $query = $this->db->update("page",$page);
    }

    public function delete_page($pid){
        $this->db->where("pid",$pid);
        return $this->db->delete("page");
    }
}