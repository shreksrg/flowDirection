<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 博客评论管理
 * @author antaeus
 *
 */
class comment extends CI_Controller {
	var $user_id = '';
	var $user_name = '';
    public function __construct(){
        parent::__construct();
        
       	if( $this->session->userdata( 'user_id' ) )
		{
        	$this->user_name = $this->session->userdata['user_name'];
        	$this->user_id   = $this->session->userdata['user_id'];
		}
    	$this->load->model('blog/m_comment','',TRUE);
    }
    
    /**
     * 某篇博客的评论列表
     */
    public function index(){
    	$data=array();
    	$blogId=$_GET['blog_id']?$_GET['blog_id']:1;
    	$commentList=$this->m_comment->getCommentListByBlogId($blogId);
    	$data['commentList']=$commentList;
		$this->parser->parse('blog/myblog.tpl',$data);
    }
    
    private function  print_result_ajax($data,$message,$arr=array()){
	    $result=array();
	    $result['data']=$data;
	    $result['message']=$message;
	    foreach ($arr as $k=>$v){
	    	$result[$k]=$v;
	    }
	    $result=json_encode($result);
	    die($result);
    }
    
    /**
     * 新增评论
     */
    public function comment_add(){
    	$data=array();
    	$userInfo=array();
    	$userInfo['userid']=$this->user_id;
    	$data['userInfo']=$userInfo;
    	if(!empty($_POST)){
	    	$commentInfo=array();
			$commentInfo["content"]=mysql_escape_string(isset($_POST["content"])?$_POST["content"]:'');
			if (empty($commentInfo["content"])){
				$this->print_result_ajax(-1,"评论内容不能为空！");
			}
			$nowTime=time();
			$commentInfo['userid']=$userInfo['userid'];
			$commentInfo['blogid']=isset($_POST["blog_id"])?$_POST["blog_id"]:1;
			$commentInfo["username"]= $this->user_name;
			$commentInfo['create_time']=$nowTime;
			$commentInfo['type']=$_POST["type"]?$_POST["type"]:0;
			$commentId=$this->m_comment->addCommentRow('comment',$commentInfo);
			if ($commentId>0){
				$this->print_result_ajax(1,"评论成功！",array('date'=>date('m-d',$nowTime),'time'=>date('H:i',$nowTime),'userName'=>$this->user_name, 'content'=>$commentInfo["content"], 'userid'=>$commentInfo['userid'], 'comment_id'=>$commentId));
			}else{
				$this->print_result_ajax(-1,"评论失败，请稍后再试！");
			}
    	}
		$this->parser->parse('blog/add_map.tpl',$data);
    }
    
   public function comment_delete()
   {
       $comment_id = $this->input->get('comment_id');
       $user_id = $this->input->get('userid');
       if($user_id == $this->user_id)
       {
          echo $this->m_comment->deleteCommentRow($comment_id);
       }
       else
       {
          echo 0;
       }
       exit;
   }
}