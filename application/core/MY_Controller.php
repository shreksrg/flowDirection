<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 
 * 扩展核心控制器
 * @author floy
 *
 */
Class MY_controller extends CI_Controller{
	public $G;
	function __construct()
	{
        parent::__construct();
        
        $this->_init();
	}
	
	private function _init()
	{
		$this->G['user_id'] = $this->session->userdata('user_id');
		if($this->G['user_id']){
			$this->load->model('member/members_model','member');
			$this->G['user'] = $this->member->get_member($this->G['user_id']);
		}
	}
}
