<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 我参与的活动
* @category my_in
* @author taylorchen
* @version v1.0 $date 2011-12-17 20:37:20
* 
*/
class Mp_active extends CI_Controller {
	
	var $data = array();
	var $user_id;
	var $user_name;
	/**
	 * 构造函数
	 * 
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		
		$this->load->model('common/m_common','valider',TRUE);
		$this->load->model( 'activity/activity_field_model', '', TRUE ); 
	}
	
	
	/**
	 * 登记加入活动显示页面
	 * 
	 */
	function actApply($aid)
	{	
		
		if(!$this->valider->ajax_ValidLogin()){
			$this->parser->parse('common/quickLogin.tpl');
			return;
		}
		
		if(!$this->valider->chkInputID($aid)){
			$data['iconclass']='error';
			$data['message']='非法操作';
			$this->parser->parse('common/mp_commtipmsg.tpl',$data);	
			return false;
			exit;
		}
		
		
		
			//好友列表 暂时以会员表为好友列表
			$this->load->model( 'member/members_model', '', TRUE ); 
			$info = $this->members_model->get_member( $this->user_id );
			
			$data['member_info'] = $info;
			$data['aid'] = $aid;
			$this->parser->parse( 'activity/mp_activity_apply.tpl', $data );
		
		
	}
	
	/**
	 *  加入活动关注
	 * 
	 */
	function actAttention($aid)
	{
		
		if(!$this->valider->ajax_ValidLogin()){
			$this->parser->parse('common/quickLogin.tpl');
			return;
		}
		
		if(!$this->valider->chkInputID($aid)){
			$data['iconclass']='error';
			$data['message']='非法操作';
			$this->parser->parse('common/mp_commtipmsg.tpl',$data);	
			return false;
			exit;
		}
		
			
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
		
	/**
	 * 邀请好友参加活动的显示页面
	 * 
	 */
	function actInvite($aid)
	{
		
		if(!$this->valider->ajax_ValidLogin()){
			$this->parser->parse('common/quickLogin.tpl');
			return;
		}
		
		if(!$this->valider->chkInputID($aid)){
			$data['iconclass']='error';
			$data['message']='非法操作';
			$this->parser->parse('common/mp_commtipmsg.tpl',$data);	
			return false;
			exit;
		}
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
				
				$city_info = $this->valider->get_city_info( "cityID='".$list[$k]['regcity']."'" );
		        $list[$k]['city'] = $city_info;
		        $list[$k]['age'] = date( 'Y' ) - $list[$k]['birthyear'];
		        $list[$k]['work']  = $list[$k]['work'] != '' ? $career_array[$list[$k]['work']] : '';
			}
			
			$data['member_list'] = $list;
			$data['aid'] = $aid;
			
			
			$this->parser->parse( 'activity/mp_activity_invite.tpl', $data );
		}
		
	
	/**
	 *  提交活动申请联系方式
	 * 
	 */
	 
	 function requestContact(){
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$this->load->model( 'activity/activity_join_model', '', TRUE );   
		
		
		$aid = $this->input->post('aid'); 
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

	
}

/* End of file my_in.php */
/* Location: ./application/controllers/activity/my_in.php */