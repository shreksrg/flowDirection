<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员个人相册
* @category index
* @author taylorchen
* @version v1.0 $date 2011-12-07 13:46:20
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
		
		$this->load->model( 'album/album_model', '', TRUE ); 
		$this->load->model( 'album/pic_model', '', TRUE ); 
		$this->album_model->userid = $this->user_id;
		$this->pic_model->userid = $this->user_id;
		
		$this->load->model( 'member/members_email_model', '', TRUE ); 
		$this->load->model( 'friend/friend_model', '', TRUE ); 
		$this->members_email_model->userid = $this->user_id;
		
		$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'middle' );
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
	 * 个人相册列表 个性生活照相册id为 105
	 * 
	 * 
	 */
	public function index()
	{
		
		$data = $this->data;
		$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'middle' );
		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
		$data['avatar_img'] = $avatar_img;
		
		$my_album_list = $this->album_model->my_album_list();
		$data['myAlbumList'] = $my_album_list;
		
		foreach ( $my_album_list as $k=>$v )
		{
			if( $my_album_list[$k]['catid'] == '105' )
			{	
				$myPhotoList = $this->pic_model->my_photo_list( $my_album_list[$k]['albumid'] );
				$data['albumid'] = $my_album_list[$k]['albumid'];
				foreach ( $myPhotoList as $kk=>$vv )
				{
					$myPhotoList[$kk]['img_url_code'] = $myPhotoList[$kk]['filename'];
				}
				
				$data['myPhotoList'] = $myPhotoList;
				
				break;
			}
			else {
				continue;
			}
		}

		
		
		$this->parser->parse( 'album/mp_my_life_photo.tpl', $data );
		//$this->parser->parse( 'album/add_my_photo.tpl' );
		
	}
	
	/**
	 * 新建个人相册
	 * 
	 */
	public function create_my_album()
	{
		$act = $this->input->post( 'act' );
		if( $act )
		{
			$albumname = $this->input->post( 'albumname' );
			$description = $this->input->post( 'description' );
			$picflag = $this->input->post( 'picflag' ); //全部开放
			$catid = 1;   //暂时设定相册分类为1
			$aid = 0;     //暂时设定不关联活动 
			$userid = $this->user_id;
			$username = $this->user_name;
			$dateline = time();
			$picnum = 1;
			
			if( $_FILES['thumb']['size'] > 0 ) 
  			{	
					$info = array();
					$this->load->helper( 'common' );
					$info = upload_pic( $field='thumb', $folder='album', $new_file='', $thumb=true );
					$info_ = explode( '/', $info[1]['full_path'] );
					$thumb = $info_[count($info_)-2]."/".$info_[count($info_)-1];	
  			}
  			
  			$data['albumname'] = $albumname;
  			$data['description'] = $description;
  			$data['picflag'] = $picflag;
  			$data['catid'] = $catid;
  			$data['aid'] = $aid;
  			$data['userid'] = $userid;
  			$data['username'] = $username;
  			$data['dateline'] = $dateline;
  			$data['picnum'] = $picnum;
  			$data['thumb'] = $thumb;
  			
  			$albumid = $this->album_model->create_my_album( 'album', $data );
  			if( $albumid ) 
  			{
  				$data = array();
  				$data['albumid'] = $albumid;
	  			$data['userid'] = $this->user_id;
	  			$data['username'] = $this->user_name;
	  			$data['dateline'] = $dateline;
	  			$data['postip'] = $this->get_ip();
	  			$data['filename'] = $info[1]['file_name'];
	  			$data['title'] = '暂时没有标题';                    //暂时没有标题
	  			$data['TYPE'] = $info[1]['file_type'];
	  			$data['size'] = $info[1]['file_size'];
	  			$data['filepath'] = $thumb;
	  			$data['thumb'] = '';
	  			$data['remote'] = 0;
	  			$data['STATUS'] = 0;
	  			$data['description'] = '暂时没有图片描述';
	  			
	  			$picid = $this->pic_model->add_pic( $data );
	  			if( $picid )
	  			{
	  				return showmessage( '新增相册成功', $url_forward = '/index.php/album/index', $ms = 1250 );
	  			} 
	  			else 
	  			{
	  				return showmessage( '新增相册失败', $url_forward = '/index.php/album/index', $ms = 1250 );
	  			}
  			} 
  			else 
  			{
  				return showmessage( '新增相册失败', $url_forward = '/index.php/album/index', $ms = 1250 );
  			}
  			
		}
		else 
		{
			exit;
		}
	}
	
	/**
	 * ajax操作
	 * 个人相册修改数据显示
	 * 
	 */
	public function edit_my_album()
	{
		$albumid = intval( $_POST['albumid'] );
		$msg = false;
		if ( $albumid != 0 )
		{
		    $albumInfo = $this->album_model->get_my_album_info( $albumid );
			if( $albumInfo != '' )
			{	
				$msg = $albumInfo;
			} 
			else 
			{
				$msg = false;
			}
		}
        
		echo json_encode( $msg );		
	}
	
	/**
	 * 
	 * 个人相册修改
	 * 
	 */
	public function edit_my_album_act()
	{
		$albumid = $this->input->post( 'edit_albumid' );
		$albumname = $this->input->post( 'albumname' );
		$description = $this->input->post( 'description' );
		$picflag = $this->input->post( 'picflag' );
		
		if( intval( $albumid ) == 0 ) exit;
		$albumInfo = $this->album_model->get_my_album_info( $albumid );
		if( $albumInfo == '' ) exit;
		
		$data = array();
		$data['albumname'] = $albumname;
		$data['description'] = $description;
		$data['picflag'] = $picflag;
		$result= $this->album_model->edit_my_album( $albumid, $data );
		if( $result )
		{
			return showmessage( '相册编辑成功', $url_forward = '/index.php/album/index/', $ms = 1250 );
		}
		else 
		{
			return showmessage( '相册编辑失败', $url_forward = '/index.php/album/index/', $ms = 1250 );
		}
	}
	
	/**
	 * 个人相册里面相片上传
	 * 
	 */
	public function post_my_photo()
	{
		$albumid = $this->input->post( 'albumid' );
		$description = $this->input->post( 'description' );
  		$title = $this->input->post( 'title' );
  		
		if( intval( $albumid ) == 0 ) exit;
		$albumInfo = $this->album_model->get_my_album_info( $albumid );
		if( $albumInfo == '' ) exit;
		
		if( $_FILES['pic']['size'] > 0 ) 
		{
			$date = date( 'Ym', time() );
			$config['upload_path'] = APPPATH.'../www/data/attachment/album/'.$date."/";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1024';

			$this->load->library( 'upload', $config );

			if ( !$this->upload->do_upload( 'pic' ) )
			{
				return showmessage( '照片上传失败', $url_forward = '/index.php/album/index/my_photo_list/albumid/'.$albumid, $ms = 1250 );
			}
			else
			{
				$info = array();
				$info = $this->upload->data();

				$info_ = explode( '/', $info['full_path'] );
				$thumb = $info_[count($info_)-2]."/".$info_[count($info_)-1];
				
				$data = array();
  				$data['albumid'] = $albumid;
	  			$data['userid'] = $this->user_id;
	  			$data['username'] = $this->user_name;
	  			$data['dateline'] = time();
	  			$data['postip'] = $this->get_ip();
	  			$data['filename'] = $info['file_name'];
	  			$data['title'] = $title;                    //暂时没有标题
	  			$data['TYPE'] = $info['file_type'];
	  			$data['size'] = $info['file_size'];
	  			$data['filepath'] = $thumb;
	  			$data['thumb'] = '';
	  			$data['remote'] = 0;
	  			$data['STATUS'] = 0;
	  			$data['description'] = $description;
				
	  			$picid = $this->pic_model->add_pic( $data );
	  			if( $picid )
	  			{
	  				//更新相册中的相片个数
	  				$data = array();
	  				$data['picnum'] = $albumInfo['picnum'] + 1;
	  				$this->album_model->edit_my_album(  $albumid, $data );
	  				
	  				return showmessage( '新增相片成功', $url_forward = '/index.php/album/index/my_photo_list/albumid/'.$albumid, $ms = 1250 );
	  			} 
	  			else 
	  			{
	  				return showmessage( '新增相片失败', $url_forward = '/index.php/album/index/my_photo_list/albumid/'.$albumid, $ms = 1250 );
	  			}
			}
		}
	}
	
	/**
	 * 个人相册里面相片列表
	 * 
	 */
	public function my_photo_list( $key, $albumid )
	{
		$data = $this->data;
		if( intval( $albumid ) == 0 ) return showmessage( '不存在该相册', $url_forward = '/index.php/album/index', $ms = 1250 );
		$myAlbumInfo = $this->album_model->get_my_album_info( $albumid );
		$myPhotoList = $this->pic_model->my_photo_list( $albumid );
		$data['myAlbumInfo'] = $myAlbumInfo;
		$data['myPhotoList'] = $myPhotoList;
	
		$this->parser->parse( 'album/my_photo_list.tpl', $data );
	}
	
	/**
	 * 个人相册里面相片显示
	 * 
	 */
	public function my_photo_show( $key, $albumid, $key2, $picid )
	{
		$data = $this->data;
		if( intval( $albumid ) == 0 or intval( $picid ) == 0 ) return showmessage( '不存在该张相片', $url_forward = '/index.php/album/index/', $ms = 1250 );
		$myAlbumInfo = $this->album_model->get_my_album_info( $albumid );
		$myPhotoInfo = $this->pic_model->my_photo_show( $albumid, $picid );
		$my_photo_list = $this->pic_model->my_photo_list( $albumid );
		
		$data['myAlbumInfo'] = $myAlbumInfo;
		$data['myPhotoInfo'] = $myPhotoInfo;
		$data['myPhotoList'] = $my_photo_list;
	
		$this->parser->parse( 'album/my_photo_show.tpl', $data );
	}
	
	/**
	 * ajax 操作
	 * 个人相册里面相片修改信息显示
	 * 
	 */
	public function edit_my_photo()
	{
		$picid = intval( $_POST['picid'] );
		$albumid = intval( $_POST['albumid'] );
		$msg = false;
		if ( $picid != 0 )
		{
		    $picInfo = $this->pic_model->my_photo_show( $albumid, $picid );
			if( $picInfo != '' )
			{	
				$msg = $picInfo;
			} 
			else 
			{
				$msg = false;
			}
		}
        
		echo json_encode( $msg );
	}
	
	/**
	 * 
	 * 个人相册里面相片修改
	 * 
	 */
	public function edit_my_photo_act()
	{
		$picid = $this->input->post( 'edit_picid' );
		$albumid = $this->input->post( 'albumid' );
		$title = $this->input->post( 'title' );
		$description = $this->input->post( 'description' );
		$status = $this->input->post( 'STATUS' );
		
		if( intval( $picid ) == 0 ) exit;
		$picInfo = $this->pic_model->get_my_pic_info( $picid );
		if( $picInfo == '' ) exit;
		
		$data = array();
		$data['title'] = $title;
		$data['description'] = $description;
		$data['status'] = $status;
		$result = $this->pic_model->edit_my_photo( $picid, $data );
		if( $result )
		{
			return showmessage( '相片编辑成功', $url_forward = '/index.php/album/index/my_photo_show/albumid/'.$albumid.'/picid/'.$picid, $ms = 1250 );
		}
		else 
		{
			return showmessage( '相片编辑失败', $url_forward = '/index.php/album/index/my_photo_show/albumid/'.$albumid.'/picid/'.$picid, $ms = 1250 );
		}
	}
	
	/**
	 * ajax 操作
	 * 个人相册里面相片删除
	 * 
	 */
	public function delete_my_photo()
	{
		$picid = intval( $_POST['id'] );
		//$albumid = intval( $_POST['albumid'] );
		$msg = false;
		if ( $picid != 0 )
		{
			if( $this->pic_model->delete_my_photo_new( $picid ) )
			{	
				$msg = true;
			} 
			else 
			{
				$msg = false;
			}
		}
		
		$result = array( 'rtn'=>$msg );
		echo json_encode( $result );
	}
	
	/**
	 * ajax 操作
	 * 个人相册里面相片隐藏
	 * 
	 */
	public function hidden_my_photo()
	{
		$picid = intval( $_POST['id'] );
		$data['STATUS'] = 1;
		//$albumid = intval( $_POST['albumid'] );
		$msg = false;
		if ( $picid != 0 )
		{
			if( $this->pic_model->edit_my_photo( $picid, $data ) )
			{	
				$msg = true;
			} 
			else 
			{
				$msg = false;
			}
		}
		
		$result = array( 'rtn'=>$msg );
		echo json_encode( $result );
	}
	
	/**
	 * ajax 操作
	 * 个人相册里面相片设置封面
	 * 
	 */
	public function set_display()
	{
		$picid = intval( $_POST['picid'] );
		$albumid = intval( $_POST['albumid'] );
		$msg = false;
		if ( $picid != 0 )
		{
			$photo_info = $this->pic_model->my_photo_show( $albumid, $picid ); 
			$data['thumb'] = $photo_info['filepath'];
			if( $this->album_model->edit_my_album( $albumid, $data ) )
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
}

/* End of file index.php */
/* Location: ./application/controllers/album/index.php */