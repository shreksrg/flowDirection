<?php
class M_common extends CI_Model{
	
	public $loginState = false;
	
	//验证是否登录
	function validateLogin(){
		$user_name = $this->session->userdata('user_id');
		if(empty($user_name)){
			header("Location:/index.php/member/login");
			die;
		}
	}
	
	//正则验证传入ID :为正整数
	function chkInputID($id){
		if(!preg_match('/^[0-9]+$/',$id)){
			return false;
		}
		return true;
	}
	
	//AJAX验证是否登录
	function ajax_ValidLogin(){
		$SID = $this->session->userdata('user_id');
		if(empty($SID)){
			return false;
		}
		return true;
	}
	
	//显示快速登录
	function chkloginAndPopUp(){
		if(!$this->validater->ajax_ValidLogin()) {
			$this->parser->parse('common/quickLogin.tpl');
			return false;
		}
		return true;
	}
	
	function ajax_userLogin($u,$p){
		$p=md5($p);
		$sql="select * from paliie_members where username=? and password=?";
		$query=$this->db->query($sql,array($u,$p));
		if($query->num_rows()){
			return true	;
		}
		return false;
	}
	
	
	
	
	
	//获取左边个人 通知总数
	function get_admin_email_num()
	{
		$user_id = $this->session->userdata( 'user_id' );
		$this->db->where( 'touserid', $user_id );
		$this->db->where( 'adminsend', 1 );
		$this->db->from( 'pms' );
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	//获取左边个人 邮件总数
	function get_email_num()
	{
		$user_id = $this->session->userdata( 'user_id' );
		$condition = "(touserid={$user_id} and togarbage=0 and todelete=0 ) or (fromuserid={$user_id} and fromgarbage=0 and fromdelete=0)";
		$this->db->where( $condition );
		$this->db->where( 'adminsend', 0 );
		
		$this->db->from( 'pms' );
		$query = $this->db->get();

		return $query->num_rows();
	}
	
	//获取左边个人 朋友总数
	function get_friend_num()
	{
		$user_id = $this->session->userdata( 'user_id' );
		$this->db->where( 'userid', $user_id );
		$this->db->from( 'friend' );
		$query = $this->db->get();

		return $query->num_rows();
	}
	
	/**
	 * 查询会员信息，返回用户列表
	 * @param $conditon      查询条件
	 * @return array;
	 * 
	 */	
	function get_member_list( $condition )
	{
		$sql = "SELECT * FROM paliie_members WHERE  {$condition} ORDER BY RAND() limit 4"; 
        return $this->db->query($sql)->result_array();
	}
	
	function get_random_members( $limit = 8, $condition="1=1" )
	{
		$sql = "SELECT a.userid as auid, b.* FROM paliie_members a LEFT JOIN paliie_members_profile b ON a.userid = b.userid WHERE {$condition} ORDER BY RAND() LIMIT {$limit}";
		
		return $this->db->query($sql)->result_array();
	}
	
	function get_city_info( $condition )
	{
		$sql = "SELECT * FROM  city WHERE  {$condition}"; 
        return $this->db->query($sql)->row_array();
	}
	
	function get_province_info( $condition )
	{
		$sql = "SELECT * FROM  province WHERE  {$condition}"; 
        return $this->db->query($sql)->row_array();
	}
	
	//获取左边个人 关注列表
	function get_attention_members( $limit = 8, $condition="1=1" )
	{
		$sql = "SELECT a.*,b.userid as buserid FROM paliie_members_profile a LEFT JOIN paliie_friend_attention b ON a.userid = b.fuserid WHERE {$condition} ORDER BY RAND() LIMIT {$limit}";
		
		return $this->db->query($sql)->result_array();
	}
	
	//获取左边个人 感兴趣的活动
	function get_interested_activity( $limit = 8, $condition="1=1" )
	{
		$sql = "SELECT a.*,b.thumb FROM paliie_activity a LEFT JOIN paliie_album b ON a.aid = b.aid WHERE {$condition} ORDER BY RAND() LIMIT {$limit}";
		
		return $this->db->query($sql)->result_array();
	}
}
/* End of file m_common.php */
/* Location: ./application/models/common/m_common.php */