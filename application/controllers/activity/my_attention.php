<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 我关注的活动
* @category my_attention
* @author taylorchen
* @version v1.0 $date 2011-12-17 20:40:20
* 
*/
class My_attention extends CI_Controller {
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
		$this->load->model( 'activity/activity_field_model', '', TRUE ); 
		$this->activity_model->userid = $this->user_id;
		$this->activity_field_model->userid = $this->user_id;
		
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
	 * 我关注的活动
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
		$condtion = "and c.uid={$this->user_id}";
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/activity/my_attention/index/';
	    $config['total_rows'] = $this->activity_field_model->get_condition_activity_field_num( $condtion );
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
		$list = $this->activity_field_model->get_my_field_list( $config['per_page'], $offset, $condtion );
		
		$data['list'] = $list;
		$data['page'] = $this->pagination->create_links();
		$this->parser->parse( 'activity/mp_my_attention_activity.tpl', $data );
	}
	
	/**
	 * ajax 操作 加入关注
	 * 
	 */
	function set_attention()
	{
		//$aid = intval( $_POST['aid'] );
		if( $this->user_id )
		{
			$aid = intval( $this->uri->segment(4) );
			//查看是否已经加入关注
			$add = 1;            //加入关注
			$num = $this->activity_field_model->get_condition_activity_field_num( " and c.uid={$this->user_id} " );
			if( $num > 0 ) 
			{
				$add = 2;
			} 
			
			if( $add == 1 )
			{
				$data['uid'] = $this->user_id;
				$data['aid'] = $aid;
				$data['dateline'] = time();
				
				$fieldid = $this->activity_field_model->set_attention( 'activity_field', $data );
				if ( $fieldid ) 
				{
					$msg = 1;                //关注成功
					$datas['message'] = "关注成功";
					//活动表关注数加1
					$activity_info = $this->activity_model->get_activity_info( $aid );
					$array['follownum'] = $activity_info['follownum'] + 1;
					$this->activity_model->edit_activity_info( $aid, $array );
				} 
				else 
				{
					$msg = 3;                //关注失败
					$datas['message'] = "关注失败";
				}
			}
			if( $add == 2 )
			{
				$msg = 2;                    //已经关注过
				$datas['message'] = "已经关注过";
			}
			
			$this->parser->parse( 'common/mp_message.tpl', $datas );
		}
		else 
		{
			$this->parser->parse('common/quickLogin.tpl');
			return false;
		}
	}
	
	function delete_activity_field()
	{
		$aid = $this->input->post( 'actopt' );
		if( $aid == '' )
		{
			return showmessage( '请选择要删除的活动', $url_forward = '/index.php/activity/my_attention/index', $ms = 1250 );
		}
		
		$result = $this->activity_field_model->delete_activity_field( $aid, $this->user_id );  
		return showmessage( '删除成功', $url_forward = '/index.php/activity/my_attention/index', $ms = 1250 );
	}
}

/* End of file my_attention.php */
/* Location: ./application/controllers/activity/my_attention.php */