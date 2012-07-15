<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员名片数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-12-07 14:52:20
 * 
 */
class Members_card_model extends CI_Model {
	var $userid;
	/**
	 * 构造函数
	 *
	 * @return Members_model
	 */
	function Members_card_model() 
	{
		
	}
	
	/**
	 * 设置会员为个人通讯录成员
	 * 
	 * @param 		$email_id	邮件id
	 * @return bool
	 * 
	 */
	function create( $tableName, $arr )
	{
		if( $tableName == '' or $arr == '' ) return false;
		 
		$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	/**
	 * 获取创建者自己的名片信息
	 * 
	 * @return array
	 * 
	 */
	function get_my_card_info()
	{
		$this->db->where( 'userid', $this->userid );
		$this->db->where( 'ouserid', $this->userid );
		
		$query = $this->db->get( 'vcard' );
        if ( $row = $query->row_array() )
        {			
            return $row;
        }
        else 
        {
        	return array();
        }
	}
	
	/**
	 * 获取个人名片信息
	 * 
	 * @param 		$cardid	名片id
	 * @return array
	 * 
	 */
	function get_card_info( $cardid )
	{
		$query = $this->db->get_where( 'vcard', array( 'cardid' => $cardid ) );
        if ( $row = $query->row_array() )
        {			
            return $row;
        }
        else 
        {
        	return array();
        }
	}
	
	/**
	 * 获取个人通讯录
	 * 
	 * @return list
	 * 
	 */
	function get_card_list()
	{
		$condition = "(userid={$this->userid} and ouserid!={$this->userid})";
		$this->db->where( $condition );
        $query = $this->db->get( 'vcard' );
		
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
	 * 获取个人常用联系人
	 * 
	 * @return list
	 * 
	 */
	function get_often_card_list()
	{
		$condition = "(userid={$this->userid} and ouserid!={$this->userid} and gid=2)";
		$this->db->where( $condition );
        $query = $this->db->get( 'vcard' );
		
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
	 * 
	 * 设置个人常用联系人
	 * 
	 * @return bool
	 * 
	 */
	function set_often_card( $cardid )
	{
		$this->db->where( 'userid', $this->userid );
		
        if( is_array( $cardid ) )
		{
			foreach ( $cardid as $k=>$v ) 
			{
				$this->db->where( 'cardid', $v );
				$this->db->set( 'gid', 2 );	
				$result = $this->db->update( 'vcard' );
			}
		} 
		else 
		{
			$this->db->where( 'cardid', $cardid );
			$this->db->set( 'gid', 2 );	
			$result = $this->db->update( 'vcard' );
		}
		
		return $result;
	}
	
	/**
	 * 
	 * 取消个人常用联系人
	 * 
	 * @return bool
	 * 
	 */
	function delete_often_card( $cardid )
	{
		$this->db->where( 'userid', $this->userid );
		
        if( is_array( $cardid ) )
		{
			foreach ( $cardid as $k=>$v ) 
			{
				$this->db->where( 'cardid', $v );
				$this->db->set( 'gid', 1 );	
				$result = $this->db->update( 'vcard' );
			}
		} 
		else 
		{
			$this->db->where( 'cardid', $cardid );
			$this->db->set( 'gid', 1 );	
			$result = $this->db->update( 'vcard' );
		}
		
		return $result;
	}
	
	/**
	 * 修改会员名片信息
	 * 
	 * @param 		$cardid	    名片id
	 * @param 		$data	需要修改的记录
	 * @return bool
	 * 
	 */
	function edit_card_info( $cardid, $data )
	{
		if( $cardid == '' or $data == '' ) return false;
		$this->db->where( 'cardid', $cardid );
		$this->db->where( 'userid', $this->userid );
		$result = $this->db->update( 'vcard', $data );
		
		return $result;		
	}
	
	/**
	 * 删除会员名片
	 * 
	 * @param 		$cardid	    名片id
	 * @return bool
	 * 
	 */
	function delete_card( $cardid )
	{
		if( $cardid == '' ) return false;
		$this->db->where( 'userid', $this->userid );
		
		if( is_array( $cardid ) )
		{
			foreach ( $cardid as $k=>$v ) 
			{
				$this->db->where( 'cardid', $v );
				$result = $this->db->delete( 'vcard' ); 
			}
		} 
		else 
		{
			$this->db->where( 'cardid', $cardid );
			$result = $this->db->delete( 'vcard' ); 
		}
		
		return $result;
	}
}

/* End of file Members_card_model.php
/* Location: ./application/models/member/members_card_model.php */