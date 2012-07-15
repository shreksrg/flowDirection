<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员个人基本资料设置
* @category index
* @author taylorchen
* @version v1.0 $date 2011-11-22 20:02:20
* 
*/
class Index extends CI_Controller {
	var $user_id;
	var $user_name;
	var $email_num;             //站内信
	var $admin_email_num;       //管理员通知
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
	* 个人详细页面控制页面
	* 
	*/
	public function index()
	{
		$data = $this->data;
		$this->load->model( 'member/members_model', '', TRUE ); 
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$this->load->model( 'member/members_email_model', '', TRUE ); 
		$member_info = $this->members_model->get_member( $this->user_id );
		$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
		
		$data['member'] = $member_info;
		$data['member_profile'] = $member_profile_info;
		
		$this->members_email_model->userid = $this->user_id;
		$this->email_num = $this->members_email_model->get_email_num();
		$this->admin_email_num = $this->members_email_model->get_admin_email_num(); 
		
		$data['left_data']['email_num'] = $this->email_num;
		$data['left_data']['admin_email_num'] = $this->admin_email_num;
		$data['left_data']['user_id'] = $this->user_id;
		$data['left_data']['user_name'] = $this->user_name;
		
		$avatar_small_img = "/data/avatar/".get_avatar( $this->user_id, 'small' );
		$avatar_small_img = file_exists( '.'.$avatar_small_img ) ? $avatar_small_img : '/static/images/avatar/noavatar_big.gif';
		$data['left_data']['avatar_small_img'] = $avatar_small_img;
		
		$data['center_data']['user_id'] = $this->user_id;
		$data['center_data']['user_name'] = $this->user_name;
		$data['member'] = $member_info;
		$data['member_profile'] = $member_profile_info;
		
		$avatar_big_img = "/data/avatar/".get_avatar( $this->user_id, 'big' );
		$avatar_big_img = file_exists( '.'.$avatar_big_img ) ? $avatar_big_img : '/static/images/avatar/noavatar_big.gif';
		$data['center_data']['avatar_big_img'] = $avatar_big_img;
		
		//今日推荐的会员
		$this->load->model('common/m_common','',TRUE);
		$random_members_list = $this->m_common->get_random_members( $limit = 8, "a.audit=0 and a.recommend=1" ); 
		foreach ( $random_members_list as $k=>$v )
		{
			$avatar_img = "/data/avatar/".get_avatar( $random_members_list[$k]['userid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$random_members_list[$k]['avatar_img'] = $avatar_img;
			$random_members_list[$k]['username'] = cut_str( $random_members_list[$k]['username'],8 );
			
		}
		$data['center_data']['members_list'] = $random_members_list;
		
		//关注我的人
		$attention_members_list = $this->m_common->get_attention_members( $limit = 8, "a.userid={$this->user_id}" ); 
		foreach ( $attention_members_list as $k=>$v )
		{
			$avatar_img = "/data/avatar/".get_avatar( $attention_members_list[$k]['buserid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$attention_members_list[$k]['avatar_img'] = $avatar_img;
		}
		$data['center_data']['attention_members_list'] = $attention_members_list;
		
		//感兴趣的活动 暂时拿前面四条
		$activity_list = $this->m_common->get_interested_activity( $limit = 6, "(a.audit=0 and a.recommend=1 and b.catid=104)" );
		foreach ( $activity_list as $k=>$v )
		{
			$activity_list[$k]['cut_subject'] = cut_str( $activity_list[$k]['SUBJECT'], 10 );
		}
		$data['center_data']['activity_list'] = $activity_list;
		
		$this->parser->parse( 'member/mp_member_index.tpl', $data );
	}
	
	/**
	 * 个人详细信息的显示
	 * 
	 */
	public function info()
	{
		$data = $this->data;
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$height_array = $this->config->item( 'height' );
		$weight_array = $this->config->item( 'weight' );
		$education_array = $this->config->item( 'education' );
		$marital_array = $this->config->item( 'marital' );
		$nation_array = $this->config->item( 'nation' );
		$province_array = $this->config->item( 'province' );
		$sx_array = $this->config->item( 'sx' );
		$sz_array = $this->config->item( 'sz' );
		$career_array = $this->config->item( 'career' );
		
		$member_info = array();
		$member_profile_info = array();
		$this->load->model( 'member/members_model', '', TRUE ); 
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		        
		$member_info = $this->members_model->get_member( $this->user_id );
		$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
		
		//生日
		$member_profile_info['birthdate'] = $member_profile_info['birthyear']."-".$member_profile_info['birthmonth']."-".$member_profile_info['birthday'];
		$data['member'] = $member_info;
		$data['member_profile'] = $member_profile_info;
		$work = $member_profile_info['work'] == "" ? 0 : $member_profile_info['work'];
		$data['rtnValue'] = "[province:{$member_profile_info['regprovince']},city:{$member_profile_info['regcity']},career:{$work},education:{$member_profile_info['education']},stature:{$member_profile_info['height']},weight:{$member_profile_info['weight']},nationality:{$member_profile_info['nation']},animal:{$member_profile_info['sx']},constellation:{$member_profile_info['sz']},marriage:{$member_profile_info['marital']}]";
	
		//身高
		$height_array_select = array();
		foreach ( $height_array as $k=>$v )
		{
			$height_array_select[$k]['height'] = $v;
		}
		
		//体重
		$weight_array_select = array();
		foreach ( $weight_array as $k=>$v )
		{
			$weight_array_select[$k]['weight'] = $v;
		}
		
		//学历
		$education_array_select = array();
		foreach ( $education_array as $k=>$v )
		{
			$education_array_select[$k]['education'] = $v;
		}
		
		
		
		//婚姻
		$marital_array_select = array();
		foreach ( $marital_array as $k=>$v )
		{
			$marital_array_select[$k]['marital'] = $v;
		}
		
		//民族
		$nation_array_select = array();
		foreach ( $nation_array as $k=>$v )
		{
			$nation_array_select[$k]['nation'] = $v;
		}
		
		//所在省
		$province_array_select = array();
		foreach ( $province_array as $k=>$v )
		{
			$province_array_select[$k]['regprovince'] = $v;
		}
		
		//生肖
		$sx_select = array();
		foreach ( $sx_array as $k=>$v )
		{
			$sx_select[$k]['sx'] = $v;
		}
		
		//星座
		$sz_select = array();
		foreach ( $sz_array as $k=>$v )
		{
			$sz_select[$k]['sz'] = $v;
		}
		
		//职业
		$career_select = array();
		foreach ( $career_array as $k=>$v )
		{
			$career_select[$k]['career'] = $v;
		}
		
		$data['sx'] = $sx_select;
		$data['sz'] = $sz_select;
		$data['career'] = $career_select;
		$data['height'] = $height_array_select;
		$data['weight'] = $weight_array_select;
		$data['marital'] = $marital_array_select;
		$data['nation'] = $nation_array_select;
		$data['education'] = $education_array_select;
		$data['province'] = $province_array_select;
		
		$this->parser->parse( 'member/mp_members_profile_update.tpl', $data );
	}
	
	/**
	 * 编辑个人信息
	 * 
	 */
	public function update() 
	{	
		$id = intval( $this->input->post( 'member_id' ) );
		if( $id == 0 ) {
			$data = $this->data;
			$member_info = array();
			$member_profile_info = array();
			$this->load->model( 'member/members_model', '', TRUE ); 
			$this->load->model( 'member/members_profile_model', '', TRUE ); 
		        
			$member_info = $this->members_model->get_member( $this->user_id );
			$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
		
			$data['member'] = $member_info;
			$data['member_profile'] = $member_profile_info;
			
			$ymd = array();
			$ymd = $this->get_ymd( $member_profile_info ); 
			
			$data['yearoption'] = $ymd['yearoption'];
			$data['monthoption'] = $ymd['monthoption'];
			$data['dayoption'] = $ymd['dayoption'];
			
			$this->parser->parse( 'member/mp_members_profile_update.tpl', $data );
		} else {
			$this->load->model( 'member/members_profile_model', '', TRUE );
			$gender = $this->input->post( 'gender' );
			$height = $this->input->post( 'height' );
			$weight = $this->input->post( 'weight' );
			$education = $this->input->post( 'education' );
			$updated_at = time();
			
			$birthdate = $this->input->post( 'birthdate' );
			$birthdate_array = explode( '-', $birthdate );
			$birthyear = $birthdate_array[0];
			$birthmonth = $birthdate_array[1];
			$birthday = $birthdate_array[2];
			
			$regprovince = $this->input->post( 'regprovince' );
			$regcity = $this->input->post( 'regcity' );
			$marital = $this->input->post( 'marital' );
			$nation = $this->input->post( 'nation' );
			$mobile = $this->input->post( 'mobile' );
			$qq = $this->input->post( 'qq' );
			
			$sx = $this->input->post( 'sx' );
			$sz = $this->input->post( 'sz' );
			$academy = $this->input->post( 'academy' );
			$career = $this->input->post( 'career' );
			$email = $this->input->post( 'email' );
			
			
			//加载表单认证类  后期制作
			$data = array();
			$data['gender'] = $gender;
			$data['height'] = $height;
			$data['weight'] = $weight;
			$data['education'] = $education;
			
			$data['regprovince'] = $regprovince;
			$data['regcity'] = $regcity;
			$data['birthyear'] = $birthyear;
			$data['birthmonth'] = $birthmonth;
			$data['birthday'] = $birthday;
			$data['work'] = $career;
			
			$data['marital'] = $marital;
			$data['nation'] = $nation;
			$data['mobile'] = $mobile;
			$data['qq'] = $qq;
			$data['updated_at'] = $updated_at;
			
			$data['academy'] = $academy;
			$data['sz'] = $sz;
			$data['sx'] = $sx;
			
			$result = $this->members_profile_model->update($id, $data);
			
			if( $result )
			{
				return showmessage( '个人信息保存成功', $url_forward = '/index.php/member/index/info', $ms = 1250 );
			} 
			else
			{
				return showmessage( '个人信息保存失败', $url_forward = '/index.php/member/index/info', $ms = 1250 );
			}
		}
	}
	
	/**
	 * 获得提供选择的年月日数据
	 *
	 */
	function get_ymd( $member_profile_info )
	{
		$year = date( 'Y', time() );
		$yearoption = '';
		$monthoption = '';
		$dayoption = '';
		for ( $i = $year-99; $i < $year-15; $i++ )
		{
			if( $member_profile_info['birthyear'] == $i ) 
			{
				$yearoption .= "<option value=".$i." selected=\"selected\">".$i."年</option>";	
			}
			else 
			{
				$yearoption .= "<option value=".$i.">".$i."年</option>";	
			}
		}
		for ( $t = 1; $t < 13; $t++ )
		{
			if( $member_profile_info['birthmonth'] == $t ) 
			{
				$monthoption .= "<option value=".$t." selected=\"selected\">".$t."月</option>";
			} 
			else 
			{
				$monthoption .= "<option value=".$t.">".$t."月</option>";
			}
		}
	
		for ( $m = 1; $m < 32; $m++ )
		{
			if( $member_profile_info['birthday'] == $m ) 
			{
				$dayoption .= "<option value=".$m." selected=\"selected\">".$m."日</option>";
			} 
			else 
			{
				$dayoption .= '<option value='.$m.'>'.$m.'日</option>';
			}
		}
			
		$data['yearoption'] = $yearoption;
		$data['monthoption'] = $monthoption;
		$data['dayoption'] = $dayoption;
		
		return $data;
	}
}

/* End of file index.php */
/* Location: ./application/controllers/member/index.php */