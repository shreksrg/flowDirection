<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员个人兴趣爱好设置
* @category set_interests
* @author taylorchen
* @version v1.0 $date 2011-11-22 23:02:20
* 
*/
class Set_interests extends CI_Controller {
	var $user_id;
	var $data = array();
	/**
	 * 构造函数
	 * 
	 */
	public function Set_interests() 
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
	 * 个人兴趣爱好的显示
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$member_profile_info = array();
		
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		
		$gx_array = $this->config->item('gx');
		$habit_array = $this->config->item('habits_life');
		$smoke_array = $this->config->item('habits_smoke');
		$drink_array = $this->config->item('habits_drink');
		$housework_array = $this->config->item('habits_housework');
		$cooking_array = $this->config->item('habits_cooking');
		$skills_array = $this->config->item('habits_skills');
		$ah_array = $this->config->item('lah');
		
		$sj_array = $this->config->item('lsj');
		$ys_array = $this->config->item('lys');
		$yl_array = $this->config->item('lyl');
		
		$lyd_array = $this->config->item('llyd');
		
		$love_yd = array(1,2);
		$love_food = array();
		$love_book = array();
		$love_tv = array();
		$leisure = array();
		$love_hobby = array();
		$love_area = array();
		
		$love_yd = unserialize( $member_profile_info['love_yd'] ) ;
		$love_food = unserialize( $member_profile_info['love_food'] ) ;
		$love_book = unserialize( $member_profile_info['love_book'] ) ;
		$love_tv = unserialize( $member_profile_info['love_tv'] ) ;
		$leisure = unserialize( $member_profile_info['leisure'] ) ;
		$love_hobby = unserialize( $member_profile_info['love_hobby'] ) ;
		$love_area = unserialize( $member_profile_info['love_area'] ) ;
		
		//个性
		$gx_select = array();
		foreach ( $gx_array as $k=>$v )
		{
			$gx_select[$k]['gx'] = $v;
		}
		
		//作息习惯
		$habit_select = array();
		foreach ( $habit_array as $k=>$v )
		{
			$habit_select[$k]['habit'] = $v;
		}
		
		//吸烟
		$smoke_select = array();
		foreach ( $smoke_array as $k=>$v )
		{
			$smoke_select[$k]['smoke'] = $v;
		}
		
		//饮酒
		$drink_select = array();
		foreach ( $drink_array as $k=>$v )
		{
			$drink_select[$k]['drink'] = $v;
		}
		
		//家务
		$housework_select = array();
		foreach ( $housework_array as $k=>$v )
		{
			$housework_select[$k]['housework'] = $v;
		}
		
		//厨艺
		$cooking_select = array();
		foreach ( $cooking_array as $k=>$v )
		{
			$cooking_select[$k]['cooking'] = $v;
		}
		
		//生活技能
		$skills_select = array();
		foreach ( $skills_array as $k=>$v )
		{
			$skills_select[$k]['skills'] = $v;
		}
		
		$ah_select = array();
		foreach ( $ah_array as $k=>$v )
		{
			$ah_select[$k]['love'] = $v;
		}
		

		
		$data['member_profile'] = $member_profile_info;
		$data['gx'] = $gx_select;
		$data['habit'] = $habit_select;
		$data['smoke'] = $smoke_select;
		$data['drink'] = $drink_select;
		$data['housework'] = $housework_select;
		$data['cooking'] = $cooking_select;
		$data['skills'] = $skills_select;
		$data['ah'] = $ah_select;
		
		$love_hobby = unserialize( $member_profile_info['love_hobby'] ) ;
		$love_char = '';
		if ( !empty( $love_hobby ) ) 
		{
			$love_char = implode( '|', $love_hobby );
		}
		
		$life_skills = unserialize( $member_profile_info['life_skills'] ) ;
		$skills_char = '';
		if ( !empty( $life_skills ) ) 
		{
			$skills_char = implode( '|', $life_skills );
		}
		
		
		$rtnValue = "[personality:{$member_profile_info['gx']},habit:{$member_profile_info['life_habits']},smoke:{$member_profile_info['smoke']},drink:{$member_profile_info['drink']},housework:{$member_profile_info['housework']},cooking:{$member_profile_info['cooking']},optSkill:'{$skills_char}',optInter:'{$love_char}']";
		$data['rtnValue'] = $rtnValue;
		
		
		$this->parser->parse( 'member/mp_life_interests_update.tpl', $data );
	}
	
	/**
	 * 编辑个人兴趣爱好
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
			$this->parser->parse( 'member/life_interests_update.tpl', $data );
		} 
		else
		{ 
			
			$updated_at = time();
			$love_hobby = serialize( $this->input->post( 'optInter' ) );
			$life_skills = serialize( $this->input->post( 'optSkill' ) );
			$gx = $this->input->post( 'gx' );
			$life_habits = $this->input->post( 'life_habits' );
			$smoke = $this->input->post( 'smoke' );
			$drink = $this->input->post( 'drink' );
			$housework = $this->input->post( 'housework' );
			$cooking = $this->input->post( 'cooking' );
			
			
			//加载表单认证类  后期制作
			
	        $this->load->model( 'member/members_profile_model', '', TRUE );
			
			$data['love_hobby'] = $love_hobby;
			$data['life_skills'] = $life_skills;
			$data['updated_at'] = $updated_at;
			$data['gx'] = $gx;
			$data['life_habits'] = $life_habits;
			$data['smoke'] = $smoke;
			$data['drink'] = $drink;
			$data['housework'] = $housework;
			$data['cooking'] = $cooking;
			
			$result = $this->members_profile_model->update( $id, $data );
		
			if( $result )
			{
				return showmessage( '兴趣爱好保存成功', $url_forward = '/index.php/member/set_interests/index', $ms = 1250 );
			}
			else
			{
				return showmessage( '兴趣爱好保存失败', $url_forward = '/index.php/member/set_interests/index', $ms = 1250 );
			}
		}
	}
}

/* End of file set_interests.php */
/* Location: ./application/controllers/set_interests.php */