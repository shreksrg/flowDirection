<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 地图日志控制器
 * @author liangcheng.wu
 *
 */
class Map extends CI_Controller {
	var $data = array();
    public function __construct(){
        parent::__construct();
        
         $this->load->model('blog/blog_model','blog',TRUE);
          
         @$this->user_name = $this->session->userdata['user_name'];
    	 @$this->user_id   = $this->session->userdata['user_id'];
    	 
    	 $this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
    	 
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
     * 地图日志列表
     */
    public function index()
    {
    	$data = $this->data;
    	$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
    	$condtion = "AND a.userid={$this->user_id} AND a.catid=102";
    	
    	$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/blog/map/index';
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
	    foreach ( $list as $k=>$v )
	    {
	    	$con = "AND type=0 and blogid={$list[$k]['blogid']}";
	    	$comnum = $this->blog->get_Blogs_map_comment( $con );
	    	$list[$k]['comnum'] = $comnum;
	    }
    	$data['blogMapList']=$data['blogList'] = $list;
    	$data['page'] = $this->pagination->create_links();
    	
    	
    	$this->parser->parse('blog/mp_myblog_map.tpl',$data);
    }
    
    public function detail()
    {
    	$data = $this->data;
    	 if($blogId = $this->uri->segment(4))
	     {
	     	   $this->load->model('blog/m_comment','',TRUE);
	           $data['map'] = $this->blog->get_Blogs($blogId, false);
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
			  
			    $member_info = $this->members_model->get_member($data['map']['userid']);
			    $member_profile_info = $this->members_profile_model->get_member_profile( $data['map']['userid'] );
				
				$avatar_img = "/data/avatar/".get_avatar( $data['map']['userid'], 'small' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$member_profile_info['avatar_img'] = $avatar_img;
				
				$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
				
				$data['member'] = $member_info;
				$data['member_profile'] = $member_profile_info;
	     }
	     $this->parser->parse('blog/member_map_detail.tpl',$data);
    }
    
    /**
     * 新增地图日志
     */
    public function add(){
    	if(!empty($_POST))
        {
        	 $pathUlr = site_url('/blog/map');
        	 $data['username']   = $this->user_name;
             $data['userid']     = $this->user_id;
             $data['catid']      = 102; // 姑且奇遇故事大分类id定义为 100
             
	        if($data['subject'] = $this->input->post('subject'))
	        {
	        	$data['blog_type']  = 2; //一般地图类型博客
	        	$data['dateline']   = time();
	        	$data['des'] = $this->input->post('des');
	        	$data['STATUS']   = $this->input->post('STATUS');
	        	//$data['province'] = $this->input->post('input_province');
	            //$data['city'] = $this->input->post('input_city');
	            //$data['area'] = $this->input->post('input_area');
	            //$data['detail_address'] = $this->input->post('input_detail_address');
	            
	            if( $this->input->post( 'mapCity' ) )
	            {
	            	$kk = explode( ',', $this->input->post( 'mapCity' ) );
	            	$data['province'] = $kk[0];
	            	$data['city'] = $kk[1];
	            }

	            if( $this->input->post( 'mapDetail' ) )
	            {
	            	$data['detail_address'] = $this->input->post( 'mapDetail' );
	            }
	            
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
	          
	            return showmessage( '日志添加成功', $url_forward = "/index.php/blog/map", $ms = 1250 );
	        }
	        else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/map/add';</script>";die;
	        }
        }  
         
        $data = $this->data; 
		$data['province']=$this->blog->get_regions('province');
		$this->parser->parse('blog/mp_add_map.tpl',$data);
    }
    
    public function city()
    {
		header('Content-Type:text/html;charset=utf-8');
		if($provinceID = $this->input->get('provinceID'))
		{
		     $cityID = $this->input->get('cityID');
		     $str=$this->blog->get_regions('city', " father = $provinceID ");
				$o_str="<option value=''>請選擇城市</option>";
				foreach($str as $k=>$v)
				{
					$o_str.="<option value='".$v['cityID']."' ";
					if($v['cityID']==$cityID) $o_str.=" selected ";
					$o_str.=">".$v['city']."</option>";
				}
		       echo $o_str;die;
		}
		else
		{
		    return ;
		}

    }
    
    public function area()
    {
		header('Content-Type:text/html;charset=utf-8');
		if($cityID = $this->input->get('cityID'))
		{
			$areaID = $this->input->get('areaID');
		    $str = $this->blog->get_regions('area', " father = $cityID");
		    $o_str="<option value=''>請選擇區域</option>";
			foreach($str as $k=>$v)
			{
				$o_str.="<option value='".$v['areaID']."' ";
				if($v['areaID']==$areaID) $o_str.=" selected ";
				$o_str.=">".$v['area']."</option>";
			}
			echo $o_str;die;
		}
		else
		{
		    return ;
		}

    }
    
    public function delete()
    {
    	$blogid = (array)$this->input->get('blogid');
	        if(is_array($blogid))
	        {  
	            foreach($blogid as $values)
	            {     
	                   $map = $this->blog->get_Blogs($values, false);
	                   $big_thumb = str_ireplace("_thumb", '', $map['pic']);
	                   
	                   $root = rtrim($_SERVER['DOCUMENT_ROOT'],'/');
	                   @unlink($root.$big_thumb);
	                   @unlink($root.$map['pic']);
	                   if($values == $map['blogid']) 
	                   {
	                      $this->blog->delete_Blogs($values);
	                      $this->blog->delete_RelevanceBlogs($values);
	                   }   
	            }
	        }
	        return true;
    	
    }
    
    public function edit()
    {
    	$pathUlr = site_url('/blog/map');
        if(!empty($_POST))
        {
        	
	        if($this->input->post('subject'))
	        {
	        	$data['dateline']   = time();
	        	$data['des']   = $this->input->post('des');
	        	$data['STATUS']   = $this->input->post('STATUS');
	        	
	        	if( $this->input->post( 'mapCity' ) )
	            {
	            	$kk = explode( ',', $this->input->post( 'mapCity' ) );
	            	$data['province'] = $kk[0];
	            	$data['city'] = $kk[1];
	            }

	            if( $this->input->post( 'mapDetail' ) )
	            {
	            	$data['detail_address'] = $this->input->post( 'mapDetail' );
	            }
	        	
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
                
              //print_r( $subdata );exit;
		        if ( $this->blog->update_Blogs($data, $blogid) && $this->blog->update_RelevanceBlogs($subdata, $blogid) )
		        {
					//echo "<script language='javascript'>alert('编辑成功!');location.href='/index.php/blog/map';</script>";die;
					return showmessage( '日志编辑成功', $url_forward = "/index.php/blog/map", $ms = 1250 );
				}
				else
				{
					//echo "<script language='javascript'>alert('地图日志编辑失败!');location.href='$_SERVER[REQUEST_URI]';</script>";die;	
					return showmessage( '日志编辑成功', $url_forward = "{$_SERVER[REQUEST_URI]}", $ms = 1250 );		
				}
	           
	        }
            else
	        {
	            echo "<script language='javascript'>alert('标题不能为空!');location.href='/index.php/blog/map/add';</script>";die;
	        }
        }    
        
    	if(!$blogId = $this->uri->segment(4))
    	{
    	    redirect($pathUlr);
    	}
	    $data = $this->data;	
    	$data['map'] = $this->blog->get_Blogs($blogId, false);
    	//print_r( $data );exit;
    	$data['province_list'] = $this->blog->get_regions('province');
    	
    	$this->parser->parse('blog/mp_edit_map.tpl',$data);
    }
    
    /**
     * 地图日志收藏列表
     */
    public function collection()
    {
    	$data = $this->data;
    	
    	$collect_blogs = $this->blog->get_collect_blogs( $this->user_id, 2 );
    	if ( !empty( $collect_blogs ) )
    	{
    		$blogid_array = array();
    		foreach ( $collect_blogs as $k=>$v )
    		{
    			$collect_blogs[$k]['dateline'] = date( 'Y-m-d', $collect_blogs[$k]['dateline'] );
    			$blogid_array[] = $collect_blogs[$k]['blogid'];
    		}
    		
    		$collect_blogs_filed = $this->blog->get_blogs_filed( $blogid_array );
    		
    		foreach ( $collect_blogs as $k1=>$v1 )
    		{
    			foreach ( $collect_blogs_filed as $k2=>$v2 )
	    		{
	    			if( $collect_blogs[$k1]['blogid'] == $collect_blogs_filed[$k2]['blogid'] )
	    			{
	    				$collect_blogs[$k1]['pic'] = $collect_blogs_filed[$k2]['pic'];
	    			}
	    		}
    		}
    	}
    	
    	$data['collect_blogs'] = $collect_blogs;
    	
    	
		$this->parser->parse('blog/collect_blog_map.tpl',$data); 
    }
    
    /**
     * ajax操作
     * 收藏地图日志
     */
    
     public function collect()
    {
    	$msg = '';
    	$map_info = array();
    	$bogid = $_POST['bogid'];
    	$userid = $_POST['userid'];
    	$this->load->model('blog/m_blog','',TRUE);
	    $map_info = $this->m_blog->getBlogsOne( $bogid );
	    
	    if ( $userid == '' or $userid != $this->user_id ) 
	    {
	    	$msg = 0;
	    } 
	    else 
	    {
		    if ( $map_info == '' )
		    {
		    	$msg = 1;
		    }
		    else 
		    {
		    	$this->load->model('blog/m_comment','',TRUE);
		    	$result = $this->m_comment->collectblog( $bogid, $userid, $map_info['blog_type'] );
		    	if ( $result == 0 ) 
		    	{
		    		$msg = 2;             //已经加过收藏
		    	}
		    	elseif( $result == 1 )
		    	{
		    		$msg = 3;             //成功加入收藏
		    	}
		    	elseif ( $result == 2 )
		    	{
		    		$msg = 4;             //加入收藏失败
		    	}
		    	else 
		    	{
		    		$msg = 5;             //未知错误
		    	}
		    }
	    }
        
		echo json_encode( $msg );
    }
    
    /**
     * ajax操作
     * 删除收藏地图日志
     */
    
     public function delete_collect()
    {
    	$msg = '';
    	$map_info = array();
    	$bogid = $_POST['bogid'];
    	
    	$this->load->model('blog/m_blog','',TRUE);
	    $map_info = $this->m_blog->getBlogsOne( $bogid );
	    
	    if ( $this->user_id == '' ) 
	    {
	    	$msg = 0;
	    } 
	    else 
	    {
		    if ( $map_info == '' )
		    {
		    	$msg = 1;
		    }
		    else 
		    {
		    	$this->load->model('blog/m_comment','',TRUE);
		    	$result = $this->m_comment->deletecollectblog( $bogid, $this->user_id );
		    	if ( $result == 0 ) 
		    	{
		    		$msg = 2;             //不存在该条收藏记录
		    	}
		    	elseif( $result == 1 )
		    	{
		    		$msg = 3;             //成功移除收藏
		    	}
		    	elseif ( $result == 2 )
		    	{
		    		$msg = 4;             //移除收藏失败
		    	}
		    	else 
		    	{
		    		$msg = 5;             //未知错误
		    	}
		    }
	    }
        
		echo json_encode( $msg );
    }
}

/* End of file map.php */
/* Location: ./application/controllers/blog/map.php */