<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员登陆密码修改
* @category set_password
* @author taylorchen
* @version v1.0 $date 2011-11-23 20:02:20
* 
*/
class Set_password extends CI_Controller {
	var $user_id;
	var $data = array();
	
	/**
	 * 构造函数
	 * 
	 */
	public function Set_password() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
        
        $this->load->model( 'member/members_email_model', '', TRUE ); 
		$this->load->model( 'friend/friend_model', '', TRUE ); 
		$this->members_email_model->userid = $this->user_id;
		
		$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'small' );
		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
		$this->data['commen_info']['username'] = $this->user_name;
		$this->data['commen_info']['userid'] = $this->user_id;
		$this->data['commen_info']['avatar_img'] = $avatar_img;
		$this->data['commen_info']['all_email_num'] = $this->members_email_model->get_email_num();
		$this->data['commen_info']['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
		$this->data['commen_info']['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$this->user_id} and STATUS=1)" );
		
		$friends_attention_list = array();
		$friends_attention_list = $this->friend_model->get_friends_attention_list( $this->user_id );
		foreach ( $friends_attention_list as $kt=>$vt )
		{
			$avatar_img_s = '';
			$avatar_img_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'big' );
			$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
			$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s;
		}
		$this->data['commen_info']['friend_attention_list'] = $friends_attention_list;
	}
	
	/**
	 * 密码修改页面
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$data['member_id'] = $this->user_id;
		$this->parser->parse( 'member/mp_set_password.tpl', $data );
	}
	
	/**
	 * 设置个人登陆密码
	 * 
	 */
	public function update_password() 
	{	
		$id = $this->input->post( 'member_id' );
		if( !$id ) {
			exit;
		}
		
		$old_pass = $this->input->post( 'old_pass' );
		$new_pass = $this->input->post( 'new_pass' );
		$r_new_pass = $this->input->post( 'r_new_pass' );
		
		//加载表单认证类  后期制作
		
		if( $new_pass !== $r_new_pass )
		{
			return showmessage( '两次密码输入不正确', $url_forward = '/index.php/member/set_password/index', $ms = 1250 );
		}
		
		$this->load->model( 'member/members_model', '', TRUE );    
		$members_info = $this->members_model->get_member( $id );
		if( $members_info['PASSWORD'] !== md5( $old_pass ) )
		{
			/*echo "<script language='javascript'>alert('旧密码输入不正确!');
			location.href='/index.php/member/set_password/index';</script>";
			die;*/
			return showmessage( '旧密码输入不正确', $url_forward = '/index.php/member/set_password/index', $ms = 1250 );
		}
		
		$this->members_model->password = $new_pass;
		$result = $this->members_model->update_password( $id );
		if( $result )
		{
			/*echo "<script language='javascript'>alert('更改密碼成功!');
			location.href='/index.php/member/set_password/index';</script>";
			die;*/
			return showmessage( '更改密码成功', $url_forward = '/index.php/member/set_password/index', $ms = 1250 );
		} 
		else 
		{
			/*
			echo "<script language='javascript'>alert('更改密碼失败!');
			location.href='/index.php/member/set_password/index';</script>";
			die;*/
			
			return showmessage( '更改密码失败', $url_forward = '/index.php/member/set_password/index', $ms = 1250 );
		}
	}
}

/* End of file set_password.php */
/* Location: ./application/controllers/set_password.php */