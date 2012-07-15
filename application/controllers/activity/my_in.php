<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 我参与的活动
* @category my_in
* @author taylorchen
* @version v1.0 $date 2011-12-17 20:37:20
* 
*/
class My_in extends CI_Controller {
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
		$this->load->model( 'activity/activity_join_model', '', TRUE ); 
		$this->activity_model->userid = $this->user_id;
		$this->activity_join_model->userid = $this->user_id;
		
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
	 * 我参与的活动
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
		$condtion = "and c.uid={$this->user_id}";
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/activity/my_in/index/';
	    $config['total_rows'] = $this->activity_join_model->get_condition_activity_join_num( $condtion );
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
		$list = $this->activity_join_model->get_my_join_list( $config['per_page'], $offset, $condtion );
		
		$data['list'] = $list;
		$data['page'] = $this->pagination->create_links();
		$this->parser->parse( 'activity/mp_my_in_activity.tpl', $data );
	}
	
	/**
	 * 登记加入活动显示页面
	 * 
	 */
	function actApply(  )
	{
		$aid = intval( $this->uri->segment(4) );
		if( !intval( $aid ) ) exit;
		$this->load->model('common/m_common','',TRUE);
		if( $this->m_common->ajax_ValidLogin() )
		{
			//好友列表 暂时以会员表为好友列表
			$this->load->model( 'member/members_model', '', TRUE ); 
			$info = $this->members_model->get_member( $this->user_id );
			
			$data['member_info'] = $info;
			$data['aid'] = $aid;
			$this->parser->parse( 'activity/mp_activity_apply.tpl', $data );
		}
		else 
		{
			$this->parser->parse('common/quickLogin.tpl');
			return false;
		}
	}
	
	/**
	 * 参加活动
	 * 
	 * 
	 */
	function join()
	{
		//获得我的会员详细信息
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$this->load->model( 'activity/activity_join_model', '', TRUE );   
		
		$aid = $this->input->post( 'aid' ); 
		$user_info = $this->members_profile_model->get_member_profile( $this->user_id );
		
		//判断是否已经参加活动
		$activity_join_num = $this->activity_join_model->get_condition_activity_join_num( "and c.aid={$aid} and c.uid={$this->user_id}" );
		
		
		if( $activity_join_num == 0 )
		{
			$data = array();
			$data['aid'] = $aid;
			$data['uid'] = $this->user_id;
			$data['username'] = $this->user_name;
			$data['sex'] = $user_info['gender'];
			$data['age'] = date( 'Y', time() ) - $user_info['birthyear'];
			$data['phone'] = $this->input->post( 'phone' );
			$data['mobile'] = $this->input->post( 'mobile' );
			$data['dateline'] = time();
			
			$joinid = $this->activity_join_model->join( 'activity_join', $data );
			if ( $joinid )
			{
				//活动表参加人数加1
				$activity_info = $this->activity_model->get_activity_info( $aid );
				$array['membernum'] = $activity_info['membernum'] + 1;
				$this->activity_model->edit_activity_info( $aid, $array );
				
				$datas['message'] = "恭喜您成功加入该活动";
			    $this->parser->parse( 'common/mp_message.tpl', $datas );
				
			}
			else 
			{
				$datas['message'] = "加入活动失败";
			    $this->parser->parse( 'common/mp_message.tpl', $datas );
			}
		}
		else 
		{
			$datas['message'] = "您已加入该活动，不能重复加入";
			$this->parser->parse( 'common/mp_message.tpl', $datas );
		}
	}
	
	function delete_activity_join()
	{
		$aid = $this->input->post( 'actopt' );
		if( $aid == '' )
		{
			return showmessage( '请选择要删除的活动', $url_forward = '/index.php/activity/my_in/index', $ms = 1250 );
		}
		
		$result = $this->activity_join_model->delete_activity_join( $aid, $this->user_id );  
		return showmessage( '删除成功', $url_forward = '/index.php/activity/my_in/index', $ms = 1250 );
	}
}

/* End of file my_in.php */
/* Location: ./application/controllers/activity/my_in.php */