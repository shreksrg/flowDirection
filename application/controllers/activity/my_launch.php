<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 我参与的活动
* @category My_launch
* @author taylorchen
* @version v1.0 $date 2011-12-17 20:31:20
* 
*/
class My_launch extends CI_Controller {
	var $user_id;
	var $user_name;
	var $data = array();
	/**
	 * 构造函数
	 * 
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
		
		$this->load->model( 'activity/activity_model', '', TRUE ); 
		$this->activity_model->userid = $this->user_id;
		
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
	 * 我发起的活动
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
		$condtion = "and a.userid={$this->user_id}";
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/activity/my_launch/index/';
	    $config['total_rows'] = $this->activity_model->get_condition_activity_num( $condtion );
	    $config['per_page'] = '6';
	    $config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 4;
	    $config['full_tag_open'] = '<p>';
	    $config['full_tag_close'] = '</p>';
	    $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="curpage">';
	    $config['cur_tag_close'] = '</li>';
		
	    $this->pagination->initialize( $config );
	    $list = $this->activity_model->get_my_launch( $config['per_page'], $offset, $condtion );
		
		$data['list'] = $list;
		$data['page'] = $this->pagination->create_links();
		$this->parser->parse( 'activity/mp_my_launch_activity.tpl', $data );
	}
	
	/**
	 * 删除发起的活动
	 * 
	 * 
	 * 
	 */
	function delete_activity()
	{
		$aid = $this->input->post( 'actopt' );
		if( $aid == '' )
		{
			return showmessage( '请选择要删除的活动', $url_forward = '/index.php/activity/my_launch/index', $ms = 1250 );
		}
		
		//$aid = explode( '-', $aid );
		$result = $this->activity_model->delete_activity( $aid );  
		if( $result )
		{
			//删除相关的活动相册
			$this->load->model( 'album/album_model', '', TRUE ); 
			$this->load->model( 'album/pic_model', '', TRUE ); 
			
			$album_list = array();
			foreach ( $aid as $k=>$v )
			{
				$info = array();
				$info = $this->album_model->this_activity_album_info( $v, $catid = 104 );	
				$this->album_model->delete_album( $info['albumid'] );
				$this->pic_model->delete_activity_photo( $info['albumid'] );
			}
			
			//删除相关的活动相册下的图片
			$file_path = APPPATH.'../www/data/attachment/album/';
			/*foreach ( $albumid as $k2=>$v2 )
			{
				//删除文件夹下的图片。 
				$pic_list = array();
				$pic_list = $this->pic_model->activity_photo_list( $v2 );
			
				foreach ( $pic_list as $k3=>$v3 )
				{
					if( file_exists( $file_path.$pic_list[$k3]['filepath'] ) )
					{
						unlink( $file_path.$pic_list[$k3]['filepath'] );
					}
				}	
			}*/
			
			return showmessage( '删除成功', $url_forward = '/index.php/activity/my_launch/index', $ms = 1250 );
		} 
		else 
		{
			return showmessage( '删除失败', $url_forward = '/index.php/activity/my_launch/index', $ms = 1250 );
		}
	}
	
	/**
	 * ajax 操作 关闭活动
	 * 
	 * @param $aid  活动id
	 * @return bool
	 */
	function shut_activity()
	{
		$aid = intval( $_POST['aid'] );
		$status = intval( $_POST['type'] );
		$msg = 0;
		if ( $aid != 0 )
		{
			$data['status'] = $status;
		    if ( $this->activity_model->edit_activity_info( $aid, $data ) )
		    {
				$msg = 1;
			}				
		}
        
		echo json_encode( $msg );
	}
	
	/**
	 * 邀请好友的显示页面
	 * 
	 */
	function actInvite()
	{
		$aid = intval( $this->uri->segment(4) );
		if( !$aid ) exit;
		if( $this->user_id )
		{
			//好友列表 暂时以会员表为好友列表
			$this->config->load( 'member_profile_config', FALSE, TRUE ); 
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$this->friend_model->user_id = $this->user_id;
			$list = $this->friend_model->get_friends_list( 100, 0, $order_by=' username desc' );
			$career_array = $this->config->item( 'career' );
			
			foreach ( $list as $k=>$v )
			{
				$avatar_img = "/data/avatar/".get_avatar( $list[$k]['userid'], 'big' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$list[$k]['avatar_img'] = $avatar_img;
				
				$city_info = $this->m_common->get_city_info( "cityID='".$list[$k]['regcity']."'" );
		        $list[$k]['city'] = $city_info;
		        $list[$k]['age'] = date( 'Y' ) - $list[$k]['birthyear'];
		        $list[$k]['work']  = $list[$k]['work'] != '' ? $career_array[$list[$k]['work']] : '';
			}
			
			$data['member_list'] = $list;
			$data['aid'] = $aid;
			
			
			$this->parser->parse( 'activity/mp_activity_invite.tpl', $data );
		}
		else 
		{
			$this->parser->parse('common/quickLogin.tpl');
			return false;
		}
	}
	
	/**
	 * 邀请好友
	 * 
	 *
	 */
	function send_act_email()
	{
		$this->load->model( 'member/members_email_model', '', TRUE ); 
		$this->members_email_model->userid = $this->user_id;
		
		$aid = $this->input->post( 'aid' );
		
		//先获取此次活动的信息
		$info = $this->activity_model->get_activity_info( $aid );
		
		//编写邀请好友的信件
		$touserid_array = array();
		$touserid_array = $this->input->post( 'favopt' );;
		$subject = "来自好友".$this->user_name."的活动邀请";
		$data['fromuserid'] = $this->user_id;
		$data['fromusername'] = $this->user_name;
		$data['folder'] = "outbox";
		$data['NEW'] = 0;
		$data['SUBJECT'] = $subject;
		$data['message'] = $this->user_name."向您发起活动邀请，活动主题是：<a href='/index.php/browse_act/detail'>".$info['SUBJECT']."</a>";;
		$data['dateline'] = time();
		
		foreach ( $touserid_array as $k=>$v )
		{
		  	$data['touserid'] = $touserid_array[$k];
			$email_id = $this->members_email_model->create( 'pms', $data );
		}
		
		if( $email_id )
		{
			$datas['message'] = "邀请成功";
			$this->parser->parse( 'common/mp_message.tpl', $datas );
		}
		else 
		{
			$datas['message'] = "邀请失败";
			$this->parser->parse( 'common/mp_message.tpl', $datas );
		}
	}
	
}

/* End of file my_launch.php */
/* Location: ./application/controllers/activity/my_launch.php */