<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员形象照设置
* @category set_photo
* @author taylorchen
* @version v1.0 $date 2011-11-22 22:02:20
* 
*/
class Set_photo extends CI_Controller {
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
		
		$this->load->model( 'album/album_model', '', TRUE ); 
		$this->album_model->userid = $this->user_id;
		$this->load->model( 'album/pic_model', '', TRUE ); 
		$this->pic_model->userid = $this->user_id;		
		
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
        
        $this->load->model( 'member/members_email_model', '', TRUE ); 
		$this->load->model( 'friend/friend_model', '', TRUE ); 
		$this->members_email_model->userid = $this->user_id;
		
		$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'big' );
		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
		$this->data['commen_info']['username'] = $this->user_name;
		$this->data['commen_info']['userid'] = $this->user_id;
		$this->data['commen_info']['avatar_img'] = $avatar_img;
		$this->data['commen_info']['all_email_num'] = $this->members_email_model->get_email_num();
		$this->data['commen_info']['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
		$this->data['commen_info']['friend_num'] = $this->friend_model->get_condition_friend_num( 'friend', "(userid={$this->user_id} and STATUS=1)" );
	}
	
	/**
	 * 个人生活习性的显示
	 * 
	 */
	public function index()
	{
		$data = $this->data;
		$my_life_album_info = $this->album_model->get_my_life_album_info( $catid=105 );
		if( !empty( $my_life_album_info ) )
		{
			$myPhotoList = $this->pic_model->my_photo_list( $my_life_album_info['albumid'] );
			$data['albumid'] = $my_life_album_info['albumid'];
			$data['myPhotoList'] = $myPhotoList;
		}
		
		$this->parser->parse( 'member/my_photo.tpl', $data );
	}
	
	/**
	 * 设置个性生活照为形象照
	 *
	 */
	function set()
	{
		$data = $this->data;
		$picid = intval( $this->uri->segment(5) );
		if( !$picid )
		{
			echo '<script>alert("请选择您正确的生活照进行设置");location.href="'.site_url('album/index').'"</script>';
			exit;
		} 
		else 
		{
			
			$data['picid'] = $picid;
			$this->parser->parse( 'member/set_photo.tpl', $data );
		}
	}
	
	/**
	 * 编辑个人生活习性
	 * 
	 */
	public function update() 
	{	
		$id = intval( $this->input->post( 'member_id' ) );
		$data = $this->data;
		
		if( $id == 0 ) {
			$member_profile_info = array();
		
			$this->load->model( 'member/members_profile_model', '', TRUE ); 
			$member_profile_info = $this->members_profile_model->get_member_profile( $this->user_id );
			
			$data['member_profile'] = $member_profile_info;
			$this->parser->parse( 'member/life_habits_update.tpl', $data );
		} else {
			$life_habits = $this->input->post( 'life_habits' );
			$yd_habits = $this->input->post( 'yd_habits' );
			$smoke = $this->input->post( 'smoke' );
			$drink = $this->input->post( 'drink' );
			$updated_at = time();
			
			$housework = $this->input->post( 'housework' );
			$cooking = $this->input->post( 'cooking' );
			$life_skills = $this->input->post( 'life_skills' );
			
			//加载表单认证类  后期制作
			
	        $this->load->model( 'member/members_profile_model', '', TRUE );
			$this->members_profile_model->life_habits = $life_habits;
			$this->members_profile_model->yd_habits = $yd_habits;
			$this->members_profile_model->smoke = $smoke;
			$this->members_profile_model->drink = $drink;
			
			$this->members_profile_model->housework = $housework;
			$this->members_profile_model->cooking = $cooking;
			$this->members_profile_model->life_skills = $life_skills;
			$this->members_profile_model->updated_at = $updated_at;
			
			$result = $this->members_profile_model->update_life_habits( $id );
			
			if( $result )
			{
				echo "<script language='javascript'>alert('个人生活习性保存成功!');
					location.href='/index.php/member/set_habits/index';</script>";
				die;
			}
			else
			{
				echo "<script language='javascript'>alert('个人生活习性保存失败!');
					location.href='/index.php/member/set_habits/update';</script>";
				die;
			}
		}
	}
	
	/**
	 * 新建个人相册
	 * 
	 */
	public function create_my_album()
	{
		$act = $this->input->post( 'act' );
		if( $act and $_FILES['thumb']['size'] > 0 )
		{
			$dateline = time();
			//先检查有没有个性生活照的相册，如果没有，就新建，如果有用现成的相册ID 
			$my_life_album_info = $this->album_model->get_my_life_album_info( 105 );
			
			if( $_FILES['thumb']['size'] > 0 ) 
			{
				$info = array();
				$info = upload_pic( $field='thumb', $folder='album', $new_file='', $thumb=true );
				$info_ = explode( '/', $info[1]['full_path'] );
				$thumb = $info_[count($info_)-2]."/".$info_[count($info_)-1];
			}
			
			if( !empty( $my_life_album_info ) )
			{
				$albumid = $my_life_album_info['albumid'];
				
			}
			else 
			{
				$albumname = '个性生活照';
				$description = '个性生活照';
				$picflag = 0; //全部开放
				$catid = 105;   //暂时设定个性生活照相册分类为105
				$aid = 0;     //不关联活动 
				$userid = $this->user_id;
				$username = $this->user_name;
				$picnum = 1;
	  			
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
			}
  			
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
	  				//return showmessage( '生活照上传成功', $url_forward = '/index.php/album/index/index', $ms = 1250 );
	  				header( "Location:/index.php/album/index/index" );
	  			} 
	  			else 
	  			{
	  				return showmessage( '生活照上传失败', $url_forward = '/index.php/album/index/index', $ms = 1250 );
	  			}
  			} 
  			else 
  			{
  				return showmessage( '生活照上传失败', $url_forward = '/index.php/album/index/index', $ms = 1250 );
  			}
  			
		}
		else 
		{
			return showmessage( '请选择上传的图片', $url_forward = '/index.php/album/index/index', $ms = 1250 );
		}
	}
	
	/**
	 * 个性生活照相册里面相片上传
	 * 
	 */
	public function post_my_photo()
	{
		$albumid = $this->input->post( 'albumid' );
		
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
				return showmessage( '照片上传失败', $url_forward = '/index.php/member/set_photo/index' );
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
	  			$data['title'] = '暂时没有标题';                    //暂时没有标题
	  			$data['TYPE'] = $info['file_type'];
	  			$data['size'] = $info['file_size'];
	  			$data['filepath'] = $thumb;
	  			$data['thumb'] = '';
	  			$data['remote'] = 0;
	  			$data['STATUS'] = 0;
	  			$data['description'] = '暂时没有图片描述';
				
	  			$picid = $this->pic_model->add_pic( $data );
	  			if( $picid )
	  			{
	  				//更新相册中的相片个数
	  				$data = array();
	  				$data['picnum'] = $albumInfo['picnum'] + 1;
	  				$this->album_model->edit_my_album(  $albumid, $data );
	  				
	  				return showmessage( '新增相片成功', $url_forward = '/index.php/member/set_photo/index', $ms = 1250 );
	  			} 
	  			else 
	  			{
	  				return showmessage( '新增相片失败', $url_forward = '/index.php/member/set_photo/index', $ms = 1250 );
	  			}
			}
		}
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

/* End of file set_photo.php */
/* Location: ./application/controllers/member/set_photo.php */