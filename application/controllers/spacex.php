<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 奇遇空间文章控制器
 * @author by shrek
 * @data   2012-04-21
 */
class Spacex extends CI_controller
{
	var $data = array();
     public function __construct()
     {
          parent::__construct();
         
     }
	 public function index(){
		$data = array();
		$data["secslide"]="shrek";		
		$this->load->model('spacex/mp_spacex_model','articles',true);	//加载模型
		
		/*
		$data['secslides']=$this->articles->getArticleSection('2,3,4,7,8','f','0,5');	//返回奇幻灯视窗列表数据
		$data['secspecial']=$this->articles->getArticleSection(2,'h','0,9');	//返回奇遇专题列表数据
		
		//返回奇遇原创列表数据
		$data['secoriginalC1']=$this->articles->getArticleSection(4,'p','0,10');	
		$data['secoriginalC2']=$this->articles->getArticleSection(4,'h','0,6');
		
		
		//返回奇遇故事列表数据
		$data['secstoryC1']=$this->articles->getArticleSection(8,'h,a','0,3');
		$data['secstoryC1']=$this->articles->getArticleSection(8,'h,p','0,9');	
		
		
		//返回奇遇生活列表数据
		$data['seclifeC1']=$this->articles->getArticleSection(7,'h,a','0,3');	
		$data['seclifeC2']=$this->articles->getArticleSection(7,'h,p','0,9');
		
		//返回奇遇情感列表数据
		$data['secemotionC1']=$this->articles->getArticleSection(3,'h,a','0,3');	
		$data['secemotionC2']=$this->articles->getArticleSection(3,'h,p','0,9');
		
		//返回奇遇排行列表数据 - 点击数
		$data['secranksC1']=$this->articles->getArticleSection_tops('2,3,4,7,8','0,10');
		
		//返回奇遇热点列表数据 - 推荐位
		$data['sechotsC1']=$this->articles->getArticleSection('2,3,4,7,8','c','0,10');
		*/
		
		$data['secslides']=$this->articles->getArticleSection('1,2,3,4,5,6','f','0,5');	//返回奇幻灯视窗列表数据
		$data['secspecial']=$this->articles->getArticleSection(4,'h','0,9');	//返回奇遇专题列表数据
		
		//返回奇遇原创列表数据
		$data['secoriginalC1']=$this->articles->getArticleSection(2,'p','0,10');	
		$data['secoriginalC2']=$this->articles->getArticleSection(2,'h','0,6');
		
		
		//返回奇遇故事列表数据
		$data['secstoryC1']=$this->articles->getArticleSection(6,'h,a','0,3');
		$data['secstoryC1']=$this->articles->getArticleSection(6,'h,p','0,9');	
		
		
		//返回奇遇生活列表数据
		$data['seclifeC1']=$this->articles->getArticleSection(5,'h,a','0,3');	
		$data['seclifeC2']=$this->articles->getArticleSection(5,'h,p','0,9');
		
		//返回奇遇情感列表数据
		$data['secemotionC1']=$this->articles->getArticleSection(3,'h,a','0,3');	
		$data['secemotionC2']=$this->articles->getArticleSection(3,'h,p','0,9');
		
		//返回奇遇排行列表数据 - 点击数
		$data['secranksC1']=$this->articles->getArticleSection_tops('1,2,3,4,5,6','0,10');
		
		//返回奇遇热点列表数据 - 推荐位
		$data['sechotsC1']=$this->articles->getArticleSection('1,2,3,4,5,6','c','0,10');

		$this->load->model( 'activity/activity_model', '', TRUE ); 
		$recommend_list = $this->activity_model->get_my_launch( 6, 0, "and a.audit=0 and a.recommend=1", " RAND()" );
		$data['recommend_list'] = $recommend_list;
	
		//$this->parser->parse('spacex/index.tpl',$data);	// 加载模板
		$this->parser->parse('spacex/mp_index.tpl',$data);	// 加载模板

	}
     
    /**
     *故事列表
     */
    public function indexbak()
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
