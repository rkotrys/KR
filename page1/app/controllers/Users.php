<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$this->load->view('login/head');
		
		$this->load->view('login/nav');
		$this->load->view('login/header', $data);
		$this->load->view('login/userlist', $data); 

		$this->load->view('login/footer');
	
    }
	
	public function user(){
		$userid=$this->session->user;
		$user=$this->users->get_user($userid);
		if( !isset($user["userid"]) ) redirect("/logout");
		$data["user"] = $user;
		$page['title'] = "<span class=\"fa fa-user\"></span> ".$user["name"]." ".$user["surname"].", ".$user["title"];
		$data["page"] = $page;
		
		$data["pages"] = "";
		$data["menu"] = "";
		$data["files"] = "";
		
		$this->load->view('user/head');
		$this->load->view('user/nav', $data);
		$this->load->view('user/header', $data);
		$this->load->view('user/home', $data); 
		$this->load->view('user/footer');
		
	}

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