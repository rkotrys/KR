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
    }    

}

class File {
    public $fid = NULL;
    public $userid = -1;
    public $acr = LEVEL_GUEST;
    public $edr = LEVEL_OWNER;
    public $status = STATUS_PUBLIC;
    public $ackey = NULL;
    public $cdate;
    public $acdate;
    public $name = NULL;
    public $alias;
    public $path = NULL;
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

// ------ FILE ------ //
    public function insert_file($file){
        if( $this->db->insert("file", $file) )
           return $this->db->insert_id();
        else
           return FALSE;   
    }

    public function update_file( $file ){
        $file->acdate=date("Y-m-d H:i:s");
        $this->db->where('fid', $file->fid);
        $query = $this->db->update("file",$file);
    }

    public function delete_file($fid){
        $this->db->where("fid",$fid);
        return $this->db->delete("file");
    }
 
    public function get_file($fid){
        $query = $this->db->where("fid",$fid)->get('file');
        if( $query->num_rows()==1 ){
            $p = $query->custom_row_object(0,"File");
            return $p;
        }else{
            return NULL;
        }
    }

    public function get_file_byname($fname,$userid=NULL){
        if($userid==NULL) $userid=$this->user["userid"];
        $query = $this->db->where("name",$fname)->where("userid",$userid)->get('file');
        if( $query->num_rows()==1 ){
            $p = $query->custom_row_object(0,"File");
            return $p;
        }else{
            return NULL;
        }
    }

    public function get_files($where=NULL,$order=NULL,$limit=NULL,$offset=NULL){
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get("file",$limit,$offset);
        if( $query->num_rows()>0 ){
            $r = $query->custom_result_object("File");
            return $r;
        }else{
            return NULL;
        }
    }
    

}