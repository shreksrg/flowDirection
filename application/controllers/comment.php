<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * 网站一级栏目入口
 * @author floy
 *
 */
class Comment extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 网站首页入口
	 */
	function index()
	{
		$this->load->model( 'member/members_model', '', TRUE ); 
		$this->load->model('blog/m_comment','',TRUE);
				
		$username = $this->input->post( 'username' );
		$password = $this->input->post( 'password' );
		$code = $this->input->post( 'code' );
		$message = $this->input->post( 'message' );
		$aid = $this->input->post( 'id' );
		$url = $this->input->post( 'url' );
		
		$userinfo = $this->members_model->get_member_condition( array( 'username'=>$username, 'PASSWORD'=>md5( $password ) ) );
		if ( !empty( $userinfo ) ) 
		{
			$data = array();
			$data['content'] = $message;
			$data['userid'] = $userinfo['userid'];
			$data['username'] = $userinfo['username'];
			$data['create_time'] = time();
			$data['blogid'] = $aid;
			$data['type'] = 2;
			$result = $this->m_comment->addCommentRow( "comment", $data );
			if ( $result ) 
			{
				echo 1;
			}
			else 
			{
				echo 0;
			}
		}
		else 
		{
			return showmessage( '不存在该会员信息', $url_forward = '/index.php/'.$url, $ms = 1250 );
		}
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */