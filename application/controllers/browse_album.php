<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 网站一级栏目入口
 * @author floy
 *
 */
class Browse_album extends CI_Controller {
	/**
	 * 
	 * 相册首页入口
	 */
	public function index()
	{
		$data = array(
			'title' => '相册',
		);
		$this->parser->parse('index_album',$data);
		
	}

}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */