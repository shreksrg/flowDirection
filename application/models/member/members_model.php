<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员注册登录注销数据模型
 * @author taylorchen
 * @version v1.0 $date:2011-11-17 14:52:20
 * 
 */

class Members_model extends CI_Model{
	var $username;
	
	var $password;
	
	var $email;
	
	var $regdate;
	
	var $regip;
	
	/**
	 * 构造函数
	 *
	 * @return Members_model
	 */
	function Members_model() 
	{
		
	}
	
	/**
	 * 添加新会员
	 * 
	 */
	function create()
	{
        $this->db->set( 'username', $this->username );
        $this->db->set( 'PASSWORD', md5( $this->password ) );			
		$this->db->set( 'email', $this->email );		
		$this->db->set( 'regip', $this->regip );
		$this->db->set( 'regdate', $this->regdate );
              
        return $this->db->insert( 'members' );
	}
	
	/**
	 * 检查账号是否注册
	 * @param $name
	 * @return bool
	 * 
	 */
	function check_name( $name ) 
	{
		$query = $this->db->get_where( 'members', array( 'username' => $name ) );
        if ( $row = $query->row_array() )
        {
            return true;
        }
        return false;
	}
	
	/**
	 * 检查邮箱是否注册
	 * @return bool
	 * 
	 */
	function check_email( $email )
	{
		$query = $this->db->get_where( 'members', array( 'email' => $email ) );
        if ( $row = $query->row_array() )
        {
            return true;
        }
        return false;
	}
	
	/**
	 * 查询该用户，返回用户信息
	 *
	 * @return array;
	 */	
	function check_member()
	{
        $query = $this->db->get_where( 'members', array( 'username' => $this->username, 'PASSWORD' => md5( $this->password ) ) );
        if ( $row = $query->row_array() )
        {			
            return $row;
        }
        else {
        	return array();
        }
	}
	
	/**
	 * 查询该用户，返回用户信息
	 * @param $user_id
	 * @return array;
	 * 
	 */	
	function get_member( $user_id )
	{
        $query = $this->db->get_where( 'members', array( 'userid' => $user_id ) );
        if ( $row = $query->row_array() )
        {			
            return $row;
        }
        else 
        {
        	return array();
        }
	}
	
	function get_member_condition( $data )
	{
        $query = $this->db->get_where( 'members', $data );
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
	 * 查询除自己之外的会员信息，返回用户列表
	 * @param $user_id      自己的会员id
	 * @return array;
	 * 
	 */	
	function get_member_list( $user_id )
	{
		$this->db->where( 'userid !=', $user_id );
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
	
	/**
	 * 更新最后登录时间
	 * @param $userid  
	 * @return bool
	 * 
	 */	
    function update_last_login_time( $userid )
	{
		$datetime = time();
		$this->db->set( 'lastlogintime', $datetime );	
        $this->db->where( 'userid', $userid );
        
        return $this->db->update( 'members' );
	}
	
	/**
	 * 更新最后登录IP
	 * @param $userid  
	 * @return bool
	 * 
	 */	
    function update_last_login_ip( $userid, $ip )
	{
		
		$this->db->set( 'lastloginip', $ip );	
        $this->db->where( 'userid', $userid );
        
        return $this->db->update( 'members' );
	}
	
	/**
	 * 密码设置
	 * @param $userid
	 * @return bool
	 * 
	 */
	function update_password( $userid ) 
	{
		$this->db->set( 'PASSWORD', md5( $this->password ) );	
        $this->db->where( 'userid', $userid );
        
        return $this->db->update( 'members' );
	}
}


/* End of file members_model.php
/* Location: ./application/models/customer/members_model.php */