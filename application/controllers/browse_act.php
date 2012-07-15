<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 网站一级栏目入口
 * @author floy
 *
 */
class Browse_act extends CI_Controller {
	var $commen_info = array();
	var $right_info = array();
	/**
	 * 构造函数
	 * 
	 */
	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model( 'activity/activity_model', '', TRUE ); 
		$this->load->model( 'activity/activity_field_model', '', TRUE ); 
		$this->load->model( 'activity/activity_join_model', '', TRUE ); 
		$this->load->model( 'member/members_model', '', TRUE ); 
		$this->load->model( 'album/pic_model', '', TRUE ); 
		$this->load->model( 'album/album_model', '', TRUE ); 
		
		if( $this->session->userdata( 'user_id' ) )
		{
			$user_id = $this->session->userdata( 'user_id' );
			$user_name = $this->session->userdata( 'user_name' );
			
			$this->load->model( 'member/members_email_model', '', TRUE ); 
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$this->members_email_model->userid = $user_id;
			
			$avatar_img = "/data/avatar/".get_avatar( $user_id, 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$this->commen_info['username'] = $user_name;
			$this->commen_info['userid'] = $user_id;
			$this->commen_info['avatar_img'] = $avatar_img;
			$this->commen_info['all_email_num'] = $this->members_email_model->get_email_num();
			$this->commen_info['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
			$this->commen_info['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$user_id} and STATUS=1)" );
		}
		
		//随机博文
		 $this->load->model('blog/story_model','story',TRUE);
		 $this->load->model('blog/blog_model','blog',TRUE);
		 $tag = rand( 0,3 );
		 $tag2 = rand( 0,2 );
		 $recommend_storys = $this->story->get_feelspace_storys(" tags = {$tag} ");
		 $recommend_essay = $this->blog->get_feelspace_essays( " b.tag = {$tag2} ");  
    	
		 if ( $recommend_storys != '' )
		 {
		 	foreach ( $recommend_storys as  $k=>$v )
		 	{
		 		
		 		if ( $k > 5 ) 
		 		{
		 			break;
		 		} 
		 		else 
		 		{
		 			$recommend_storys[$k]['url'] = "/index.php/browse_blog/story_detail/{$v['albumid']}";
		 			$recommend_storys[$k]['pic'] = $recommend_storys[$k]['thumb'];
		 			$recommend_storys[$k]['SUBJECT'] = $recommend_storys[$k]['albumname'];
		 			$recommend_storys[$k]['message'] = $recommend_storys[$k]['description'];
		 			$this->right_info[$k] =  $recommend_storys[$k];
		 		}
		 	}
		 }
		 
		  if ( $recommend_essay != '' )
		 {
		 	foreach ( $recommend_essay as  $k1=>$v1 )
		 	{
		 		if ( $k1 > 5 ) 
		 		{
		 			break;
		 		} 
		 		else 
		 		{
		 			$recommend_essay[$k1]['url'] = "/index.php/browse_blog/essay_detail/{$v1['blogid']}";
		 			$this->right_info[(count( $this->right_info )+$k1)] =  $recommend_essay[$k1];
		 		}
		 	}
		 }
	}	
	
	/**
	 * 
	 * 活动首页入口
	 */
	public function index()
	{
		$this->config->load( 'member_profile_config', FALSE, TRUE );
		$user_id = $this->session->userdata( 'user_id' );
		
		//$class = $this->uri->segment(4);
		//$area = $this->uri->segment(6);
	
		$condtion = " and a.audit=0";
		//if( $class != '' ) $condtion .= " and class='".$class."' ";
		//if( $area != '' ) $condtion .= " and area='".$area."' ";
		
		$offset = $this->uri->segment(3) == '' ? 0 : $this->uri->segment(3);
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/browse_act/index/';
	    $config['total_rows'] = $this->activity_model->get_condition_activity_num( $condtion );
	    $config['per_page'] = '6';
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
	    $list = $this->activity_model->get_my_launch( $config['per_page'], $offset, $condtion );
		
	    $time = time();
	    
		foreach ( $list as $k=>$v )
		{
			//离报名结束的天数。
			$time_array = $this->gettime( $list[$k]['lasttime'] );
			$list[$k]['dayNum'] = $time_array['dayNum'];
			$list[$k]['minuteNum'] = $time_array['minuteNum'];
			$list[$k]['hourNum'] = $time_array['hourNum']; 
			if( $list[$k]['class']=='品尝美食' ) { $s_class='1'; }elseif( $list[$k]['class']=='户外休闲' ) { $s_class='2'; }elseif( $list[$k]['class']=='运动健身' ) { $s_class='3'; }elseif( $list[$k]['class']=='室内活动' ) { $s_class='4'; }elseif( $list[$k]['class']=='恬静阅读' ) { $s_class='5'; }else { $s_class=''; } 
			$list[$k]['s_class'] = $s_class;
			
			if( $time > $list[$k]['lasttime'] and $time <= $list[$k]['etimes'] ){ $list[$k]['a_static'] = 0; }
			if( $time > $list[$k]['etimes'] ) { $list[$k]['a_static'] = 2; }
			if( $time <= $list[$k]['lasttime'] ){ $list[$k]['a_static'] = 1; }
		}
		
		$recommend_list = $this->activity_model->get_my_launch( 12, 0, "and a.audit=0 and a.recommend=1", " RAND()" );
		$over_act_list = $this->activity_model->get_my_launch( 6, 0, "and a.audit=0 and a.etimes<{$time} and a.recommend=1" );
		
		$data = array(
			'title'=>'活动',
			'activity_list'=>$list,
			'recommend_list'=>$recommend_list,
			'over_act_list'=>$over_act_list,
			'commen_info'=>$this->commen_info,
			'blog'=>$this->right_info,
			'page' => $this->pagination->create_links(),
			//'leftside' => true,
		);
		
		$ymd = array();
		$ymd = $this->get_ymd( $year = date( 'Y', time() ), $month = '', $day = '' ); 
		$data['yearoption'] = $ymd['yearoption'];
		$data['monthoption'] = $ymd['monthoption'];
		$data['dayoption'] = $ymd['dayoption'];
		
		$province_array = $this->config->item( 'province' );
    	$province_array_select = array();
		foreach ( $province_array as $k=>$v )
		{
			$province_array_select[$k]['province'] = $v;
		}
		$data['province_list'] = $province_array_select;
    	
		
		
		$this->parser->parse( 'mp_index_act.tpl', $data );
	}

	/**
	 * 
	 * 活动详细
	 */
	public function detail()
	{
		$aid = $this->uri->segment(3);
		$time = time();
		$this->config->load( 'member_profile_config', FALSE, TRUE );
		$user_id = $this->session->userdata( 'user_id' );
		
		$this->load->model('common/m_common','',TRUE);
		$activity_list = $this->m_common->get_interested_activity( $limit = 6, "(a.audit=0 and a.etimes>{$time} and b.catid=104)" );
		foreach ( $activity_list as $k=>$v )
		{
			$activity_list[$k]['cut_subject'] = cut_str( $activity_list[$k]['SUBJECT'], 10 );
		}
		$data['activity_list'] = $activity_list;
		//暂时拿最新的活动做演示
		//$list = $this->activity_model->get_activity_list( 'dateline' );
		//$act_info = $list[0];
		$act_info = $this->activity_model->get_activity_info( $aid );
		$user_info = $this->members_model->get_member( $act_info['userid'] );
		//关注人数
		$field_list = $this->activity_field_model->get_activity_field_list( $act_info['aid'] );
		$act_info['hotuserNum'] = count( $field_list );
		
		//参与人数
		$join_list = $this->activity_join_model->get_activity_join_list( $act_info['aid'] );
		$act_info['joinNum'] = count( $join_list );
		$joinmailNum = 0;
		$joinemailNum = 0;
		
		if( $act_info['joinNum'] > 0 )
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
		
		$act_info['joinmailNum'] = $joinmailNum;
		$act_info['joinemailNum'] = $joinemailNum;
		
		//离报名结束的天数。
		$time_array = $this->gettime( $act_info['lasttime'] );
		$act_info['dayNum'] = $time_array['dayNum'];
		$act_info['hourNum'] = $time_array['hourNum'];
		$act_info['minuteNum'] = $time_array['minuteNum'];
		
		//当前活动下的相册图片
		
		$album_info = $this->album_model->this_activity_album_info( $act_info['aid'], $catid = 104 );
		$pic_list = array();
		
		$pic_list = $this->pic_model->activity_photo_list( 10000, 0, "albumid={$album_info['albumid']}" );
		$act_info['thumb'] = $album_info['thumb'];
		$act_info['pic_list'] = $pic_list;
		$act_info['pic_num'] = $this->pic_model->get_condition_pic_num( "albumid={$album_info['albumid']}" );;
		
		//参加会员
		foreach ( $join_list as $k=>$v )
		{
			$avatar_img = "/data/avatar/".get_avatar( $join_list[$k]['uid'], 'big' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$join_list[$k]['avatar_img'] = $avatar_img;
		}
		$act_info['user_list'] = $join_list;
		
		if( $user_id )
		{
			if( $user_id == $act_info['userid'] )
			{
				$act_info['invite'] = 1;
			}
			else 
			{
				$act_info['attention'] = 1;
				$act_info['join'] = 1;
			}
		}
		
		$act_info['thumb'] = $album_info['thumb'];
		$act_info['username'] = $user_info['username'];
		$data['act_info'] = $act_info;
		$data['commen_info'] = $this->commen_info;
		$data['blog'] = $this->right_info;
		
		$ymd = array();
		$ymd = $this->get_ymd( $year = date( 'Y', time() ), $month = '', $day = '' ); 
		$data['yearoption'] = $ymd['yearoption'];
		$data['monthoption'] = $ymd['monthoption'];
		$data['dayoption'] = $ymd['dayoption'];
		
		$province_array = $this->config->item( 'province' );
    	$province_array_select = array();
		foreach ( $province_array as $k=>$v )
		{
			$province_array_select[$k]['province'] = $v;
		}
		$data['province_list'] = $province_array_select;
		
		$this->parser->parse( 'mp_index_act_detail.tpl', $data );
	}
	
	public function search()
    {
    	$data['commen_info'] = $this->commen_info; 	
    	$data['blog'] = $this->right_info;
    	$this->config->load( 'member_profile_config', FALSE, TRUE );
    	$province_array = $this->config->item( 'province' );
    	
    	$province = $this->input->post('input_province');
    	$city = $this->input->post('input_city');
		$class = $this->uri->segment(3);
		
    	$year = $this->input->post( 'years' );
		$month = $this->input->post( 'months' );
		$day = $this->input->post( 'days' );
		if( $day != '' ) $day = str_replace( "日", '', $day ); 
		if( $year == '' ) $year = 0; 
		if( $month == '' ) $month = 0; 
		if( $day == '' ) $day = 0; 
		
		$times = mktime( 0, 0, 0, $month, $day, $year );
		$stimes = $times + 86399;
		
		$ymd = array();
		$ymd = $this->get_ymd( $year, $month, $day ); 
		$data['yearoption'] = $ymd['yearoption'];
		$data['monthoption'] = $ymd['monthoption'];
		$data['dayoption'] = $ymd['dayoption'];
    	
    	$fields = "";
    	if( $class==1 ) { $class='品尝美食'; }elseif( $class==2 ) { $class='户外休闲'; }elseif( $class==3 ) { $class='运动健身'; }elseif( $class==4 ) { $class='室内活动'; }elseif( $class==5 ) { $class='恬静阅读'; }else { $class=''; } 
    	if( !empty( $class ) )  $fields .= " class = '{$class}' AND ";
    	if( !empty( $province ) ) $fields .= " province = '{$province}' AND ";
    	if( !empty( $city ) ) $fields .= " city = '{$city}' AND ";
    	if( $year != 0 ) $fields .= " times <= '{$stimes}' AND etimes >= '{$stimes}' AND ";

    	$fields = trim( $fields, 'AND ' );
    	
    	$search_activity_list = $this->activity_model->get_search_activity_list( $fields, $order_by = 'times' ,10 );
    	
    	foreach ( $search_activity_list as $k=>$v )
		{
			//离报名结束的天数。
			$time_array = $this->gettime( $search_activity_list[$k]['lasttime'] );
			$search_activity_list[$k]['dayNum'] = $time_array['dayNum'];
			$search_activity_list[$k]['minuteNum'] = $time_array['minuteNum'];
			$search_activity_list[$k]['hourNum'] = $time_array['hourNum'];
			$search_activity_list[$k]['times'] = date( 'Y/m/d H:i', $search_activity_list[$k]['times'] );  
			$search_activity_list[$k]['etimes'] = date( 'Y/m/d H:i', $search_activity_list[$k]['etimes'] );  
		}	
    	
    	$data['city'] = $city;
    	$data['province'] = $province;
    	
    	$province_array_select = array();
		foreach ( $province_array as $k=>$v )
		{
			if( $province == $v )
			{
				$province_array_select[$k]['selected'] = "selected";
			}
			$province_array_select[$k]['province'] = $v;
		}
		$data['province_list'] = $province_array_select;
    	$data['search_activity_list'] = $search_activity_list;
    	$this->parser->parse( "activity_search.tpl", $data );
    }
	
	function gettime( $lasttime )
	{
		//离报名结束的天数。
		$sec = $lasttime - time();
		$year = floor( $sec/3600/24/365 );//年
		$temp = $sec - $year*365*24*3600;
		$month = floor( $temp/3600/24/30 );//月
		$temp = $temp - $month*30*24*3600;
		$day = floor($temp/3600/24);//日 　
		$temp = $temp - $day*3600*24;
		$hour = floor( $temp/3600 );//小时 　　
		$temp = $temp - $hour*3600;
		$minute = floor( $temp/60 );//分 　
		$act_info['dayNum'] = $day;
		$act_info['minuteNum'] = $minute;
		$act_info['hourNum'] = $hour;
		return $act_info;
	}
	
	
	
	function get_ymd( $y, $m, $d )
	{
		$year = date( 'Y', time() );
		$yearoption = '';
		$monthoption = '';
		$dayoption = '';
		for ( $i = $year-2; $i < $year+3; $i++ )
		{
			if( $y == $i ) 
			{
				$yearoption .= "<option value=".$i." selected=\"selected\">".$i."年</option>";	
			}
			else 
			{
				$yearoption .= "<option value=".$i.">".$i."年</option>";	
			}
		}
		for ( $t = 1; $t < 13; $t++ )
		{
			if( $m == $t ) 
			{
				$monthoption .= "<option value=".$t." selected=\"selected\">".$t."月</option>";
			} 
			else 
			{
				$monthoption .= "<option value=".$t.">".$t."月</option>";
			}
		}
	
		for ( $m = 1; $m < 32; $m++ )
		{
			if( $d == $m ) 
			{
				$dayoption .= "<option value=".$m." selected=\"selected\">".$m."日</option>";
			} 
			else 
			{
				$dayoption .= '<option value='.$m.'>'.$m.'日</option>';
			}
		}
			
		$data['yearoption'] = $yearoption;
		$data['monthoption'] = $monthoption;
		$data['dayoption'] = $dayoption;
		
		return $data;
	}
	
	function user()
	{
		$aid = $this->uri->segment(3);
		$act_info = $this->activity_model->get_activity_info( $aid );
		$join_list = $this->activity_join_model->get_activity_join_list( $act_info['aid'] );
		
		foreach ( $join_list as $k=>$v )
		{
			$avatar_img = "/data/avatar/".get_avatar( $join_list[$k]['uid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$join_list[$k]['avatar_img'] = $avatar_img;
		}
		
		$data['join_list'] = $join_list;
		$this->parser->parse( "mp_activity_user.tpl", $data );
	}
	
	function album()
	{
		$aid = $this->uri->segment(3);
		$album_info = $this->album_model->this_activity_album_info( $aid, $catid = 104 );
		$pic_list = $this->pic_model->activity_photo_list( 10000, 0, "albumid={$album_info['albumid']}" );
		$data['pic_list'] = $pic_list;
		
		$this->parser->parse( "mp_activity_album.tpl", $data );
	}
	
	function info()
	{
		$aid = $this->uri->segment(3);
		$act_info = $this->activity_model->get_activity_info( $aid );
		$album_info = $this->album_model->this_activity_album_info( $aid, $catid = 104 );
		$pic_list = $this->pic_model->activity_photo_list( 6, 0, "albumid={$album_info['albumid']}" );
		
		$data['pic_list'] = $pic_list;
		$data['act_info'] = $act_info;
		
		$this->parser->parse( "mp_activity_info.tpl", $data );
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */