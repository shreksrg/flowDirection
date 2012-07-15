<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 情感博文model层文件
 * @author by loso
 * @date   2012-1-2
 */
class Blog_model extends CI_model
{

     public function __construct()
     {
          parent::__construct();
          
          $this->tableName = 'blog';
          $this->relevanceName = 'blog_field';
     }

     /**
      * 添加博文数据
      */
     public function add_Blogs($data)
     {
	     $this->db->insert($this->tableName,$data);
	 	 return $this->db->insert_id();
     }
     
     /**
      * 添加博文副表数据
      */
     public function add_RelevanceBlogs($data)
     {
	     $this->db->insert($this->relevanceName,$data);
	 	 return $this->db->insert_id();
     }
     
	  /**
	   * 获取个人blogs数据
	   */
	  public function get_Blogs($userId, $cateId)
	  {
	  	   $sql = "SELECT a.*, b.message, b.tag, b.pic FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid WHERE a.userid = {$userId} AND a.catid = {$cateId} ORDER BY blogid DESC";
	  	   if($cateId === false)
	  	   {
	  	       $sql = "SELECT a.*, b.message, b.tag, b.pic FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid WHERE a.blogid = {$userId}";
	  	       return $this->db->query($sql)->row_array();
	  	   }
	  	   return $this->db->query($sql)->result_array();
	  }

	  /**
	   * 更新blog表 
	   *
	   */
      public function update_Blogs($data,$blogId)
      {
	  	   $this->db->where('blogid',$blogId);
	  	   return $this->db->update($this->tableName,$data);
      }   
      
      /**
       *更新blog副表 
       *
       */
      public function update_RelevanceBlogs($data,$blogId)
      {
	  	   $this->db->where('blogid',$blogId);
	  	   return $this->db->update($this->relevanceName,$data);
      }   
       
      /**
       * 删除blog数据
       */
      public function delete_Blogs($blogId)
      {
	  	  if(empty($blogId)) return  false;
	      $sql = "DELETE FROM {$this->db->dbprefix}{$this->tableName} WHERE blogid = {$blogId} ";
	      return $this->db->query($sql);
      }
      
      /**
       * 删除blog副表数据
       */
      public function delete_RelevanceBlogs($blogId)
      {
	  	  if(empty($blogId)) return  false;
	      $sql = "DELETE FROM {$this->db->dbprefix}{$this->relevanceName} WHERE blogid = {$blogId} ";
	      return $this->db->query($sql);
      }
      
      /**
	   * 获取评论数据
	   */
//	  public function get_comments($blogId)
//	  {
//	  	  $this->tableName = "comment";
//	      if(empty($blogId)) return  false;
//	      $sql = "SELECT * FROM {$this->db->dbprefix}{$this->tableName} WHERE blogid = {$blogId} ORDER BY create_time DESC ";
//	      return $this->db->query($sql)->result_array();
//	  
//	  }
	  
	  /**
	   * 获取情感空间推荐博文数据
	   * 
	   */
	  public function get_feelspace_essays($fields = 'a.STATUS = 1')
	  {
	  	   $sql = "SELECT a.*, b.message, b.pic FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid WHERE a.catid = 101 AND {$fields} ORDER BY blogid DESC LIMIT 5";
	       return $this->db->query($sql)->result_array();
	  }
	  
	  /**
	   * 获取地图日志推荐日志数据
	   * 
	   */
	  public function get_mapblogs($fields = ' b.tag = 1 ', $limit = 5)
	  {
	  	   $sql = "SELECT a.*, b.message,b.tag, b.pic FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid WHERE a.catid = 102 AND {$fields} AND a.STATUS = 1 ORDER BY a.blogid DESC LIMIT {$limit}";
	       return $this->db->query($sql)->result_array();
	  }
	  
	  /**
	   * 获取地图日志数据
	   * 
	   */
	  public function get_mapblog_datas($fields = ' 1 = 1 ', $limit = 15, $order = ' a.blogid  DESC' )
	  {
	  	   $sql = "SELECT a.*, b.message, b.tag, b.pic FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid WHERE a.catid = 102 AND {$fields}  ORDER BY {$order}  LIMIT {$limit}";
	       return $this->db->query($sql)->result_array();
	  }
	  
	  /**
	   * 获取博文数据
	   * 
	   */
	  public function get_essayblog_datas($fields = ' 1 = 1 ', $limit = 15, $order = ' a.blogid ' )
	  {
	  	   $sql = "SELECT a.*, b.message, b.tag, b.pic FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid WHERE a.catid = 101 AND {$fields}  ORDER BY {$order} DESC LIMIT {$limit}";
	       return $this->db->query($sql)->result_array();
	  }
	  
	  /**
	   * 获取区域数据
	   */
	  public function get_regions($tableName, $fields = false)
	  {
	       $sql = "SELECT * FROM {$tableName} ";
	       if($fields)
	       {
               $sql .=" WHERE {$fields}";	        
	       }
	       return $this->db->query($sql)->result_array();
	  }
	  
	  
	  /**
	   * 获取个人blogs收藏数据
	   */
	  public function get_collect_blogs( $userId, $blog_type )
	  {
	  	   $sql = "SELECT a.*, b.dateline as addtimes FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}blog_collect b ON a.blogid = b.blogid WHERE b.userid = {$userId} AND a.blog_type=b.blog_type  ORDER BY a.blogid DESC";
	  	  
	  	   return $this->db->query($sql)->result_array();
	  }
	  
	  /**
	   * 获取个人blogs filed数据
	   */
	  public function get_blogs_filed( $blogid )
	  {
	  		if ( is_array( $blogid ) )
	  		{
	  			$blogid = implode( ',', $blogid );
	  			$sql = "SELECT * FROM {$this->db->dbprefix}{$this->relevanceName}  WHERE blogid in({$blogid}) ORDER BY blogid DESC";
	  		}
	  		else 
	  		{
	  	  	 	$sql = "SELECT * FROM {$this->db->dbprefix}{$this->relevanceName}  WHERE blogid={$blogid} ORDER BY blogid DESC";
	  		}
	  	  
	  	   return $this->db->query($sql)->result_array();
	  }
	  
	  public function get_Blogs_map( $num, $offset, $condition, $order_by='a.blogid desc'  )
	  {
	  	   	$sql = "SELECT a.*, b.message, b.tag, b.pic FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid 
	  	   	WHERE 1=1 {$condition} ORDER BY {$order_by} LIMIT {$offset},{$num}";
	  	   	return $this->db->query($sql)->result_array();
	  }
	  
	public function get_Blogs_map_num( $condtion )
	{
	  	$sql = "SELECT a.*,b.tag FROM {$this->db->dbprefix}{$this->tableName} a LEFT JOIN {$this->db->dbprefix}{$this->relevanceName} b ON a.blogid = b.blogid WHERE 1=1 {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
	
	public function get_Blogs_map_comment( $condtion )
	{
	  	$sql = "SELECT * FROM paliie_comment WHERE 1=1 {$condtion}";
		$num_rows = $this->db->query($sql)->num_rows();
		
		return $num_rows;
	}
}
