<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
class Uploadify_life extends CI_Controller {
	//var $handle;
	function __construct(){ 
        parent::__construct(); 
        $this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
        $this->load->library( 'myiisupload' ); 
    } 
	
	
 
    function index()
	{
		if (!empty($_FILES)) {
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'];
			$pic_temp = 'paliie_tmpic_'.time();
			
		
			$handle = new myiisupload();
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
					if ($handle->processed)
						$json = array("result" 		=> 1, 
									  "file" 		=> $_REQUEST['folder'].'/'.$handle->file_dst_name,
									  "imagewidth" 	=> $handle->image_dst_x,
									  "imageheight"	=> $handle->image_dst_y,
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
}
/* End of file uploadify.php */
/* Location: ./application/controller */