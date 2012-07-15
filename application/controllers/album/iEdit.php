<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 第三方头像制作
 * @category index
 * @author taylorchen
 * @version v1.0 $date 2012-01-06 16:46:20
 */
class iEdit extends CI_Controller {
	var $data = array();
	function __construct(){ 
        parent::__construct(); 
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
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
       // $this->load->library( 'uploadify' ); 
		
    } 
	
	function index()
	{
		$data = $this->data;
		$img_this = $this->uri->segment(5);
 		$to_dir = "/data/attachment/album/cashes";
 		$resizewidth_tag = false;
 	
		$img_url = "/data/attachment/album/".$img_this;
	
		if ( file_exists( '.'.$img_url ) == false ) 
		{
        	die('文件不存在');
		}
		
		if( !is_dir( '.'.$to_dir ) )
		{
    		@mkdir( '.'.$to_dir, 0777 );
    	}
    	
    	$arr = array();
		$arr = getimagesize( '.'.$img_url );
		$pic_width = $arr[0]; //宽度
		$pic_height = $arr[1]; //高度
		$maxwidth = 400;
		$im = @imagecreatefromjpeg( '.'.$img_url );
		
	    if( $maxwidth && $pic_width > $maxwidth )
	    {
	    	$widthratio = $maxwidth/$pic_width;
	    	$resizewidth_tag = true;
	    }
	
	    if( $resizewidth_tag )
	    	$ratio = $widthratio;
	    else
	    	$ratio = 1;
	
	    $newwidth = $pic_width * $ratio;
	    $newheight = $pic_height * $ratio;
	
	    if(function_exists("imagecopyresampled"))
	    {
	    	$newim = imagecreatetruecolor( $newwidth, $newheight );
	    	imagecopyresampled( $newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height );
	    }
	    else
	    {
	    	$newim = imagecreate( $newwidth, $newheight );
	    	imagecopyresized( $newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height );
	    }
	
	    $name = '.'.$to_dir."/".$img_this;
	    imagejpeg( $newim, $name );
	    imagedestroy( $newim );
    	
		//copy( '.'.$img_url, '.'.$to_dir."/".$img_this );
		$data['height'] = $newheight;
		$data['weight'] = $newwidth;
		$data['img_url'] = $to_dir.'/'.$img_this;
		
		$this->parser->parse( 'album/mp_add_my_photo_e.tpl', $data );
	}
	
	function set_avatar()
	{
		$data = $this->data;
		$this->parser->parse( 'album/mp_add_my_photo_e.tpl', $data );
	}
}	

/* End of file crop.php */
/* Location: ./application/controllers/album/crop.php */