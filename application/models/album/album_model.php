<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员相册数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-12-07 9:52:20
 * 
 */

class Album_model extends CI_Model{
	var $userid;
	var $friendid;
	/**
	 * 构造函数
	 *
	 * @return Members_model
	 */
	function Album_model() 
	{
		
	}
	
	/**
	 * 新增个人相册
	 * 
	 */
	function create_my_album( $tableName, $arr )
	{
       	$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	/**
	 * 获取个人相册信息
	 * 
	 */
	function get_my_album_info( $albumid )
	{
       	$query = $this->db->get_where( 'album', array( 'albumid' => $albumid, 'userid' => $this->userid ) );
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
	 * 获取个人生活照相册信息 相册分类 catid=105 
	 * 
	 */
	function get_my_life_album_info( $catid )
	{
       	$query = $this->db->get_where( 'album', array( 'catid' => $catid, 'userid' => $this->userid ) );
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
	 * 获取好友相册信息
	 * 
	 */
	function get_friend_album_info( $albumid )
	{
       	$query = $this->db->get_where( 'album', array( 'albumid' => $albumid, 'userid' => $this->friendid ) );
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
	 * 获取活动相册信息
	 * 
	 */
	function get_activity_album_info( $albumid )
	{
       	$this->db->where( 'albumid', $albumid );
       	$this->db->where( 'aid !=', 0 );
		$this->db->from( 'album' );
       	$query = $this->db->get();
		
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
	 * 编辑个人相册
	 * @param 		$albumid	    相册id
	 * @param 		$data	        需要修改的记录
	 * @return      bool
	 */
	function edit_my_album( $albumid, $data )
	{
		if( $albumid == '' or $data == '' ) return false;
		$this->db->where( 'albumid', $albumid );
		$this->db->where( 'userid', $this->userid );
		$result = $this->db->update( 'album', $data );
		
		return $result;		
	}
	
	/**
	 * 个人相册列表
	 * 
	 */
	function my_album_list()
	{
       	$this->db->where( 'userid', $this->userid );
       	$this->db->where( 'aid =', 0 );
		$this->db->from( 'album' );
		$this->db->order_by( "dateline", "desc" );
		$query = $this->db->get();
		
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
	 * 好友相册列表
	 * @param $friendid 好友id
	 */
	function friend_album_list( $friendid )
	{
       	$this->db->where_in( 'userid', $friendid );
       	$this->db->where( 'picflag', 0 );
		$this->db->from( 'album' );
		$this->db->order_by( "dateline", "desc" );
		$query = $this->db->get();
		
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
	 * 新增活动相册
	 * 
	 */
	function create_activity_album()
	{
       	
	}
	
	/**
	 * 所有活动相册列表
	 * 
	 */
	function activity_album_list( $num, $offset, $condtion, $order_by='dateline desc' )
	{
       	$sql = "SELECT * FROM paliie_album  WHERE 1=1 and {$condtion} ORDER BY {$order_by} LIMIT {$offset},{$num}";
        return $this->db->query($sql)->result_array();      
	}
	
	/**
	 * 具体某个活动相册列表
	 * 
	 * @param $aid  活动id;
	 */
	function this_activity_album_info( $aid, $catid )
	{
       	$this->db->where( 'picflag', 0 );
       	$this->db->where( 'aid', $aid );
       	$this->db->where( 'catid', $catid );
		$this->db->from( 'album' );
		$query = $this->db->get();
		
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
	 * 修改活动相册信息
	 * @param 		$albumid	    相册id
	 * @param 		$data	        需要修改的记录
	 * @return      bool
	 */
	function edit_activity_album( $albumid, $data )
	{
		if( $albumid == '' or $data == '' ) return false;
		$this->db->where( 'albumid', $albumid );
		$this->db->where( 'aid !=', 0 );
		$result = $this->db->update( 'album', $data );
		
		return $result;		
	}
	
	/**
	 * 删除相册信息
	 * @param 		$albumid	    相册id
	 * @return      bool
	 */
	function delete_album( $albumid )
	{
		if( is_array( $albumid ) )
		{
			foreach ( $albumid as $k=>$v ) 
			{
				$this->db->where( 'albumid', $v );
				$result = $this->db->delete( 'album' ); 
			}
		} 
		else 
		{
			$this->db->where( 'albumid', $albumid );
			$result = $this->db->delete( 'album' ); 
		}
		
		return $result;
	}
	
	/**
	 * 获取分页总数
	 * @param $condition  array  查找条件
	 * @param $table  string  表名
	 * @return $num_rows	
	 * 
	 */
	function get_condition_album_num( $table, $condtion )
	{
		$sql = "SELECT * FROM paliie_album  WHERE 1=1 and {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
}


/* End of file album_model.php
/* Location: ./application/models/album/album_model.php */