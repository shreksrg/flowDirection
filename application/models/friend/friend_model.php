<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 朋友模块model文件
 * @author by loso
 * @date 2012-1-6 
 *
 */
class Friend_model extends CI_model
{
	var $user_id;
	
      public function __construct()
      {
          parent::__construct();
          $this->tableName = 'friend';
          $this->relevanceName = 'members_profile';
      }
      
      
      public function get_friends_list( $num, $offset, $order_by='username desc'  )
      {
          $sql = "SELECT a.*, b.birthyear, b.gender, b.nickname, b.regprovince,b.regcity,b.work,b.description,b.userid FROM {$this->db->dbprefix}{$this->tableName} a left join {$this->db->dbprefix}{$this->relevanceName} b ON a.fusuerid = b.userid WHERE a.userid={$this->user_id} and a.STATUS=1 ORDER BY b.{$order_by} LIMIT {$offset},{$num}";
          return $this->db->query($sql)->result_array();      
      }
      
       public function get_attention_list( $num, $offset, $order_by='username desc' )
      {
          $sql = "SELECT a.*, b.birthyear, b.gender, b.nickname, b.regprovince,b.regcity,b.work,b.description, b.userid FROM {$this->db->dbprefix}friend_attention a left join {$this->db->dbprefix}{$this->relevanceName} b ON a.fuserid = b.userid WHERE a.userid = {$this->user_id} ORDER BY b.{$order_by}";
          return $this->db->query($sql)->result_array();      
      }

      public function get_friends_detail( $userid )
      {
          $sql = "SELECT * FROM {$this->db->dbprefix}{$this->relevanceName} WHERE userid = {$userid}";
          return $this->db->query($sql)->row_array();
      }
      
      public function delete_friends($friendid,$userid, $keyid = false)
      {
          $sql = "DELETE FROM {$this->db->dbprefix}{$this->tableName} WHERE fusuerid = {$friendid} AND userid = {$userid}";
          if($keyid)
          {
             $sql = " DELETE FROM {$this->db->dbprefix}friend_attention WHERE fuserid = {$friendid} AND userid = {$userid} ";
          }
          return $this->db->query($sql);
      }
      
      public function get_friends_attention_list( $userid, $order = 'dateline DESC' )
      {
          $sql = "SELECT * FROM paliie_friend_attention  WHERE userid={$userid} ORDER BY {$order} limit 9";
          return $this->db->query($sql)->result_array();      
      }
      
      
      
      public function relation_deal($userId,$friendId,$friendName,$status)
      {
      	    $time = time();
      	    $sql = "select * from {$this->db->dbprefix}{$this->tableName} where userid={$userId} and fusuerid={$friendId}";
      	    $result = $this->db->query($sql)->row_array();
      	    
      	    if(!empty($result) && (int)$status == (int)$result['STATUS'])
      	    {
      	        return false;    
      	    }
      	    elseif(empty($result))
      	    {
      	    	 $sql = " insert into {$this->db->dbprefix}{$this->tableName} (userid,fusuerid,fusername,STATUS,dateline) values ($userId,$friendId,'$friendName',$status,$time)";
                 return  $this->db->query($sql);
      	    }
      	    else
      	    {
      	        $sql = " update {$this->db->dbprefix}{$this->tableName} set STATUS={$status}";
      	        return $this->db->query($sql);
      	    }
           
            
      }
      
      public function attention_deal( $userId, $friendId, $friendName )
      {
      	    $time = time();
      	    $sql = "select * from paliie_friend_attention  where userid={$userId} and fuserid={$friendId}";
      	    $result = $this->db->query($sql)->row_array();
      	    
      	    if(!empty($result))
      	    {
      	        return false;    
      	    }
      	    else
      	    {
      	    	 $sql = " insert into paliie_friend_attention (userid,fuserid,fusername,dateline) values ($userId,$friendId,'$friendName',$time)";
                 return  $this->db->query($sql);
      	    }
      }
      
     /**
	 * 获取分页好友总数
	 * @param $condition  array  查找条件
	 * @param $table  string  表名
	 * @return $num_rows	
	 * 
	 */
	function get_condition_friend_num( $table, $condition )
	{
		$this->db->where( $condition );
		$this->db->from( $table );
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		
		return $num_rows;
	}
}