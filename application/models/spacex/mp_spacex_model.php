<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');

/**
 * 奇遇空间主频道列表数据
 * @author by shrek
 * @date   04/22/2012
 */
 
class Mp_spacex_model extends CI_model
{
	
	var $tbprefix;
	var $tbname;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'album';
		//$this->tbprefix="space_";
		$this->tbprefix="cms_";
		$this->archives="archives";
		$this->arctype="arctype";
	 	$this->addonarticle="addonarticle";
    } 
	
	 public function getArticleCount($typeid){
		
		  $tNums=0;
	 	  $sql = "SELECT count(id) as tNum FROM  {$this->tbprefix}{$this->archives} WHERE arcrank=0 and typeid in({$typeid})"; 
		   $query=$this->db->query($sql);
		   if($query->num_rows()>0){
			   $row = $query->row_array();
			   $tNums=$row['tNum'];
			};
		  return $tNums;
	}
	
	/**
   * 获取新闻区块列表数据
   */
  public function getArticleSection($typeid=0,$flag='h',$limit)
  {
	  
	$sql = "SELECT * FROM  {$this->tbprefix}{$this->archives} WHERE typeid in ({$typeid}) and flag LIKE '%{$flag}%' ORDER BY pubdate DESC LIMIT {$limit}"; 
  	return $this->db->query($sql)->result_array();
  }
  
  
  /**
   * 获取新闻点击排行
   */
  public function getArticleSection_tops($typeid=0,$limit)
  {
	  
	$sql = "SELECT * FROM  {$this->tbprefix}{$this->archives} WHERE typeid in ({$typeid})  ORDER BY click DESC LIMIT {$limit}"; 
  	return $this->db->query($sql)->result_array();
  }
  
  
   /**
   * 获取新闻随机推荐内容
   */
  public function getArticleSection_rand($typeid=0,$flag=NULL,$limit)
  {
	if($flag){
		$flag=" AND flag LIKE '%{$flag}%' ";
	}
	$sql="SELECT t1.id,t1.title,t1.description,t1.litpic FROM {$this->tbprefix}{$this->archives} AS t1 JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM {$this->tbprefix}{$this->archives})) AS id) AS t2  WHERE t1.id >= t2.id and typeid in ({$typeid}) {$flag} ORDER BY t1.id ASC LIMIT {$limit};" ;
	//$sql = "SELECT * FROM  {$this->tbprefix}{$this->tbname} WHERE typeid in ({$typeid})  ORDER BY click DESC LIMIT {$limit}"; 
  	return $this->db->query($sql)->result_array();
  }
  
  
  
  /**
   * 获取新闻列表页数据
   */
  public function getArticlelist($params)
  {
	 
	 $typeid = $params['typeid'];
	  $limit  = $params['limit'];
	 $data['recordnum']=0; 
	 $data['recordset']=NULL || false ;
	 $typeArr[]=$typeid;
	  $typeOption=join(',',$typeArr);
	  $sqltype="SELECT * FROM {$this->tbprefix}{$this->arctype} where reid in(?) order by id";
	 
	  while($typeOption){
		$typeTmp = array();
		$query=$this->db->query($sqltype,array($typeOption)); 
		if($query->num_rows > 0){ 
			foreach($query->result_array() as $rows){
				$typeTmp[] = $typeArr[] = $rows['id'];
			}
			$typeOption=join(',',$typeTmp);

		}else{
			$typeOption = NULL;	
		}
		
	}
	 
	
	 
	 $typeOption=join(',',$typeArr);	

	   $data['count']=$this->getArticleCount($typeOption) ; // 获取记录总数
	   $sql = "SELECT * FROM  {$this->tbprefix}{$this->archives} WHERE arcrank=0 and typeid in({$typeOption}) ORDER BY pubdate DESC LIMIT {$limit}"; 
  	  $query=$this->db->query($sql);
	  if($query->num_rows > 0){
			$data['recordset']=$query->result_array();
			$data['recordnum']=$query->num_rows;
	   }
	   return $data;
  }
  
  /**
   * 获取新闻路径链
   */
  public function getArticlePathID($id)
  {
	    $data=array();
	    $reid=$id;
	  	$sql="SELECT id,reid,typename FROM {$this->tbprefix}{$this->arctype} where id=? limit 1";
		
		if($id==0){return false;}
		while($reid != 0){
			$id=$reid;
			$query=$this->db->query($sql,array($id));
			if($query->num_rows > 0){
				$rows=$query->first_row('array');
				$id=$rows['id'];
				$reid=$rows['reid'];
				$typename=$rows['typename'];
				array_unshift($data,array('id'=>$id,'typename'=>$typename));
	   		}else{
				break;
				return false;
			}
		}
		
		return $data;
	}
	
	/**
   * 获取文章详细
   */
	public function getArticleCont($id){
		$sql="SELECT a.id,a.typeid,a.title,a.litpic,a.description,a.pubdate,d.body FROM {$this->tbprefix}{$this->archives} a INNER JOIN  {$this->tbprefix}{$this->addonarticle} d ON a.id=d.aid where a.id=? limit 1";
		$query=$this->db->query($sql,array($id));
		if($query->num_rows > 0){
			return $query->first_row('array');
		}
		return false;
	}
	
	/**
   * 增加文章点击数
   */
	public function addonClicks($id){
		$sql="update {$this->tbprefix}{$this->archives} set  click=click+1 where id=? limit 1";
		$this->db->query($sql,array($id));

	}
   
}