<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员个人生活习性设置
* @category set_habits
* @author taylorchen
* @version v1.0 $date 2011-11-22 22:02:20
* 
*/
class Set_habits extends CI_Controller {
	var $user_id;
	var $data = array();
	/**
	 * 构造函数
	 * 
	 */
	public function Set_habits() 
	{
		parent::__construct();
		$this->load->library( 'session' );
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
	 * 个人生活习性的显示
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$member_profile_info = array();
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
		
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$habits_life_array = $this->config->item('habits_life');
		$habits_yd_array = $this->config->item('habits_yd');
		$habits_smoke_array = $this->config->item('habits_smoke');
		$habits_drink_array = $this->config->item('habits_drink');
		$habits_housework_array = $this->config->item('habits_housework');
		$habits_cooking_array = $this->config->item('habits_cooking');
		$habits_skills_array = $this->config->item('habits_skills');
		
		//生活作息
		$habits_life_select = array();
		foreach ( $habits_life_array as $k=>$v )
		{
			$habits_life_select[$k]['life_habits'] = $v;
			if( $member_profile_info['life_habits'] == $k )
			{
				$habits_life_select[$k]['selected'] = "selected";
			}
		}
		
		//锻炼习惯
		$habits_yd_select = array();
		foreach ( $habits_yd_array as $k=>$v )
		{
			$habits_yd_select[$k]['yd_habits'] = $v;
			if( $member_profile_info['yd_habits'] == $k )
			{
				$habits_yd_select[$k]['selected'] = "selected";
			}
		}
		
		//吸烟
		$habits_smoke_select = array();
		foreach ( $habits_smoke_array as $k=>$v )
		{
			$habits_smoke_select[$k]['smoke'] = $v;
			if( $member_profile_info['smoke'] == $k )
			{
				$habits_smoke_select[$k]['selected'] = "selected";
			}
		}
		
		//喝酒
		$habits_drink_select = array();
		foreach ( $habits_drink_array as $k=>$v )
		{
			$habits_drink_select[$k]['drink'] = $v;
			if( $member_profile_info['drink'] == $k )
			{
				$habits_drink_select[$k]['selected'] = "selected";
			}
		}
		
		//家务
		$habits_housework_select = array();
		foreach ( $habits_housework_array as $k=>$v )
		{
			$habits_housework_select[$k]['housework'] = $v;
			if( $member_profile_info['housework'] == $k )
			{
				$habits_housework_select[$k]['selected'] = "selected";
			}
		}
		
		//厨艺
		$habits_cooking_select = array();
		foreach ( $habits_cooking_array as $k=>$v )
		{
			$habits_cooking_select[$k]['cooking'] = $v;
			if( $member_profile_info['cooking'] == $k )
			{
				$habits_cooking_select[$k]['selected'] = "selected";
			}
		}
		
		//生活技能
		$habits_skills_select = array();
		$life_skills = array();
		$life_skills = unserialize( $member_profile_info['life_skills'] ) ;
		
		foreach ( $habits_skills_array as $k=>$v )
		{
			$habits_skills_select[$k]['life_skills'] = $v;
			if( $life_skills != '' )
			{
				if( in_array( $k, $life_skills ) )
				{
					$habits_skills_select[$k]['checked'] = "checked";
				}
			}
		}
		
		$data['member_profile'] = $member_profile_info;
		$data['life'] = $habits_life_select;
		$data['yd'] = $habits_yd_select;
		$data['smoke'] = $habits_smoke_select;
		$data['drink'] = $habits_drink_select ;
		$data['housework'] = $habits_housework_select;
		$data['cooking'] = $habits_cooking_select;
		$data['skills'] = $habits_skills_select;
		
		$this->parser->parse( 'member/life_habits_update.tpl', $data );
	}
	
	/**
	 * 编辑个人生活习性
	 * 
	 */
	public function update() 
	{	
		$id = intval( $this->input->post( 'member_id' ) );

		if( $id == 0 ) {
			$data = $this->data;
			$member_profile_info = array();
		
			$this->load->model( 'member/members_profile_model', '', TRUE ); 
			$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
			
			$data['member_profile'] = $member_profile_info;
			$this->parser->parse( 'member/life_habits_update.tpl', $data );
		} else {
			$life_habits = $this->input->post( 'life_habits' );
			$yd_habits = $this->input->post( 'yd_habits' );
			$smoke = $this->input->post( 'smoke' );
			$drink = $this->input->post( 'drink' );
			$updated_at = time();
			
			$housework = $this->input->post( 'housework' );
			$cooking = $this->input->post( 'cooking' );
			$life_skills = serialize( $this->input->post( 'life_skills' ) );
			
			//加载表单认证类  后期制作
			
	        $this->load->model( 'member/members_profile_model', '', TRUE );
			$this->members_profile_model->life_habits = $life_habits;
			$this->members_profile_model->yd_habits = $yd_habits;
			$this->members_profile_model->smoke = $smoke;
			$this->members_profile_model->drink = $drink;
			
			$this->members_profile_model->housework = $housework;
			$this->members_profile_model->cooking = $cooking;
			$this->members_profile_model->life_skills = $life_skills;
			$this->members_profile_model->updated_at = $updated_at;
			
			$result = $this->members_profile_model->update_life_habits( $id );
			
			if( $result )
			{
				echo "<script language='javascript'>alert('个人生活习性保存成功!');
					location.href='/index.php/member/set_habits/index';</script>";
				die;
			}
			else
			{
				echo "<script language='javascript'>alert('个人生活习性保存失败!');
					location.href='/index.php/member/set_habits/update';</script>";
				die;
			}
		}
	}
}

/* End of file set_habits.php */
/* Location: ./application/controllers/set_habits.php */