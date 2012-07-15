<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 情感博文控制器文件
 * @author by loso
 * @date   2012-1-2
 */
class Essay extends CI_controller
{
	var $data = array();
	public function __construct()
	{
        parent::__construct();
          
        @$this->user_name = $this->session->userdata['user_name'];
    	@$this->user_id   = $this->session->userdata['user_id'];
    	$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
    	  
    	$this->load->model('blog/blog_model','blog',TRUE);
    	  
    	$this->load->model( 'member/members_email_model', '', TRUE ); 
		$this->load->model( 'friend/friend_model', '', TRUE ); 
		$this->members_email_model->userid = $this->user_id;
		
		$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'small' );
		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
		$this->data['commen_info']['username'] = $this->user_name;
		$this->data['commen_info']['userid'] = $this->user_id;
		$this->data['commen_info']['avatar_img'] = $avatar_img;
		$this->data['commen_info']['all_email_num'] = $this->members_email_model->get_email_num();
		$this->data['commen_info']['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
		$this->data['commen_info']['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$this->user_id} and STATUS=1)" );
		
		$friends_attention_list = array();
		$friends_attention_list = $this->friend_model->get_friends_attention_list( $this->user_id );
		foreach ( $friends_attention_list as $kt=>$vt )
		{
			$avatar_img_s = '';
			$avatar_img_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
			$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
			$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s;
		}
		$this->data['commen_info']['friend_attention_list'] = $friends_attention_list;
	}

    /**
     * 博文列表
     */
    public function index()
    {
    	$data = array();
    	$data = $this->data;
    	$data['blogList'] = $this->blog->get_Blogs($this->user_id, 101);
    	if($this->uri->segment(4))
    	{
    	     $this->parser->parse('blog/member_blog.tpl',$data);
    	}
    	else 
    	{
		    $this->parser->parse('blog/myblog.tpl',$data);
    	}    
    }

    
    /**
     * 新增博文
     */
    public function add_essay()
    {
        if(!empty($_POST))
        {
             $pathUlr = site_url('/blog/essay');
        	 $data['username']   = $this->user_name;
		     $data['userid']     = $this->user_id;
		     $data['catid']      = 101; // 姑且奇遇故事大分类id定义为 1
		     
	        if($data['subject'] = $this->input->post('subject'))
	        {
	        	$data['blog_type']  = 1; //一般类型博客
	        	$data['dateline']   = time();
	        	$subdata['blogid']  = $this->blog->add_Blogs($data);
	        	
	            $subdata['tag']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类	
	            $subdata['message'] = $this->input->post('content');
	            $subdata['userid']  = $data['userid'];
	            $subdata['postip']  = $this->input->ip_address();
	            $filename = gmdate('YmdHis', 8 * 3600);
                $img_file = upload_pic('cover_img', 'thumb', $filename, true, array('150', '150'));
                
                $subdata['pic'] = $img_file[1]['thumb'];
	            
	            $this->blog->add_RelevanceBlogs($subdata);
	            $this->load->model('common/credit_model');
	            $this->credit_model->credit_opertion($this->user_id, 1, 3);
	            redirect($pathUlr);
	            
	        }
	        else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/essay/add_essay';</script>";die;
	        }
        }    
        
        $data = array();
        $data = $this->data;
		$this->parser->parse( 'blog/add_essay.tpl', $data );
    }
    
    /**
     *  编辑博文
     */
    function edit_essay(){
        $pathUlr = site_url('/blog/essay');
        if(!empty($_POST))
        {
	        if($data['SUBJECT'] = $this->input->post('subject'))
	        {
	        	$data['dateline']   = time();
	        	$blogid             = $this->input->post('blogid');
	        	
	            $subdata['tag']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类
	            $subdata['message'] = $this->input->post('content');
	            $subdata['postip']  = $this->input->ip_address();
	            
	            $filename = gmdate('YmdHis', 8 * 3600);
                $img_file = upload_pic('cover_img', 'thumb', $filename, true, array('150', '150'));
                if($img_file[0])
                {
                   $old_thumb = $this->input->post('pic');
                   $subdata['pic'] = $img_file[1]['thumb'];
                   $root = rtrim($_SERVER['DOCUMENT_ROOT'],'/');
                 
                   $old_bigthumb = str_ireplace("_thumb", '', $old_thumb);
                   @unlink($root.$old_bigthumb);
                   @unlink($root.$old_thumb);
                }
	          
		        if ($this->blog->update_Blogs($data, $blogid) && $this->blog->update_RelevanceBlogs($subdata, $blogid))
		        {
					//echo "<script language='javascript'>alert('编辑成功!');location.href='/index.php/blog/index/detail?blog_id=$blogid';</script>";die;
					return showmessage( '博文编辑成功', $url_forward = "/index.php/blog/index/detail?blog_id={$blogid}", $ms = 1250 );
				}
				else
				{
					//echo "<script language='javascript'>alert('编辑失败!');location.href='$_SERVER[REQUEST_URI]';</script>";die;		
					return showmessage( '博文编辑失败', $url_forward = "{$_SERVER[REQUEST_URI]}", $ms = 1250 );	
				}
	           
	        }
            else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/essay/add_essay';</script>";die;
	        }
        }    
        
    	if(!$blogId = $this->uri->segment(4))
    	{
    	    redirect($pathUlr);
    	}
    	
    	$data = array();
    	$data = $this->data;
    	$data['blog'] = $this->blog->get_Blogs($blogId, false);
		$this->parser->parse( 'blog/edit_essay.tpl',$data );
    }
    
	    /**
	     * 删除博文
	     */
	    public function delete_essays()
	    {
	    	$strIds = $this->input->get('strIds');
	        if($essayId = trim($strIds,'_'))
	        {  
	        	$essayIds = explode('_', $essayId);
	            foreach($essayIds as $values)
	            {     
	                   $essay = $this->blog->get_Blogs($values, false);
	                   $big_thumb = str_ireplace("_thumb", '', $essay['pic']);
	                   
	                   $root = rtrim($_SERVER['DOCUMENT_ROOT'],'/');
	                   @unlink($root.$big_thumb);
	                   @unlink($root.$essay['pic']);
	                   if($values == $essay['blogid']) 
	                   {
	                      $this->blog->delete_Blogs($values);
	                      $this->blog->delete_RelevanceBlogs($values);
	                   }   
	            }
	        }
	        return true;
	    }
	    
        /**
	     * 博文详细
	     */
	    public function detail_essay()
	    {
	    	$data = array();
	    	$data = $this->data;
	        if($blogId = $this->uri->segment(4))
	        {
	           $this->load->model('blog/m_comment','',TRUE);
	           $data['blog'] = $this->blog->get_Blogs($blogId, false);
	           $this->load->model('member/members_model', '', TRUE);
	           $this->load->model('member/members_profile_model', '', TRUE);
	          
	           
	           $commentList = $this->m_comment->getCommentListByBlogId($blogId, 0);
	           if ( !empty( $commentList ) )
	           {
	           		foreach ( $commentList as $d=>$dv )
	           		{
	           			$avatar_img_s = "/data/avatar/".get_avatar( $commentList[$d]['userid'], 'small' );
						$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
						$commentList[$d]['avatar_img'] = $avatar_img_s;
	           		}
	           		
	           		$data['commentList'] = $commentList;
	           }
	           
	           
	           $member_info = array();
	           $member_profile_info = array();
			  
			    $member_info = $this->members_model->get_member($data['blog']['userid']);
			    $member_profile_info = $this->members_profile_model->get_member_profile( $data['blog']['userid'] );
				
				$avatar_img = "/data/avatar/".get_avatar( $data['blog']['userid'], 'small' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$member_profile_info['avatar_img'] = $avatar_img;
				
				$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
				
				$data['member'] = $member_info;
				$data['member_profile'] = $member_profile_info;
	        }
			$this->parser->parse('blog/member_blog_detail.tpl',$data);
	    }
	  
}