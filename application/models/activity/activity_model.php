<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员活动数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-12-17 9:52:20
 * 
 */

class Activity_model extends CI_Model{
	var $userid;
	/**
	 * 构造函数
	 *
	 * @return Activity_model
	 */
	function Activity_model() 
	{
		
	}
	
	/**
	 * 发起活动
	 *
	 * 
	 */
	function create( $tableName, $arr )
	{
		$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	/**
	 * 获取活动的详细信息
	 *
	 * @param unknown_type $aid
	 */
	function get_activity_info( $aid )
	{
		$query = $this->db->get_where( 'activity', array( 'aid' => $aid ) );
        if ( $row = $query->row_array() )
        {			
            $result = $row;
        	return $result;
        }
        else 
        {
        	return array();
        }
	}
	
	/**
	 * 编辑活动信息
	 * @param 		$aid	        活动id
	 * @param 		$data	        需要修改的记录
	 * @return      bool
	 */
	function edit_activity_info( $aid, $data )
	{
		if( $aid == '' or $data == '' ) return false;
		$this->db->where( 'aid', $aid );
		//$this->db->where( 'userid', $this->userid );
		$result = $this->db->update( 'activity', $data );
		
		return $result;		
	}
	
	/**
	 * 获取所有的活动
	 * 
	 * @param $order_by 排序方式
	 * @param $condtion 查找条件
	 * @return $list 所有活动列表
	 */
	function get_activity_list( $order_by, $limit )
	{
		$this->db->order_by( $order_by,  " desc" );
		
		$query = $this->db->get( 'activity', $limit );
		
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
	 * 获取搜索的活动
	 * 
	 * @param $order_by 排序方式
	 * @param $condtion 查找条件
	 * @return $list 所有活动列表
	 */
	function get_search_activity_list( $condtion, $order_by, $limit )
	{
		if( $condtion != '' ) $this->db->where( $condtion );
		$this->db->order_by( $order_by,  " desc" );
		$query = $this->db->get( 'activity', $limit );
		
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
	 * 获取我发起的活动
	 * 
	 * @param $order_by 排序方式
	 * @return $list 我发起的活动列表
	 */
	function get_my_launch( $num, $offset, $condition, $order_by='a.aid desc' )
	{
		/*$this->db->where( 'userid', $this->userid );
		$this->db->order_by( $order_by,  " desc" );
		
		$query = $this->db->get( 'activity' );
		
		$list = array();
		if( !empty( $query ) )
		{
	        foreach ( $query->result_array() as $row ){
	            $list[] = $row;
	        }
		}
		
		return $list;*/
		
		
		$sql = "SELECT a.*, b.albumid, b.picnum,b.thumb,b.username FROM paliie_activity a left join paliie_album b ON a.aid = b.aid WHERE 1=1 {$condition} ORDER BY {$order_by} LIMIT {$offset},{$num}";
        return $this->db->query($sql)->result_array();
	}
	
	/**
	 * 获取我参与的活动
	 * 
	 * @param $order_by 排序方式
	 * @return $list 我发起的活动列表
	 */
	function get_my_join( $order_by, $aid )
	{
		if( !is_array( $aid ) or empty( $aid ) ) return false;
		$this->db->where_in( 'aid', $aid );
		
		$this->db->order_by( $order_by,  " desc" );
		$query = $this->db->get( 'activity' );
		
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
	 * 获取我关注的活动
	 * 
	 * @param $order_by 排序方式
	 * @return $list 我关注的活动列表
	 */
	function get_my_attention( $order_by, $aid )
	{
		if( !is_array( $aid ) or empty( $aid ) ) return false;
		$this->db->where_in( 'aid', $aid );
		
		$this->db->order_by( $order_by,  " desc" );
		
		$query = $this->db->get( 'activity' );
		
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
	 * 删除活动
	 * 
	 * @param    $aid    活动的id
	 * @return   bool
	 */
	function delete_activity( $aid )
	{
		if( is_array( $aid ) )
		{
			foreach ( $aid as $k=>$v ) 
			{
				$this->db->where( 'aid', $v );
				$result = $this->db->delete( 'activity' ); 
			}
		} 
		else 
		{
			$this->db->where( 'aid', $aid );
			$result = $this->db->delete( 'activity' ); 
		}
		
		return $result;
	}
	
	function get_condition_activity_num( $condtion )
	{
		$sql = "SELECT a.* FROM paliie_activity a  WHERE 1=1 {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
}


/* End of file activity_model.php
/* Location: ./application/models/activity/activity_model.php */