<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pub extends CI_Controller {
	public $user;

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

		if( $this->session->user ){
			$this->user = $this->users->get_user( $this->session->user );
		}else{
			$this->user=$this->users->get_user_by_uname( "guest" );
			$this->session->set_userdata('user',$this->user["userid"]);
		}
    }
    
    public function index($name=NULL,$pid=NULL)
	{
		$page['title']= ""; // "<span class=\"fa fa-users\"></span> ".lang('Staff');
		$data['stafflist'] = $this->users->get_stafflist();

		if($name!=NULL){
			$r=explode("-",$name);
			$surname = (isset($r[0])?$r[0]:NULL);
			$name = (isset($r[1])?$r[1]:NULL);
			if( $name!="" ) $u=$this->users->get_user_by_surname($surname,$name);
			else $u=$this->users->get_user_by_surname($surname);
			if( $u ){
				// user page
				$menu = $this->service->get_usermenu($u["userid"]);
				$page['title']=lang("User_biography");
				$page["content"]=$u['resume'];

				$p=false;
				if( $pid != NULL ){
					$pida = explode("-",$pid);
					if( isset($pida[1]) and $pida[1]>0 ){ 
						if( $p = $this->service->get_page($pida[1]) ){
							$page['title']=$p->title;
							$page["content"]=$p->content;
						}
					}else{
						foreach( $menu as $m ){
							$rchar = array(" ", "?", "'", "`", "\n", "\t", "^", "-");
							$mitem = strtolower(str_replace($rchar,"_",$m->text));
							if( ($pida[0]==$mitem) and ($p = $this->service->get_page($m->pid)) ){
								$page['title']=$p->title;
								$page["content"]=$p->content;
								break;
							}
						}
					}
				}

				$data["menu"] = $menu;
				$data["page"]=$page;
				$data["u"]=$u;
				$this->load->view('pub/head');
				$this->load->view('pub/nav', $data);
				//$this->load->view('pub/header', $data);
				if($p) $this->load->view('pub/userpage', $data);
				else $this->load->view('pub/user_biography', $data);
				$this->load->view('pub/footer');
				return;
			}
		}
		// users list
		$data["page"]=$page;
		$this->load->view('pub/head');
		$this->load->view('pub/nav', $data);
		$this->load->view('pub/header', $data);
		$this->load->view('pub/stafflist', $data);
		$this->load->view('pub/footer');
    }





}