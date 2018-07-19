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
        $this->lang = isset($_SESSION["language"])?$_SESSION["language"]:"polish";
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

class Menu {
    public $mid = NULL;
    public $lang = "";
    public $userid = 0;
    public $parent = 0;
    public $position = 0;
    public $acr = LEVEL_GUEST;
    public $edr = LEVEL_OWNER;
    public $status = STATUS_PUBLIC;
    public $pid = 0;
    public $type = TYPE_PAGE;
    public $text = "menu item";
    public $link = "";

    public function __construct()
    {
        $this->lang = isset($_SESSION["language"])?$_SESSION["language"]:"polish";
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

    public function get_pageselect($where=NULL,$order=NULL,$limit=NULL,$offset=NULL){
        $this->db->select("pid, title");
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get("page",$limit,$offset);
        if( $query->num_rows()>0 ){
            $r = $query->custom_result_object("Page");
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

    
// ------ MENU ------ //
public function insert_menu($menu){
    if( $this->db->insert("menu", $menu) )
       return $this->db->insert_id();
    else
       return FALSE;   
}

public function update_menu( $menu ){
    $this->db->where('mid', $menu->mid);
    $query = $this->db->update("menu",$menu);
}

public function delete_menu($mid){
    $this->db->where("mid",$mid);
    return $this->db->delete("menu");
}

public function get_menu($mid){
    $query = $this->db->where("mid",$mid)->get('menu');
    if( $query->num_rows()==1 ){
        $p = $query->custom_row_object(0,"Menu");
        return $p;
    }else{
        return NULL;
    }
}

public function get_menu_pid($pid,$userid=NULL){
    if($userid==NULL) $userid=$this->user["userid"];
    $query = $this->db->where("pid",$pid)->where("userid",$userid)->get('menu');
    if( $query->num_rows()==1 ){
        $p = $query->custom_row_object(0,"Menu");
        return $p;
    }else{
        return NULL;
    }
}

public function get_menus($where=NULL,$order=NULL,$limit=NULL,$offset=NULL){
    $this->db->where($where);
    $this->db->order_by($order);
    $query = $this->db->get("menu",$limit,$offset);
    if( $query->num_rows()>0 ){
        $r = $query->custom_result_object("Menu");
        return $r;
    }else{
        return NULL;
    }
}

public function get_usermenu($level=0, $parent=NULL, $menu=array() ){
    if( $m0 = $this->get_smb( $level, $parent ) ){
        $submenu=array();
        foreach($m0 as $m ){
            $submenu[] = $m;
            if( $sm = $this->get_usermenu( $level+1, $m->mid, $menu ) ){
                $submenu = array_merge($submenu,$sm);
            }
        }
        return array_merge($menu,$submenu);
    }else{
        return NULL;
    }
}
public function get_smb($level,$parent=NULL,$position=0){
    $userid=$this->user["userid"];
    if( $parent!=NULL ) $whereparent = " and parent='$parent' "; else $whereparent = "";
    $query = $this->db->where(" userid='$userid' and lang='".$this->session->language."' and level='$level' and position>='$position' $whereparent")->order_by(" position ASC  ")->get('menu');
    if( $query->num_rows()>0 ){
        $r = $query->custom_result_object("Menu");
        return $r;
    }else{
        return NULL;
    }
}


}