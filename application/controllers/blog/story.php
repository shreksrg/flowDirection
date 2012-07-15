<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 奇遇故事控制器文件
 * @author by loso
 * @data   2011-12-30
 */
class Story extends CI_controller
{
	var $data = array();
     public function __construct()
     {
          parent::__construct();
         
          $this->load->model('common/m_common','',TRUE);
          $this->m_common->validateLogin();
          $this->load->model('blog/story_model','',TRUE);
          
          $this->user_name = $this->session->userdata['user_name'];
    	  $this->user_id   = $this->session->userdata['user_id'];
    	  
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
     *故事列表
     */
    public function index()
    {
    	$data = array();
    	$data = $this->data;
    	$this->load->model('member/members_model', '', TRUE);
    	//$this->load->model('member/members_profile_model', '', TRUE);
	    //$data = $this->members->get_member($this->user_id);
    	$data['storyList'] = $this->story_model->get_storys($this->user_id);
    	if( $this->uri->segment( 4 ) )
    	{
    		
     		
    	    $this->parser->parse('blog/member_story.tpl',$data);
    	}
    	else
    	{
    	   $this->parser->parse('blog/story.tpl',$data);
    	}
		
    }
    
    /**
     * 新增故事
     */
    public function add_story()
    {
        if(!empty($_POST))
        {
        	 $pathUlr = site_url('/blog/story/add_story');
        	 $data['username']   = $this->user_name;
             $data['userid']     = $this->user_id;
             $data['catid']      = 100; // 姑且奇遇故事大分类id定义为 100
             
	        if($data['albumname'] = $this->input->post('subject'))
	        {
	        	$data['dateline']   = time();
	            $data['tags']     = $this->input->post('blog_type'); //故事标签，可以定义成二级分类	
	            $data['description'] = $this->input->post('content');
	            
	            $filename = gmdate('YmdHis', 8 * 3600);
                $img_file = upload_pic('cover_img', 'thumb', $filename, true, array('150', '150'));
                
                $data['thumb'] = $img_file[1]['thumb'];
                
	            $this->story_model->insert_storys($data);
	            $this->load->model('common/credit_model');
	            $this->credit_model->credit_opertion($this->user_id, 1, 3);
	            redirect($pathUlr);
	        }
	        else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/story/add_story';</script>";die;
	        }
        }    
        
        $data = array();
        $data = $this->data;
		$this->parser->parse('blog/add_story.tpl', $data );
    }
    
       /**
        * 编辑故事
        */
       public function edit_story(){
       	
        $pathUlr = site_url('/blog/story');
        if(!empty($_POST))
        { 
            if($data['albumname'] = $this->input->post('subject'))
	        { 
	        	 
	        	$data['dateline']    = time();
	            $data['tags']        = $this->input->post('blog_type'); //故事标签，可以定义成二级分类	
	            $data['description'] = $this->input->post('content');
	            $albumid              = $this->input->post('albumid');
	            
	            $filename = gmdate('YmdHis', 8 * 3600);
                $img_file = upload_pic('cover_img', 'thumb', $filename, true, array('150', '150'));
                if($img_file[0])
                {
                   $old_thumb = $this->input->post('thumb');
                   $data['thumb'] = $img_file[1]['thumb'];
                   $root = rtrim($_SERVER['DOCUMENT_ROOT'],'/');
                 
                   $old_bigthumb = str_ireplace("_thumb", '', $old_thumb);
                   @unlink($root.$old_bigthumb);
                   @unlink($root.$old_thumb);
                }
               
	            $this->story_model->update_storys($data, $albumid);
		        
		        redirect($pathUlr);
	        }
            else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/story';</script>";die;
	        }
        }    
        
    	if(!$storyId = $this->uri->segment(4))
    	{
    	    redirect($pathUlr);
    	}
    	
    	$data = $this->data;
    	$data['story'] = $this->story_model->get_Storys(false, $storyId);
		$this->parser->parse('blog/edit_story.tpl',$data);
    	
    }

	    /**
	     * 删除故事
	     */
	    public function delete_storys()
	    {
	        if($storyId = (array)$this->input->get('blogid'))
	        {  
	            foreach($storyId as $values)
	            {     
	                   $story = $this->story_model->get_storys(false, $values);
	                   $big_thumb = str_ireplace("_thumb", '', $story['thumb']);
	                   
	                   $root = rtrim($_SERVER['DOCUMENT_ROOT'],'/');
	                   @unlink($root.$big_thumb);
	                   @unlink($root.$story['thumb']);
	                   if($values == $story['albumid']) $this->story_model->delete_story($values);
	            }
	        }
	        return true;
	    }

	    
	    /**
	     * 故事日志详细
	     */
	    public function detail_story()
	    {
	    	$data = $this->data;
	        if($storyId = $this->uri->segment(4))
	        {
	           $this->load->model('blog/m_comment','',TRUE);
	           $data['story'] = $this->story_model->get_Storys(false, $storyId);
	           $this->load->model('member/members_model', '', TRUE);
	           $this->load->model('member/members_profile_model', '', TRUE);
	          
	           $commentList = $this->m_comment->getCommentListByBlogId($storyId, 1);
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
			  
			    $member_info = $this->members_model->get_member($data['story']['userid']);
			    $member_profile_info = $this->members_profile_model->get_member_profile( $data['story']['userid'] );
				
				$avatar_img = "/data/avatar/".get_avatar( $data['story']['userid'], 'big' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$member_profile_info['avatar_img'] = $avatar_img;
				
				$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
				
				$data['member'] = $member_info;
				$data['member_profile'] = $member_profile_info;
			           
	        }
			$this->parser->parse('blog/member_story_detail.tpl',$data);
	    }
}
