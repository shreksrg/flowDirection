<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');

class Mapsign extends CI_Controller {
	/**
	 * 构造函数
	 * 
	 */
	public function __construct() 
	{
		parent::__construct();
	}
	
	/**
	 * 活动邀请
	 * 
	 */
	public function index()
	{
		$this->load->model( 'activity/activity_model', '', TRUE ); 
		$this->load->model('common/m_common','',TRUE);
		$this->load->model( 'blog/blog_model', '', TRUE ); 
		
		$tp1 = $this->uri->segment(4);   //是新建还是编辑 0为新建 大于0为编辑的数据id
		$tp2 = $this->uri->segment(5);   //是活动还是日志 0为活动1为日志
		$data = array();
		$info = array();
		
		if( $tp2 == 0 )
		{
			if ( $tp1 > 0 ) 
			{
				$info = $this->activity_model->get_activity_info( $tp1 );
				$city_info = $this->m_common->get_city_info( "cityID='".$info['map_c']."'" );
				$provice_info = $this->m_common->get_province_info( "provinceID='".$info['map_p']."'" );
		        $info['city'] = $city_info;
		        $info['provice'] = $provice_info;
			}
			else 
			{
				$info['provice']['provinceID'] = 320000;
				$info['provice']['province'] = "江苏";
				$info['city']['cityID'] = 320500;
				$info['city']['city'] = "苏州";
			}
			
		}
		
		if( $tp2 == 1 )
		{
			if ( $tp1 > 0 ) 
			{
				$info = $this->blog_model->get_Blogs( $tp1, false );
				$city_info = $this->m_common->get_city_info( "cityID='".$info['city']."'" );
				$provice_info = $this->m_common->get_province_info( "provinceID='".$info['province']."'" );
		        $info['city'] = $city_info;
		        $info['provice'] = $provice_info;
				
			}
			else 
			{
				$info['provice']['provinceID'] = 320000;
				$info['provice']['province'] = "江苏";
				$info['city']['cityID'] = 320500;
				$info['city']['city'] = "苏州";
			}
			
		}
		//print_r($info);exit;
		$data['info'] = $info;
		$data['backAddr'] = $tp2;
		$this->parser->parse( 'activity/mapsign.tpl', $data );
	}
}

/* End of file index.php */
/* Location: ./application/controllers/activity/index.php */