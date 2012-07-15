<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 第三方头像制作
 * @category index
 * @author taylorchen
 * @version v1.0 $date 2012-01-06 16:46:20
 */
class Crop extends CI_Controller {
	
	function __construct(){ 
        parent::__construct(); 
        $this->load->library( 'myiisupload' ); 
    } 
    
	

	function index()
	{
		
		if( (isset( $_POST['step'] ) ) && ( $_POST['step']=='process' ) )
		{
			$pic_org = 'paliie_saveOrg'.'_'.time();
			$pic_thm = 'paliie_saveThu'.'_'.time();
			$handle = new myiisupload(  ); 
			$handle->upload($_SERVER['DOCUMENT_ROOT'].$_POST['tempfile']);
	
	
			if ( $handle->uploaded ) 
			{
				$handle->file_src_name_body      = $pic_org; // hard name
				$handle->file_overwrite 		 = true;
				$handle->file_auto_rename 		 = false;
				$handle->image_resize            = true;
				$handle->image_x                 = 200; //size of final picture
				$handle->image_y                 = 200; //size of final picture
	
				$handle->jcrop                   = true;
				$handle->rect_w                  = $_POST['w1'];
				$handle->rect_h                  = $_POST['h1'];
				$handle->posX                    = $_POST['x'];
				$handle->posY                    = $_POST['y'];
				$handle->jpeg_quality 		 	 = 100;
				
				
				
				$handle->Process($_SERVER['DOCUMENT_ROOT'].'/data/attachment/album/');
	
				//thumb-50
				
				/*
				$handle->file_src_name_body      = $pic_thm; // hard name
				$handle->file_overwrite 		 = true;
				$handle->file_auto_rename 		 = false;
				$handle->image_resize            = true;
				$handle->image_x                 = 100;
				$handle->image_y                 = 100; //size of picture
	
				$handle->jcrop                   = true;
				$handle->rect_w                  = $_POST['w1'];
				$handle->rect_h                  = $_POST['h1'];
				$handle->posX                    = $_POST['x'];
				$handle->posY                    = $_POST['y'];
				$handle->jpeg_quality 		 	 = 100;
				$handle->Process($_SERVER['DOCUMENT_ROOT'].'/imgareaselect/photos/thumb/');
				*/
				
				$handle->clean();
				echo "success";
			}
			else {
				//error
				echo "error";
			}
		}
	}
}	

/* End of file crop.php */
/* Location: ./application/controllers/album/crop.php */