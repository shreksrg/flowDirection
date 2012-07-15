<?php
/**
 * 博客model
 * */
class M_blog extends CI_Model{
	
  /** 根据用户Id获取普通博客列表
   * @param	 	int    $userId  	     用户ID
   * @return 	array  $result    我的博客列表信息
   */
  public function getBlogCommonListByUserId($userId){
  	$this->db->select('*');
	$this->db->where('userid',$userId);
	$this->db->where('catid',1);
	$this->db->from('blog');
	$queryResult = $this->db->get();		
  	$rowArr=$queryResult->result_array();
  	if(!empty($rowArr)){
  		$result=$rowArr;
  	}else{
  		$result=array();
  	}
  	return $result;
  }
  public function getRecommendLoveBlogList($catid,$num){
  	$sql = 'select b.*,f.message from '.$this->db->dbprefix.'blog b'.' left join '.$this->db->dbprefix.'blog_field f on b.blogid=f.blogid '.' where b.recommend=1 and catid='.$catid.' limit 0,'.$num;
  	$query = $this->db->query($sql);
  	$rowArr=$query->result_array();
  	if(!empty($rowArr)){
  		$data=$rowArr;
  	}else{
  		$data=array();
  	}
  	return $data;
  }
  
  public function getRecommendBlogList($recommendId,$num){
  	$sql = 'select b.*,f.message from '.$this->db->dbprefix.'blog b'.' left join '.$this->db->dbprefix.'blog_field f on b.blogid=f.blogid '." where b.recommend=$recommendId ".' limit 0,'.$num;
  	$query = $this->db->query($sql);
  	$rowArr=$query->result_array();
  	if(!empty($rowArr)){
  		$data=$rowArr;
  	}else{
  		$data=array();
  	}
  	return $data;
  }
  public function getZhuantilogList($num){
  	$sql = 'select b.*,f.message from '.$this->db->dbprefix.'blog b'.' left join '.$this->db->dbprefix.'blog_field f on b.blogid=f.blogid '.' where b.catid=4 '.' limit 0,'.$num;
  	$query = $this->db->query($sql);
  	$rowArr=$query->result_array();
  	if(!empty($rowArr)){
  		$data=$rowArr;
  	}else{
  		$data=array();
  	}
  	return $data;
  }
  
  public function update($table,$arr,$blogId){
  	$this->db->where('blogid',$blogId);
  	return $this->db->update($table,$arr);
  }
  
  /** 根据博客Id进行删除
   * @param	 	int    $blogId  	    博客ID
   * @return 	array  $result    我的博客列表信息
   */
  public function deleteBlogById($blogId){
  	$this->db->where('blogid', $blogId);
    $this->db->delete('blog'); 
  	$this->db->where('blogid', $blogId);
    $this->db->delete('blog_field'); 
  }
  	
  /** 根据用户Id获取地图日志列表
   * @param	 	int    $userId  	     用户ID
   * @return 	array  $result    我的博客列表信息
   */
  public function getBlogMapListByUserId($userId){
  	$this->db->select('*');
	$this->db->where('userid',$userId);
	$this->db->where('catid',2);
	$this->db->from('blog');
	$queryResult = $this->db->get();		
  	$rowArr=$queryResult->result_array();
  	if(!empty($rowArr)){
  		$result=$rowArr;
  	}else{
  		$result=array();
  	}
  	return $result;
  }
  	
  /** 根据用户Id获取地图日志列表
   * @param	 	int    $userId  	     用户ID
   * @return 	array  $result    我的博客列表信息
   */
  public function getBlogStoryListByUserId($userId){
  	$sql='select b.*,f.message from '.$this->db->dbprefix.'blog b left join '.$this->db->dbprefix.'blog_field f on b.blogid=f.blogid where b.userid='.$userId.' and b.catid=3';
  	$query=$this->db->query($sql);		
  	$rowArr=$query->result_array();
  	if(!empty($rowArr)){
  		$result=$rowArr;
  	}else{
  		$result=array();
  	}
  	return $result;
  }
  
  /**
   * 获取博客详细信息
   * @param	 	int    $blogId  	     博客ID
   * @return 	array  $result    博客详细信息
   */
  public function getBlogInfoByBlogId($blogId){
  	$sql='select b.*,f.message from '.$this->db->dbprefix.'blog b left join '.$this->db->dbprefix.'blog_field f on b.blogid=f.blogid where b.blogid='.$blogId;
  	$query=$this->db->query($sql);
  	$data=$query->result_array();
  	if (!empty($data)){
  		return $data[0];
  	}else{
  		return array();
  	}
  }
  
  public function getAllProvince(){
  	$sql="SELECT * FROM province";
	$query = $this->db->query($sql);
  	$rowArr=$query->result_array();
  	if(!empty($rowArr)){
  		$result=$rowArr;
  	}else{
  		$result=array();
  	}
  	return $result;
  }
/*得到所有城市名称*/
  public function getcity($provinceID){
  	$sql="SELECT * FROM city WHERE father=".$provinceID."";
	$query = $this->db->query($sql);
	$rowArr=$query->result_array();
	//print_r($rowArr);die;
	return $rowArr;
  }
  public function getCityValueByCityId($cityId){
  	$sql="SELECT city FROM city WHERE cityID='".$cityId."'";
	$query = $this->db->query($sql);
	$rowArr=$query->result_array();
	//print_r($rowArr);die;
	return $rowArr;
  }
  public function getProvinceValueByProvinceId($provinceId){
  	$sql="SELECT province FROM province WHERE provinceID='".$provinceId."'";
	$query = $this->db->query($sql);
	$rowArr=$query->result_array();
	//print_r($rowArr);die;
	return $rowArr;
  }
  /*得到所有县名称*/
  public function getarea($cityID){
  	$sql="SELECT * FROM area WHERE father=".$cityID."";
	$query = $this->db->query($sql);
	$rowArr=$query->result_array();
	//print_r($rowArr);die;
	return $rowArr;
  }  
  /**
   * 增加一条博客记录
   * @param string $tableName
   * @param array $arr
   */
  public function addBlogRow($tableName,$arr){
    $this->db->insert($tableName,$arr);
	return $this->db->insert_id();
  }
  
  /**
   * 获取博文、故事列表
   */
  public function getBlogs($userId, $cateId)
  {
  	   $sql='select b.*, f.message from '.$this->db->dbprefix.'blog b left join '.$this->db->dbprefix.'blog_field f on b.blogid=f.blogid where b.userid='.$userId.' and b.catid='.$cateId;
  	   return $this->db->query($sql)->result_array();
  }
  
  /**
   *获取单条博文、故事 
   *
   */
  public function getBlogsOne($blogId)
  {
  	$sql='select b.*,f.message, f.tag from '.$this->db->dbprefix.'blog b left join '.$this->db->dbprefix.'blog_field f on b.blogid=f.blogid where b.blogid='.$blogId;
  	return $this->db->query($sql)->row_array();
  	
  }
  
  /**
   *获取分类的博文、故事 
   *
   */
  public function getCateBlogs($catid, $tag = false, $limit = 10, $status = 0)
  {
     $sql = "SELECT a.blogid, a.SUBJECT, b.message FROM paliie_blog a LEFT JOIN paliie_blog_field b ON a.blogid = b.blogid WHERE a.catid = {$catid}";
     if($tag !==false)
     {
        $sql .= " AND tag ={$tag} ";
     }
     $sql .=" AND STATUS = {$status} LIMIT {$limit} ";
     return $this->db->query($sql)->result_array();
  }
}