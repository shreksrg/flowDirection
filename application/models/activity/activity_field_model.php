<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员活动特定操作数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-12-23 1:52:20
 * 
 */

class Activity_field_model extends CI_Model{
	var $userid;
	/**
	 * 构造函数
	 *
	 * @return Activity_field_model
	 */
	function Activity_field_model() 
	{
		
	}
	
	/**
	 * 获取该活动的会员关注记录 列表
	 *
	 * @param unknown_type $aid
	 * @return $list
	 */
	function get_activity_field_list( $aid )
	{
		$this->db->where( 'aid', $aid );
		$this->db->order_by( 'dateline',  " desc" );
		
		$query = $this->db->get( 'activity_field' );
		
		$list = array();
		if( !empty( $query ) )
		{
	        foreach ( $query->result_array() as $row ){
	            $list[] = $row;
	        }
		}
		
		return $list;
	}
	
	/**
	 * 获取我关注的活动记录 列表
	 *
	 * @return $list
	 */
	function get_my_field_list( $num, $offset, $condition, $order_by='c.dateline desc' )
	{
		/*$this->db->where( 'uid', $this->userid );
		$this->db->order_by( 'dateline',  " desc" );
		
		$query = $this->db->get( 'activity_field' );
		
		$list = array();
		if( !empty( $query ) )
		{
	        foreach ( $query->result_array() as $row ){
	            $list[] = $row;
	        }
		}
		
		return $list;*/
		
		$sql = "SELECT a.*, b.albumid, b.picnum, c.* FROM paliie_activity a LEFT JOIN paliie_album b ON a.aid = b.aid 
        LEFT JOIN paliie_activity_field c ON a.aid = c.aid 
        WHERE 1=1 {$condition} ORDER BY {$order_by} LIMIT {$offset},{$num}";
		return $this->db->query($sql)->result_array();
	}
	
	/**
	 * 加入关注
	 * 
	 * @param $arr  加入关注的相关数据
	 * @param $tableName  活动关注表 名
	 */
	function set_attention( $tableName, $arr )
	{
		$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	
	function get_condition_activity_field_num( $condtion )
	{
		$sql = "SELECT c.* FROM paliie_activity_field c  WHERE 1=1 {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
	
	function delete_activity_field( $aid, $uid )
	{
		if( is_array( $aid ) )
		{
			foreach ( $aid as $k=>$v ) 
			{
				$this->db->where( 'aid', $v );
				$this->db->where( 'uid', $uid );
				$result = $this->db->delete( 'activity_field' ); 
			}
		} 
		else 
		{
			$this->db->where( 'aid', $aid );
			$this->db->where( 'uid', $uid );
			$result = $this->db->delete( 'activity_field' ); 
		}
		
		return $result;
	}
}


/* End of file activity_field_model.php
/* Location: ./application/models/activity/activity_field_model.php */