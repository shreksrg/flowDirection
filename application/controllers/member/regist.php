<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员注册
* @category regist
* @author taylorchen
* @version v1.0 $date 2011-11-17 14:02:20
* 
*/
class Regist extends CI_Controller {
	/**
	 * 构造函数
	 * 
	 */
	public function Regist() 
	{
		parent::__construct();
	}
	
	/**
	 * 注册页面显示
	 * 
	 */
	public function index()
	{
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$career_array = $this->config->item( 'career' );
		$education_array = $this->config->item( 'education' );
		
		$education_array_select = array();
		foreach ( $education_array as $k=>$v )
		{
			$education_array_select[$k]['education'] = $v;
		}
		
		$career_select = array();
		foreach ( $career_array as $k=>$v )
		{
			$career_select[$k]['career'] = $v;
		}
		
		$y = date( 'Y', time() );
		$year = '';
		for( $i = $y - 99; $i < $y - 15; $i++ )
		{
			$year .= "<option value=\"{$i}\">{$i}年</option>";
		}
		
		$data['year'] = $year;
		$data['career'] = $career_select;
		$data['education'] = $education_array_select;
		$this->parser->parse( 'member/mp_register.tpl', $data );
		//$this->parser->parse( 'member/regist.tpl' );
	}
	
	/**
	 * 保存注册信息
	 * 
	 */
	public function save() 
	{
		//if( !$this->check_yzm() ) return showmessage( '验证码错误', $url_forward = '/index.php', $ms = 1250 );
		if( !$this->check_r_password() ) return showmessage( '确认密码错误', $url_forward = '/index.php', $ms = 1250 );
		
		$username = $this->input->post( 'username' );
		$password = $this->input->post( 'password' );
		$email = $this->input->post( 'email' );
		
		if( $username == '' or $password == '' or $email == '' )
		{
			return showmessage( '请正确填写注册信息', $url_forward = '/index.php/member/login/index', $ms = 1250 );
		} 
		
		$regdate = time();
		$regip = $this->get_ip();
		
		$regprovince = $this->input->post( 'regprovince' );
		$regcity = $this->input->post( 'regcity' );
		
		
		$birthday = $this->input->post( 'birthday' );
		$birthday_array = explode( '-', $birthday );
		$birthyear = $birthday_array[0];
		$birthmonth = $birthday_array[1];
		$birthday = $birthday_array[2];
		
		$gender = $this->input->post( 'gender' );
		$work = $this->input->post( 'work' );
		$edu = $this->input->post( 'edu' );
		
		//加载表单认证类  后期制作
		
		$this->load->model( 'member/members_model', '', TRUE );    
		$this->members_model->username = $username;
		$this->members_model->password = $password;
		$this->members_model->email = $email;
		$this->members_model->regip = $regip;
		$this->members_model->regdate = $regdate;
		
		$this->members_model->create();
        $userid = $this->db->insert_id();
        
        $this->load->model( 'member/members_profile_model', '', TRUE );
		$this->members_profile_model->userid = $userid;
		$this->members_profile_model->username = $username;
		$this->members_profile_model->gender = $gender;
		
		$this->members_profile_model->regprovince = $regprovince;
		$this->members_profile_model->regcity = $regcity;
		$this->members_profile_model->education = $edu;
		$this->members_profile_model->work = $work;
		
		$this->members_profile_model->birthyear = $birthyear;
		$this->members_profile_model->birthmonth = $birthmonth;
		$this->members_profile_model->birthday = $birthday;
		$this->members_profile_model->updated_at = $regdate;
		
		$this->members_profile_model->create();
		
		/*$member_info = array(
                   'user_name' => $username,
				   'user_id' => $userid,
                   'user_in' => TRUE,
                   'user_last_login' => time()
               );
               
        $this->session->set_userdata( $member_info );*/
		
        //为自己建立一张名义
        $this->load->model( 'member/members_card_model', '', TRUE ); 
        $data['gid'] = 1;
		$data['userid'] = $userid;
		$data['username'] = $username;
		$data['ouserid'] = $userid;
		$data['ousername'] = $username;
		$data['email'] = $email;
		$this->members_card_model->create( 'vcard', $data );
        
		return showmessage( '注册成功', $url_forward = '/index.php', $ms = 1250 );
	}
	
	/**
	 * 检查注册验证码是否准确
	 * 
	 * @return bool
	 * 
	 */
	public function check_yzm() 
	{
		$code = $this->session->userdata( 'word' );
        $verifier = $this->input->post('verifier');
        if ( $code != $verifier )
        {
			return false;
		}
		else 
		{
			$this->session->sess_destroy( 'word' );
			return true;
		}
	}
	
	/**
	 * 检查两次密码是否准确
	 * 
	 * 
	 * @return bool
	 * 
	 */
	public function check_r_password() 
	{
        if ( $this->input->post('password') != $this->input->post('again_password') )
        {
			return false;
		}
		else 
		{
			return true;
		}
	}
	
	/**
	 * 验证账户名是否已存在
	 * @throws ajax
	 * 
	 * @return bool
	 * 
	 */
	public function check_name() 
	{
	    $name = $_POST['username'];
		$this->load->model( 'member/members_model', '', TRUE );
		$msg = 1;
		if ( $name )
		{
		    if ( $this->members_model->check_name( $name ) )
		    {
				$msg = 0;
			}				
		}
        
		echo json_encode( array('state'=>$msg ) );
	}
	
	/**
	 * 验证邮箱是否存在
	 * @throws ajax
	 * 
	 * @return bool
	 * 
	 */
	public function check_email()
	{
		$email = $_POST['email'];
		$this->load->model( 'member/members_model', '', TRUE );
		$msg = 1;
		if ( $email )
		{
		    if ( $this->members_model->check_email( $email ) )
		    {
				$msg = 0;
			}				
		}
        
		echo json_encode( array('state'=>$msg ) );
	}
	
	/**
	 * 检查注册验证码是否准确
	 * @throws ajax
	 * 
	 * @return bool
	 * 
	 */
	public function check_verifier()
	{
		$verifier = $_POST['verifier'];
		$code = $this->session->userdata( 'word' );
		$msg = 0;
		if ( $verifier != $code )
		{
			$msg = 1;				
		}
        
		echo json_encode( $msg );
	}
	
	/**
	 * 生成注册验证码
	 * @return $code
	 * 
	 */
	public function creat_yzm()
	{
		$this->load->helper( 'captcha' );
		$vals = array(
		    'word' => $this->get_chrNum(5),
		    'img_path' => APPPATH.'../www/data/capthca/',
		    'img_url' => '/data/capthca/',
		    'font_path' => APPPATH .'../system/fonts/texb.ttf',
		    'img_width' => '120',
		    'img_height' => '30',
		    'expiration' => 30
		);
		
		$cap = create_captcha( $vals );
		$data['word'] = $cap['word'];
		$this->session->set_userdata( $data );
		echo json_encode( $cap['image'] );
	}
	
	/**
	 * 获取注册IP地址
	 * @param null
	 * @return char
	 * 
	 */
	public function get_ip()
	{
		$this->load->helper( 'member' );
		return getIP();
	}
	
	/**
	 * 获取随机码
	 * @param null
	 * @return char
	 * 
	 */
	public function get_chrNum( $length )
	{
		$strings = Array('0','1','2','3','4','5','6','7','a','b','c','d','e','f','h','i','j','k','m','n','p','r','s','t','u','v','w','x','y');
		$chrNum = "";
		$count = count( $strings );
		for ( $i = 1; $i <= $length; $i++ ) { //循环随机取字符生成字符串
			$chrNum .= $strings[rand( 0, $count-1 )]; 
		}
		
		return $chrNum;
	}
}

/* End of file regist.php */
/* Location: ./application/controllers/regist.php */