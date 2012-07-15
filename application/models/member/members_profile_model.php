<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员详细信息数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-11-17 14:52:20
 * 
 */

class Members_profile_model extends CI_Model{
	var $userid;
	
	var $nickname;
	
	var $gender;
	
	var $nationality;
	
	var $birthprovince;
	
	var $birthcity;
	
	var $birthyear;
	
	var $birthmonth;
	
	var $birthday;
	
	var $height;
	
	var $weight ;
	
	var $marital;
	
	var $nation;
	
	var $mobile;
	
	var $qq;  //数据库中没有这字段
	
	var $updated_at;  //详细信息更新时间 数据库中没有这字段
	
	var $life_habits;  // 数据库中没有这字段
	
	var $yd_habits;  // 数据库中没有这字段
	
	var $smoke;  // 数据库中没有这字段
	
	var $drink;  // 数据库中没有这字段
	
	var $housework;  // 数据库中没有这字段
	
	var $cooking;  // 数据库中没有这字段
	
	var $life_skills;  // 数据库中没有这字段
	
	var $love_yd;  // 数据库中没有这字段
	
	var $love_food;  // 数据库中没有这字段
	
	var $love_book;  // 数据库中没有这字段
	
	var $love_tv;  // 数据库中没有这字段
	
	var $leisure;  // 数据库中没有这字段
	
	var $love_hobby;  // 数据库中没有这字段
	
	var $love_area;  // 数据库中没有这字段
	
	var $description;  // 数据库中没有这字段
	
	/**
	 * 构造函数
	 *
	 * @return Members_profile_model
	 */
	function Members_profile_model() 
	{
		
	}
	
	/**
	 * 添加新会员詳細信息
	 * 
	 */
	function create()
	{
		$this->db->set( 'userid', $this->userid );
		$this->db->set( 'username', $this->username );
        $this->db->set( 'gender', $this->gender );		
        	
		$this->db->set( 'regprovince', $this->regprovince );
		$this->db->set( 'regcity', $this->regcity );
	    $this->db->set( 'education', $this->education );
		$this->db->set( 'work', $this->work );
		
		$this->db->set( 'birthyear', $this->birthyear );
		$this->db->set( 'birthmonth', $this->birthmonth );
		$this->db->set( 'birthday', $this->birthday );
		$this->db->set( 'updated_at', $this->updated_at );
              
        return $this->db->insert( 'members_profile' );
	}
	
	/**
	 * 更新会员详细信息
	 * @param $id
	 * @param $data
	 * @return bool
	 * 
	 */
	function update( $id, $data ) {
        if( $id == '' or $data == '' ) return false;
		$this->db->where( 'userid', $id );
		$result = $this->db->update( 'members_profile', $data );
		
		return $result;		
	}
	
	/**
	 * 更新生活习惯信息
	 * @param $id
	 * @return bool
	 * 
	 */
	function update_life_habits( $id ) 
	{
		$this->db->set( 'life_habits', $this->life_habits );
		$this->db->set( 'yd_habits', $this->yd_habits );
		$this->db->set( 'smoke', $this->smoke );
		$this->db->set( 'drink', $this->drink );
		
		$this->db->set( 'housework', $this->housework );
		$this->db->set( 'cooking', $this->cooking );
		$this->db->set( 'life_skills', $this->life_skills );
		$this->db->set( 'updated_at', $this->updated_at );
		
        $this->db->where( 'userid', $id );
        return $this->db->update( 'members_profile' );
	}
	
	/**
	 * 更新兴趣爱好资料
	 * @param $id
	 * @return bool
	 * 
	 */
	function update_interests( $id )
	{
		$this->db->set( 'love_yd', $this->love_yd );
		$this->db->set( 'love_food', $this->love_food );
		$this->db->set( 'love_book', $this->love_book );
		$this->db->set( 'love_tv', $this->love_tv );
		
		$this->db->set( 'leisure', $this->leisure );
		$this->db->set( 'love_hobby', $this->love_hobby );
		$this->db->set( 'love_area', $this->love_area );
		$this->db->set( 'updated_at', $this->updated_at );
		
        $this->db->where( 'userid', $id );
        return $this->db->update( 'members_profile' );
	}
	
	/**
	 * 更新自我描述
	 *
	 * @param unknown_type $id
	 * @return bool
	 */
	function update_description( $id )
	{
		$this->db->set( 'description', $this->description );
		$this->db->set( 'updated_at', $this->updated_at );
		
        $this->db->where( 'userid', $id );
        return $this->db->update( 'members_profile' );
	}
	
	/**
	 * 获取会员的详细信息
	 *
	 * @param unknown_type $id
	 * @return array
	 * 
	 */
	function get_member_profile( $id ) 
	{
		$query = $this->db->get_where( 'members_profile', array( 'userid' => $id ) );
        if ( $row = $query->row_array() )
        {			
            return $row;
        }
        else {
        	return array();
        }
	}
	
	/**
	 * 获取搜索的会员列表信息
	 *
	 * @param array $field
	 * @return array
	 * 
	 */
	function get_search_member_list( $num, $offset, $condition, $order_by='a.userid desc'  ) 
	{	
		$sql = "SELECT a.*, b.audit FROM paliie_members_profile a left join paliie_members b ON a.userid = b.userid WHERE {$condition} ORDER BY {$order_by} LIMIT {$offset},{$num}";
        return $this->db->query($sql)->result_array();
	}
	
	/**
	 * 获取搜索的会员列表信息
	 *
	 * @param array $userid
	 * @return array
	 * 
	 */
	function get_interests_member_list( $userid ) 
	{
		$sql = "SELECT * FROM paliie_members_profile WHERE userid!={$userid} ORDER BY RAND() limit 5";
        $list = $this->db->query($sql)->result_array();
		return $list;
	}
	
	function get_condition_members_num( $condtion )
	{
		$sql = "SELECT a.*,b.audit FROM paliie_members_profile a left join paliie_members b ON a.userid = b.userid WHERE {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
}


/* End of file members_profile_model.php
/* Location: ./application/models/customer/members_profile_model.php */