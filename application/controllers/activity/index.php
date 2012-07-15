<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 我受邀请活动
* @category index
* @author taylorchen
* @version v1.0 $date 2011-12-16 10:46:20
* 
*/
class Index extends CI_Controller {
	var $user_id;
	var $user_name;
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
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
		
		$this->load->model( 'activity/activity_model', '', TRUE ); 
		$this->load->model( 'activity/activity_field_model', '', TRUE ); 
		$this->load->model( 'activity/activity_join_model', '', TRUE ); 
		
		$this->activity_model->userid = $this->user_id;
		$this->activity_field_model->userid = $this->user_id;
		$this->activity_join_model->userid = $this->user_id;
		
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
			$avatar_img_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'big' );
			$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
			$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s;
		}
		$this->data['commen_info']['friend_attention_list'] = $friends_attention_list;
	}
	
	/**
	 * 活动邀请
	 * 
	 */
	public function index()
	{
		$this->parser->parse( 'activity/my_invit_activity.tpl' );
	}
	
	/**
	 * 新增活动
	 * 
	 */
	public function create()
	{
		if( $this->input->post( 'act' ) )
		{
			$dateline = time();
			$lasttime = $this->input->post( 'lasttime' );
			$times = $this->input->post( 'times' );
			$etimes = $this->input->post( 'etimes' );
			$subject = $this->input->post( 'SUBJECT' );
	
			$data['userid'] = $this->user_id;
			$data['SUBJECT'] = $subject;
			$data['place'] = $this->input->post( 'place' );
			$data['tele'] = $this->input->post( 'tele' );
			
			$data['class'] = $this->input->post( 'class' );
			$data['des'] = $this->input->post( 'des' );	
			$data['lasttime'] = $this->gettime_chok( $lasttime );
			$data['phone'] = $this->input->post( 'phone' );
			
			$data['dateline'] = $dateline;
			$data['times'] = $this->gettime_chok( $times );
			$data['etimes'] = $this->gettime_chok( $etimes );
			$data['description'] = $this->input->post( 'description' );
			$data['status'] = $this->input->post( 'status' );
			
			if( $this->input->post( 'mapCity' ) )
			{
				$kk = explode( ',', $this->input->post( 'mapCity' ) );
				$data['map_p'] = $kk[0];
				$data['map_c'] = $kk[1];
			}
			
			if( $this->input->post( 'mapDetail' ) )
			{
				$data['detail_address'] = $this->input->post( 'mapDetail' );
			}
			
			//加载表单认证类  后期制作
			
			$activity_id = $this->activity_model->create( 'activity', $data );
			if( $activity_id )
			{
				//添加活动相册
				$this->load->model( 'album/album_model', '', TRUE ); 
				$array['albumname'] = $data['SUBJECT'];
	  			$array['description'] = $data['des'];
	  			$array['picflag'] = 0;
	  			$array['catid'] = 104;
	  			$array['aid'] = $activity_id;
	  			$array['userid'] = $this->user_id;
	  			$array['username'] = $this->user_name;
	  			$array['dateline'] = $dateline;
	  			$array['picnum'] = 0;
	  			
				if( $_FILES['pic']['size'] > 0 ) 
  				{	
					$info_array = upload_pic( 'pic', 'album', $new_file='', $thumb=true );
					
					$info = array();
					$info = $info_array[1];
					$filepath = $info['url'];
					$thumpath = "/data/attachment/".$info['thumb'];
					$array['thumb'] = $filepath;
  				}
  				
	  			$albumid = $this->album_model->create_my_album( 'album', $array );
	  			
	  			if( $albumid )
	  			{
	  				//活动的小图标
	  				/*if( $thumpath != '' )
	  				{
		  				$array_eidt['logo'] = $thumpath;
		  				$this->activity_model->edit_activity_info( $activity_id, $array_eidt );
	  				}*/
	  				
	  				/*$this->load->model( 'album/pic_model', '', TRUE ); 
	  				$data = array();
	  				$data['albumid'] = $albumid;
		  			$data['userid'] = $this->user_id;
		  			$data['username'] = $this->user_name;
		  			$data['dateline'] = $dateline;
		  			$data['postip'] = $this->get_ip();
		  			$data['filename'] = $info['file_name'];
		  			$data['title'] = $subject;                    
		  			$data['TYPE'] = $info['file_type'];
		  			$data['size'] = $info['file_size'];
		  			$data['filepath'] = $filepath;
		  			$data['thumb'] = 0;
		  			$data['remote'] = 0;
		  			$data['STATUS'] = 0;
		  			$data['description'] = $this->input->post( 'des' );
		  			
		  			$picid = $this->pic_model->add_pic( $data );*/
	  			} 
	  		
				return showmessage( '新增活动成功', $url_forward = '/index.php/activity/my_launch/index', $ms = 1250 );
			}
			else 
			{
				return showmessage( '新增活动失败', $url_forward = '/index.php/activity/index/create', $ms = 1250 );
			}
		} 
		else 
		{
			$data = $this->data;
			$time_array = $this->get_times( $h = '', $m = '' );
			
			$data['hour'] = $time_array['hour'];
		    $data['mini'] = $time_array['mini'];
			
			$this->parser->parse( 'activity/mp_add_activitys.tpl', $data );
		}
	}
	
	/**
	 * 活动编辑显示页面
	 * 
	 * 
	 */
	public function edit_activity()
	{
		$data = $this->data;
		$aid = $this->uri->segment(4);
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$province_array = $this->config->item( 'province' );
		
		$this->load->model( 'album/pic_model', '', TRUE ); 
		$this->load->model( 'album/album_model', '', TRUE ); 
		
		$info = $this->activity_model->get_activity_info( $aid );
		$album_info = $this->album_model->this_activity_album_info( $aid, $catid = 104 );
		
		//所在省
		$province_array_select = array();
		foreach ( $province_array as $k=>$v )
		{
			$province_array_select[$k]['province'] = $v;
			if( $info['province'] == $v )
			{
				$province_array_select[$k]['selected'] = "selected";
			}
			
			$data['province_select'] = $province_array_select;
			$data['city'] = $info['city'];
			$data['province'] = $info['province'];
		}
	
		if( $info['userid'] != $this->user_id )
		{
			return showmessage( '您无权编辑此活动', $url_forward = '/index.php/activity/index/activity_detail/aid/'.$aid, $ms = 1250 );
		}
		else 
		{
			$info['times'] = date( 'Y-m-d', $info['times'] );
			$info['etimes'] = date( 'Y-m-d', $info['etimes'] );
			$info['lasttime'] = date( 'Y-m-d', $info['lasttime'] );
			
			$data['info'] = $info;
			$data['albumid'] = $album_info['albumid'];
			
			$this->parser->parse( 'activity/mp_edit_activity.tpl', $data );
		}
	}
	
	/**
	 * 活动编辑提交操作
	 * 
	 * 
	 */
	public function edit_activity_act()
	{
		if( !$this->input->post( 'aid' ) ) exit;
		
		$aid = $this->input->post( 'aid' );
		$subject = $this->input->post( 'SUBJECT' );
		$des = $this->input->post( 'des' );
		$class = $this->input->post( 'class' );
		$status = $this->input->post( 'status' );
		
		$lasttime = $this->gettime_chok( $this->input->post( 'lasttime' ) );
		$times = $this->gettime_chok( $this->input->post( 'times' ) );
		$etimes = $this->gettime_chok( $this->input->post( 'etimes' ) );
		$place = $this->input->post( 'place' );
		
		$tele = $this->input->post( 'tele' );
		$phone = $this->input->post( 'phone' );
		$description = $this->input->post( 'description' );
		
		//加载上传认证类 后期制作
		$data['SUBJECT'] = $subject;
		$data['des'] = $des;
		$data['class'] = $class;
		$data['status'] = $status;
		
		$data['lasttime'] = $lasttime;
		$data['times'] = $times;
		$data['etimes'] = $etimes;
		$data['place'] = $place;
		
		$data['tele'] = $tele;
		$data['phone'] = $phone;
		$data['description'] = $description;
		
		
		if( $this->input->post( 'mapCity' ) )
		{
			$kk = explode( ',', $this->input->post( 'mapCity' ) );
			$data['map_p'] = $kk[0];
			$data['map_c'] = $kk[1];
		}

		if( $this->input->post( 'mapDetail' ) )
		{
			$data['detail_address'] = $this->input->post( 'mapDetail' );
		}
		
		$return = $this->activity_model->edit_activity_info( $aid, $data );
		if( $return )
		{
			$this->load->model( 'album/album_model', '', TRUE ); 
			$this->load->model( 'album/pic_model', '', TRUE ); 
			$album_data['albumname'] = $data['SUBJECT'];
	  		$album_data['description'] = $data['des'];
	  		$album_info = $this->album_model->this_activity_album_info( $aid, $catid = 104 );
	  		
			if( $_FILES['pic']['size'] > 0 ) 
			{
				$types = 'gif|jpg|png';
				$info_array = upload_pic( 'pic', 'album', '', $types );
				$info = array();
				$info = $info_array[1];
				$filepath = $info['url'];
				$thumpath = "/data/attachment/".$info['thumb'];
				
				$album_data['thumb'] = $filepath;
				/*$array_eidt['logo'] = $thumpath;
	  			$this->activity_model->edit_activity_info( $aid, $array_eidt );*/
				
				/*$this->load->model( 'album/pic_model', '', TRUE ); 
	  			$data = array();
	  			$data['albumid'] = $album_info['albumid'];
	  			$data['userid'] = $this->user_id;
	  			$data['username'] = $this->user_name;
	  			$data['dateline'] = time();
	  			$data['postip'] = $this->get_ip();
	  			$data['filename'] = $info['file_name'];
	  			$data['title'] = $subject;
	  			$data['TYPE'] = $info['file_type'];
	  			$data['size'] = $info['file_size'];
	  			$data['filepath'] = $filepath;
	  			$data['thumb'] = 0;
	  			$data['remote'] = 0;
	  			$data['STATUS'] = 0;
	  			$data['description'] = $des;

	  			$picid = $this->pic_model->add_pic( $data );*/
				
			}
			
			$this->album_model->edit_activity_album( $album_info['albumid'], $album_data );
			return showmessage( '编辑活动成功', $url_forward = '/index.php/activity/my_launch/index', $ms = 1250 );
		}
		else 
		{
			return showmessage( '编辑活动失败', $url_forward = '/index.php/activity/index/activity_detail/aid/'.$aid, $ms = 1250 );
		}
	}
	
	/**
	 * 活动详细
	 * 
	 */
	public function activity_detail( $k, $aid )
	{
		$data = $this->data;
		if( intval( $aid ) == 0 ) return showmessage( '不存在该活动', $url_forward = '/index.php/activity/my_launch', $ms = 1250 );
		$info = $this->activity_model->get_activity_info( $aid ); 
		$info['times'] = date( 'Y/m/d H:i', $info['times'] );  
		$info['etimes'] = date( 'Y/m/d H:i', $info['etimes'] );  
		$data['info'] = $info;
		
		//关注人数
		$field_list = $this->activity_field_model->get_activity_field_list( $aid );
		$data['info']['hotuserNum'] = count( $field_list );
		
		//参与人数
		$join_list = $this->activity_join_model->get_activity_join_list( $aid );
		$data['info']['joinNum'] = count( $join_list );
		$joinmailNum = 0;
		$joinemailNum = 0;
		
		if( $data['info']['joinNum'] > 0 )
		{
			foreach ( $join_list as $k=>$v )
			{
				if( $join_list[$k]['sex'] == 0 )
				{
					$joinmailNum++;
				}
				if( $join_list[$k]['sex'] == 1 )
				{
					$joinemailNum++;
				}
			}
		}
		
		$data['info']['joinmailNum'] = $joinmailNum;
		$data['info']['joinemailNum'] = $joinemailNum;
		
		//离报名结束的天数。
		$sec = $info['lasttime'] - time();
		$year = floor( $sec/3600/24/365 );//年
		$temp = $sec - $year*365*24*3600;
		$month = floor( $temp/3600/24/30 );//月
		$temp = $temp - $month*30*24*3600;
		$day = floor($temp/3600/24);//日 　
		$temp = $temp - $day*3600*24;
		$hour = floor( $temp/3600 );//小时 　　
		$temp = $temp - $hour*3600;
		$minute = floor( $temp/60 );//分 　
		$data['info']['dayNum'] = $day;
		$data['info']['minuteNum'] = $minute;
		
		//当前活动下的相册图片
		$this->load->model( 'album/album_model', '', TRUE ); 
		$this->load->model( 'album/pic_model', '', TRUE ); 
		
		$album_info = $this->album_model->this_activity_album_info( $aid, $catid = 104 );
		$pic_list = array();
		
		$pic_list = $this->pic_model->activity_photo_list( $album_info['albumid'] );
		$data['thumb'] = $album_info['thumb'];
		$data['pic_list'] = $pic_list;
		$data['user_list'] = $this->activity_user( $aid );
 		
		if( $this->user_id == $data['info']['userid'] )
		{
			$data['info']['invite'] = 1;
			$data['info']['edit'] = 1;
		}
		
		$this->parser->parse( 'activity/activity_detail.tpl', $data );
	}
	
	/**
	 * 参与活动的会员列表
	 * 
	 */
	public function activity_user( $aid )
	{
		$join_list = $this->activity_join_model->get_activity_join_list( $aid );
		foreach ( $join_list as $k=>$v )
		{
			$avatar_img = "/data/avatar/".get_avatar( $join_list[$k]['uid'], 'big' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$join_list[$k]['avatar_img'] = $avatar_img;
		}
		
		return $join_list;
	}
	
	/**
	 * ajax 操作
	 * 个人活动相册里面相片删除
	 * 
	 */
	public function delete_act_photo()
	{
		$this->load->model( 'album/pic_model', '', TRUE );
		$this->pic_model->userid = $this->user_id; 
		
		$picid = intval( $_POST['picid'] );
		$albumid = intval( $_POST['albumid'] );
		$msg = false;
		if ( $picid != 0 )
		{
			if( $this->pic_model->delete_my_photo( $albumid, $picid ) )
			{	
				$msg = true;
			} 
			else 
			{
				$msg = false;
			}
		}
        
		echo json_encode( $msg );
	}
	
	/**
	 * 获取提交IP地址
	 * @param null
	 * @return char
	 * 
	 */
	public function get_ip()
	{
		$this->load->helper( 'member' );
		return getIP();
	}
	
	function get_times( $h, $m )
	{
		$hour = '';
		$mini = '';

		for( $i = 0; $i < 24; $i++ )
		{
			if( $i < 10 )
			{
				$t = "0".$i;
			}
			else
			{
				$t = $i;
			}
			if( $t == $h )
			{
				$hour .= "<option value='{$i}' selected=\"selected\">{$t}</option>";
			}
			else 
			{
				$hour .= "<option value='{$i}'>{$t}</option>";
			}
		}

		for( $p = 0; $p < 60; $p++ )
		{
			if( $p < 10 )
			{
				$k = "0".$p;
			}
			else
			{
				$k = $p;
			}
			
			if( $k == $m )
			{
				$mini .= "<option value='{$p}' selected=\"selected\">{$k}</option>";
			}
			else 
			{
				$mini .= "<option value='{$p}'>{$k}</option>";
			}
		}

		$data['hour'] = $hour;
		$data['mini'] = $mini;
		
		return $data;
	}
	
	function gettime_chok( $time )
	{
		//离报名结束的天数。
		$data = array();
		$data = explode( '-', $time );
		
		return mktime( 0, 0, 0, $data[1], $data[2], $data[0] );
	}
}

/* End of file index.php */
/* Location: ./application/controllers/activity/index.php */