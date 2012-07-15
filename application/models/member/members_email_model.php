<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员站内信箱数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-11-26 14:52:20
 * 
 */

class Members_email_model extends CI_Model{
	var $fromuserid;
	
	var $fromusername;
	
	var $touserid;
	
	var $folder;
	
	var $NEW;
	
	var $SUBJECT;
	
	var $message;
	
	var $dateline;
	
	var $userid;
	
	/**
	 * 构造函数
	 *
	 * @return Members_model
	 */
	function Members_email_model() 
	{
		
	}
	
	/**
	 * 添加站内信
	 * 
	 */
	function create( $tableName, $arr )
	{
       	$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
	}
	
	/**
	 * 显示站内信内容
	 * @param	int		$email_id	站内信id
	 * @return	array	$result		返回的站内信内容
	 * 
	 */
	function get_email_info( $email_id )
	{
		$query = $this->db->get_where( 'pms', array( 'pmid' => $email_id ) );
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
	 * 获取会员收件箱邮件
	 * 
	 * @return array	$list	收件箱邮件列表
	 * 
	 */
	function get_receive_email( $num, $offset, $order_by )
	{
		$this->db->where( 'touserid', $this->userid );
		$this->db->where( 'togarbage', 0 );
		$this->db->where( 'todelete', 0 );
		$this->db->where( 'adminsend', 0 );
		$this->db->order_by( $order_by,  " desc" );
		
		$query = $this->db->get( 'pms', $num, $offset );
		
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
	 * 设置会员的收件信为垃圾箱邮件
	 *
	 * @param 		$email_id	邮件id
	 * @return bool
	 * 
	 */
	function set_receive_garbage_email( $email_id = array() )
	{
		$this->db->where( 'touserid', $this->userid );
		
		if( is_array( $email_id ) )
		{
			foreach ( $email_id as $k=>$v ) 
			{
				$this->db->where( 'pmid', $v );
				$this->db->set( 'togarbage', 1 );	
				$result = $this->db->update( 'pms' );
			}
		} 
		else 
		{
			$this->db->where( 'pmid', $email_id );
			$this->db->set( 'togarbage', 1 );	
			$result = $this->db->update( 'pms' );
		}
		
		return $result;
	}
	
	/**
	 * 设置会员的发件信为垃圾箱邮件
	 *
	 * @param 		$email_id	邮件id
	 * @return bool
	 * 
	 */
	function set_send_garbage_email( $email_id = array() )
	{
		$this->db->where( 'fromuserid', $this->userid );
		
		if( is_array( $email_id ) )
		{
			foreach ( $email_id as $k=>$v ) 
			{
				$this->db->where( 'pmid', $v );
				$this->db->set( 'fromgarbage', 1 );	
				$result = $this->db->update( 'pms' );
			}
		} 
		else 
		{
			$this->db->where( 'pmid', $email_id );
			$this->db->set( 'fromgarbage', 1 );	
			$result = $this->db->update( 'pms' );
		}
		
		return $result;
	}
	
	/**
	 * 彻底删除 收件箱邮件
	 * 
	 * @param $email_id
	 * 
	 */
	function set_receive_email_detele( $email_id )
	{
		$this->db->where( 'touserid', $this->userid );
		$this->db->where( 'pmid', $email_id );
		$this->db->set( 'todelete', 1 );	
		$result = $this->db->update( 'pms' );
		
		return $result;		
	}
	
	/**
	 * 彻底删除 发件箱邮件
	 * 
	 * @param $email_id
	 * 
	 */
	function set_send_email_detele( $email_id )
	{
		$this->db->where( 'fromuserid', $this->userid );
		$this->db->where( 'pmid', $email_id );
		$this->db->set( 'fromdelete', 1 );	
		$result = $this->db->update( 'pms' );
		
		return $result;
	}
	
	/**
	 * 获取会员的垃圾桶邮件
	 *
	 * @return array	$list	垃圾邮件列表
	 * 
	 */
	function get_garbage_email()
	{
		$condition = "(touserid={$this->userid} and togarbage=1 and todelete=0 ) or (fromuserid={$this->userid} and fromgarbage=1 and fromdelete=0)";
		$this->db->where( $condition );	
		
		$this->db->limit( 10 );
		$this->db->from( 'pms' );
		$this->db->order_by( "dateline",  " desc" );
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
	 * 获取会员的发件箱邮件
	 *
	 * @return array	$list	发件箱邮件列表
	 * 
	 */
	function get_send_email( $num, $offset, $order_by='dateline' )
	{
		$this->db->where( 'fromuserid', $this->userid );
		$this->db->where( 'fromgarbage', 0 );
		$this->db->where( 'fromdelete', 0 );
		$this->db->where( 'draft', 0 );
		$this->db->order_by( $order_by,  " desc" );
		
		//$sql = "SELECT * from {$this->db->dbprefix}pms WHERE (fromuserid={$this->userid} AND fromgarbage=0 AND fromdelete=0 AND draft=0) ORDER BY {$order_by} DESC LIMIT {$offset},{$num}";
		//echo $sql;exit;
		//$list = $this->db->query($sql)->result_array();
		
		$query = $this->db->get( 'pms', $num, $offset );
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
	 * 设置会员的邮件为草稿箱邮件
	 * 
	 * @param 		$email_id	邮件id
	 * @return bool
	 * 
	 */
	function set_draft_email( $tableName, $arr )
	{
		$this->db->insert( $tableName, $arr );
		return $this->db->insert_id();
		
		/*$this->db->where( 'fromuserid', $this->userid );
		
		if( is_array( $email_id ) )
		{
			foreach ( $email_id as $k=>$v ) 
			{
				$this->db->where( 'pmid', $v );
				$this->db->set( 'draft', 1 );	
				$result = $this->db->update( 'pms' );
			}
		} 
		else 
		{
			$this->db->where( 'pmid', $email_id );
			$this->db->set( 'draft', 1 );	
			$result = $this->db->update( 'pms' );
		}*/
	}
	
	/**
	 * 获取会员的草稿箱邮件
	 * 
	 * @return array	$list	草稿箱邮件列表
	 * 
	 */
	function get_draft_email()
	{
		$this->db->where( 'fromuserid', $this->userid );
		$this->db->where( 'draft', 1 );
		
		$this->db->limit( 10 );
		$this->db->from( 'pms' );
		$this->db->order_by( "dateline",  " desc" );
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
	 * 删除会员邮件
	 * 
	 * @param 	    $email_id	邮件id
	 * @return bool	
	 * 
	 */
	function delete_email( $email_id )
	{
		if( is_array( $email_id ) )
		{
			foreach ( $email_id as $k=>$v ) 
			{
				$this->db->where( 'pmid', $v );
				$result = $this->db->delete( 'pms' ); 
			}
		} 
		else 
		{
			$this->db->where( 'pmid', $email_id );
			$result = $this->db->delete( 'pms' ); 
		}
		
		return $result;
	}
	
	/**
	 * 获取管理员发送的系统消息
	 *
	 * @return array	$list	系统消息列表
	 * 
	 */
	function get_admin_send_email()
	{
		$this->db->where( 'touserid', $this->userid );
		$this->db->where( 'adminsend', 1 );
		$this->db->limit( 10 );
		$this->db->from( 'pms' );
		$this->db->order_by( "dateline",  " desc" );
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
	 * 标记会员邮件为已读
	 *
	 * @return bool	
	 * 
	 */
	function set_email_read( $email_id )
	{
		if( is_array( $email_id ) )
		{
			foreach ( $email_id as $k=>$v ) 
			{
				$this->db->where( 'pmid', $v );
				$this->db->set( 'isread', 1 );	
				$result = $this->db->update( 'pms' );
			}
		} 
		else 
		{
			$this->db->where( 'pmid', $email_id );
			$this->db->set( 'isread', 1 );	
			$result = $this->db->update( 'pms' );
		}
		
		return $result;
	}
	
	/**
	 * 获取会员未读邮件
	 *
	 * @return bool	
	 * 
	 */
	function get_email_read()
	{
		$this->db->where( 'touserid', $this->userid );
		$this->db->where( 'isread', 0 );
		$this->db->where( 'todelete', 0 );
		$this->db->where( 'togarbage', 0 );
		$this->db->from( 'pms' );
		$this->db->order_by( "dateline",  " desc" );
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
	 * 获取管理員通知未读邮件
	 *
	 * @return bool	
	 * 
	 */
	function get_admin_email_read()
	{
		$this->db->where( 'touserid', $this->userid );
		$this->db->where( 'isread', 0 );
		$this->db->where( 'adminsend', 1 );
		
		$this->db->from( 'pms' );
		$this->db->order_by( "dateline",  " desc" );
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
	 * 获取会员邮件总数
	 *
	 * @return $num	
	 * 
	 */
	function get_email_num() 
	{
		$condition = "(touserid={$this->userid} and togarbage=0 and todelete=0)";
		$this->db->where( $condition );
		$this->db->where( 'adminsend', 0 );
		$this->db->where( 'isread', 0 );
		
		$this->db->from( 'pms' );
		$query = $this->db->get();

		$list = array();
		if( !empty( $query ) )
		{
			foreach ( $query->result_array() as $row ){
				$list[] = $row;
			}
		}

		return count( $list );
	}
	
	/**
	 * 获取管理员通知邮件总数
	 *
	 * @return $num	
	 * 
	 */
	function get_admin_email_num() 
	{
		$this->db->where( 'touserid', $this->userid );
		$this->db->where( 'adminsend', 1 );
		
		
		$this->db->from( 'pms' );
		$query = $this->db->get();
		
		$list = array();
		if( !empty( $query ) )
		{
	        foreach ( $query->result_array() as $row ){
	            $list[] = $row;
	        }
		}
		return count( $list );
	}
	
	/**
	 * 获取分页邮件总数
	 * @param $filed  array  查找条件
	 * @return $num	
	 * 
	 */
	function get_condition_email_num( $condition )
	{
		$this->db->where( $condition );
		$this->db->from( 'pms' );
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		
		return $num_rows;
	}
	
	function get_user_list()
	{
		$this->db->from( 'members' );
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
	
	function set_email_refuse( $status, $touserid )
	{
		$num_rows = $this->get_email_refuse_num( $touserid, $this->userid );
		
		if ( $status == 1 and $num_rows == 0 ) 
		{
			$arr = array();
			$arr['touserid'] = $touserid;
			$arr['userid'] = $this->userid;
			$this->db->insert( 'pms_refuse', $arr );
		    $refuseid = $this->db->insert_id();
			
		    if ( $refuseid ) 
		    {
		    	return true;
		    }
		    else 
		    {
		    	return false;
		    }
		}
		
		elseif ( $status == 2 and $num_rows == 1 ) 
		{
			$this->db->where( 'touserid', $touserid );
			$this->db->where( 'userid', $this->userid );
			$result = $this->db->delete( 'pms_refuse' ); 
			
			if ( $result ) 
		    {
		    	return true;
		    }
		    else 
		    {
		    	return false;
		    }
		}
		else 
		{
			return false;
		}
	}
	
	/**
	 * 获取阻止发信记录数
	 *
	 * @param unknown_type $touserid  被阻止人
	 * @param unknown_type $userid    阻止人
	 * @return unknown
	 */
	
	
	function get_email_refuse_num( $touserid, $userid )
	{
		$this->db->where( 'userid', $userid );
		$this->db->where( 'touserid', $touserid );
		$query = $this->db->get( 'pms_refuse' );
		$num_rows = $query->num_rows();
		
		return $num_rows;
	}
}


/* End of file members_email_model.php
/* Location: ./application/models/customer/members_email_model.php */