<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 网站一级栏目会员搜索入口
 * @author taylorchen
 *
 */
class Paliie_search extends CI_Controller {
	var $commen_info = array();
	/**
	 * 构造函数
	 * 
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model( 'member/members_model', '', TRUE ); 
		
		if( $this->session->userdata( 'user_id' ) )
		{
			$user_id = $this->session->userdata( 'user_id' );
			$user_name = $this->session->userdata( 'user_name' );
			
			$this->load->model( 'member/members_email_model', '', TRUE ); 
			$this->load->model( 'friend/friend_model', '', TRUE ); 
			$this->members_email_model->userid = $user_id;
			$this->friend_model->userid = $user_id;
			
			$avatar_img = "/data/avatar/".get_avatar( $user_id, 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$this->commen_info['username'] = $user_name;
			$this->commen_info['userid'] = $user_id;
			$this->commen_info['avatar_img'] = $avatar_img;
			$this->commen_info['all_email_num'] = $this->members_email_model->get_email_num();
			$this->commen_info['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
			$this->commen_info['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$user_id} and STATUS=1)" );
		}
	}	
	
	/**
	 * 
	 * 会员搜索入口
	 */
	public function index()
	{
		$this->config->load( 'member_profile_config', FALSE, TRUE );
		$member_profile = array();
		
		$height_array = $this->config->item( 'height' );
		$weight_array = $this->config->item( 'weight' );
		$education_array = $this->config->item( 'education' );
		$marital_array = $this->config->item( 'marital' );
		$nation_array = $this->config->item( 'nation' );
		$province_array = $this->config->item( 'province' );
		$career_array = $this->config->item( 'career' );
		
		//身高
		$height_array_select = array();
		foreach ( $height_array as $k=>$v )
		{
			$height_array_select[$k]['height'] = $v;
		}
		
		//体重
		$weight_array_select = array();
		foreach ( $weight_array as $k=>$v )
		{
			$weight_array_select[$k]['weight'] = $v;
		}
		
		//学历
		$education_array_select = array();
		foreach ( $education_array as $k=>$v )
		{
			$education_array_select[$k]['education'] = $v;
		}
		
		//职业
		$career_array_select = array();
		foreach ( $career_array as $k=>$v )
		{
			$career_array_select[$k]['career'] = $v;
		}
		
		//婚姻
		$marital_array_select = array();
		foreach ( $marital_array as $k=>$v )
		{
			$marital_array_select[$k]['marital'] = $v;
		}
		
		//民族
		$nation_array_select = array();
		foreach ( $nation_array as $k=>$v )
		{
			$nation_array_select[$k]['nation'] = $v;
		}
		
		//所在省
		$province_array_select = array();
		foreach ( $province_array as $k=>$v )
		{
			$province_array_select[$k]['regprovince'] = $v;
		}
		
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
		
		$member_profile['height_array'] = $height_array_select;
		$member_profile['weight_array'] = $weight_array_select;
		$member_profile['education_array'] = $education_array_select;
		$member_profile['marital_array'] = $marital_array_select;
		$member_profile['nation_array'] = $nation_array_select;
		$member_profile['province_array'] = $province_array_select;
		$member_profile['age_array'] = $age_array_select;
		$member_profile['career_array'] = $career_array_select;
		
		$this->load->model('common/m_common','',TRUE);
		$random_members_list = $this->m_common->get_random_members( $limit = 8, "a.audit=0" ); 
		foreach ( $random_members_list as $k=>$v )
		{
			$avatar_img = "/data/avatar/".get_avatar( $random_members_list[$k]['userid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$random_members_list[$k]['avatar_img'] = $avatar_img;
			$city_info = $this->m_common->get_city_info( "cityID='".$random_members_list[$k]['regcity']."'" );
	        $random_members_list[$k]['city'] = $city_info;
	        $random_members_list[$k]['age'] = date( 'Y' ) - $random_members_list[$k]['birthyear'];
		}
		
		$data = array(
			'title'=>'会员搜索',
			'commen_info'=>$this->commen_info,
			'member_profile'=>$member_profile,
			'members_list'=>$random_members_list,
		);
	
		$this->parser->parse( 'mp_paliie_search.tpl', $data );
	}

	/**
	 * 
	 * 活动详细
	 */
	public function act_list()
	{
		//print_r( $_POST );exit;
		$this->load->model('common/m_common','',TRUE);
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$career_array = $this->config->item( 'career' );
		
		if( $this->uri->segment(3) != '' ){$gender = $this->uri->segment(3);}elseif( array_key_exists( "gender", $_POST ) ) {$gender = $_POST['gender'];}else {$gender = "n";}
		if( array_key_exists( "province", $_POST ) ) {if( $_POST['province']=='' ){$regprovince="n";}else{$regprovince = $_POST['province'];}}elseif( $this->uri->segment(4) != '' ){$regprovince = $this->uri->segment(4);}else {$regprovince = "n";}
		if( array_key_exists( "city", $_POST ) ) {if( $_POST['city']=='' ){$regcity="n";}else{$regcity = $_POST['city'];}}elseif( $this->uri->segment(5) != '' ){$regcity = $this->uri->segment(5);}else {$regcity = "n";}
		if( array_key_exists( "ages1", $_POST ) ) {if( $_POST['ages1']=='' ){$ages1="n";}else{$ages1 = $_POST['ages1'];}}elseif( $this->uri->segment(6) != '' ){$ages1 = $this->uri->segment(6);}else {$ages1 = "n";}
		if( array_key_exists( "ages2", $_POST ) ) {if( $_POST['ages2']=='' ){$ages2="n";}else{$ages2 = $_POST['ages2'];}}elseif( $this->uri->segment(7) != '' ){$ages2 = $this->uri->segment(7);}else {$ages2 = "n";}
		
		if( array_key_exists( "height", $_POST ) ) {if( $_POST['height']=='' ){$height="n";}else{$height = $_POST['height'];}}elseif( $this->uri->segment(8) != '' ){$height = $this->uri->segment(8);}else {$height = "n";}
		if( array_key_exists( "nation", $_POST ) ) {if( $_POST['nation']=='' ){$nation="n";}else{$nation = $_POST['nation'];}}elseif( $this->uri->segment(9) != '' ){$nation = $this->uri->segment(9);}else {$nation = "n";}
		if( array_key_exists( "education", $_POST ) ) {if( $_POST['education']=='' ){$education="n";}else{$education = $_POST['education'];}}elseif( $this->uri->segment(10) != '' ){$education = $this->uri->segment(10);}else {$education = "n";}
		if( array_key_exists( "work", $_POST ) ) {if( $_POST['work']=='' ){$work="n";}else{$work = $_POST['work'];}}elseif( $this->uri->segment(11) != '' ){$work = $this->uri->segment(11);}else {$work = "n";}
		if( array_key_exists( "marital", $_POST ) ) {if( $_POST['marital']=='' ){$marital="n";}else{$marital = $_POST['marital'];}}elseif( $this->uri->segment(12) != '' ){$marital = $this->uri->segment(12);}else {$marital = "n";}
		
		if( $this->uri->segment(13) != '' ){$pic = $this->uri->segment(13);}elseif( array_key_exists( "pic", $_POST ) ) {$pic = $_POST['pic'];}else {$pic = "n";}
		if( $this->uri->segment(14) != '' ){$uid = $this->uri->segment(14);}elseif( array_key_exists( "uid", $_POST ) ) {if( $_POST['uid']=='' ){$uid="n";}else{$uid = $_POST['uid'];}}else {$uid = "n";}
		if( $this->uri->segment(15) != '' ){$username = $this->uri->segment(15);}elseif( array_key_exists( "username", $_POST ) ) {if( $_POST['username']=='' ){$username="n";}else{$username = $_POST['username'];}}else {$username = "n";}
		
		//搜索条件
		/*$gender = $this->uri->segment(3) == '' ? 'n' : $this->uri->segment(3);
		$regprovince = $this->uri->segment(4) == '' ? 'n' : $this->uri->segment(4);
		$regcity = $this->uri->segment(5) == '' ? 'n' : $this->uri->segment(5);
		$ages1 = $this->uri->segment(6) == '' ? 'n' : $this->uri->segment(6);
		$ages2 = $this->uri->segment(7) == '' ? 'n' : $this->uri->segment(7);
		
		$height = $this->uri->segment(8) == '' ? 'n' : $this->uri->segment(8);
		$nation = $this->uri->segment(9) == '' ? 'n' : $this->uri->segment(9);
		$education = $this->uri->segment(10) == '' ? 'n' : $this->uri->segment(10);
		$work = $this->uri->segment(11) == '' ? 'n' : $this->uri->segment(11);
		$marital = $this->uri->segment(12) == '' ? 'n' : $this->uri->segment(12);
		$pic = $this->uri->segment(13) == '' ? 'n' : $this->uri->segment(13);
		
		$uid = $this->uri->segment(14) == '' ? 'n' : $this->uri->segment(14);
		$username = $this->uri->segment(15) == '' ? 'n' : $this->uri->segment(15);*/
		
		
		
		//echo $class;exit;
		
		$age_array_select = array();
		for ( $i = 18; $i <= 60; $i++ )
		{
			$age_array_select[$i]['age'] = $i." 岁";
			if( $ages1 == $i )
			{	
				$age_array_select[$i]['selected'] = "selected=\"selected\"";
			}
		}
		$age_array_select_2 = array();
		for ( $i = 18; $i <= 60; $i++ )
		{
			$age_array_select_2[$i]['age'] = $i." 岁";
			if( $ages2 == $i )
			{	
				$age_array_select_2[$i]['selected'] = "selected=\"selected\"";
			}
		}
		
		$year = date( 'Y', time() );
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$this->config->load( 'member_profile_config', FALSE, TRUE );
		$user_id = $this->session->userdata( 'user_id' );
		
		$height_array = $this->config->item( 'height' );
		$weight_array = $this->config->item( 'weight' );
		$education_array = $this->config->item( 'education' );
		$marital_array = $this->config->item( 'marital' );
		$nation_array = $this->config->item( 'nation' );
		
		$condition = "";
		$condition .= "(1=1 ";
		if ( $gender != 'n' ) $condition .= " and a.gender=".$gender;
		if ( $regprovince != 'n' ) $condition .= " and a.regprovince='".$regprovince."'";
		if ( $regcity != 'n' ) $condition .= " and a.regcity='".$regcity."'";
		if ( $ages2 != 'n' and $ages1 == 'n' ) $condition .= " and a.birthyear>='".($year - $ages2)."'";
		if ( $ages2 == 'n' and $ages1 != 'n' ) $condition .= " and a.birthyear<='".($year - $ages1)."'";
		if ( $ages2 != 'n' and $ages1 != 'n' )
		{
			if( $ages2 == $ages1 )
			{
				$condition .= " and a.birthyear='".($year - $ages1)."'";
			}
			if( $ages2 > $ages1 )
			{
				$condition .= " and a.birthyear<='".($year - $ages1)."' and a.birthyear>='".($year - $ages2)."'";
			}
			if( $ages2 < $ages1 )
			{
				$condition .= " and 1=1";
			}	
		}
		if ( $height != 'n' ) $condition .= " and a.height='".$height."'";
		if ( $nation != 'n' ) $condition .= " and a.nation='".$nation."'";
		if ( $education != 'n' ) $condition .= " and a.education='".$education."'";
		if ( $work != 'n' ) $condition .= " and a.work='".$work."'";
		if ( $marital != 'n' ) $condition .= " and a.marital='".$marital."'";
		
		//$field_data = array();
		if ( $uid != 'n' ) $condition .= " and a.userid=".$uid;
		if ( $username != 'n' ) $condition .= " and a.username='".$username."'";
		if ( $pic != 'n' ) $condition .= " and a.isavatar=1";
		$condition .= " and b.audit=0";
		$condition .= ")";
		
		$offset = $this->uri->segment(16) == '' ? 0 : $this->uri->segment(16);
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/paliie_search/act_list/'.$gender.'/'.$regprovince.'/'.$regcity.'/'.$ages1.'/'.$ages2.'/'.$height.'/'.$nation.'/'.$education.'/'.$work.'/'.$marital.'/'.$pic.'/'.$uid.'/'.$username.'/';
	    $config['total_rows'] = $this->members_profile_model->get_condition_members_num( $condition );
	    $config['per_page'] = '10';
	    $config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 16;
	    $config['full_tag_open'] = '<p>';
	    $config['full_tag_close'] = '</p>';
	    $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="curpage">';
	    $config['cur_tag_close'] = '</li>';
		
	    $this->pagination->initialize( $config );
		$search_member_list = $this->members_profile_model->get_search_member_list( $config['per_page'], $offset, $condition );
		
		
		foreach ( $search_member_list as $k=>$v )
		{
			$avatar_img = "/data/avatar/".get_avatar( $search_member_list[$k]['userid'], 'big' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$search_member_list[$k]['avatar_img'] = $avatar_img;
			$search_member_list[$k]['ages'] = $year - $search_member_list[$k]['birthyear'];
			$search_member_list[$k]['height_show'] = $search_member_list[$k]['height'] != '' ? $height_array[intval( $search_member_list[$k]['height'] )] : '';
			$search_member_list[$k]['weight_show'] = $search_member_list[$k]['weight'] != '' ? $weight_array[intval( $search_member_list[$k]['weight'] )] : '';
			$search_member_list[$k]['education_show'] = $search_member_list[$k]['education'] != '' ? $education_array[intval( $search_member_list[$k]['education'] )] : '';
			$search_member_list[$k]['marital_show'] = $search_member_list[$k]['marital'] != '' ? $marital_array[intval( $search_member_list[$k]['marital'] )] : '';
			$search_member_list[$k]['nation_show'] = $search_member_list[$k]['nation'] != '' ? $nation_array[intval( $search_member_list[$k]['nation'] )] : '';
			$search_member_list[$k]['description'] = cut_str( $search_member_list[$k]['description'], 112 ) ;
			
			$city_info = $this->m_common->get_city_info( "cityID='".$search_member_list[$k]['regcity']."'" );
	        $search_member_list[$k]['city'] = $city_info;
	        $search_member_list[$k]['work']  = $search_member_list[$k]['work'] != '' ? $career_array[$search_member_list[$k]['work']] : '';
		}
		
		$data = array(
			'title'=>'会员搜索',
			'commen_info'=>$this->commen_info,
			'search_member_list'=>$search_member_list,
			'age_array_select'=>$age_array_select,
			'age_array_select_to'=>$age_array_select_2,
			'gender'=>$gender,
			'city'=>$regcity,
			'page'=>$this->pagination->create_links(),
		);
		
		$this->parser->parse( 'mp_paliie_search_list.tpl', $data );
	}
}

/* End of file paliie_search.php */
/* Location: ./application/controllers/paliie_search.php */