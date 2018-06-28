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
		$this->input->set_cookie('uri', $this->uri->uri_string(), 60*60*24 );
		$this->load->database();
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
    public function index(){
        header("Content-Type: application/json; charset=UTF-8");
        print( json_encode( array( 'data'=>"Error! no data.", 'status'=>'ERROR' ), JSON_UNESCAPED_UNICODE) );
    }

}
