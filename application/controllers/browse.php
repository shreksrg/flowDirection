<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * 网站一级栏目入口
 * @author floy
 *
 */
class Browse extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 网站首页入口
	 */
	function index()
	{
		//判断是否登录
		if ( $this->session->userdata( 'user_in' ) )
		{
			$user_id = $this->session->userdata( 'user_id' );
			$user_name = $this->session->userdata( 'user_name' );
			$this->load->model( 'member/members_email_model', '', TRUE ); 
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$this->members_email_model->userid = $user_id;
			
			$avatar_img = "/data/avatar/".get_avatar( $user_id, 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$commen_info['username'] = $user_name;
			$commen_info['userid'] = $user_id;
			$commen_info['avatar_img'] = $avatar_img;
			$commen_info['all_email_num'] = $this->members_email_model->get_email_num();
			$commen_info['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
			$commen_info['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$user_id} and STATUS=1)" );
			$login_check = 1;
		}
		else 
		{
			$commen_info = '';
			$login_check = 0;
		}
		
		//$member = $hot_mapblog = $hot_activity = $slides = array();
		$this->load->model('browse/index_model','idx',TRUE);
		$age_array_select = array();
		for ( $i = 17; $i <= 61; $i++ )
		{
			if ( $i == 17 )
			{
				$age_array_select[$i]['age'] = ($i+1)." 岁以下";
			}
			elseif ( $i == 61 )
			{
				$age_array_select[$i]['age'] = ($i-1)." 岁以以上";
			}
			else 
			{
				$age_array_select[$i]['age'] = $i." 岁";
			}
		}
		//$data['members'] = $this->idx->get_members(10),
		$data = array(
			'members'		=> $this->idx->get_members(10),
			'hot_mapblog'	=> $this->idx->get_hot_mapblog(5),
			'slides'		=> $this->idx->get_slides(5),
			'hot_activity'	=> $this->idx->get_hot_activity(5),
			'title' 		=> '首页',				//标题
			'commen_info'	=> $commen_info,			//公共变量
			'login_check'	=> $login_check,			//公共变量
			'age_array'	=> $age_array_select,			//公共变量
		);
		
		$this->load->model('blog/blog_model', 'blog', TRUE);
		$data['blogMapList'] = $this->blog->get_mapblog_datas( ' (a.STATUS=0 and a.hot=1) ', 5, ' a.blogid desc' );

		$city_code = '320500';
		$user_list = $this->idx->get_area_user_list( $city_code, $limit = 10 ); 
		
		//$city_list = $this->idx->get_user_area( $limit = 5 );
		if( !empty( $user_list ) ) 
		{
			foreach ( $user_list as $k=>$v )
			{
				$avatar_img = "/data/avatar/".get_avatar( $user_list[$k]['userid'], 'big' );
				$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
				$user_list[$k]['avatar_img'] = $avatar_img;
				$user_list[$k]['age'] = date( 'Y' ) - $user_list[$k]['birthyear'];
			}
			$data['user_list'] = $user_list;
		}
		//$data['city_list'] = $city_list;
		$data['city_code'] = $city_code;
		
		//热门活动
		$this->load->model( 'activity/activity_model', '', TRUE ); 
		$hot_activity_list = array();
		$hot_activity_list = $this->activity_model->get_my_launch( 6, 0, "and a.hot=1 and a.audit=0", $order_by='RAND()' );
		$data['hot_activity_list'] = $hot_activity_list;
		
		//随机会员
		$this->load->model('common/m_common','',TRUE);
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
				$random_members_list[$k]['age'] = date( 'Y' ) - $random_members_list[$k]['birthyear'];
				
			}
			
			$data['members_list'] = $random_members_list;
		}
		
		$this->load->model('spacex/mp_spacex_model','articles',true);	//加载模型
		// 幸福周刊 
		$data['secweekly']=$this->articles->getArticleSection(2,'c','0,6');	//返回幸福周刊列表数据
		//都市生活
		$data['seclifecity']=$this->articles->getArticleSection(2,'c','0,6');	//返回都市生活列表数据
		
		$this->parser->parse( 'mp_index.tpl', $data );
	}
	
	/**
	 * 实现快速注册
	 * 
	 */
	function set_register()
	{
		$y = date( 'Y', time() );
		$year = '';
		for( $i = $y - 99; $i < $y - 15; $i++ )
		{
			$year .= "<option value=\"{$i}\">{$i}年</option>";
		}
		
		$data['year'] = $year;
		$this->parser->parse( 'member/register.tpl', $data );
	}
	
	/**
	 * 根据区域来抓取会员信息列表
	 * ajax 操作
	 */
	 function get_area_user_list()
	 {
	 	$area = $_POST['code'];
	 	if( $area != '' )
	 	{
	 		$user_list = array();
	 		$this->load->model('browse/index_model','idx',TRUE);
	 		$user_list = $this->idx->get_area_user_list( $area, $limit = 10, $order_by="a.userid desc" );
	 		
	 		if( !empty( $user_list ) )
	 		{
	 			foreach ( $user_list as $k=>$v )
	 			{
		 			$avatar_img = "/data/avatar/".get_avatar( $user_list[$k]['userid'], 'big' );
					$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
					$user_list[$k]['avatar_img'] = $avatar_img;
					$user_list[$k]['age'] = date( 'Y' ) - $user_list[$k]['birthyear'];
					
					if ( $user_list[$k]['gender'] == 0 )
					{
						$user_list[$k]['sex'] = "男";
					}
					else 
					{
						$user_list[$k]['sex'] = "女";
					}
					
					if( $user_list[$k]['work'] == '' )  $user_list[$k]['work'] = "未填";
	 			}
	 			
	 			$rtnval = 1;
	 		}
	 		else 
	 		{
	 			$rtnval = 0;
	 		}
	 		
	 		$return = array( "rtnval" => $rtnval, "usrlst"=> $user_list );
	 		
	 		echo json_encode( $return );
	 	}
	}
	
	 function get_conditon_mapblog_list()
	 {
	 	$bys = $_POST['bys'];
	 	if( $bys != '' )
	 	{
	 		$conditon = " a.STATUS=0 ";
	 		if ( $bys == "hot" ) { $conditon = " a.STATUS=0 and a.hot=1 "; }
	
	 		$blogMapList = array();
	 		$this->load->model('blog/blog_model', 'blog', TRUE);
			$blogMapList = $this->blog->get_mapblog_datas( $conditon, 5, ' a.blogid asc ' );
	 		foreach ( $blogMapList as $k=>$v )
			{
				$blogMapList[$k]['SUBJECT'] = cut_str( $blogMapList[$k]['SUBJECT'], 5 );
				$blogMapList[$k]['message'] = cut_str( $blogMapList[$k]['message'], 22 );
			}
	 		if( !empty( $blogMapList ) )
	 		{
	 			$rtnval = 1;
	 		}
	 		else 
	 		{
	 			$rtnval = 0;
	 		}
	 		
	 		$return = array( "rtnval" => $rtnval, "maplst"=> $blogMapList );
	 		
	 		echo json_encode( $return );
	 	}
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */