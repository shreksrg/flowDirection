<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 博客管理
 * @author antaeus
 *
 */
class index extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->username = 'loso';
    	$this->userid   = 1;
//        $this->username = $this->session->userdata['user_name'];
//    	$this->userid   = $this->session->userdata['user_id'];
    	$this->load->model('blog/m_blog','',TRUE);
    	$this->load->model('blog/m_comment','',TRUE);
    	$this->load->model('common/m_common','',TRUE);
    	
    }

    public function  mapblog_all(){
    	$data=array();
    	$blogList=$this->m_blog->getBlogListByCatId(1);
		$this->parser->parse('blog/mapblog_all.tpl',$data);
    }
    public function  mapblog_index(){
    	$data=array();
    	//$blogList=$this->m_blog->getBlogListByCatId(1);
		$this->parser->parse('blog/mapblog_index.tpl',$data);
    }
    public function mapblog_search(){
    	$data=array();
    	$cityId=$_GET['city'];
    	$provinceId=$_GET['province'];
    	$cityValue=$this->m_blog->getCityValueByCityId($cityId);
    	if (!empty($provinceValue)){
    		$cityValue=$cityValue[0]['city'];
    	}else {
    		$cityValue='';
    	}
    	$provinceValue=$this->m_blog->getProvinceValueByProvinceId($provinceId);
    	if (!empty($provinceValue)){
    		$provinceValue=$provinceValue[0]['city'];
    	}else {
    		$provinceValue='';
    	}
    	if ($provinceValue=="北京市" ||$provinceValue=="上海市" || $provinceValue=="天津市" || $provinceValue=="重庆市" ){
    		$cityValue=$provinceValue;
    	}
    	
		$data['province']=$this->m_blog->getAllProvince();
    	$this->parser->parse('blog/mapblog_search.tpl',$data);
    }
    public function  loveblog(){
    	$data['shalong'] = $this->m_blog->getCateBlogs(1, 0, 4);
    	$data['diandi']  = $this->m_blog->getCateBlogs(1, 1, 4);
    	$data['gushi']   = $this->m_blog->getCateBlogs(1, 2, 4);  
    	$data['xiaopin'] = $this->m_blog->getCateBlogs(1, 3, 4);  
    	$data['relian']  = $this->m_blog->getCateBlogs(2, 0, 5);  
    	$data['qianshou']= $this->m_blog->getCateBlogs(2, 1, 5);  
    	$data['ailian']  = $this->m_blog->getCateBlogs(2, 2, 5);  
    	$data['gushituijian']  = $this->m_blog->getCateBlogs(1, false, 3);  
		$this->parser->parse('blog/loveblog.tpl',$data);
    }
    
    /**
     * 普通日志列表
     */
    public function index(){
//    	$this->m_common->validateLogin();
    	$data=array();
    	$userInfo=array();
    	$userInfo['username']= 'loso';
    	$userInfo['userid']= 1;
//    	$userInfo['username']=$this->session->userdata['user_name'];
//    	$userInfo['userid']=$this->session->userdata['user_id'];
    	$data['userInfo']=$userInfo;
    	$blogList=$this->m_blog->getBlogCommonListByUserId($userInfo['userid']);
    	$data['blogList']=$blogList;
		$this->parser->parse('blog/myblog.tpl',$data);
    }

    /**
     * 删除选择的项
     */
    function delete_all(){
    	$strIds=trim($_GET['strIds'],'_');
    	$idList=explode('_', $strIds);
    	if (!empty($idList)){
    		foreach ($idList as $key=>$value){
    			$this->m_blog->deleteBlogById($value);
    		}
    	}
    }
    
    /**
     * 删除一条博文记录
     */
    function delete_row(){
    	$blogId=trim($_GET['blogid']);
    	$this->m_blog->deleteBlogById($blogId);
    }
    
    /**
     * 编辑奇遇故事
     */
    function edit_story(){
//    	$this->m_common->validateLogin();

        $pathUlr = site_url('/blog/index/story');
        if(!empty($_POST))
        {
	        if($data['SUBJECT'] = $this->input->post('subject'))
	        {
	        	$data['dateline']   = time();
	        	$blogid             = $this->input->post('blogid');
	        	
	            $subdata['tag']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类
	            $subdata['message'] = $this->input->post('content');
	            $subdata['postip']  = $this->input->ip_address();
	            //上传图片功能，暂未实现。
	          
		        if ($this->m_blog->update('blog', $data, $blogid) && $this->m_blog->update('blog_field', $subdata, $blogid))
		        {
					echo "<script language='javascript'>alert('编辑成功!');location.href='/index.php/blog/index/story_detail/$blogid';</script>";die;
				}
				else
				{
					echo "<script language='javascript'>alert('编辑失败!');location.href='$_SERVER[REQUEST_URI]';</script>";die;			
				}
	           
	        }
	        
        }    
        
    	if(!$blogId = $this->uri->segment(4))
    	{
    	    redirect($pathUlr);
    	}
    	
    	$data = $this->m_blog->getBlogsOne($blogId);
		$this->parser->parse('blog/edit_story.tpl',$data);
    	
    }
    
    /**
     *  编辑博客日志
     */
    function edit_essay(){
//    	$this->m_common->validateLogin();

        $pathUlr = site_url('/blog/index/essay');
        if(!empty($_POST))
        {
	        if($data['SUBJECT'] = $this->input->post('subject'))
	        {
	        	$data['dateline']   = time();
	        	$blogid             = $this->input->post('blogid');
	        	
	            $subdata['tag']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类
	            $subdata['message'] = $this->input->post('content');
	            $subdata['postip']  = $this->input->ip_address();
	            //上传图片功能，暂未实现。
	          
		        if ($this->m_blog->update('blog', $data, $blogid) && $this->m_blog->update('blog_field', $subdata, $blogid))
		        {
					echo "<script language='javascript'>alert('编辑成功!');location.href='/index.php/blog/index/detail?blog_id=$blogid';</script>";die;
				}
				else
				{
					echo "<script language='javascript'>alert('编辑失败!');location.href='$_SERVER[REQUEST_URI]';</script>";die;			
				}
	           
	        }
	        
        }    
        
    	if(!$blogId = $this->uri->segment(4))
    	{
    	    redirect($pathUlr);
    	}
    	
    	$data = $this->m_blog->getBlogsOne($blogId);
		$this->parser->parse('blog/edit.tpl',$data);
    }
    
    private function showMessage($message,$url){
    	echo "alert($message);<script>window.location.href='$url';</script>";
    	exit;
    }
    
    /**
     * 地图日志列表
     */
    public function map(){
//    	$this->m_common->validateLogin();
    	$data=array();
    	$userInfo=array();
    	$userInfo['username']=$this->session->userdata['user_name'];
    	$userInfo['userid']=$this->session->userdata['user_id'];
    	$data['userInfo']=$userInfo;
    	$blogMapList=$this->m_blog->getBlogMapListByUserId($userInfo['userid']);
    	$data['blogMapList']=$blogMapList;
		$this->parser->parse('blog/myblog_map.tpl',$data);
    }
    
    /**
     * 故事列表
     */
    public function story(){
//    	$this->m_common->validateLogin();
    	$data['blogStoryList'] = $this->m_blog->getBlogs($this->userid, 1);
		$this->parser->parse('blog/story.tpl',$data);
    }

    /**
     * 博文列表
     */
    public function essay()
    {
//    	$this->m_common->validateLogin();
    	$data['blogList'] = $this->m_blog->getBlogs($this->userid, 2);
		$this->parser->parse('blog/myblog.tpl',$data);
    }
    /**
     * 新增地图日志
     */
    public function add_map(){
    	$this->m_common->validateLogin();
    	$data=array();
    	$userInfo=array();
    	$userInfo['username']=$this->session->userdata['user_name'];
    	$userInfo['userid']=$this->session->userdata['user_id'];
    	$data['userInfo']=$userInfo;
    	if(!empty($_POST)){
	    	$blogInfo=array();
	    	$blogFieldInfo=array();
			$blogInfo["SUBJECT"]=mysql_escape_string(isset($_POST["subject"])?$_POST["subject"]:'');
			if (empty($blogInfo["SUBJECT"])){
				echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/index/add_map';</script>";die;
			}
			$blogInfo['blog_type']=isset($_POST["blog_type"])?$_POST["blog_type"]:1;
			$blogInfo['province']=isset($_POST["input_province"])?$_POST["input_province"]:'';
			$blogInfo['city']=isset($_POST["input_city"])?$_POST["input_city"]:'';
			$blogInfo['area']=isset($_POST["input_area"])?$_POST["input_area"]:'';
			$blogInfo['detail_address']=isset($_POST["input_detail_address"])?$_POST["input_detail_address"]:'';
			$blogInfo['dateline']=time();
			$blogInfo['catid']=2;
			$blogInfo['userid']=$userInfo['userid'];
			$blogInfo['username']=$userInfo['username'];
			$blogFieldInfo['message']=isset($_POST["content"])?$_POST["content"]:'';
			$blogId=$this->m_blog->addBlogRow('blog',$blogInfo);
			$blogFieldInfo['userid']=$userInfo['userid'];
			$blogFieldInfo['blogid']=$blogId;
			$blogFieldId=$this->m_blog->addBlogRow('blog_field',$blogFieldInfo);
			if ($blogId>0 && $blogFieldId>0){
				echo "<script language='javascript'>alert('发布成功!');location.href='/index.php/blog/index/map_detail?blog_id=$blogId';</script>";die;
			}else{
				echo "<script language='javascript'>alert('发布失败!');location.href='/index.php/blog/index/add_map';</script>";die;			
			}
    	}
		$data['province']=$this->m_blog->getAllProvince();
		$this->parser->parse('blog/add_map.tpl',$data);
    }
    /**
     * 编辑地图日志
     */
    public function edit_map(){
    	$this->m_common->validateLogin();
    	if(!empty($_POST)){
	    	$blogInfo=array();
	    	$blogFieldInfo=array();
			$blogInfo["SUBJECT"]=mysql_escape_string(isset($_POST["subject"])?$_POST["subject"]:'');
			if (empty($blogInfo["SUBJECT"])){
				echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/index/add_map';</script>";die;
			}
			$blogInfo['blog_type']=isset($_POST["blog_type"])?$_POST["blog_type"]:1;
			$blogInfo['province']=isset($_POST["input_province"])?$_POST["input_province"]:'';
			$blogInfo['city']=isset($_POST["input_city"])?$_POST["input_city"]:'';
			$blogInfo['area']=isset($_POST["input_area"])?$_POST["input_area"]:'';
			$blogInfo['detail_address']=isset($_POST["input_detail_address"])?$_POST["input_detail_address"]:'';
			$blogFieldInfo['message']=isset($_POST["content"])?$_POST["content"]:'';
			$blogId=$_POST['blogid'];
			$blogUpdate=$this->m_blog->update('blog',$blogInfo,$blogId);
			$blogFieldUpdate=$this->m_blog->update('blog_field',$blogFieldInfo,$blogId);
			if ($blogUpdate==true && $blogUpdate==true){
				echo "<script language='javascript'>alert('编辑成功!');location.href='/index.php/blog/index/map_detail?blog_id=$blogId';</script>";die;
			}else{
				echo "<script language='javascript'>alert('编辑失败!');location.href='/index.php/blog/index/edit_map?blog_id=$blogId';</script>";die;			
			}
    	}
    	$blogId=!empty($_GET['blog_id'])?$_GET['blog_id']:showMessage('参数错误',$_SERVER[REQUEST_URI]);
    	$data=array();
    	$userInfo=array();
    	$userInfo['username']=$this->session->userdata['user_name'];
    	$userInfo['userid']=$this->session->userdata['user_id'];
    	$data['userInfo']=$userInfo;
    	$blogInfo=$this->m_blog->getBlogInfoByBlogId($blogId);
    	if (!empty($blogInfo)){
    		if($blogInfo['province']=="北京市" || $blogInfo['province']=="上海市" || $blogInfo['province']=="天津市" || $blogInfo['province']=="重庆市"){
    			$city='';
    		}else{
    			$city=$blogInfo['city'];
    		}
    		$blogInfo['address']=$blogInfo['province'].$city.$blogInfo['area'].$blogInfo['detail_address'];
    	}
    	$data['blogInfo']=$blogInfo;
		$data['province']=$this->m_blog->getAllProvince();
		$this->parser->parse('blog/edit_map.tpl',$data);
    }
    
    /**
     * 新增博文
     */
    public function add_essay()
    {
        if(!empty($_POST))
        {
             $pathUlr = site_url('/blog/index/essay');
        	 $data['username']   = $this->username;
		     $data['userid']     = $this->userid;
		     $data['catid']      = 2; // 姑且奇遇故事大分类id定义为 1
		     
	        if($data['subject'] = $this->input->post('subject'))
	        {
	        	$data['blog_type']  = 1; //一般类型博客
	        	$data['dateline']   = time();
	        	$subdata['blogid']  = $this->m_blog->addBlogRow('blog', $data);
	        	
	            $subdata['tag']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类	
	            $subdata['message'] = $this->input->post('content');
	            $subdata['userid']  = $data['userid'];
	            $subdata['postip']  = $this->input->ip_address();
	            //上传图片功能，暂未实现。
	            $this->m_blog->addBlogRow('blog_field',$subdata);
	            redirect($pathUlr);
	            
	        }
	        else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/index/add_story';</script>";die;
	        }
        }    
		$this->parser->parse('blog/add_essay.tpl');
    }
    
    /**
     * 新增故事
     */
    public function add_story()
    {
        if(!empty($_POST))
        {
        	 $data['username']   = $this->username;
             $data['userid']     = $this->userid;
             $data['catid']      = 1; // 姑且奇遇故事大分类id定义为 1
             
	        if($data['subject'] = $this->input->post('subject'))
	        {
	        	$data['blog_type']  = 1; //一般类型博客
	        	$data['dateline']   = time();
	        	$subdata['blogid']  = $this->m_blog->addBlogRow('blog', $data);
	        	
	            $subdata['tag']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类	
	            $subdata['message'] = $this->input->post('content');
	            $subdata['userid']  = $data['userid'];
	            $subdata['postip']  = $this->input->ip_address();
	            //上传图片功能，暂未实现。
	            $this->m_blog->addBlogRow('blog_field',$subdata);
	            $this->story();
	        }
	        else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/index/add_story';</script>";die;
	        }
        }    
		$this->parser->parse('blog/add_story.tpl');
    }
    
    /**
     * 地图日志详细
     */
    public function map_detail(){
    	//$this->m_common->validateLogin();
    	$data=array();
    	$blogId = $_REQUEST['blog_id'];
    	$blogMapInfo=$this->m_blog->getBlogInfoByBlogId($blogId);
    	if (!empty($blogMapInfo)){
    		if($blogMapInfo['province']=="北京市" || $blogMapInfo['province']=="上海市" || $blogMapInfo['province']=="天津市" || $blogMapInfo['province']=="重庆市"){
    			$city='';
    		}else{
    			$city=$blogMapInfo['city'];
    		}
    		$blogMapInfo['address']=$blogMapInfo['province'].$city.$blogMapInfo['area'].$blogMapInfo['detail_address'];
    	}
    	$data['blogMapInfo']=$blogMapInfo;
    	$commentList=$this->m_comment->getCommentListByBlogId($blogId);
    	$data['commentList']=$commentList;
    	$data['blogId']=$blogId;
		$this->parser->parse('blog/map_detail.tpl',$data);
    }
    
    
    /**
     * 故事日志详细
     */
    public function story_detail()
    {
        $blogId = $this->uri->segment(4);
    	$data = $this->m_blog->getBlogsOne($blogId);
    	
		$this->parser->parse('blog/story_detail.tpl',$data);
    }
    
    /**
     * 发布普通日志
     */
    public function issue(){
    	$this->m_common->validateLogin();
    	$data=array();
    	$userInfo=array();
    	$userInfo['username']=$this->session->userdata['user_name'];
    	$userInfo['userid']=$this->session->userdata['user_id'];
    	$data['userInfo']=$userInfo;
    	if(!empty($_POST)){
	    	$blogInfo=array();
	    	$blogFieldInfo=array();
			$blogInfo["SUBJECT"]=mysql_escape_string(isset($_POST["subject"])?$_POST["subject"]:'');
			if (empty($blogInfo["SUBJECT"])){
				echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/index/issue';</script>";die;
			}
			$blogInfo['blog_type']=isset($_POST["blog_type"])?$_POST["blog_type"]:1;
			$blogInfo['dateline']=time();
			$blogInfo['userid']=$userInfo['userid'];
			$blogInfo['catid']=1;
			$blogInfo['username']=$userInfo['username'];
			$blogFieldInfo['message']=isset($_POST["content"])?$_POST["content"]:'';
			$blogId=$this->m_blog->addBlogRow('blog',$blogInfo);
			$blogFieldInfo['userid']=$userInfo['userid'];
			$blogFieldInfo['blogid']=$blogId;
			$blogFieldId=$this->m_blog->addBlogRow('blog_field',$blogFieldInfo);
			if ($blogId>0 && $blogFieldId>0){
				echo "<script language='javascript'>alert('发布成功!');location.href='/index.php/blog/index/detail?blog_id=$blogId';</script>";die;
			}else{
				echo "<script language='javascript'>alert('发布失败!');location.href='/index.php/blog/index/issue';</script>";die;			
			}
    	}
		$this->parser->parse('blog/issue.tpl',$data);
    }
    /**
     * 普通日志详细
     */
    public function detail(){
    	$data=array();
    	$blogId = $_REQUEST['blog_id'];
    	$blogInfo=$this->m_blog->getBlogInfoByBlogId($blogId);
    	$commentList=$this->m_comment->getCommentListByBlogId($blogId);
    	$data['commentList']=$commentList;
    	$data['blogInfo']=$blogInfo;
    	$data['blogId']=$blogId;
		$this->parser->parse('blog/detail.tpl',$data);
    }

   /*ajax 得到市*/	
    public function city()
    {
		header('Content-Type:text/html;charset=utf-8');
		$provinceID=mysql_escape_string(isset($_GET['provinceID'])?$_GET['provinceID']:'');
		if(!$provinceID){
			return;
		}
		$cityID=mysql_escape_string(isset($_GET['cityID'])?$_GET['cityID']:'');
		$str=$this->m_blog->getcity($provinceID);
		$o_str="<option value=''>請選擇城市</option>";
		foreach($str as $k=>$v){
			$o_str.="<option value='".$v['cityID']."' ";
			if($v['cityID']==$cityID) $o_str.=" selected ";
			$o_str.=">".$v['city']."</option>";
		}
		echo $o_str;die;
    }
    /*ajax 得到城县*/	
    public function area()
    {
		header('Content-Type:text/html;charset=utf-8');
		$cityID=mysql_escape_string(isset($_GET['cityID'])?$_GET['cityID']:'');
		if(!$cityID){
			return;
		}
		$areaID=mysql_escape_string(isset($_GET['areaID'])?$_GET['areaID']:'');
		$str=$this->m_blog->getarea($cityID);
		$o_str="<option value=''>請選擇區域</option>";
		foreach($str as $k=>$v){
			$o_str.="<option value='".$v['areaID']."' ";
			if($v['areaID']==$areaID) $o_str.=" selected ";
			$o_str.=">".$v['area']."</option>";
		}
		echo $o_str;die;
    }
}