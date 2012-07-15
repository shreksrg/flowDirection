<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 网站首页模型
 * @author liangcheng.wu
 * 
 */

class Index_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_members($limit=10)
	{
		$this->db->limit($limit);
		$this->db->select('members.userid,members.username,nickname,birthyear,regcity');
		$this->db->from('members');
		$this->db->join('members_profile','members.userid = members_profile.userid');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_hot_activity( $limit, $order_by = 'lasttime' )
	{
		$this->db->where( 'hot', 1 );
		$this->db->where( 'audit', 0 );
		$this->db->order_by( $order_by, ' desc' );
		$this->db->limit( $limit );
		$query = $this->db->get( 'activity' );
		return $query->result_array();
	}
	
	function get_hot_mapblog($limit=10)
	{
		$this->db->limit($limit);
		$query = $this->db->get('blog');
		return $query->result_array();
	}
	
	function get_slides($limit=10)
	{
		$this->db->limit($limit);
		$query = $this->db->get('members');
		return $query->result_array();
	}
	
	//获取会员所在的城市列表
	function get_user_area( $limit = 10 )
	{
		$this->db->select( 'regcity' );
		$this->db->distinct();

		$this->db->limit( $limit );
		$this->db->from( 'members_profile' );
		$query = $this->db->get();
		
		$list = array();
		if( !empty( $query ) )
		{
			foreach ( $query->result_array() as $row )
			{
				$list[] = $row;
			}
		}
		return $list;
	}
	
	//获取某城市所有的会员列表
	function get_area_user_list( $city_code, $limit = 10, $order_by="a.userid desc" )
	{
		/*if( is_array( $city_code ) )
		{
			$this->db->where_in( 'regcity', $city_code );
		} 
		else 
		{
			$this->db->where( 'regcity', $city_code );
		}
		
		$this->db->limit( $limit );
		$this->db->from( 'members_profile' );
		$query = $this->db->get();
		
		$list = array();
		if( !empty( $query ) )
		{
			foreach ( $query->result_array() as $row )
			{
				$list[] = $row;
			}
		}
		return $list;
		*/
		
		$sql = "SELECT a.* FROM paliie_members_profile a LEFT JOIN  paliie_members b ON a.userid = b.userid WHERE b.recommend=1 and a.regcity='{$city_code}' ORDER BY {$order_by} limit {$limit} ";
		
		return $this->db->query( $sql )->result_array();
	}
	
	//获取其他城市所有的会员列表
	function get_orher_area_user_list( $area, $limit = 10 )
	{
		if( is_array( $area ) )
		{
			$this->db->where_not_in( 'regcity', $area );
		} 
		else 
		{
			$this->db->where( 'regcity!=', $area );
		}
		
		$this->db->limit( $limit );
		$this->db->from( 'members_profile' );
		$query = $this->db->get();
		
		$list = array();
		if( !empty( $query ) )
		{
			foreach ( $query->result_array() as $row )
			{
				$list[] = $row;
			}
		}
		return $list;
	}
	
	
}