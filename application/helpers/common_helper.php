<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('showmessage'))
{
	function showmessage($msg, $url_forward = 'goback', $ms = 1250, $dialog = '', $returnjs = '')
	//function showmessage($msg='',$url='')
	{
		$CI =& get_instance();
		$data = array(
			'msg'			=> $msg,
			'url_forward'	=> $url_forward,
			'ms' 			=> $ms,
			'dialog'		=> $dialog,
			'returnjs'		=> $returnjs
		);
		$CI->load->view('common/mp_tipmessage',$data);
		return;
	}
}

if ( ! function_exists('debug'))
{
	/**
	 * 调试方法
	 * @param  $data
	 * @param  $exit
	 */
	function debug($data='',$exit=false){
		$CI =& get_instance();
		if ($CI->config->item('debug'))
		{
			print_r('<pre>');
			print_r($data);
		}
		if($exit) exit();
	}
}

if ( ! function_exists('updatecredit'))
{
	/**
	 * 用户积分处理
	 */
	function updatecredit($action,$userid)
	{
		$CI =& get_instance();
		$CI->load->model('common/credit');
		return $CI->update_credit($action,$userid);
	}
}

if ( ! function_exists('get_avatar')){
	/**
	 * 获取用户头像
	 * @param  $uid
	 * @param  $size
	 * @param  $type
	 */
	function get_avatar($userid, $size = 'middle', $type = '') {
		$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
		$userid = abs(intval($userid));
		$userid = sprintf("%09d", $userid);
		$dir1 = substr($userid, 0, 3);
		$dir2 = substr($userid, 3, 2);
		$dir3 = substr($userid, 5, 2);
		$typeadd = $type == 'real' ? '_real' : '';
		$path = "./data/avatar/".$dir1.'/'.$dir2.'/'.$dir3.'/';
		if(!file_exists($path))  create_dirs($path);

		return $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($userid, -2).$typeadd."_avatar_$size.jpg";
	}
}

function avatar($userid, $size = 'middle')
{
	$avatar = '/data/avata/'.get_avatar($userid, $size);
	if(file_exists('.'.$avatar))
		return $avatar;
	else
		return "/static/images/avatar/noavatar_$size.gif";
}


if ( ! function_exists('is_serialized'))
{
	/**
	 * 判断是否序列化
	 * @param $data
	 */
	function is_serialized( $data ) {
		// if it isn't a string, it isn't serialized
		if ( !is_string( $data ) )
		return false;
		$data = trim( $data );
		if ( 'N;' == $data )
		return true;
		if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
		return false;
		switch ( $badions[1] ) {
			case 'a' :
			case 'O' :
			case 's' :
				if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
				return true;
				break;
			case 'b' :
			case 'i' :
			case 'd' :
				if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
				return true;
				break;
		}
		return false;
	}
}
if ( ! function_exists('upload_pic'))
{
	function upload_pic($field='field',$folder='thumb',$new_file='',$thumb=true,$thumb_size = array())
	{
		$types = 'jpg|png|gif';
		$file = upload_file($field,$folder,$new_file,$types);
		if($file[0]){
			$img = $file[1];//取上传文件信息
			$CI =& get_instance();
			$config['image_library']	= 'gd2';
			$config['source_image'] 	= $img['full_path'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 300;
			$config['height'] 			= 200;
			if(!empty($thumb_size))
			{
				$config['width'] 	= (int)$thumb_size[0];
			    $config['height'] 	= (int) $thumb_size[1];
			}
			$CI->load->library('image_lib',$config);
			$CI->image_lib->initialize($config);
			$CI->image_lib->resize();
			$CI->image_lib->clear();
			$file[1]['thumb'] = $folder.'/'.$img['raw_name'].'_thumb'.$img['file_ext'];
			if(!empty($thumb_size))
			{
				$paths = pathinfo($file[1]['url']);
			    $file[1]['thumb'] = $paths['dirname'].'/'.$img['raw_name'].'_thumb'.$img['file_ext'];
			}
		}
		return $file;
	}
}


if ( ! function_exists('upload_file'))
{
	/**
	 * 附件上传
	 * @param unknown_type $field
	 * @param unknown_type $folder
	 * @param unknown_type $return_file
	 */
	function upload_file($field='field',$folder='uploads',$new_file='',$types='')
	{
		$CI =& get_instance();
		$config['upload_path'] 		= './data/attachment/'.$folder.'/'.date("Ymd",time());
		$config['allowed_types'] 	= $types;
		$config['file_name'] 		= $new_file?$new_file:time();
		$config['max_size'] = '2048';

		if(!file_exists($config['upload_path']))
		{

			@create_dirs($config['upload_path']);
		}

		$CI->load->library('upload', $config);
		if (!$CI->upload->do_upload($field)){
			return array(false,$CI->upload->display_errors());
		}else{
			$info = $CI->upload->data();
			$info['url'] = str_replace('.','',$config['upload_path']).'/'.$info['file_name'];
			return array(true,$info);
		}
	}
}

if ( ! function_exists('create_dirs'))
{
	/**
	 * 递归创建目录
	 * @param    String    $dir         创建的多级目录
	 * @param    String    $mode    目录权限字串
	 */
	function create_dirs($dir, $mode='0777')
	{
		if(!is_dir($dir)){
			create_dirs(dirname($dir), $mode);
			@mkdir($dir);
			$fp=@fopen("$dir/index.htm", "w+");
			@fclose($fp);
		}
		return true;
	}
}

/**
* 截取UTF-8编码下字符串的函数
*
* @param string $str 被截取的字符串
* @param int $length 截取的长度
* @param bool $append 是否附加省略号
*
* @return string
*/
function cut_str( $string, $sublen, $start = 0, $code = 'UTF-8', $append=true )
{
    if($code == 'UTF-8')
    {
       $pa ="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
       preg_match_all($pa, $string, $t_string);        
       if(count($t_string[0]) - $start > $sublen ) 
       {
       	if( $append )
       		return join('', array_slice($t_string[0], $start, $sublen))."...";
       }
       return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';        for($i=0; $i<$strlen; $i++)
        {
            if($i>=$start && $i<($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        if(strlen($tmpstr)<$strlen ) 
        {
        	if( $append ) $tmpstr.= "...";		
        }
        return $tmpstr;
    }
}

