<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员登录
* @category login
* @author taylorchen
* @version v1.0 $date 2011-11-17 14:02:20
* 
*/
class Login extends CI_Controller {
	/**
	 * 构造函数
	 * 
	 */
	public function Login() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		if( $this->user_id != '' )
		{
			/*echo "<script language='javascript'>alert('您已经登陆!');
			location.href='/index.php/member/index/index';</script>";
			die;*/
			return showmessage( '您已经登陆', $url_forward = '/index.php/member/index/index', $ms = 1250 );
		}
	}
	
	/**
	 * 页面显示
	 * 
	 */
	public function index()
	{
		
		$this->parser->parse( 'member/mp_login.tpl' );
	}
	
	/**
	 * 检测会员登录信息
	 * 
	 */
	public function check_member() 
	{
		$username = $this->input->post( 'username' );
		$password = $this->input->post( 'password' );	
		
		if( $username == '' or $password == '' )
		{
			return showmessage( '请填写用户名和密码', $url_forward = '/index.php', $ms = 1250 );
		} 
		
		$this->load->model( 'member/members_model', '', TRUE );   
		$this->load->model( 'member/members_profile_model', '', TRUE );          
        $this->members_model->username  = $username ;
		$this->members_model->password = $password;
		
		$member = $this->members_model->check_member();
		if( $member )
		{
			$this->members_model->update_last_login_time( $member['userid'] );
			$this->members_model->update_last_login_ip( $member['userid'], $this->get_ip() );
			
			
			$this->load->model( 'member/members_email_model', '', TRUE ); 
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			
			$this->members_email_model->userid = $member['userid'];
			
			$avatar_img = "/data/avatar/".get_avatar( $member['userid'], 'big' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			
			if( file_exists( '.'.$avatar_img ) )
			{
				$avatar_img = $avatar_img;
				$datas['isavatar'] = 1;
				$this->members_profile_model->update( $member['userid'], $datas );
			}
			else 
			{
				$avatar_img = '/static/images/avatar/noavatar_big.gif';
			}
			
			
			$member['commen_info']['username'] = $member['username'];
			$member['commen_info']['userid'] = $member['userid'];
			$member['commen_info']['avatar_img'] = $avatar_img;
			$member['commen_info']['all_email_num'] = $this->members_email_model->get_email_num();
			$member['commen_info']['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
			$member['commen_info']['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$member['userid']} and STATUS=1)" );
			
			$member_info = array(
				   'user_name'  => $member['username'],
				   'user_id'  => $member['userid'],
				   'user_in' => TRUE,
				   'user_last_login' => $member['lastlogintime'],
				   'user_commen_info' => $member['commen_info']
			   );
			$this->session->set_userdata( $member_info );
			header( "Location:/index.php/member/index/index" );
			//return showmessage( '登陆成功', $url_forward = '/index.php/member/index/index', $ms = 1250 );

		}
		else
		{
			return showmessage( '用户名和密码错误', $url_forward = '/index.php', $ms = 1250 );
		}	
	}
	
	/**
	 * 快速登录
	 * ajax 操作
	 * 
	 */
	function set_login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if( $username == '' or $password == '' )
		{
			echo json_encode( array('rtn'=>0) );
		} 
		
		$this->load->model( 'member/members_model', '', TRUE );   
		$this->load->model( 'member/members_profile_model', '', TRUE );               
        $this->members_model->username  = $username ;
		$this->members_model->password = $password;
		
		$member = $this->members_model->check_member();
		if( $member )
		{
			$this->members_model->update_last_login_time( $member['userid'] );
			$this->members_model->update_last_login_ip( $member['userid'], $this->get_ip() );
			
			$this->load->model( 'member/members_email_model', '', TRUE ); 
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$this->members_email_model->userid = $member['userid'];
			
			$avatar_img = "/data/avatar/".get_avatar( $member['userid'], 'big' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			
			if( file_exists( '.'.$avatar_img ) )
			{
				$avatar_img = $avatar_img;
				$datas['isavatar'] = 1;
				$this->members_profile_model->update( $member['userid'], $datas );
			}
			else 
			{
				$avatar_img = '/static/images/avatar/noavatar_big.gif';
			}
			
			$member['commen_info']['username'] = $member['username'];
			$member['commen_info']['userid'] = $member['userid'];
			$member['commen_info']['avatar_img'] = $avatar_img;
			$member['commen_info']['all_email_num'] = $this->members_email_model->get_email_num();
			$member['commen_info']['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
			$member['commen_info']['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$member['userid']} and STATUS=1)" );
			
			$member_info = array(
				   'user_name'  => $member['username'],
				   'user_id'  => $member['userid'],
				   'user_in' => TRUE,
				   'user_last_login' => $member['lastlogintime'],
				   'user_commen_info' => $member['commen_info']
			   );
			
			$this->session->set_userdata( $member_info );
			echo json_encode( array('rtn'=>1) );
		}	
		else 
		{
			echo json_encode( array('rtn'=>0) );
		}
	}
	
	/**
	 * 获取登录IP地址
	 * @param null
	 * @return char
	 * 
	 */
	public function get_ip()
	{
		$this->load->helper( 'member' );
		return getIP();
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */