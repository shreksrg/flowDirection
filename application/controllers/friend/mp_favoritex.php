<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 关注好友-控制器文件
 * 
 */
class Mp_favoritex extends CI_Controller {
	var $data = array();
	var $user_id;
	var $user_name;
	var $state = false;
	
    public function __construct()
    {	
    	parent::__construct();  
		$this->validstate = false;
        $this->data['years'] = date('Y',time());    
        $this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model( 'friend/friend_model', '', TRUE ); 
		$this->load->model('common/m_common','validater',TRUE);
    } 
   
    
    public function addonAttention($friendId)
    {
		if(!$this->validater->chkloginAndPopUp()){
			return;
		}
		
		
		$this->friend_model->user_id = $this->user_id;
		
    	$this->load->model( 'member/members_model', '', TRUE ); 
       // $friendId = intval( $this->uri->segment(4) );
        $member_info = $this->members_model->get_member( $friendId );
        $friendName = $member_info['username'];
        $data['message'] = $friendName;
        $result = $this->friend_model->attention_deal( $this->user_id, $friendId, $friendName );
        if ( !$friendId ) 
        {
        	$data['message'] = "先选择加为关注的好友";
        }
        else 
        { 
	        if ( !$this->user_id ) {
	        	$data['message'] = "请先登录网站";
	        }
	        else 
	        {
		        if ( $result ) {
		        	$data['message'] = "加入关注成功";
		        }
		        else 
		        {
		        	$data['message'] = "已经加为好友关注";
		        }
	        }
        }
        $this->parser->parse( 'common/mp_message.tpl', $data );
    }
	
	
	    public function addonfavorite($friendId)
    	{
			
			if(!$this->validater->chkloginAndPopUp()){
				return;
			}
    	$this->load->model( 'member/members_model', '', TRUE ); 
       // $friendId = intval( $this->uri->segment(4) );
        $member_info = $this->members_model->get_member( $friendId );
        $friendName = $member_info['username'];
        $data['message'] = $friendName;
        
        if ( !$friendId ) 
        {
        	$data['message'] = "先选择加为关注的好友";
        }
        else 
        { 
	        if ( !$this->user_id ) {
	        	$data['message'] = "请先登录网站";
	        }
	        else 
	        {
	        	if( $this->user_id == $friendId )
	        	{
	        		$data['message'] = "您不能关注自己";
	        	}
	        	else 
	        	{
	        		$result = $this->friend_model->attention_deal( $this->user_id, $friendId, $friendName );
			        if ( $result ) {
			        	$data['message'] = "加入关注成功";
			        }
			        else 
			        {
			        	$data['message'] = "已经加为好友";
			        }
	        	}
	        }
        }
        
        $this->parser->parse( 'common/mp_message.tpl', $data );
    }
  

}    




