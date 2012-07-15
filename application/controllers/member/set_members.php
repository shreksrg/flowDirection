<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员个人基本资料设置
* @category set_members
* @author taylorchen
* @version v1.0 $date 2011-11-22 20:02:20
* 
*/
class Set_members extends CI_Controller {
	var $user_id;
	/**
	 * 构造函数
	 * 
	 */
	public function Set_members() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
	}
	
	/**
	 * 个人详细信息的显示
	 * 
	 */
	public function index()
	{
		$member_info = array();
		$member_profile_info = array();
		$this->load->model( 'member/members_model', '', TRUE ); 
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		        
		$member_info = $this->members_model->get_member( $this->user_id );
		$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
		
		$data['member'] = $member_info;
		$data['member_profile'] = $member_profile_info;
		$this->parser->parse( 'member/my_setting.tpl', $data );
	}
	
	/**
	 * 编辑个人信息
	 * 
	 */
	public function update() 
	{	
		$id = intval( $this->input->post( 'member_id' ) );
		if( $id == 0 ) {
			$member_info = array();
			$member_profile_info = array();
			$this->load->model( 'member/members_model', '', TRUE ); 
			$this->load->model( 'member/members_profile_model', '', TRUE ); 
		        
			$member_info = $this->members_model->get_member( $this->user_id );
			$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
		
			$data['member'] = $member_info;
			$data['member_profile'] = $member_profile_info;
			$this->parser->parse( 'member/members_profile_update.tpl', $data );
		} else {
		
			$nickname = $this->input->post( 'nickname' );
			$gender = $this->input->post( 'gender' );
			$height = $this->input->post( 'height' );
			$weight = $this->input->post( 'weight' );
			$updated_at = time();
			
			$birthyear = $this->input->post( 'birthyear' );
			$birthmonth = $this->input->post( 'birthmonth' );
			$birthday = $this->input->post( 'birthday' );
			
			$regprovince = $this->input->post( 'regprovince' );
			$regcity = $this->input->post( 'regcity' );
			$regdist = $this->input->post( 'regdist' );
			$regcommunity = $this->input->post( 'regcommunity' );
			
			$marital = $this->input->post( 'marital' );
			$nation = $this->input->post( 'nation' );
			$mobile = $this->input->post( 'mobile' );
			$qq = $this->input->post( 'qq' );
			
			//加载表单认证类  后期制作
			
	        $this->load->model( 'member/members_profile_model', '', TRUE );
			$this->members_profile_model->nickname = $nickname;
			$this->members_profile_model->gender = $gender;
			$this->members_profile_model->height = $height;
			$this->members_profile_model->weight = $weight;
			
			$this->members_profile_model->birthyear = $birthyear;
			$this->members_profile_model->birthmonth = $birthmonth;
			$this->members_profile_model->birthday = $birthday;
			
			$this->members_profile_model->regprovince = $regprovince;
			$this->members_profile_model->regcity = $regcity;
			$this->members_profile_model->regdist =  $regdist;
			$this->members_profile_model->regcommunity = $regcommunity;
			
			$this->members_profile_model->marital = $marital;
			$this->members_profile_model->nation = $nation;
			$this->members_profile_model->mobile = $mobile;
			$this->members_profile_model->qq = $qq;
			$this->members_profile_model->updated_at = $updated_at;
			
			$result = $this->members_profile_model->update( $id );
			
			if( $result )
			{
				echo "<script language='javascript'>alert('个人信息保存成功!');
				location.href='/index.php/member/set_members/index';</script>";
				die;
			} 
			else
			{
				echo "<script language='javascript'>alert('个人信息保存失败!');
				location.href='/index.php/member/set_members/update';</script>";
				die;
			}
		}
	}
}

/* End of file set_members.php */
/* Location: ./application/controllers/set_members.php */