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
    
    public function index()
	{
		$page['title']= "<span class=\"fa fa-users\"></span> ".lang('Staff');
		$data['page'] = $page;
		$data['stafflist'] = $this->users->get_stafflist();

        $this->load->view('pub/head');
		$this->load->view('pub/nav', $data);
		$this->load->view('pub/header', $data);
		$this->load->view('pub/stafflist', $data);
		$this->load->view('pub/footer');
    }





}