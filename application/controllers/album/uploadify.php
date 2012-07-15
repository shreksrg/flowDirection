<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
class Uploadify extends CI_Controller {
	//var $handle;
	function __construct(){ 
        parent::__construct(); 
		
        $this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		
		$this->load->model( 'album/album_model', '', TRUE ); 
		$this->album_model->userid = $this->user_id;
		$this->load->model( 'album/pic_model', '', TRUE ); 
		$this->pic_model->userid = $this->user_id;		
		
        
    } 
	
	
 
    function index()
	{
		// 验证是否登录
		$this->load->model('common/m_common','',TRUE);
		$validstate=$this->m_common->ajax_ValidLogin();
		if(!$validstate){
			echo json_encode(array('result'=>-1));
			die();
		}
		
		// 上传文件
        $this->load->library( 'myiisupload' ); 
		if (!empty($_FILES)) {
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'];
			$pic_temp = 'paliie_tmpic_'.time();
			
		
			$handle = $this->myiisupload;
			$handle->upload($_FILES['Filedata']);
				if ($handle->uploaded) {
					$handle->file_src_name_body      = $pic_temp; // hard name
					$handle->file_overwrite 		 = true;
					$handle->file_auto_rename 		 = false;
					$handle->image_resize            = true;
					$handle->image_ratio_y           = true;
					$handle->image_x                 = ($handle->image_src_x < 368)?$handle->image_src_x:368;
					$handle->file_max_size 			 = '8192000'; // max size
					$handle->Process($targetPath.'/');
					$handle->clean(); 
					
					
					
					$dateline = time();
					//先检查有没有个性生活照的相册，如果没有，就新建，如果有用现成的相册ID 
					$my_life_album_info = $this->album_model->get_my_life_album_info( 105 );
					$thumb = $_REQUEST['folder'].'/'.$handle->file_dst_name;
					
					
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
			  			$data['filename'] = $handle->file_dst_name;
			  			$data['title'] = '暂时没有标题';                    //暂时没有标题
			  			$data['TYPE'] = '';
			  			$data['size'] = '';
			  			$data['filepath'] = $thumb;
			  			$data['thumb'] = '';
			  			$data['remote'] = 0;
			  			$data['STATUS'] = 0;
			  			$data['description'] = '暂时没有图片描述';
			  			
			  			$picid = $this->pic_model->add_pic( $data );
		  			} 
					
					if ($handle->processed)
						$json = array("result" 		=> 1, 
									  "file" 		=> $_REQUEST['folder'].'/'.$handle->file_dst_name,

									  "pid"            => $picid,

									  "imagewidth" 	=> $handle->image_dst_x,
									  "imageheight"	=> $handle->image_dst_y
									 );
					else
						$json = array("result" => 0);
					
					$encoded = json_encode($json);
					
					echo $encoded;
					//unset($encoded);	
				} 
				else { 
					$json = array("result" => 12,"sex"=>"male");
					$encoded = json_encode($json);
					echo $encoded;
					//unset($encoded);
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
/* End of file uploadify.php */
/* Location: ./application/controller */