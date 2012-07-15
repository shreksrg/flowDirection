<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员参加活动记录 数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-12-23 9:52:20
 * 
 */

class Activity_join_model extends CI_Model{
	var $userid;
	/**
	 * 构造函数
	 *
	 * @return Activity_join_model
	 */
	function Activity_join_model() 
	{
		
	}
	
	/**
	 * 获取本活动所有参加的会员列表信息
	 *
	 * @param unknown_type $aid
	 */
	function get_activity_join_list( $aid )
	{
		$this->db->where( 'aid', $aid );
		$this->db->order_by( 'dateline',  " desc" );
		
		$query = $this->db->get( 'activity_join' );
		
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
	 * 获取我参加的所有活动的报名列表信息
	 *
	 * @return $list
	 */
	function get_my_join_list( $num, $offset, $condition, $order_by='c.dateline desc' )
	{
		/*$this->db->where( 'uid', $this->userid );
		$this->db->order_by( 'dateline',  " desc" );
		
		$query = $this->db->get( 'activity_join' );
		
		$list = array();
		if( !empty( $query ) )
		{
	        foreach ( $query->result_array() as $row ){
	            $list[] = $row;
	        }
		}
		
		return $list;*/
		
		$sql = "SELECT a.*, b.albumid, b.picnum, c.* FROM paliie_activity a LEFT JOIN paliie_album b ON a.aid = b.aid 
        LEFT JOIN paliie_activity_join c ON a.aid = c.aid 
        WHERE 1=1 {$condition} ORDER BY {$order_by} LIMIT {$offset},{$num}";
		return $this->db->query($sql)->result_array();
	}
	
	/**
	 * 参与活动
	 * 
	 * @param $tableName  活动参与表
	 * @param $arr   相关记录
	 */
	function join( $tableName, $arr )
	{
		$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	function get_condition_activity_join_num( $condtion )
	{
		$sql = "SELECT c.* FROM paliie_activity_join c  WHERE 1=1 {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
	
	function delete_activity_join( $aid, $uid )
	{
		if( is_array( $aid ) )
		{
			foreach ( $aid as $k=>$v ) 
			{
				$this->db->where( 'aid', $v );
				$this->db->where( 'uid', $uid );
				$result = $this->db->delete( 'activity_join' ); 
			}
		} 
		else 
		{
			$this->db->where( 'aid', $aid );
			$this->db->where( 'uid', $uid );
			$result = $this->db->delete( 'activity_join' ); 
		}
		
		return $result;
	}
	
}


/* End of file activity_join_model.php
/* Location: ./application/models/activity/activity_join_model.php */