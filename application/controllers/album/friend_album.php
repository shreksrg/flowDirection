<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 好友相册
* @category index
* @author taylorchen
* @version v1.0 $date 2011-12-07 18:08:36
* 
*/
class Friend_album extends CI_Controller {
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
		$this->data['commen_info']['friend_num'] = count( $this->friend_model->get_friends_list( $this->user_id ) );
	}
	
	/**
	 * 好友相册列表
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$friendid = array( "2","3", "4" );		 //暂时已 会员 id 为 3,4 作为好友
		$list = $this->album_model->friend_album_list( $friendid );
		$data['friendAlbumList'] = $list;
		
		$this->parser->parse( 'album/friend_album_list.tpl', $data );
	}
	
	/**
	 * 好友相册中的相片列表
	 * 
	 */
	public function friend_photo_list( $key, $albumid, $k, $friendid )
	{
		$data = $this->data;
		if( intval( $albumid ) == 0 or intval( $friendid ) == 0 ) return showmessage( '不存在该相册', $url_forward = '/index.php/album/friend_album', $ms = 1250 );
		
		$this->album_model->friendid = $friendid;
		$this->pic_model->friendid = $friendid;
		$this->friendid = $friendid;
		
		$friendAlbumInfo = $this->album_model->get_friend_album_info( $albumid );
		$friendPhotoList = $this->pic_model->friend_photo_list( $albumid );
	
		$data['friendAlbumInfo'] = $friendAlbumInfo;
		$data['friendPhotoList'] = $friendPhotoList;
		
		$this->parser->parse( 'album/friend_photo_list.tpl', $data );
	}
	
	/**
	 * 好友相册中的相片显示
	 * 
	 */
	public function friend_photo_show( $keys, $albumid, $key, $friendid, $k, $picid )
	{
		$data = $this->data;
		if( intval( $picid ) == 0 or intval( $friendid ) == 0 or intval( $albumid ) == 0 ) return showmessage( '不存在该好友相片', $url_forward = '/index.php/album/friend_album', $ms = 1250 );
		
		$this->album_model->friendid = $friendid;
		$this->pic_model->friendid = $friendid;
		
		$friendAlbumInfo = $this->album_model->get_friend_album_info( $albumid );
		$friendPhotoInfo = $this->pic_model->friend_photo_show( $albumid, $picid );
		$friend_photo_list = $this->pic_model->friend_photo_list( $albumid );
		
		$data['friendAlbumInfo'] = $friendAlbumInfo;
		$data['friendPhotoInfo'] = $friendPhotoInfo;
		$data['friendPhotoList'] = $friend_photo_list;
		
		$this->parser->parse( 'album/friend_photo_show.tpl', $data );
	}
}

/* End of file friend_album.php */
/* Location: ./application/controllers/album/friend_album.php */