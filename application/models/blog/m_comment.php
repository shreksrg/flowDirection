<?php
/**
 * 博客评论model
 * */
class M_comment extends CI_Model{
	
  /** 根据用户Id获取博客评论列表
   * @param	 	int    $blogId  	     博客ID
   * @return 	array  $result    该博客评论列表信息
   */
  public function getCommentListByBlogId($blogId, $type=0){
  	$this->db->select('*');
	$this->db->where('blogid',$blogId);
	$this->db->where('type',$type);
	$this->db->from('comment');
	$this->db->order_by('comment_id', 'DESC');
	$queryResult = $this->db->get();		
  	$rowArr=$queryResult->result_array();
  	if(!empty($rowArr)){
  		$result=$rowArr;
  	}else{
  		$result=array();
  	}
  	return $result;
  }
  /**
   * 增加一条博客评论记录
   * @param string $tableName
   * @param array $arr
   */
  public function addCommentRow($tableName,$arr){
    $this->db->insert($tableName,$arr);
	return $this->db->insert_id();
  }
  
  public function deleteCommentRow($commentId)
  {
  	  $this->tableName = "comment";
      $sql = " DELETE FROM {$this->db->dbprefix}{$this->tableName} WHERE comment_id = {$commentId}";
      return $this->db->query($sql);
  }
	
  	/**
  	 * 添加一条博客收藏
  	 *
  	 * @param unknown_type $blogid, $userid
  	 * @return int
  	 */
  	public function collectblog( $blogid, $userid, $blog_type )
  	{
  		$time = time();
  		$this->tableName = "blog_collect";
  		$sql = "select * from {$this->db->dbprefix}{$this->tableName} where userid={$userid} and blogid={$blogid}";
  		$result = $this->db->query($sql)->row_array();

  		if( !empty( $result ) )
  		{
  			return 0;
  		}
  		else 
  		{
  			$sql_ = " insert into {$this->db->dbprefix}{$this->tableName} (userid,blogid,blog_type,dateline) values ($userid,$blogid,$blog_type,$time)";
  			$return = $this->db->query( $sql_ );
  			
  			if ( $return ) 
  			{
  				return 1;
  			}
  			else 
  			{
  				return 2;
  			}
  		}
  	}
  	
  	/**
  	 * 删除一条博客收藏
  	 *
  	 * @param unknown_type $blogid, $userid
  	 * @return int
  	 */
  	public function deletecollectblog( $blogid, $userid )
  	{
  		$this->tableName = "blog_collect";
  		$sql = "select * from {$this->db->dbprefix}{$this->tableName} where userid={$userid} and blogid={$blogid}";
  		$result = $this->db->query($sql)->row_array();

  		if( !empty( $result ) )
  		{
  			$sql_ = " DELETE FROM {$this->db->dbprefix}{$this->tableName} WHERE blogid={$blogid} and userid={$userid}";
  			$return = $this->db->query( $sql_ );
  			
  			if ( $return ) 
  			{
  				return 1;
  			}
  			else 
  			{
  				return 2;
  			}
  		}
  		else 
  		{
  			return 0;
  		}
  	}
}