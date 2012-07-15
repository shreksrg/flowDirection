<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 会员头像控制器
 * @author Floy
 *
 */
class Avatar extends CI_Controller {
	var $userid;
	function __construct()
	{
		parent::__construct();
		$this->userid = $this->session->userdata('user_id');
		//$this->userid = $this->userid?$this->userid:2;
	}

	function index()
	{
		$avatar_img = "/data/avatar/".get_avatar($this->userid,'big');
		$avatar_img = file_exists('.'.$avatar_img)?$avatar_img:'/static/images/avatar/noavatar_big.gif';
		$data = array(
			'avatar_img'	=> $avatar_img,
			'source'		=> 'set',
			'urlSource'		=> '',
		);
		$this->load->view( 'member/avatar', $data );
	}
	
	function set()
	{
		$picid = intval( $this->uri->segment(5) );
		
		if( !$picid )
		{
			echo '<script>alert('.$picid.'); alert("请选择您正确的生活照进行设置");parent.location.href="'.site_url('album/index').'"</script>';
			exit;
		} 
		else 
		{
			$this->load->model( 'album/pic_model', '', TRUE ); 
			$this->pic_model->userid = $this->userid;		
			
			$picinfo = $this->pic_model->get_my_pic_info( $picid );
			
			
			$avatar_img = "/data/attachment/album/{$picinfo['filepath']}";
			$data = array(
				'avatar_img'	=> $avatar_img,
				'source'		=> 'set',
				'urlSource'		=> '',
				'avatar_img_source'		=> "./data/attachment/avatar/{$picinfo['filepath']}",
			);
			$this->load->view( 'member/avatar', $data );
		}
	}

	function upload()
	{
		if($_POST){
			$types = 'gif|jpg|png';
			$info = upload_file('file','avatar','',$types);
				
			if(!$info[0]){
				echo '<script>alert("'.$info[1].'");location.href="'.site_url('member/avatar/upload').'"</script>';
				exit;
			}
			$file = $info[1];
			//debug($info[1],1);
			$f1="<img src='{$file['url']}' id='ImageDrag'>";
			$f2="<img src='{$file['url']}' id='ImageIcon'>";
			$js = '<script language="javascript">';
			$js .= 'parent.$("#ImageDragContainer").html("'.$f1.'");';
			$js .= 'parent.$("#IconContainer").html("'.$f2.'");';
			$js .= 'parent.$("#bigImage").val("'.$file['url'].'");';
			$js .= 'parent.run('.$file['image_width'].','.$file['image_height'].');';
			$js .= 'location.href="'.site_url('member/avatar/upload').'"';
			$js .= '</script>';
			echo $js;
			exit;
		}else{
			$this->load->view('member/avatar',array('act'=>'upload'));
		}
	}

	function save()
	{
		if(!$_POST) return showmessage('无效的操作！');
		if( !$this->input->post('bigImage') ) 
		{
			$srcfile = $this->input->post('tempfile'); 
		}
		else 
		{
			$srcfile = $this->input->post('bigImage'); 
		}
		if(!$srcfile) return showmessage('您还没有上传头像！');
		
		$b_avatarfile    = "./data/avatar/" .get_avatar($this->userid,$isze='big');
		$m_avatarfile = "./data/avatar/" .get_avatar($this->userid,$isze='middle');
		$s_avatarfile  = "./data/avatar/" .get_avatar($this->userid,$isze='small');

		$big_w=186;
		$big_h=186;

		$middle_w=150;
		$middle_h=150;

		$small_w=120;
		$small_h=120;
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = '.'.$srcfile;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		
		//处理大头像
		$config['new_image'] = $b_avatarfile;
		$config['width'] = $big_w;
		$config['height'] = $big_h;
		$this->load->library('image_lib', $config); 
		$this->image_lib->resize();
		$this->image_lib->clear();
		
		//切换头像区域到临时图片
		$config['new_image'] = '.'.$srcfile.'.tmp.jpg';
		$config['width'] = $this->input->post('w1');
		$config['height'] = $this->input->post('h1');
		$config['x_axis'] = $this->input->post('x');
		$config['y_axis'] = $this->input->post('y');
		$config['maintain_ratio'] = FALSE;
		
		$this->image_lib->initialize($config); 
		if(!$this->image_lib->crop()){
			 echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
		
		//处理中号头像
		$config['source_image'] = $config['new_image'];
		$config['new_image'] = $m_avatarfile;
		$config['width'] = $middle_w;
		$config['height'] = $middle_h;
		$config['maintain_ratio'] = FALSE;
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();
		$this->image_lib->clear();
		
		//小头像
		$config['source_image'] = $config['new_image'];
		$config['new_image'] = $s_avatarfile;
		$config['width'] = $small_w;
		$config['height'] = $small_w;
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();
		$this->image_lib->clear();		
		
		return showmessage( '头像上传成功', $url_forward = '/index.php/album/index', $ms = 1250 );
		//header( "Location:/index.php/album/index/index" );
		/*echo "<script type='text/javascript'>parent.location.href='".site_url('album/index')."';</script>";*/
	
	}
}

/* End of file avatar.php */
/* Location: ./application/controller */