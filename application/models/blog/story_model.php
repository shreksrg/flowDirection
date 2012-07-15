<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 故事model层文件
 * @author by loso
 * @date   2012-1-1
 */
class Story_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'album';
    } 
    
  /**
   * 获去故事数据
   */
  public function get_Storys($userId, $storyId = NULL)
  {
  	   $sql = "SELECT * FROM {$this->db->dbprefix}{$this->tableName} WHERE catid = 100 and userid = {$userId} ORDER BY dateline DESC"; 
  	   if($storyId)
  	   {
  	       $sql = "SELECT * FROM {$this->db->dbprefix}{$this->tableName} WHERE albumid = {$storyId}";
  	       return $this->db->query($sql)->row_array();
  	   }
  	   return $this->db->query($sql)->result_array();
  }
  
  /**
   * 添加故事数据
   */
  
  public function insert_storys($data)
  {
     $this->db->insert($this->tableName,$data);
	 return $this->db->insert_id();
  }
  
  /**
   * 更新故事数据
   */
  public function update_storys($data,$storyId){
  	$this->db->where('albumid',$storyId);
  	return $this->db->update($this->tableName,$data);
  }
  
  /**
   * 删除故事数据
   */
  public function delete_story($albumId)
  {
  	  if(empty($albumId)) return  false;
      $sql = "DELETE FROM {$this->db->dbprefix}{$this->tableName} WHERE albumid = {$albumId} ";
      return $this->db->query($sql);
  
  }
  
  /**
   * 获取评论数据
   */
  public function get_comments($albumId)
  {
  	  $this->tableName = "comment";
      if(empty($albumId)) return  false;
      $sql = "SELECT * FROM {$this->db->dbprefix}{$this->tableName} WHERE blogid = {$albumId} ORDER BY create_time DESC ";
      return $this->db->query($sql)->result_array();
  
  }
  
  /**
   * 获取情感空间推荐故事数据
   * 
   */
  public function get_feelspace_storys($fields = 'picflag = 1')
  {
       $sql = "SELECT * FROM {$this->db->dbprefix}{$this->tableName} WHERE catid = 100 AND {$fields} ORDER BY dateline DESC LIMIT 5"; 
       return $this->db->query($sql)->result_array();
  }
  
}