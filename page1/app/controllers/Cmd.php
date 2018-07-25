<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmd extends CI_Controller {

	/**
	 * Constructor
	 *
	 */
	public function __construct()
	{	
		parent::__construct();
		if( $this->session->language == NULL ) 
			$this->session->set_userdata('language',conf('language'));    
		$this->lang->load('base', $this->session->language );
        $this->load->database();
        $this->user=$this->users->get_user($this->session->user);
		//if( !isset($this->user["userid"]) ) redirect("/logout");
    }
    
    public function deleteuser(){
        $userid = $this->input->post("data");
        $this->users->delete($userid);
        $data=array( 'data'=>"User with userid $userid has been deleted.", 'status'=>'OK' );
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( $data, JSON_UNESCAPED_UNICODE) );
    } 
    public function getuser($uid=NULL){  
        $u = $this->users->get_user( $this->input->post("data") );
        if( is_array($u) ){
            $data=array( 'data'=>$u, 'status'=>'OK' );
        }else{
            $data=array( 'data'=>'No user found', 'status'=>'ERROR' );
        }
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( $data, JSON_UNESCAPED_UNICODE) );
    } 
    public function newuser(){
        $u = json_decode($this->input->post("data"),true);
        header("Content-Type: application/json; charset=UTF-8");
        if( $u==NULL ){
            print( json_encode( array( 'data'=>"ERROR! no data", 'status'=>'OK' ), JSON_UNESCAPED_UNICODE) );
            return;
        }
        if( $u['userid']>0){
            $res = $this->users->update($u);
        }else{
            $res = $this->users->insert($u);
        }
        print( json_encode( array( 'data'=>$res, 'status'=>'OK' ), JSON_UNESCAPED_UNICODE) );
    } 
    public function ucheck(){
        $u = $this->users->get_user_by_uname( $this->input->post("uname") );
        if( is_array($u) ){
            //if( $u["password"]==md5( $this->input->post("upass") ) )
            if( $u["pass"]==$this->input->post("upass") ){
                session_regenerate_id();
                $this->session->set_userdata("user",$u["userid"]);
                $data=array( 'data'=>$u['uname'], 'status'=>'OK' );
            }
            else 
                $data=array( 'data'=>'access denied1', 'status'=>'ERROR' );    
        }else{
            $data=array( 'data'=>'access denied2', 'status'=>'ERROR' );
        }
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( $data, JSON_UNESCAPED_UNICODE) );    
    }
    public function deletepage($pid){
        $p=$this->service->get_page($pid);
        if( $p->userid==$this->user["userid"] or $this->user["level"]==LEVEL_ADMIN ){
            $this->service->delete_page($pid);
                echo "OK";
            }else{
                echo "ERROR";
        }
    }

    public function pageselect($pid=""){
       $p = $this->service->get_pageselect("userid='".$this->user["userid"]."' and lang='".$this->session->language."' ", "title ASC");
       $buf = "<select class='form-control' name='menu_pid' >";
       
       foreach($p as $v){
           if( $pid>0 and $v->pid==$pid ) $selected = "selected";
           else $selected = "";
            $buf .= "<option value='".$v->pid."' $selected >".$v->title."</option>";
       }
       $buf .= "</select>";
       echo $buf;
    }
    public function parentselect($mid=NULL){
        $m=$this->service->get_usermenu();
        $buf = "<select class='form-control' name='menu_parent'>";
        $buf .= "<option value='-1:-1:-1'>0</option>";
        $parent=0;
        $position=0;
        if(  $m!=NULL ){
            $menu=array();
            foreach($m as $v) $menu[$v->mid]=$v;
            $level=0;
            foreach($m as $v){ 
                if( $mid!=NULL and $mid==$v->mid) $selected="selected";
                else $selected=""; 
                $pre="";
                for($n=1;$n<=$v->level;$n++){ $pre.="--"; }
                $buf .= "<option $selected value='$v->parent:$v->position:$v->level'>".(($pre!="")?($pre."> "):"").$v->text."</option>";
            }
        }    
        $buf .= "</select>";
        echo $buf;
    }
    public function get_menuitem($mid){
        if( !is_numeric($mid) or $mid<1 ) { echo "ERROR"; exit; }
        $m=$this->service->get_menu($mid);
        if( !is_object($m) ) { echo "ERROR"; exit; }
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( $m, JSON_UNESCAPED_UNICODE) );    
    }
    public function delete_menu($mid){
        if( !is_numeric($mid) or $mid<1 ) { echo "ERROR"; exit; }
        $m=$this->service->get_menu($mid);
        if( is_object($m) and ($this->user["userid"]==$m->userid or $this->user["level"]==LEVEL_ADMIN or $m->edr>=$this->user["level"]) ){
            if( $this->service->delete_menu($mid) ){
                echo "OK";
            }else{
                echo "ERROR";
            }
        }else{
            echo "access denied!";
        }
    }
    public function menu_submenu($mid=NULL,$parent=NULL){
        $crnt = $this->service->get_menu($mid);
        if( $crnt->level<4 ){
            if( $sm = $this->service->get_smb($crnt->level,$crnt->parent,$crnt->position+1) ){
                foreach($sm as $m){
                    $m->position=$m->position-1;
                    $this->service->update_menu($m);
                }
            }
            $crnt->level=$crnt->level+1;
            $crnt->parent=$parent;
            $crnt->position=0;
            $this->service->update_menu($crnt);
            echo "OK";
        }else{
            echo "ERROR";
        }
    }

    // Upload the user photo
    public function phupload($userid=NULL){
        $imageFolder = "doc/".$this->user["userid"]."/images/";
        if( isset($_FILES["photo"]) and is_uploaded_file( $_FILES["photo"]["tmp_name"] )  ){
            $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            if($userid==NULL){
                $phname = $this->user["name"]."_".$this->user["surname"].".".$ext;
            }else{
                $u = $this->users->get_user($userid);
                $phname = $u["name"]."_".$u["surname"].".".$ext;
            }
            move_uploaded_file ( $_FILES["photo"]["tmp_name"], $imageFolder.$phname );  
            $success=true;
        }else $success=false;
        // $output will be converted into JSON
        if ($success) {
	        $output = array("success" => true, "message" => "Success!", "name"=>$imageFolder.$phname );
        } else {
	        $output = array("success" => false, "error" => "Failure!");
        }
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($output);
    }

    public function get_filelist($type="file",$userid=NULL){
        if( $type=='file'){
            $id=(is_numeric($userid)?$userid:$this->user["userid"]);
            $path = "./doc/$id/files";
            $dir = scandir($path);
            $d="";
            foreach($dir as $k=>$v){
                if( is_file($path."/".$v) ) {
                    $d.="<button class='btn fileitem'>$v</button>";
                }
            }
            echo $d;
        }
        if( $type=='image'){
            $id=(is_numeric($userid)?$userid:$this->user["userid"]);
            $path = "./doc/$id/images";
            $dir = scandir($path);
            $d="";
            foreach($dir as $k=>$v){
                if( is_file($path."/".$v) ) {
                    $p="/doc/$id/images/$v";
                    $d.="<img class='filelistimg' alt='$v' title='$v' src='$p' >";
                }
            }
            echo $d;
        }

    }
    public function get_file($fid=NULL){
        if(!is_object($f = $this->service->get_file($fid))) return;
        if( $f->userid!=$this->user['userid'] and $this->user['level']<$f->edr) return;
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( $f, JSON_UNESCAPED_UNICODE) );
    }
    public function delete_file($fid=NULL){
        $access=true;
        $f = $this->service->get_file($fid);
        if(!isset($f->userid)) $access=false;
        elseif( $f->userid!=$this->user['userid'] and $this->user['level']<$f->edr) $access=false;
        if($access){
           $data = array( 'result'=>$this->service->delete_file($fid), 'status'=>"OK" );
        }else{
            $data = array( 'result'=>"Forbiden", 'status'=>"ERROR" );
        }
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( $data, JSON_UNESCAPED_UNICODE) );
    }

    public function index(){
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( array( 'data'=>"Error! no data.", 'status'=>'ERROR' ), JSON_UNESCAPED_UNICODE) );
    }

}
