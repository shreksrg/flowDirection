<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 上传图片数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-12-07 9:52:20
 * 
 */

class Pic_model extends CI_Model{
	var $userid;
	var $friendid;
	/**
	 * 构造函数
	 *
	 * @return Pic_model
	 */
	function Pic_model() 
	{
		
	}
	
	/**
	 * 添加上传的图片记录
	 *
	 * @return $picid
	 */
	function add_pic( $arr ) 
	{
		$this->db->insert( 'pic', $arr );
		return $this->db->insert_id();
	}
	
	/**
	 * 个人相册中的相片列表
	 * 
	 */
	function my_photo_list( $albumid )
	{
       	$this->db->where( 'userid', $this->userid );
       	$this->db->where( 'albumid', $albumid );
       	$this->db->where( 'STATUS', 0 );
		$this->db->from( 'pic' );
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
	 * 上传个人相片
	 * 
	 */
	function post_my_photo( $tableName, $arr )
	{
       	$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	/**
	 * 个人相册中的相片显示
	 * 
	 */
	function my_photo_show( $albumid, $picid )
	{
       	$query = $this->db->get_where( 'pic', array( 'albumid' => $albumid, 'userid' => $this->userid, 'picid'=>$picid ) );
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
	 * 获取个人相片信息
	 * 
	 */
	function get_my_pic_info( $picid )
	{
       	$query = $this->db->get_where( 'pic', array( 'picid' => $picid, 'userid' => $this->userid ) );
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
	 * 个人相册中的相片修改
	 * 
	 */
	function edit_my_photo( $picid, $data )
	{
       	if( $picid == '' or $data == '' ) return false;
		$this->db->where( 'picid', $picid );
		$this->db->where( 'userid', $this->userid );
		$result = $this->db->update( 'pic', $data );
		
		return $result;		
	}
	
	/**
	 * 个人相册中的相片删除
	 * 
	 */
	function delete_my_photo( $albumid, $picid )
	{
       	$this->db->where( 'userid', $this->userid );
		$this->db->where( 'albumid', $albumid );
		$this->db->where( 'picid', $picid );
		
		$result = $this->db->delete( 'pic' ); 
		return $result;		
	}
	
	function delete_my_photo_new( $picid )
	{
       	$this->db->where( 'userid', $this->userid );
		$this->db->where( 'picid', $picid );
		
		$result = $this->db->delete( 'pic' ); 
		return $result;		
	}
	
	/**
	 * 删除相关的活动相册下的图片
	 * 
	 * @param    $albumid 活动相册id
	 */
	function delete_activity_photo( $albumid )
	{
		$this->db->where( 'albumid', $albumid );
		
		$result = $this->db->delete( 'pic' ); 
		return $result;		
	}
	
	/**
	 * 好友相册中相片列表
	 * 
	 */
	function friend_photo_list( $albumid )
	{
       	$this->db->where( 'userid', $this->friendid );
       	$this->db->where( 'albumid', $albumid );
		$this->db->from( 'pic' );
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
	 * 好友上传的最新相片列表
	 * @param $friendid array  好友id数组
	 * 
	 */
	function friend_photo_new_list( $friendid )
	{
       	$this->db->where_in( 'userid', $friendid );	
		$this->db->where( "dateline  > ", ( time() - 3600*24*3 ) );
		$this->db->from( 'pic' );
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
	 * 好友相片显示
	 * 
	 */
	function friend_photo_show( $albumid, $picid )
	{
       	$query = $this->db->get_where( 'pic', array( 'albumid' => $albumid, 'userid' => $this->friendid, 'picid'=>$picid ) );
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
	 * 上传活动相册相片
	 * 
	 */
	function post_activity_photo( $tableName, $arr )
	{
       	$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	/**
	 * 活动相册里面相片列表
	 * 
	 */
	function activity_photo_list( $num, $offset, $condtion, $order_by='dateline desc' )
	{
		$sql = "SELECT * FROM paliie_pic  WHERE 1=1 and {$condtion} ORDER BY {$order_by} LIMIT {$offset},{$num}";
        return $this->db->query($sql)->result_array();      
	}
	
	/**
	 * 活动相册里面相片显示
	 * 
	 */
	function activity_photo_show( $albumid, $picid )
	{
  		$query = $this->db->get_where( 'pic', array( 'albumid' => $albumid, 'picid'=>$picid ) );
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
	 * 获取分页总数
	 * @param $condition  array  查找条件
	 * @param $table  string  表名
	 * @return $num_rows	
	 * 
	 */
	function get_condition_pic_num( $condtion )
	{
		$sql = "SELECT * FROM paliie_pic  WHERE 1=1 and {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
}


/* End of file pic_model.php
/* Location: ./application/models/album/pic_model.php */