<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function index()
	{
		$this->load->view('front/head');
		$this->load->view('front/header');
		$this->load->view('front/home');
		$this->load->view('front/about');
		$this->load->view('front/labs');
		$this->load->view('front/achievements');
		$this->load->view('front/clients');
		$this->load->view('front/didactics');
		$this->load->view('front/contact');
		$this->load->view('front/preloader');
		$this->load->view('front/footer');
	}

	public function lang(){
		if( $this->uri->total_segments()>2){
			if( $this->uri->segment($this->uri->total_segments()-1,'NO data')=='language'){
				if( $this->uri->segment($this->uri->total_segments(),'NO data')=='english')
					$this->session->set_userdata('language','english');
				if( $this->uri->segment($this->uri->total_segments(),'NO data')=='polish')
					$this->session->set_userdata('language','polish');
			}
		}
		redirect(conf('base_url').conf("base_url_path").$this->input->cookie('uri'));
	}

	public function users($name = 'guest')
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
