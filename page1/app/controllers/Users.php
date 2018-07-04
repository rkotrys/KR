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
		$this->load->view('login/page', $data); 

		$this->load->view('login/footer');
	
    }
    

}