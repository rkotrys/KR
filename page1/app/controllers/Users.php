<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public $user;
	public $editor = FALSE;

	/**
	 * Index Page for this controller.
	 *
	 */
	public function __construct()
	{	
		parent::__construct();
		if( $this->session->language == NULL ) 
		{
			$this->session->set_userdata('language',conf('language'));    
		}	
		$this->lang->load('base', $this->session->language );
		$this->input->set_cookie('uri', $this->uri->uri_string(), 60*60*24 );
		$this->load->database();
		$this->user=$this->users->get_user($this->session->user);
		if( !isset($this->user["userid"]) or $this->user["level"]<LEVEL_STAFF ) redirect("/logout");

    }
    
    public function index($name = 'guest')
	{

        $data['msg'] = $this->uri->segment(1,'NO data ')." -> ".$this->uri->segment(2,'NO data ')." -> ".$this->uri->segment(3,'NO data ');
		$page['title']= "<span class=\"fa fa-user\"></span> ".lang('Users');
		$data['page'] = $page;
		$this->load->view('login/head');
		
		$this->load->view('login/nav');
		$this->load->view('login/header', $data);
		$this->load->view('login/footer');

    }
    

    public function list($name = 'guest')
	{
		$users = $this->users->get_users();
		$data['msg'] = $this->uri->segment(1,'NO data ')." -> ".$this->uri->segment(2,'NO data ')." -> ".$this->uri->segment(3,'NO data ');
		$page['title']= "<span class=\"fa fa-user\"></span> ".lang('Users');
		$data['page'] = $page;
		$data['users'] = $users;
		$this->load->view('user/head');
		
		$this->load->view('user/nav');
		$this->load->view('user/header', $data);
		$this->load->view('user/userlist', $data); 

		$this->load->view('user/footer');
	
    }
	
	public function user(){
		$data["user"] = $this->user;
		$page['title'] = "<span class=\"fa fa-user\"></span> ".lang("Users_content_manager");
		$data["page"] = $page;
		
		$data["pages"] = $this->page_list();
		$data["menu"] = $this->service->get_usermenu();
		$data["files"] = "";
		
		$this->load->view('user/head');
		$this->load->view('user/nav', $data);
		$this->load->view('user/header', $data);
		$this->load->view('user/home', $data); 
		$this->load->view('user/footer');
	}

	public function page_edit($pid=NULL){
		// security
		$user=$this->user;
		$this->editor = TRUE;
		if( !isset($user["userid"]) ) redirect("/logout");
		$p = ($pid)?$this->service->get_page($pid):(new Page);
		if( ($p->userid > 0) and ($p->userid != $user["userid"]) ){
		   if( $p->edr<$user["level"] or $user["level"]<LEVEL_ADMIN){
				//redirect("/logout");
		   }
		}
		if( $p->userid<1 ) $p->userid=$user["userid"];  

		//$p->content=print_r($p,true);
		if( isset($_POST["content"]) and $_POST["content"]!="" and $_POST["title"]!=""  ){
			foreach( $p as $k=>$v) if( isset($_POST[$k]) ) $p->$k=$this->input->post($k); 
			if( is_numeric($p->pid) ) $this->service->update_page($p);
			else {
				$p->pid = $this->service->insert_page($p);
				redirect( conf('base_url').conf("base_url_path")."/users/page_edit/".$p->pid );
			}
		}
		$data["user"] = $user;
		$page['title'] = lang("Edit_page").": ".(isset($p->pid)?"$p->pid":lang("New_page"));
		$data["page"] = $page;
        $data['p'] = $p;
		$this->load->view('user/head');
		$this->load->view('user/nav', $data);
		$this->load->view('user/header', $data);
		$this->load->view('user/page_edit', $data); 
		$this->load->view('user/footer');

	}

	public function front($uname="guset"){

		$data["user"] = $this->user;
		$page['title'] = lang("Front_menager");
		$data["page"] = $page;

		$this->load->view('user/head');
		$this->load->view('user/nav', $data);
		$this->load->view('user/header', $data);
		//$this->load->view('user/page_edit', $data); 
		$this->load->view('user/footer');
	}

	public function files($uname="guest"){
		if( $this->input->post("fid")>0 ){
			// update
			if( is_object($file=$this->service->get_file($this->input->post("fid")))){
		    	if( isset($_FILES['userfile']) and is_uploaded_file( $_FILES['userfile']['tmp_name'] ) ){
					$uploadfile = ".".$file->path;		
                    if( is_file($uploadfile) ) unlink($uploadfile);
					move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
				}
				$file->alias = $this->input->post("alias");
				$file->acr = $this->input->post("acr");
				$file->edr = $this->input->post("edr");
				$file->status = $this->input->post("status");
				$file->ackey = $this->input->post("ackey");
				$this->service->update_file($file);
				redirect(conf('base_url').conf("base_url_path")."files/".$this->user["uname"]);
			}
		}else{
			// new file
			if( isset($_FILES['userfile']) and is_uploaded_file( $_FILES['userfile']['tmp_name'] ) ){
				$uploaddir = "/doc/".$this->user["userid"]."/files/";
				$fname = basename($_FILES['userfile']['name']);
				$uploadfile = "." . $uploaddir . $fname;
				if(is_file($uploadfile)) {
					$path = pathinfo($fname);
					$fname = $path["filename"].date("-YmdHis").".".$path["extension"];
					$uploadfile = "." . $uploaddir . $fname;
				}	
  			    $file = new File;
			    $file->name = $fname;
				$file->alias = $this->input->post("alias");
				$file->path = $uploaddir . $fname;
				$file->userid = $this->user["userid"];
				$file->acr = $this->input->post("acr");
				$file->edr = $this->input->post("edr");
				$file->status = $this->input->post("status");
				$file->ackey = $this->input->post("ackey");
				if( !move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile) ){
					$error = lang("File_upload_error");
				}else{
					$this->service->insert_file($file);
					redirect(conf('base_url').conf("base_url_path")."files/".$this->user["uname"]);
				}
		  	}
		}  
		$data["user"] = $this->user;
		$page['title'] = "<span class=\"fa fa-file\"></span> ".lang("File_manager");
		$data["page"] = $page;
		$data["files"] = $this->file_list();
		$data["error"] = (isset($error))?$error:"";
		$this->load->view('user/head');
		$this->load->view('user/nav', $data);
		$this->load->view('user/header', $data);
		$this->load->view('user/files', $data); 
		$this->load->view('user/footer');
	}

	public function imgupload(){
		 
		$imageFolder = "doc/".$this->user["userid"]."/images/";
		reset ($_FILES);
  		$temp = current($_FILES);
  		if (is_uploaded_file($temp['tmp_name'])){
    		// Sanitize input
   			if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        		header("HTTP/1.1 400 Invalid file name.");
        		return;
    		}
    		// Verify extension
    		if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        		header("HTTP/1.1 400 Invalid extension.");
        		return;
    		}
    		// Accept upload if there was no origin, or if it is an accepted origin
    		$filetowrite = $imageFolder . $temp['name'];
    		move_uploaded_file($temp['tmp_name'], $filetowrite);

    		// Respond to the successful upload with JSON.
    		// Use a location key to specify the path to the saved image resource.
    		// { location : '/your/uploaded/image/file'}
    		echo json_encode(array('location' => "/".$filetowrite));
  		} else {
    		// Notify editor that the upload failed
    		header("HTTP/1.1 500 Server Error");
  		}		
	}

    public function menu_insert($mid=NULL){

		$mid=($this->input->post("menu_mid")>0)?$this->input->post("menu_mid"):NULL;
		if($mid!==NULL) {
			$m = $m_old = $this->service->get_menu($mid);
			$this->service->delete_menuitem($m->mid);
		}else{
			$m = new Menu;
		}	
		$m->userid=$this->user["userid"];
		$m->lang=$this->session->language;
		$m->acr=$this->input->post("menu_acr");
		$m->edr=$this->input->post("menu_edr");
		$m->status=$this->input->post("menu_status");
		$m->text=$this->input->post("menu_text");
		if( $this->input->post("menu_type_link")==TYPE_LINK ){
			$m->type=TYPE_LINK;
			$m->link=$this->input->post("menu_link");
		}
		if( $this->input->post("menu_type_page")==TYPE_PAGE ){
			$m->type=TYPE_PAGE;
			$m->pid=$this->input->post("menu_pid");
		}
		$par=explode( ":",$this->input->post("menu_parent") );
		$m->parent=$par[0];
		$m->position=$par[1];
		$m->level=$par[2];
		if( $level0 = $this->service->get_smb(0) ){
			if( $m->parent==-1 and $m->position==-1 ){
				$m->position = count($level0);
				$m->level = 0;
				$m->parent = 0;
			}else{
				//$m->position += 1;	
				$menu = $this->service->get_smb($m->level, $m->parent);
				if( $menu!==NULL ){
					$p=0;
					foreach($menu as $mu){
						if( $m->position==$p) $p++;
						$mu->position=$p;
						$this->service->update_menu($mu);
						$p++;
					}
				}
			}
		}else{
			$m->parent=0;
			$m->position=0;
			$m->level=0;
		}
        // insert
		$this->service->insert_menu($m);

		//echo "<pre><code>".print_r($m,true)."</code></pre>";
		redirect(conf('base_url').conf("base_url_path")."pages/".$this->user["uname"]);
	}


	public function page_list($singleuser=true){
		$where=" `lang`='".$this->session->language."' ";
		if( $singleuser or ($this->user["level"]<LEVEL_ADMIN) ) $where .= "AND `userid`='".$this->user["userid"]."' "; 
		$order = " pid DESC ";
		$pages = $this->service->get_pages( $where, $order );
        return $pages;
	}

	public function file_list($where=NULL, $order=NULL, $limit=NULL, $offset=NULL, $singleuser=true){
		if( $singleuser or ($this->user["level"]<LEVEL_ADMIN) ) $whr = " `userid`='".$this->user["userid"]."' "; 
		if( $where!=NULL ) $whr .= " AND ".$where;
		if( $order==NULL ) $order = " name ASC ";
		$files = $this->service->get_files( $whr, $order, $limit, $offset );
        return $files;
	}


/*-------------------- INSTALL CODE -----------------------*/	
// TD
	public function resetdb( $dbfile="" ){

		if( is_file("db/".$dbfile) ){
		   $query = file_get_contents( "db/".$dbfile );
		   echo "<p>OK! dbfile '"."db/".$dbfile."' is found.</p>\n";
		}else{
			echo "<p>ERROR! dbfile '"."db/".$dbfile."' is NOT found.</p>\n";
            exit;
		}   
		$r = $this->db->query( $query );
		$error = $this->db->error();
        echo print_r($error);
/*		if( $error['code'] ){
			echo "<p>OK! query success.</p>\n";
		}else{
			echo "<p>ERROR! query fail.</p>\n";
		}
*/ 
	}


}