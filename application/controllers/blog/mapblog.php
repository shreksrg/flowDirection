<?php
/*
 * 地图日志模块-控制器文件
 * @author by loso
 * @date 2012-1-4
 */
class Mapblog extends CI_controller
{
	var $commen_info = array();
	var $user_id;
	var $user_name;
	
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
     
     public function index()
     {
         $data['province_list']=$this->blog->get_regions('province');
         $data['travel'] = $this->blog->get_mapblogs(' b.tag = 1 ', 5);
         $data['cate']   = $this->blog->get_mapblogs(' b.tag = 2 ', 5);
         $data['recreation']   = $this->blog->get_mapblogs(' b.tag = 3 ', 5);
         $data['newblogs']   = $this->blog->get_mapblog_datas();
         $data['commen_info'] = $this->commen_info;
         $this->parser->parse("blog/mapblog_index.tpl", $data);
     }
     
     public function search()
     {
     	 $data['province_list']=$this->blog->get_regions('province');
         $data['province'] = $this->input->post('input_province');
         
         $data['city'] = $this->input->post('input_city');
         $data['area'] = $this->input->post('input_area');
         $data['category'] = $this->input->post('category') ? $this->input->post('category'):$this->uri->segment(4);
         $fields = "";
         if(!empty($data['province'])) $fields.= " a.province = '{$data['province']}' AND ";
         if(!empty($data['city'])) $fields.=" a.city = '{$data['city']}' AND ";
         if(!empty($data['area'])) $fields.=" a.area = '{$data['area']}' AND ";
         if(!empty($data['category'])) $fields.=" b.tag = '{$data['category']}' ";
         $fields = trim($fields,'AND ');
         $data['search_blog'] = $this->blog->get_mapblog_datas($fields, 10);
         $data['recomment_list'] = $this->blog->get_mapblogs(' 1= 1', 10);
         $data['commen_info'] = $this->commen_info;
         $this->parser->parse("blog/mapblog_all.tpl", $data);
     }

}