<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员登录
* @category login
* @author taylorchen
* @version v1.0 $date 2011-11-17 14:02:20
* 
*/
class Login_out extends CI_Controller {
	/**
	 * 构造函数
	 * 
	 */
	public function Login_out() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
	}
	
	
	/**
	 * 用户退出 注销
	 * 
	 * 
	 */
	public function index()
	{
		$this->session->sess_destroy();
		return showmessage( '退出成功', $url_forward = '/index.php/', $ms = 1250 );
	}
}

/* End of file login_out.php */
/* Location: ./application/controllers/login_out.php */