<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员自我描述设置
* @category set_description
* @author taylorchen
* @version v1.0 $date 2011-11-22 23:02:20
* 
*/
class Set_description extends CI_Controller {
	var $user_id;
	var $data = array();
	/**
	 * 构造函数
	 * 
	 */
	public function Set_description() 
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
	 * 个人自我描述显示
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$member_profile_info = array();
		
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
			
		$data['member_profile'] = $member_profile_info;
		$this->parser->parse( 'member/mp_description_update.tpl', $data );
	}
	
	/**
	 * 编辑个人自我描述
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
			$this->parser->parse( 'member/description_update.tpl', $data );
		} 
		else 
		{
			$description = $this->input->post( 'description' );
			$mood = $this->input->post( 'mood' );
			$updated_at = time();
			
			//加载表单认证类  后期制作
			
	        $this->load->model( 'member/members_profile_model', '', TRUE );
			$data['description'] = $description;
			$data['mood'] = $mood;
			$data['updated_at'] = $updated_at;
			
			$result = $this->members_profile_model->update( $id, $data );
			
			if( $result )
			{
				return showmessage( '个人独白保存成功', $url_forward = '/index.php/member/set_description/index', $ms = 1250 );
			}
			else
			{
				return showmessage( '个人独白保存失败', $url_forward = '/index.php/member/set_description/index', $ms = 1250 );
			}
		}
	}
}

/* End of file set_description.php */
/* Location: ./application/controllers/set_description.php */