<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 好友管理-控制器文件
 * 
 */
class index extends CI_Controller {
	var $data = array();
	var $user_id;
	var $email_num;
	var $admin_email_num;
	var $friend_num;
	var $user_name;
	
    public function __construct()
    {	
    	parent::__construct();  
        $this->data['years'] = date('Y',time());    
        $this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model('common/m_common','',TRUE);
       // $this->m_common->validateLogin();
        
		$this->load->model( 'member/members_email_model', '', TRUE ); 
		$this->load->model( 'friend/friend_model', '', TRUE ); 
		$this->members_email_model->userid = $this->user_id;
		$this->friend_model->user_id = $this->user_id;
		
		$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'small' );
		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
		$this->data['commen_info']['username'] = $this->user_name;
		$this->data['commen_info']['userid'] = $this->user_id;
		$this->data['commen_info']['avatar_img'] = $avatar_img;
		$this->data['commen_info']['admin_email_num'] = $this->members_email_model->get_admin_email_num();  
		$this->data['commen_info']['all_email_num'] = $this->members_email_model->get_email_num();
		
		$condition2 = "(userid={$this->user_id} and STATUS=1)";
		$this->friend_num = $this->friend_model->get_condition_friend_num( 'friend', $condition2 );
		$this->data['commen_info']['friend_num'] = $this->friend_num;
		
		$friends_attention_list = array();
		$friends_attention_list = $this->friend_model->get_friends_attention_list( $this->user_id );
		foreach ( $friends_attention_list as $kt=>$vt )
		{
			$avatar_img_s = '';
			$avatar_img_s = "/data/avatar/".get_avatar( $friends_attention_list[$kt]['fuserid'], 'small' );
			$avatar_img_s = file_exists( '.'.$avatar_img_s ) ? $avatar_img_s : '/static/images/avatar/noavatar_big.gif';
			$friends_attention_list[$kt]['avatar_img'] = $avatar_img_s;
		}
		$this->data['commen_info']['friend_attention_list'] = $friends_attention_list;
           
    }   
    
   /*
    * 好友列表
    */ 
   /*public function index()
   {   
   	     $this->data['title'] = "我的朋友";
   	     switch($this->uri->segment(4))
   	     {
   	     	case 1:
   	     		   $order = ' b.nickname ASC ';
   	     		   break;
   	     	case 2:
   	     		   $order = ' b.regprovince DESC ';
   	     		   break;
   	     	case 3:
   	     		   $order = ' b.gender ASC ';		   		   
   	     		   break;
   	     	case 4:
   	     		   $order = ' b.birthyear DESC ';
   	     		   break;
   	     	case 5:
   	     		  $status = ' a.status = 2';
   	     		  $order = ' a.dateline DESC ';
   	     		  
   	     		  $this->data['title'] = "我关注的";
   	     		  break;
   	     	case 6:
   	     		  $status = ' a.status = 3';
   	     		  $order = ' a.dateline DESC ';
   	              if($account = $this->input->post('account'))
   	     		  {
                      $status = " a.status = 3 AND a.fusername = '$account' ";   	     		  
   	     		  }
   	     		  $this->data['title'] = "黑名单";
   	     		  break;		  		   
   	     	default: 
   	     		   $order = ' a.dateline DESC ';
   	     		   $status = ' a.status = 1';
   	     		   break;	   	     
   	     
   	     }
   	     
         $this->data['friend_list'] = $this->friend->get_friends_list($this->user_id, $order, $status);
         
         $this->parser->parse('member/myfriend.tpl', $this->data);
   }*/
   
   /**
    * 我的好友列表
    */
	public function index()
	{
   		$this->data['title'] = "我的好友";
   		$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
		$data = $this->data;
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/friend/index/index/';
	    $config['total_rows'] = $this->friend_num;
	    $config['per_page'] = '6';
	    $config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 4;
	    $config['full_tag_open'] = '<p>';
	    $config['full_tag_close'] = '</p>';
	    $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="curpage">';
	    $config['cur_tag_close'] = '</li>';
	
	    $this->pagination->initialize( $config );
	    $friend_list = $this->friend_model->get_friends_list( $config['per_page'], $offset );
	    foreach ( $friend_list as $k=>$v )
	    {
	    	$avatar_img = "/data/avatar/".get_avatar( $friend_list[$k]['fusuerid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$friend_list[$k]['avatar_img'] = $avatar_img;
			
			$city_info = $this->m_common->get_city_info( "cityID='".$friend_list[$k]['regcity']."'" );
			$friend_list[$k]['city'] = $city_info;
			$friend_list[$k]['age'] = $friend_list[$k]['birthyear'] == '' ? '' : ( date("Y") - $friend_list[$k]['birthyear'] );
			$friend_list[$k]['age'] = $friend_list[$k]['birthyear'] == '' ? '' : ( date("Y") - $friend_list[$k]['birthyear'] );
			
			$friend_list[$k]['cut_description'] = cut_str( $friend_list[$k]['description'], 70 );
	    }
	    
	    $this->data['page'] = $this->pagination->create_links();
   		$this->data['friend_list'] = $friend_list;
        $this->parser->parse( 'friend/mp_myfriend.tpl', $this->data );
   	}
   
   /**
    * 我关注的好友列表
    *
    */
	public function attention()
   	{
       	$this->data['title'] = "我的关注";
       	$offset = $this->uri->segment(4) == '' ? 0 : $this->uri->segment(4);
		$data = $this->data;
		
		$condition = "(userid={$this->user_id} )";
		$attention_num = $this->friend_model->get_condition_friend_num( 'friend_attention', $condition );
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/friend/index/attention/';
	    $config['total_rows'] = $attention_num;
	    $config['per_page'] = '6';
	    $config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 4;
	    $config['full_tag_open'] = '<p>';
	    $config['full_tag_close'] = '</p>';
	    $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="curpage">';
	    $config['cur_tag_close'] = '</li>';
	
	    $this->pagination->initialize( $config );
	    $attention_list = $this->friend_model->get_attention_list( $config['per_page'], $offset );
	    foreach ( $attention_list as $k=>$v )
	    {
	    	$avatar_img = "/data/avatar/".get_avatar( $attention_list[$k]['fuserid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$attention_list[$k]['avatar_img'] = $avatar_img;
			$city_info = $this->m_common->get_city_info( "cityID='".$attention_list[$k]['regcity']."'" );
			$attention_list[$k]['city'] = $city_info;
			$attention_list[$k]['age'] = $attention_list[$k]['birthyear'] == '' ? '' : ( date("Y") - $attention_list[$k]['birthyear'] );
			
			$attention_list[$k]['cut_description'] = cut_str( $attention_list[$k]['description'], 70 );
			
	    }
	    
	    $this->data['page'] = $this->pagination->create_links();
   		$this->data['friend_list'] = $attention_list;
   		$this->parser->parse( 'friend/mp_attention.tpl', $this->data );
   	}
   
   	public function detail()
   	{
       	if($userid = $this->uri->segment(4))
       	{
           	$this->data = $this->friend_model->get_friends_detail($userid);
       	} 
      	$this->parser->parse('member/member_info.tpl', $this->data);
   	}
   
    public function delete()
    {
    	$keyId = $this->input->post('keyId');
    	$friendIds  = $this->input->post('friendId');
        if(!empty( $friendIds ) )
        {  
            foreach($friendIds as $values)
            {     
                 $this->friend_model->delete_friends($values, $this->user_id, $keyId);
            }
        }
        
       	if( $keyId == 0 ) $url_forward = '/index.php/friend/index';
       	if( $keyId == 1 ) $url_forward = '/index.php/friend/index/attention';
       	return showmessage( '删除成功', $url_forward, $ms = 1250 );
    }
    
    public function friend_relation()
    {
    	$this->load->model( 'member/members_model', '', TRUE ); 
        $friendId = intval( $this->uri->segment(4) );
        $member_info = $this->members_model->get_member( $friendId );
        $friendName = $member_info['username'];
        
        $status = 1;
        if (  $this->user_id != '' )
        {
        	if ( $this->user_id == $friendId ) 
        	{
        		$data['message'] = "您不能加自己为好友";
        	}
        	else {
        	 $result = $this->friend_model->relation_deal( $this->user_id, $friendId, $friendName, $status );
        	 if ( $result ) {
		        $data['message'] = "加为好友成功";
		     }
		     else 
		     {
		       	$data['message'] = "已经加为好友";
		     }
        	}
        }
        else 
        {
        	$data['message'] = "请先登录网站";
        }
        
        $this->parser->parse( 'common/mp_message.tpl', $data );
        
    }
    
    public function friend_attention()
    {
    	$this->load->model( 'member/members_model', '', TRUE ); 
        $friendId = intval( $this->uri->segment(4) );
        $member_info = $this->members_model->get_member( $friendId );
        $friendName = $member_info['username'];
        $data['message'] = $friendName;
        
        if ( !$friendId ) 
        {
        	$data['message'] = "先选择加为关注的好友";
        }
        else 
        { 
	        if ( !$this->user_id ) {
	        	$data['message'] = "请先登录网站";
	        }
	        else 
	        {
	        	if( $this->user_id == $friendId )
	        	{
	        		$data['message'] = "您不能关注自己";
	        	}
	        	else 
	        	{
	        		$result = $this->friend_model->attention_deal( $this->user_id, $friendId, $friendName );
			        if ( $result ) {
			        	$data['message'] = "加入关注成功";
			        }
			        else 
			        {
			        	$data['message'] = "已经加为好友关注";
			        }
	        	}
	        }
        }
        
        $this->parser->parse( 'common/mp_message.tpl', $data );
    }
}    

