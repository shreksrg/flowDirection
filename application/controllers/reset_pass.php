<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * 网站一级栏目入口
 * @author floy
 *
 */
class Reset_pass extends CI_Controller {
	var $email_array = array();
	function __construct()
	{
		parent::__construct();
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$this->email_array = $this->config->item( 'email' );
	}

	/**
	 * 网站首页入口
	 */
	function index()
	{
		
		$this->parser->parse( 'mp_reset_pass.tpl' );
	}
	
	/**
	 * 实现快速注册
	 * 
	 */
	function set()
	{
		$email = $this->input->post( 'email' );
		if ( $email != '' ) 
		{
			$pattern = "/[_a-zA-Z\d\-\.]+@[_a-zA-Z\d\-]+(\.[_a-zA-Z\d\-]+)+$/i";
	        if( !preg_match( $pattern, $email ) ) {
	            return showmessage( '请输入正确的邮箱地址', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
				//echo json_encode( array( 'rtn'=>0 ) );
	        }
	        else 
	        {
				$this->load->model( 'member/members_model', '', TRUE ); 
				$userinfo = $this->members_model->get_member_condition( array( 'email'=>$email ) );
				if ( !empty( $userinfo ) ) 
				{
					$this->load->library( 'email' );
					$chars = md5( $email.($userinfo['userid']+2012) ).($userinfo['userid']+2012);
					$message = "点击以下链接，确定重置密码，如果链接不能正常点击，您也可以直接复制链接到浏览器访问重置密码<br /><a href='http://www.paliie.com/index.php/reset_pass/reset/{$chars}'>http://www.paliie.com/index.php/reset_pass/reset/{$chars}</a>";
					$config['protocol'] = $this->email_array['protocol'];//邮件发送协议mail, sendmail, or smtp
			        $config['smtp_host'] = $this->email_array['smtp_host'];
			        $config['smtp_user'] = $this->email_array['smtp_user'];
			        $config['smtp_pass'] = $this->email_array['smtp_pass'];
			        $config['smtp_port'] = $this->email_array['smtp_port'];
			        //$config['smtp_timeout'] = 5;
			        $config['mailtype'] = $this->email_array['mailtype'];
		            $config['charset'] = $this->email_array['charset'];
		            $config['wordwrap'] = $this->email_array['wordwrap'];
		            $config['validate'] = $this->email_array['validate'];
					
		            $this->email->initialize( $config );
		            
		            $this->email->from( $this->email_array['smtp_user'], '天马流星锤' );
		        	$this->email->to( $email );
		        	$this->email->subject( '密码重置' );
		        	$this->email->message( $message );
		        	if( $this->email->send() )
		        	{
		        		//echo json_encode( array( 'rtn'=>1 ) );
		        		return showmessage( '请登录邮箱点击链接重置新密码', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
		        	}
		        	else 
		        	{
		        		/*$data['message'] = "邮件发送失败";
		        		echo $this->email->print_debugger();
	        			exit;*/
		        		//echo json_encode( array( 'rtn'=>0 ) );
		        		//echo $this->email->print_debugger();
		        		return showmessage( '邮件发送失败', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
		        	}
				}
				else 
				{
					//echo json_encode( array( 'rtn'=>0 ) );
					return showmessage( '请输入邮箱地址', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
				}
			}
		}
		else 
		{
			//echo json_encode( array( 'rtn'=>0 ) );
			return showmessage( '请输入邮箱地址', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
		}
	}
	
	/**
	 * 根据区域来抓取会员信息列表
	 * ajax 操作
	 */
	function reset()
	{
		$code = $this->uri->segment(3);
		if( $code != '' )
		{
			$this->load->model( 'member/members_model', '', TRUE ); 
			$replace = cut_str( $code, 32, 0, 'UTF-8', 0 );
			$chars = str_replace( $replace, "", $code );
			$uid = $chars-2012;
			
			$userinfo = $this->members_model->get_member_condition( array( 'userid'=>$uid ) );
			if( !empty( $userinfo ) )
			{
				if( md5( $userinfo['email'].$chars ) != $replace )
				{
					return showmessage( '您无权进行此操作', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
				}
				else 
				{
					$rand_num = rand( 0, 9 );
					$this->members_model->password = $chars.$rand_num;
					$result = $this->members_model->update_password( $uid );
					
					if( $result )
					{
						$this->load->library( 'email' );
						$message = "您好，您的新密码为".$chars.$rand_num.",请妥善保管好您的账户信息";
						$config['protocol'] = $this->email_array['protocol'];//邮件发送协议mail, sendmail, or smtp
						$config['smtp_host'] = $this->email_array['smtp_host'];
						$config['smtp_user'] = $this->email_array['smtp_user'];
						$config['smtp_pass'] = $this->email_array['smtp_pass'];
						$config['smtp_port'] = $this->email_array['smtp_port'];
						//$config['smtp_timeout'] = 5;
						$config['mailtype'] = $this->email_array['mailtype'];
					    $config['charset'] = $this->email_array['charset'];
					    $config['wordwrap'] = $this->email_array['wordwrap'];
					    $config['validate'] = $this->email_array['validate'];
								
					    $this->email->initialize( $config );
					            
					    $this->email->from( $this->email_array['smtp_user'], '天马流星锤' );
					    $this->email->to( $userinfo['email'] );
					    $this->email->subject( '新密码生成' );
					    $this->email->message( $message );
					    if( $this->email->send() )
					    {
					        return showmessage( '新密码已经成功发送到您的邮箱，请登录邮箱查看密码信息', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
					    }
					    else 
					    {
					        echo $this->email->print_debugger();
				        	exit;
					    }
					}
					else 
					{
						return showmessage( '重置密码失败', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
					}
				}
			}
			else 
			{
				return showmessage( '您无权进行此操作', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
			}
		}
		else 
		{
			return showmessage( '您无权进行此操作', $url_forward = '/index.php/reset_pass/index', $ms = 1250 );
		}
	}
	
	function tipConfirm()
	{
		$this->parser->parse( 'mp_tipConfirm.tpl' );
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */