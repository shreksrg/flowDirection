<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 网站一级栏目入口
 * @author taylor
 *
 */
class Member_info extends CI_Controller {
	var $data = array();
	/**
	 * 构造函数
	 * 
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
        
        if( $this->session->userdata( 'user_id' ) )
		{
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
		}	
	}	
	
	/**
	 * 
	 * 会员显示入口
	 */
	public function index()
	{
		$user_id = $this->uri->segment(4);  //会员id
		$data = $this->data;
		//$user_id = 1;  //会员id
		
		if( $user_id )
		{
			$this->load->model( 'member/members_model', '', TRUE ); 
			$this->load->model( 'member/members_profile_model', '', TRUE ); 
			
			$this->config->load( 'member_profile_config', FALSE, TRUE ); 
			$height_array = $this->config->item( 'height' );
			$weight_array = $this->config->item( 'weight' );
			$education_array = $this->config->item( 'education' );
			$marital_array = $this->config->item( 'marital' );
			$nation_array = $this->config->item( 'nation' );
			$gx_array = $this->config->item( 'gx' );
			$habits_life_array = $this->config->item( 'habits_life' );
			$habits_drink_array = $this->config->item( 'habits_drink' );
			$habits_smoke_array = $this->config->item( 'habits_smoke' );
			$habits_housework_array = $this->config->item( 'habits_housework' );
			$habits_cooking_array = $this->config->item( 'habits_cooking' );
			$sz_array = $this->config->item( 'sz' );
			$sx_array = $this->config->item( 'sx' );
			$career_array = $this->config->item( 'career' );
			
			$member_info = array();
			$member_profile_info = array();
			$search_member_list = array();
			
			$member_info = $this->members_model->get_member( $user_id );
			$member_profile_info = $this->members_profile_model->get_member_profile( $user_id );
		
			$avatar_img = "/data/avatar/".get_avatar( $user_id, 'big' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$member_profile_info['avatar_img'] = $avatar_img;
			
			$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
			$member_profile_info['height'] != '' ? $member_profile_info['height'] = $height_array[$member_profile_info['height']] : $member_profile_info['height'] = '未填写';
			$member_profile_info['weight'] != '' ? $member_profile_info['weight'] = $weight_array[$member_profile_info['weight']] : $member_profile_info['weight'] = '未填写';
			$member_profile_info['marital'] != '' ? $member_profile_info['marital'] = $marital_array[$member_profile_info['marital']] : $member_profile_info['marital'] = '未填写';
			$member_profile_info['education'] != '' ? $member_profile_info['education'] = $education_array[$member_profile_info['education']] : $member_profile_info['education'] = '未填写';
			$member_profile_info['nation'] != '' ? $member_profile_info['nation'] = $nation_array[$member_profile_info['nation']] : $member_profile_info['nation'] = '未填写';
			
			$member_profile_info['gx'] != '' ? $member_profile_info['gx'] = $gx_array[$member_profile_info['gx']] : $member_profile_info['gx'] = '未填写';
			$member_profile_info['life_habits'] != '' ? $member_profile_info['habits_life'] = $habits_life_array[$member_profile_info['life_habits']] : $member_profile_info['habits_life'] = '未填写';
			$member_profile_info['drink'] != '' ? $member_profile_info['habits_drink'] = $habits_drink_array[$member_profile_info['drink']] : $member_profile_info['habits_drink'] = '未填写';
			$member_profile_info['smoke'] != '' ? $member_profile_info['habits_smoke'] = $habits_smoke_array[$member_profile_info['smoke']] : $member_profile_info['habits_smoke'] = '未填写';
			$member_profile_info['housework'] != '' ? $member_profile_info['habits_housework'] = $habits_housework_array[$member_profile_info['housework']] : $member_profile_info['habits_housework'] = '未填写';
			$member_profile_info['cooking'] != '' ? $member_profile_info['habits_cooking'] = $habits_cooking_array[$member_profile_info['cooking']] : $member_profile_info['habits_cooking'] = '未填写';
			$member_profile_info['sz'] != '' ? $member_profile_info['sz'] = $sz_array[$member_profile_info['sz']] : $member_profile_info['sz'] = '未填写';
			$member_profile_info['sx'] != '' ? $member_profile_info['sx'] = $sx_array[$member_profile_info['sx']] : $member_profile_info['sx'] = '未填写';
			$member_profile_info['work'] != '' ? $member_profile_info['career'] = $career_array[$member_profile_info['work']] : $member_profile_info['career'] = '未填写';
			
			$this->load->model('common/m_common','',TRUE);
			$city_info = $this->m_common->get_city_info( "cityID='".$member_profile_info['regcity']."'" );
	        $member_profile_info['city'] = $city_info;
	        $province_info = $this->m_common->get_province_info( "provinceID='".$member_profile_info['regprovince']."'" );
	        $member_profile_info['province'] = $province_info;
			
			$data['member'] = $member_info;
			$data['member_profile'] = $member_profile_info;
			$this->load->model('blog/blog_model','blog',TRUE);
			$this->load->model('blog/m_comment','',TRUE);
			$blogMapNum = $this->blog->get_Blogs_map_num( "AND a.userid={$user_id} AND a.catid=102" );
			/*foreach ( $blogMapList as $k=>$v )
			{
				$blogMapList[$k]['replay'] = count( $this->m_comment->getCommentListByBlogId( $blogMapList[$k]['blogid'], 0 ) );
			}*/
			$data['blogMapNum'] = $blogMapNum;
			
			$this->load->model('blog/story_model','',TRUE);
			$storyList = $this->story_model->get_storys( $user_id );
			foreach ( $storyList as $k1=>$v1 )
			{
				$storyList[$k1]['replay'] = count( $this->m_comment->getCommentListByBlogId( $storyList[$k1]['albumid'], 1 ) );
			}
			$data['storyList'] = $storyList;
			
			$blogList = $this->blog->get_Blogs( $user_id, 101 );
			foreach ( $blogList as $k2=>$v2 )
			{
				$blogList[$k2]['replay'] = count( $this->m_comment->getCommentListByBlogId( $blogList[$k2]['blogid'], 0 ) );
			}
			$data['blogList'] = $blogList;
			
			//个性生活照
			$this->load->model( 'album/album_model', '', TRUE ); 
			$this->album_model->userid = $user_id;
			$this->load->model( 'album/pic_model', '', TRUE ); 
			$this->pic_model->userid = $user_id;		
			$my_life_album_info = $this->album_model->get_my_life_album_info( $catid=105 );
			$data['lifePhoto'] = "/static/images/avatar/noavatar_big.gif";
			if( !empty( $my_life_album_info ) )
			{
				$myPhotoList = $this->pic_model->my_photo_list( $my_life_album_info['albumid'] );
				
				$data['lifePhoto'] = empty( $myPhotoList ) ? "/static/images/avatar/noavatar_big.gif" : $myPhotoList[0]['filepath'];
				$data['pshow'] = empty( $myPhotoList ) ? 1 : 0;
				$data['myPhotoList'] = $myPhotoList;
			}
			
			$random_members_list = $this->m_common->get_random_members( $limit = 8, "a.audit=0" ); 
			
			if ( !empty( $random_members_list ) )
			{
				foreach ( $random_members_list as $k=>$v )
				{
		        	$city_info = $this->m_common->get_city_info( "cityID='".$random_members_list[$k]['regcity']."'" );
		        	$random_members_list[$k]['city'] = $city_info;
		        	
		        	$avatar_img = "/data/avatar/".get_avatar( $random_members_list[$k]['userid'], 'small' );
					$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
					$random_members_list[$k]['avatar_img'] = $avatar_img;
					$random_members_list[$k]['description'] = cut_str( $random_members_list[$k]['description'],30 );
					$random_members_list[$k]['username'] = cut_str( $random_members_list[$k]['username'],8 );
					$random_members_list[$k]['age'] = date( 'Y' ) - $random_members_list[$k]['birthyear'];
					
				}
				
				$data['members_list'] = $random_members_list;
			}

			$this->parser->parse( 'mp_member_info.tpl', $data );
		}
	}
	
	/**
	 * 
	 * 发送信息显示页
	 */
	public function sendmessage()
	{
		if( $this->user_id )
		{
			$user_id = $this->uri->segment(4);  //会员id
			if( $this->user_id == $user_id )
	        {
	        	$datas['message'] = '您不能給自己发信!';
				$this->parser->parse( 'common/mp_message.tpl', $datas );
	        }
	        else 
	        {
			
				$this->load->model( 'member/members_model', '', TRUE ); 
				$this->load->model( 'member/members_profile_model', '', TRUE ); 
				$this->load->model('common/m_common','',TRUE);
					
				$this->config->load( 'member_profile_config', FALSE, TRUE ); 
				$height_array = $this->config->item( 'height' );
				$weight_array = $this->config->item( 'weight' );
				$education_array = $this->config->item( 'education' );
				$marital_array = $this->config->item( 'marital' );
				$nation_array = $this->config->item( 'nation' );
				$career_array = $this->config->item( 'career' );
				$province_array = $this->config->item( 'province' );
				
				$member_info = array();
				$member_profile_info = array();
					
				$member_info = $this->members_model->get_member( $user_id );
				$member_profile_info = $this->members_profile_model->get_member_profile( $user_id );
				$email_refuse_num = $this->members_email_model->get_email_refuse_num( $this->user_id, $user_id );
				
				$avatar_img = "/data/avatar/".get_avatar( $user_id, 'big' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$member_profile_info['avatar_img'] = $avatar_img;
				
				
				$member_profile_info['height'] != '' ? $member_profile_info['height'] = $height_array[$member_profile_info['height']] : $member_profile_info['height'] = '';
				$member_profile_info['weight'] != '' ? $member_profile_info['weight'] = $weight_array[$member_profile_info['weight']] : $member_profile_info['weight'] = '';
				$member_profile_info['marital'] != '' ? $member_profile_info['marital'] = $marital_array[$member_profile_info['marital']] : $member_profile_info['marital'] = '';
				$member_profile_info['education'] != '' ? $member_profile_info['education'] = $education_array[$member_profile_info['education']] : $member_profile_info['education'] = '';
				$member_profile_info['work'] != '' ? $member_profile_info['work'] = $career_array[$member_profile_info['work']] : $member_profile_info['work'] = '';
				$member_profile_info['age'] = date( 'Y', time() ) - $member_profile_info['birthyear'];
				$city_info = $this->m_common->get_city_info( "cityID='".$member_profile_info['regcity']."'" );
		        $member_profile_info['city'] = $city_info;
		        
		        $this->load->model( 'album/album_model', '', TRUE ); 
				$this->album_model->userid = $user_id;
				$this->load->model( 'album/pic_model', '', TRUE ); 
				$this->pic_model->userid = $user_id;		
				$my_life_album_info = $this->album_model->get_my_life_album_info( $catid=105 );
				if( !empty( $my_life_album_info ) )
				{
					$myPhotoListnum = $this->pic_model->get_condition_pic_num( "albumid=".$my_life_album_info['albumid'] );
					$data['myPhotoListnum'] = $myPhotoListnum;
				}
				else 
				{
					$data['myPhotoListnum'] = 0;
				}
				
				
				$data['member'] = $member_info;
				$data['member_profile'] = $member_profile_info;
				if ( $email_refuse_num ) 
				{
					$datas['message'] = '您已经被该会员设置阻止发送站内信!';
					$this->parser->parse( 'common/mp_message.tpl', $datas );
					//$this->parser->parse( 'nosendmessage', $data );
				} 
				else 
				{
					$this->parser->parse( 'mp_sendmessage.tpl', $data );
				}
	        }
		}
		else 
		{
			$datas['message'] = '请先登录网站!';
			$this->parser->parse( 'common/mp_message.tpl', $datas );
		}
	}
	
	function send_email()
	{
		if( !$this->input->post( 'act' ) )
		{
			$data['email_num'] = $this->email_num;
			$data['admin_email_num'] = $this->admin_email_num;
			
			//找好友 暂时用 会员表信息
			$data['user_list'] = $this->members_email_model->get_user_list();
			$this->parser->parse( 'member/send_my_email.tpl', $data );
		} 
		else
		{
			if( $this->session->userdata( 'user_id' ) )
			{
				$this->load->model( 'member/members_profile_model', '', TRUE ); 
				$this->load->model( 'member/members_email_model', '', TRUE ); 
				$this->members_email_model->userid = $this->user_id; 
				//$touserid_array = array();
				//$touserid_array = $this->input->post( 'touserid' );
				$touserid = $this->input->post( 'touserid' );
				$subject = $this->input->post( 'SUBJECT' );
				$data['fromuserid'] = $this->user_id;
				$data['fromusername'] = $this->session->userdata( 'user_name' );
				$data['folder'] = "outbox";
				$data['NEW'] = 0;
				$data['SUBJECT'] = $subject;
				$data['message'] = $this->input->post( 'message' );
				$data['dateline'] = time();
				
				
				
				if( $data['message'] == '' )
				{
					
					$datas['message'] = '请填写站内信内容!';
					$this->parser->parse( 'common/mp_message.tpl', $datas );
				}
				else
				{
					/*if( $_FILES['urls']['size'] > 0 )
					{
					$date = date( 'Ym', time() );
					$config['upload_path'] = APPPATH.'../www/data/attachment/'.$date."/";
					$config['allowed_types'] = 'gif|jpg|png|zip|doc|xls';
					$config['max_size'] = '100';
	
					$this->load->library( 'upload', $config );
	
					if ( !$this->upload->do_upload( 'urls' ) )
					{
					return showmessage( '附近发送失败', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
					}
					else
					{
					$info = array();
					$info = $this->upload->data();
					$info_ = explode( '/', $info['full_path'] );
					$data['urls'] = $info_[count($info_)-2]."/".$info_[count($info_)-1];
					unset( $info );
					}
					}*/
	
					//加载表单认证类  后期制作
	
					/*foreach ( $touserid_array as $k=>$v )
					{
						$data['touserid'] = $touserid_array[$k];
						$email_id = $this->members_email_model->create( 'pms', $data );
					}*/
					
					$data['touserid'] = $touserid;
					$email_id = $this->members_email_model->create( 'pms', $data );
	
					if( $email_id )
					{
						$datas['message'] = '信息发送成功!';
					    $this->parser->parse( 'common/mp_message.tpl', $datas );
					}
					else
					{
						$datas['message'] = '信息发送失败!';
					    $this->parser->parse( 'common/mp_message.tpl', $datas );
					}
				}	
			}
			else 
			{
			$datas['message'] = '请先登录网站!';
			$this->parser->parse( 'common/mp_message.tpl', $datas );
			}
		}
	}
}

/* End of file member_info.php */
/* Location: ./application/controllers/member_info.php */