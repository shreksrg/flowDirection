<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员名片设置
* @category index
* @author taylorchen
* @version v1.0 $date 2011-12-07 15:02:20
* 
*/

class My_card extends CI_Controller {
	var $user_id;
	var $user_name;
	var $avatar_img; 
	var $data = array();
	
	public function __construct() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
		
		$avatar_img = "/data/avatar/".get_avatar($this->user_id,'big');
		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
		$this->avatar_img = $avatar_img;

		$this->load->model( 'member/members_card_model', '', TRUE );
		$this->members_card_model->userid = $this->user_id;
		
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
	 * 个人名片信息的显示与通讯录列表
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$card_info = $this->members_card_model->get_my_card_info();//获取自己的名片信息
		$card_list = $this->members_card_model->get_card_list();//获取自己的通讯录
		
		$data['card_info'] = $card_info;
		$data['card_list'] = $card_list;
		$data['avatar_img'] = $this->avatar_img;
		
		$this->parser->parse( 'member/my_card.tpl', $data );
	}
	
	/**
	 * 个人名片常用联系人列表
	 * 
	 */
	public function often_card_list()
	{
		$data = $this->data;
		$card_info = $this->members_card_model->get_my_card_info();//获取自己的名片信息
		$card_list = $this->members_card_model->get_often_card_list();//获取自己的常用联系人
		
		$data['card_info'] = $card_info;
		$data['often_card_list'] = $card_list;
		$data['avatar_img'] = $this->avatar_img;
		
		$this->parser->parse( 'member/often_card_list.tpl', $data );
	}
	
	/**
	 * 新增会员信息到通讯录
	 * 
	 */
	public function create()
	{
		$act = intval( $this->input->post( 'act' ) );
		if( $act )
		{
			$ouserid = $this->input->post( 'ouserid' );
			$ousername = $this->input->post( 'ousername' );
			$realname = $this->input->post( 'realname' );
			$job = $this->input->post( 'job' );
			$company = $this->input->post( 'company' );
			$mobile = $this->input->post( 'mobile' );
			
			$phone = $this->input->post( 'phone' );
			$email = $this->input->post( 'email' );
			$homepage = $this->input->post( 'homepage' );
			$zippost = $this->input->post( 'zippost' );
			$description = $this->input->post( 'description' );
			
			//后期加上表单验证规则
			
			$data['gid'] = 1;
			$data['userid'] = $this->user_id;
			$data['username'] = $this->user_name;
			$data['ouserid'] = $ouserid;
			$data['ousername'] = $ousername;
			$data['realname'] = $realname;
			$data['job'] = $job;
			$data['company'] = $company;
			
			$data['mobile'] = $mobile;
			$data['phone'] = $phone;
			$data['email'] = $email;
			$data['homepage'] = $homepage;
			$data['zippost'] = $zippost;
			$data['description'] = $description;

			$result = $this->members_card_model->create( 'vcard', $data );
			if( $result )
			{
				return showmessage( '加入通讯录成功', $url_forward = '/index.php/member/my_card/index', $ms = 1250 );
			}
			else 
			{
				return showmessage( '加入通讯录失败', $url_forward = '/index.php/member/my_card/create', $ms = 1250 );
			}
		}
		else 
		{
			$data = $this->data;
			//暂时以会员Id为2的会员信息录入,后续整合
			$uid = 2;
			$avatar_img = "/data/avatar/".get_avatar($uid,'big');
			$avatar_img = file_exists('.'.$avatar_img)?$avatar_img:'/static/images/avatar/noavatar_big.gif';
			
			$this->load->model( 'member/members_model', '', TRUE );  
			$user_info = $this->members_model->get_member( $uid );
			$data['user_info'] = $user_info;
			$data['avatar_img'] = $avatar_img;
			
			$this->parser->parse( 'member/add_card.tpl', $data );
		}
	}
	
	/**
	 * 修改会员名片信息的信息显示
	 * @param   $cardid	名片id
	 * 
	 */
	public function edit_card_info( $key, $cardid=0 )
	{
		
		if( intval( $cardid ) == 0 ) 
		{
			return showmessage( '不存在这张名片', $url_forward = '/index.php/member/my_card/index', $ms = 1250 );
		} 
		else 
		{
			$data = $this->data;
			$card_info = $this->members_card_model->get_card_info( $cardid );
			if( $card_info == '' )
			{
				return showmessage( '不存在这张名片', $url_forward = '/index.php/member/my_card/index', $ms = 1250 );
			}
			
			if ( $card_info['userid'] != $this->user_id ) {
				return showmessage( '您不存在这张名片', $url_forward = '/index.php/member/my_card/index', $ms = 1250 );
			}
			$data['card_info'] = $card_info;
			$data['avatar_img'] = $this->avatar_img;
			
			$this->parser->parse( 'member/edit_card.tpl', $data );
		}
	}	
	
	/**
	 * 修改会员名片信息
	 * 
	 * 
	 */
	public function edit_card_info_act()
	{
		$cardid = $this->input->post( 'cardid' );
		
		$realname = $this->input->post( 'realname' );
		$job = $this->input->post( 'job' );
		$company = $this->input->post( 'company' );
		$mobile = $this->input->post( 'mobile' );

		$phone = $this->input->post( 'phone' );
		$email = $this->input->post( 'email' );
		$homepage = $this->input->post( 'homepage' );
		$zippost = $this->input->post( 'zippost' );
		$description = $this->input->post( 'description' );
		
		//后期加上表单验证规则
		
		$data['realname'] = $realname;
		$data['job'] = $job;
		$data['company'] = $company;

		$data['mobile'] = $mobile;
		$data['phone'] = $phone;
		$data['email'] = $email;
		$data['homepage'] = $homepage;
		$data['zippost'] = $zippost;
		$data['description'] = $description;

		$result = $this->members_card_model->edit_card_info( $cardid, $data );
		if( $result )
		{
			return showmessage( '名片修改成功', $url_forward = '/index.php/member/my_card/index', $ms = 1250 );
		}
		else
		{
			return showmessage( '名片修改失败', $url_forward = '/index.php/member/my_card/edit_card_info/cardid/'.$cardid, $ms = 1250 );
		}
	}	
	
	/**
	 * ajax操作
	 * 设置个人常用联系人
	 * 
	 */
	public function set_often_card()
	{
		$cardid = intval( $_POST['cardid'] );
		$msg = 0;
		if ( $cardid != 0 )
		{
		    if ( $this->members_card_model->set_often_card( $cardid ) )
		    {
				$msg = 1;
			}				
		}
        
		echo json_encode( $msg );
	}	
	
	/**
	 * ajax操作
	 * 取消个人常用联系人
	 * 
	 */
	public function delete_often_card()
	{
		$cardid = intval( $_POST['cardid'] );
		$msg = 0;
		if ( $cardid != 0 )
		{
		    if ( $this->members_card_model->delete_often_card( $cardid ) )
		    {
				$msg = 1;
			}				
		}
        
		echo json_encode( $msg );
	}	
	
	/**
	 * ajax操作
	 * 删除个人名片
	 * 
	 */
	public function delete_card()
	{
		$cardid = intval( $_POST['cardid'] );
		$msg = 0;
		if ( $cardid != 0 )
		{
			$card_info = $this->members_card_model->get_card_info( $cardid );
			if ( $card_info['ouserid'] != $this->user_id )
			{
				$return = $this->members_card_model->delete_card( $cardid );
				if( $return )
				{
					$msg = 1;
				}
			}
		}
        
		echo json_encode( $msg );
	}	
}

/* End of file my_card.php */
/* Location: ./application/controllers/member/my_card.php */