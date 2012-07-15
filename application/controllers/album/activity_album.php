<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 活动相册
* @category index
* @author taylorchen
* @version v1.0 $date 2011-12-07 22:38:21
* 
*/
class Activity_album extends CI_Controller {
	var $user_id;
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
		
		$this->load->model( 'album/album_model', '', TRUE ); 
		$this->load->model( 'album/pic_model', '', TRUE ); 
		$this->album_model->userid = $this->user_id;
		$this->pic_model->userid = $this->user_id;
		
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
	 * 活动相册列表
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		
		$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
		$data = $this->data;
		$condtion = "userid={$this->user_id} and aid!=0 and catid=104";
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/album/activity_album/index/';
	    $config['total_rows'] = $this->album_model->get_condition_album_num( 'album', $condtion );
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
	    $activity_album_list = $this->album_model->activity_album_list( $config['per_page'], $offset, $condtion );
	   
		if( $activity_album_list != '' )
		{
			$this->load->model( 'activity/activity_model', '', TRUE ); 
			$this->load->model( 'member/members_model', '', TRUE ); 
			foreach ( $activity_album_list as $k=>$v )
			{
				$activity_album_list[$k]['description'] = cut_str( $activity_album_list[$k]['description'], 35 );
			}
		}
		
		$data['activity_album_list'] = $activity_album_list;
		$data['page'] = $this->pagination->create_links();
		$this->parser->parse( 'album/mp_activity_album_list.tpl', $data );
	}
	
	/**
	 * 新增活动相册
	 * 
	 */
	function create_activity_album()
	{
       	
	}

	/**
	 * 新增活动相册里面相片
	 * 
	 */
	function post_activity_photo()
	{
  		$albumid = $this->input->post( 'albumid' );
  		//$description = $this->input->post( 'description' );
  		//$title = $this->input->post( 'title' );
		
		if( intval( $albumid ) == 0 ) exit;
		$albumInfo = $this->album_model->get_activity_album_info( $albumid );
		if( $albumInfo == '' ) exit;
		
		if( $_FILES['pic']['size'] > 0 ) 
		{
			$types = 'gif|jpg|png';
			$info_array = upload_pic( 'pic', 'album', '', $types );
			$info = array();
			$info = $info_array[1];
			$filepath = $info['url'];

			$data = array();
			$data['albumid'] = $albumid;
			$data['userid'] = $this->user_id;
			$data['username'] = $this->user_name;
			$data['dateline'] = time();
			$data['postip'] = $this->get_ip();
			$data['filename'] = $info['file_name'];
			$data['title'] = $albumInfo['albumname'];                    //暂时没有标题
			$data['TYPE'] = $info['file_type'];
			$data['size'] = $info['file_size'];
			$data['filepath'] = $filepath;
			$data['thumb'] = 0;
			$data['remote'] = 0;
			$data['STATUS'] = 0;
			$data['description'] = $albumInfo['description'];

			$picid = $this->pic_model->add_pic( $data );
			if( $picid )
			{
				//更新相册中的相片个数
				$data = array();
				$data['picnum'] = $albumInfo['picnum'] + 1;
				$this->album_model->edit_activity_album(  $albumid, $data );

				return showmessage( '新增相片成功', $url_forward = '/index.php/album/activity_album/activity_photo_list/'.$albumid, $ms = 1250 );
			}
			else
			{
				return showmessage( '新增相片失败', $url_forward = '/index.php/album/activity_album/activity_photo_list/'.$albumid, $ms = 1250 );
			}
		}
	}
	
	/**
	 * 活动相册里面相片列表
	 * 
	 */
	function activity_photo_list()
	{
		$data = $this->data;
		$albumid = $this->uri->segment(4);
		if( intval( $albumid ) == 0 ) return showmessage( '不存在该相册', $url_forward = '/index.php/album/activity_album/', $ms = 1250 );
		$activityAlbumInfo = $this->album_model->get_activity_album_info( $albumid );
		$this->load->model( 'activity/activity_model', '', TRUE ); 
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$activityInfo = $this->activity_model->get_activity_info( $activityAlbumInfo['aid'] );
		$memberInfo = $this->members_profile_model->get_member_profile( $activityAlbumInfo['userid'] );
		$activityInfo['cut_description'] = cut_str( $activityInfo['des'], 40 );
		$activityInfo['username'] = $memberInfo['username'];
		
		$offset = $this->uri->segment(5) == '' ? 0 : $this->uri->segment(5);
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/album/index/activity_photo_list/'.$albumid;
	    $config['total_rows'] = $this->pic_model->get_condition_pic_num( "albumid={$albumid}" );
	    $config['per_page'] = '6';
	    $config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 5;
	    $config['full_tag_open'] = '<p>';
	    $config['full_tag_close'] = '</p>';
	    $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="curpage">';
	    $config['cur_tag_close'] = '</li>';
	
	    $this->pagination->initialize( $config );
	    $activityPhotoList = $this->pic_model->activity_photo_list( $config['per_page'], $offset, "albumid={$albumid}" );
		
		
		$data['activityInfo'] = $activityInfo;
		$data['activityAlbumInfo'] = $activityAlbumInfo;
		$data['activityPhotoList'] = $activityPhotoList;
		$data['page'] = $this->pagination->create_links();
	
  		$this->parser->parse( 'album/mp_activity_photo_list.tpl', $data );
	}
	
	/**
	 * 活动相册中的相片显示
	 * 
	 */
	function activity_photo_show( $key, $albumid, $key2, $picid )
	{
		$data = $this->data;
		if( intval( $albumid ) == 0 or intval( $picid ) == 0 ) return showmessage( '不存在该张相片', $url_forward = '/index.php/album/activity_album/', $ms = 1250 );
		$activityAlbumInfo = $this->album_model->get_activity_album_info( $albumid );
		$activityPhotoInfo = $this->pic_model->activity_photo_show( $albumid, $picid );
		$activityPhotoList = $this->pic_model->activity_photo_list( $albumid );
		
		$data['activityAlbumInfo'] = $activityAlbumInfo;
		$data['activityPhotoInfo'] = $activityPhotoInfo;
		$data['activityPhotoList'] = $activityPhotoList;
	
		$this->parser->parse( 'album/activity_photo_show.tpl', $data );
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
}

/* End of file activity_album.php */
/* Location: ./application/controllers/album/activity_album.php */