<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 情感空间控制器文件
 * @author by loso
 * @date   2012-1-1
 */
class Feelspace extends CI_controller
{
	var $commen_info = array();
	var $user_id;
	var $user_name;
	
      public function __construct()
      {
             parent::__construct();
             
             $this->load->model('blog/story_model','story',TRUE);
             $this->load->model('blog/blog_model','blog',TRUE);
             $this->load->model('common/m_common','member',TRUE);
             
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
      
      public function index()
      {
      	        $data['recommend'] = $this->story->get_feelspace_storys();
		    	$data['shalong'] = $this->story->get_feelspace_storys(' tags = 0 ');
		    	$data['diandi']  = $this->story->get_feelspace_storys(' tags = 1 ');
		    	$data['gushi']   = $this->story->get_feelspace_storys(' tags = 2 ');  
		    	$data['xiaopin'] = $this->story->get_feelspace_storys(' tags = 3 ');  
		    	$data['recommend_essay'] = $this->blog->get_feelspace_essays();
		    	$data['relian']  = $this->blog->get_feelspace_essays(' b.tag = 0');  
		    	$data['qianshou']= $this->blog->get_feelspace_essays(' b.tag = 1');  
		    	$data['ailian']  = $this->blog->get_feelspace_essays(' b.tag = 2');  
		    	$hotblog = $this->member->get_member_list( "hotblog=1" );  
		    	foreach ( $hotblog as $k=>$v )
		    	{
		    		$avatar_img = "/data/avatar/".get_avatar( $hotblog[$k]['userid'], 'small' );
					$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
					$hotblog[$k]['avatar_img'] = $avatar_img;
		    	}
		    	$data['hotblog'] = $hotblog;
		    	$data['commen_info'] = $this->commen_info;
		    	
		    	//print_r( $data );exit;
				$this->parser->parse('blog/loveblog.tpl',$data);
      }

}
