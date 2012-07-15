<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 网站一级栏目入口
 * @author floy
 *
 */
class Browse_blog extends CI_Controller {
	var $commen_info = array();
	var $user_id;
	var $user_name;
	/**
	 * 
	 * 博客首页入口
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('blog/blog_model','blog',TRUE);
		if( $this->session->userdata( 'user_id' ) )
		{
			$this->user_id = $this->session->userdata( 'user_id' );
			$this->user_name = $this->session->userdata( 'user_name' );
			
			$this->load->model( 'member/members_email_model', '', TRUE ); 
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$this->members_email_model->userid = $this->user_id;
			
			$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$this->commen_info['username'] = $this->user_name;
			$this->commen_info['userid'] = $this->user_id;
			$this->commen_info['avatar_img'] = $avatar_img;
			$this->commen_info['all_email_num'] = $this->members_email_model->get_email_num();
			$this->commen_info['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
			$this->commen_info['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$this->user_id} and STATUS=1)" );
		}
	}	
	
	/*public function detail()
	{
		
		
		
		
		$data = array(
			'title' => '地图日志',
		);
		$this->parser->parse('index_blog',$data);
	}*/
	
	public function index()
	{
		$data = array();
		//顶部推荐
		$toplist = $this->blog->get_Blogs_map( 5, 0, "and a.catid=102 and a.selected=1 and a.STATUS=0", "rand()" );
		
		//奇遇美食 $cid=2;
		$foodlist = $this->blog->get_Blogs_map( 7, 0, "and a.catid=102 and a.selected=1 and a.STATUS=0 and b.tag=2 " );
		$foodlistline = $this->blog->get_Blogs_map( 7, 0, "and a.catid=102 and a.ranking=1 and a.STATUS=0 and b.tag=2 " );
		
		//奇遇休闲 $cid=3
		$xiuxlist = $this->blog->get_Blogs_map( 7, 0, "and a.catid=102 and a.selected=1 and a.STATUS=0 and b.tag=3 " );
		$xiuxlistline = $this->blog->get_Blogs_map( 7, 0, "and a.catid=102 and a.recommend=1 and a.STATUS=0 and b.tag=3 " );
		
		//奇遇旅游 $cid=1
		$lylist = $this->blog->get_Blogs_map( 7, 0, "and a.catid=102 and a.selected=1 and a.STATUS=0 and b.tag=1 " );
		$lylistline = $this->blog->get_Blogs_map( 7, 0, "and a.catid=102 and a.hot=1 and a.STATUS=0 and b.tag=1 " );
		//print_r($foodlist);exit;
		
		$data['toplist'] = $toplist;
		$data['foodlist'] = $foodlist;
		$data['foodlistline'] = $foodlistline;
		$data['xiuxlist'] = $xiuxlist;
		$data['xiuxlistline'] = $xiuxlistline;
		$data['lylist'] = $lylist;
		$data['lylistline'] = $lylistline;
		
		$this->parser->parse( 'mp_mapblog.tpl', $data );
	}
	
	
	public function map_detail()
    {
    	 if( $blogId = $this->uri->segment(3) )
	     {
	     	   $this->load->model('blog/m_comment','',TRUE);
	           $data['map'] = $this->blog->get_Blogs($blogId, false);
	           $this->load->model('member/members_model', '', TRUE);
	           $this->load->model('member/members_profile_model', '', TRUE);
	           $this->load->model('blog/blog_model','blog',TRUE);
	           
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
			  
			    $member_info = $this->members_model->get_member($data['map']['userid']);
			    $member_profile_info = $this->members_profile_model->get_member_profile( $data['map']['userid'] );
				
				$avatar_img = "/data/avatar/".get_avatar( $data['map']['userid'], 'small' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$member_profile_info['avatar_img'] = $avatar_img;
				
				$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
				
				$data['member'] = $member_info;
				$data['member_profile'] = $member_profile_info;
				if ( $this->user_id )
				{
					$avatar_img_s = "/data/avatar/".get_avatar( $this->user_id, 'small' );
					$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
					$data['user_id'] = $this->user_id;
					$data['user_avatar_img'] = $avatar_img_s;
				}
				
				$data['title'] = "地图日志";
				$data['commen_info'] = $this->commen_info;
				
				$friends_attention_list = array();
				$this->load->model( 'friend/friend_model', '', TRUE ); 
				$friends_attention_list = $this->friend_model->get_friends_attention_list( $data['map']['userid'] );
				foreach ( $friends_attention_list as $kt=>$vt )
				{
					$avatar_img_s_s = '';
					$avatar_img_s_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
					$avatar_img_s_s = file_exists( '.'.$avatar_img_s_s ) ? $avatar_img_s_s : '/static/images/avatar/noavatar_big.gif';
					$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s_s;
				}
				$data['commen_info']['friend_attention_list'] = $friends_attention_list;
				$hot_list = $this->blog->get_Blogs_map( 10, 0, "AND a.hot=1 AND a.catid=102", $order_by='a.blogid desc' );
				$recommend_list = $this->blog->get_Blogs_map( 10, 0, "AND a.recommend=1 AND a.catid=102", $order_by='a.blogid desc' );
				$data['hot_list'] = $hot_list;
				$data['recommend_list'] = $recommend_list;
				
				$this->parser->parse('blog/mp_member_map_detail.tpl',$data );
	     }
	     else 
	     {
	     	return showmessage( '不存在该地图日志!', $url_forward = "/index.php", $ms = 1250 );
	     }
    }
    
    public function story_detail()
    {
     	if( $storyId = $this->uri->segment(3) )
     	{
     		$this->load->model('blog/story_model','',TRUE);
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
     		
     		if ( $this->user_id )
			{
				$avatar_img_s = "/data/avatar/".get_avatar( $this->user_id, 'small' );
				$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
				$data['user_id'] = $this->user_id;
				$data['user_avatar_img'] = $avatar_img_s;
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
     		$data['commen_info'] = $this->commen_info;
     		
     		$friends_attention_list = array();
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$friends_attention_list = $this->friend_model->get_friends_attention_list( $data['story']['userid'] );
			foreach ( $friends_attention_list as $kt=>$vt )
			{
				$avatar_img_s_s = '';
				$avatar_img_s_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
				$avatar_img_s_s = file_exists( '.'.$avatar_img_s_s ) ? $avatar_img_s_s : '/static/images/avatar/noavatar_big.gif';
				$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s_s;
			}
			$data['commen_info']['friend_attention_list'] = $friends_attention_list;
     		
			$this->parser->parse('blog/member_story_detail.tpl',$data);
     	}
		else 
	    {
	    	return showmessage( '不存在该情感故事!', $url_forward = "/index.php", $ms = 1250 );
	    }
    }
    
    public function story_list()
    {
    	if( $this->uri->segment( 3 ) )
    	{
    		$this->load->model('member/members_model', '', TRUE);
    		$this->load->model('member/members_profile_model', '', TRUE);
    		$this->load->model('blog/story_model','',TRUE);
    		
    		$userid = $this->uri->segment( 3 );
    		$member_info = array();
     		$member_profile_info = array();
    		$member_info = $this->members_model->get_member( $userid );
    		$member_profile_info = $this->members_profile_model->get_member_profile( $userid );

     		$avatar_img = "/data/avatar/".get_avatar( $userid, 'small' );
     		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
     		$member_profile_info['avatar_img'] = $avatar_img;

     		$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];

     		$data['member'] = $member_info;
     		$data['member_profile'] = $member_profile_info;
    		
     		$friends_attention_list = array();
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$friends_attention_list = $this->friend_model->get_friends_attention_list( $userid );
			foreach ( $friends_attention_list as $kt=>$vt )
			{
				$avatar_img_s_s = '';
				$avatar_img_s_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
				$avatar_img_s_s = file_exists( '.'.$avatar_img_s_s ) ? $avatar_img_s_s : '/static/images/avatar/noavatar_big.gif';
				$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s_s;
			}
			$data['commen_info'] = $this->commen_info;
			$data['commen_info']['friend_attention_list'] = $friends_attention_list;
     		$data['storyList'] = $this->story_model->get_storys( $userid );
     		
    	    $this->parser->parse('blog/member_story.tpl',$data);
    	}    
    }
    
    public function essay_detail()
	{
	    if($blogId = $this->uri->segment(3))
	    {
			$this->load->model('blog/m_comment','',TRUE);
			$this->load->model('blog/blog_model','blog',TRUE);
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
	        
	        if ( $this->user_id )
			{
				$avatar_img_s = "/data/avatar/".get_avatar( $this->user_id, 'small' );
				$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
				$data['user_id'] = $this->user_id;
				$data['user_avatar_img'] = $avatar_img_s;
			}
	             
	        $member_info = array();
	        $member_profile_info = array();
			  
			$member_info = $this->members_model->get_member($data['blog']['userid']);
			$member_profile_info = $this->members_profile_model->get_member_profile( $data['blog']['userid'] );
			$data['commen_info'] = $this->commen_info;
				
			$avatar_img = "/data/avatar/".get_avatar( $data['blog']['userid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$member_profile_info['avatar_img'] = $avatar_img;
				
			$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
				
			$data['member'] = $member_info;
			$data['member_profile'] = $member_profile_info;
			
			$friends_attention_list = array();
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$friends_attention_list = $this->friend_model->get_friends_attention_list( $data['blog']['userid'] );
			foreach ( $friends_attention_list as $kt=>$vt )
			{
				$avatar_img_s_s = '';
				$avatar_img_s_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
				$avatar_img_s_s = file_exists( '.'.$avatar_img_s_s ) ? $avatar_img_s_s : '/static/images/avatar/noavatar_big.gif';
				$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s_s;
			}
			$data['commen_info']['friend_attention_list'] = $friends_attention_list;
			
			$this->parser->parse('blog/member_blog_detail.tpl',$data);
	    }
	    else 
	    {
	    	return showmessage( '不存在该情感博文!', $url_forward = "/index.php", $ms = 1250 );
	    }
	    
	}
	
	public function essay_list()
    {
    	if( $this->uri->segment( 3 ) )
    	{
    		$this->load->model('member/members_model', '', TRUE);
    		$this->load->model('member/members_profile_model', '', TRUE);
    		$this->load->model('blog/blog_model','blog',TRUE);
    		
    		$userid = $this->uri->segment( 3 );
    		$member_info = array();
     		$member_profile_info = array();
    		$member_info = $this->members_model->get_member( $userid );
    		$member_profile_info = $this->members_profile_model->get_member_profile( $userid );

     		$avatar_img = "/data/avatar/".get_avatar( $userid, 'small' );
     		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
     		$member_profile_info['avatar_img'] = $avatar_img;

     		$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];

     		$data['member'] = $member_info;
     		$data['member_profile'] = $member_profile_info;
    		
     		$friends_attention_list = array();
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$friends_attention_list = $this->friend_model->get_friends_attention_list( $userid );
			foreach ( $friends_attention_list as $kt=>$vt )
			{
				$avatar_img_s_s = '';
				$avatar_img_s_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
				$avatar_img_s_s = file_exists( '.'.$avatar_img_s_s ) ? $avatar_img_s_s : '/static/images/avatar/noavatar_big.gif';
				$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s_s;
			}
			$data['commen_info'] = $this->commen_info;
			$data['commen_info']['friend_attention_list'] = $friends_attention_list;
     		$data['blogList'] = $this->blog->get_Blogs( $userid, 101 );
     		
    	    $this->parser->parse('blog/member_blog.tpl',$data);
    	}    
    }
    
    public function map_list()
    {
    	if( $this->uri->segment( 3 ) )
    	{
    		$this->load->model('member/members_model', '', TRUE);
    		$this->load->model('member/members_profile_model', '', TRUE);
    		$this->load->model('blog/blog_model','blog',TRUE);
    		
    		$userid = $this->uri->segment( 3 );
    		$member_info = array();
     		$member_profile_info = array();
    		$member_info = $this->members_model->get_member( $userid );
    		$member_profile_info = $this->members_profile_model->get_member_profile( $userid );

     		$avatar_img = "/data/avatar/".get_avatar( $userid, 'small' );
     		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
     		$member_profile_info['avatar_img'] = $avatar_img;

     		$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];

     		$data['member'] = $member_info;
     		$data['member_profile'] = $member_profile_info;
    		
     		$friends_attention_list = array();
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$friends_attention_list = $this->friend_model->get_friends_attention_list( $userid );
			foreach ( $friends_attention_list as $kt=>$vt )
			{
				$avatar_img_s_s = '';
				$avatar_img_s_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
				$avatar_img_s_s = file_exists( '.'.$avatar_img_s_s ) ? $avatar_img_s_s : '/static/images/avatar/noavatar_big.gif';
				$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s_s;
			}
			$data['commen_info'] = $this->commen_info;
			$data['commen_info']['friend_attention_list'] = $friends_attention_list;
     		//$data['blogMapList'] = $this->blog->get_Blogs( $userid, 102 );
     		
     		$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
	    	$condtion = "AND a.userid={$userid} AND a.catid=102";
	    	
	    	$this->load->library( 'pagination' );
		    $config['base_url'] = '/index.php/browse_blog/map_list/'.$userid;
		    $config['total_rows'] = $this->blog->get_Blogs_map_num( $condtion );
		    $config['per_page'] = '8';
		    $config['first_link'] = '';
			$config['last_link'] = '';
			$config['next_link'] = '';
			$config['prev_link'] = '';
			$config['uri_segment'] = 4;
		    $config['full_tag_open'] = '<p>';
		    $config['full_tag_close'] = '</p>';
		    $config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="curpage">';
		    $config['cur_tag_close'] = '</li>';
			
	    	$this->pagination->initialize( $config );
	   		$list = $this->blog->get_Blogs_map( $config['per_page'], $offset, $condtion, $order_by='a.blogid desc' );
	   		$hot_list = $this->blog->get_Blogs_map( 10, $offset, "AND a.hot=1 AND a.catid=102", $order_by='a.blogid desc' );
	   		
	   		$data['blogMapList'] = $list;
	   		$data['hotBlogMapList'] = $hot_list;
	   		$data['page'] = $this->pagination->create_links();
     		
    	    $this->parser->parse('blog/mp_member_map.tpl',$data);
    	}    
    }
    
    public function map_lists()
    {
    	if( $this->uri->segment( 3 ) )
    	{
    		$this->load->model('blog/blog_model','blog',TRUE);
    		
    		$tag = $this->uri->segment( 3 );
			$data['commen_info'] = $this->commen_info;
			
     		$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
	    	$condtion = "AND b.tag={$tag} AND a.catid=102";
	    	
	    	$this->load->library( 'pagination' );
		    $config['base_url'] = '/index.php/browse_blog/map_lists/'.$tag;
		    $config['total_rows'] = $this->blog->get_Blogs_map_num( $condtion );
		    $config['per_page'] = '8';
		    $config['first_link'] = '';
			$config['last_link'] = '';
			$config['next_link'] = '';
			$config['prev_link'] = '';
			$config['uri_segment'] = 4;
		    $config['full_tag_open'] = '<p>';
		    $config['full_tag_close'] = '</p>';
		    $config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="curpage">';
		    $config['cur_tag_close'] = '</li>';
			
	    	$this->pagination->initialize( $config );
	   		$list = $this->blog->get_Blogs_map( $config['per_page'], $offset, $condtion, $order_by='a.blogid desc' );
	   		$hot_list = $this->blog->get_Blogs_map( 10, $offset, "AND a.hot=1 AND a.catid=102", $order_by='a.blogid desc' );
	   		
	   		$data['blogMapList'] = $list;
	   		$data['hotBlogMapList'] = $hot_list;
	   		$data['page'] = $this->pagination->create_links();
	   		$data['tag'] = $tag;
     		
    	    $this->parser->parse('blog/mp_member_map_list.tpl',$data);
    	}    
    }
    
    public function map_lists_search()
    {
    	if( array_key_exists( "province", $_POST ) ) {if( $_POST['province']=='0' ){$regprovince="n";}else{$regprovince = $_POST['province'];}}elseif( $this->uri->segment(3) != '' ){$regprovince = $this->uri->segment(3);}else {$regprovince = "n";}
		if( array_key_exists( "city", $_POST ) ) {if( $_POST['city']=='0' ){$regcity="n";}else{$regcity = $_POST['city'];}}elseif( $this->uri->segment(4) != '' ){$regcity = $this->uri->segment(4);}else {$regcity = "n";}
		if( array_key_exists( "blog_type", $_POST ) ) {if( $_POST['blog_type']=='' ){$tag="n";}else{$tag = $_POST['blog_type'];}}elseif( $this->uri->segment(5) != '' ){$tag = $this->uri->segment(5);}else {$tag = "n";}
		
		$condition = "";
		
		if ( $regprovince != 'n' ) $condition .= " and a.province='".$regprovince."'";
		if ( $regcity != 'n' ) $condition .= " and a.city='".$regcity."'";
		if ( $tag != 'n' ) $condition .= " and b.tag='".$tag."'";
		
		$offset = $this->uri->segment(6) == '' ? 0 : $this->uri->segment(6);
	    $condition .= " AND a.catid=102";
	    	
	    $this->load->library( 'pagination' );
		$config['base_url'] = '/index.php/browse_blog/map_lists_search/'.$regprovince.'/'.$regcity.'/'.$tag;
		$config['total_rows'] = $this->blog->get_Blogs_map_num( $condition );
		$config['per_page'] = '8';
		$config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 6;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="curpage">';
		$config['cur_tag_close'] = '</li>';
			
	    $this->pagination->initialize( $config );
	    $list = $this->blog->get_Blogs_map( $config['per_page'], $offset, $condition, $order_by='a.blogid desc' );
	   	$hot_list = $this->blog->get_Blogs_map( 10, $offset, "AND a.hot=1 AND a.catid=102", $order_by='a.blogid desc' );
	   		
	   	$data['blogMapList'] = $list;
	   	$data['hotBlogMapList'] = $hot_list;
	   	$data['page'] = $this->pagination->create_links();
	   	
	   	$this->parser->parse('blog/mp_search_map_list.tpl',$data);
    }
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */