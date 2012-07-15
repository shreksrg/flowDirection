<?php if ( !defined('BASEPATH') ) exit('No direct script access allowed');
/**
* 会员站内邮件列表
* @category my_email
* @author taylorchen
* @version v1.0 $date 2011-11-25 21:02:20
* 
*/
class My_email extends CI_Controller {
	var $user_id;
	var $email_num;
	var $admin_email_num;
	var $send_email_num;
	var $data = array();
	/**
	 * 构造函数
	 * 
	 */
	public function My_email() 
	{
		parent::__construct();
		$this->user_id = $this->session->userdata( 'user_id' );
		$this->user_name = $this->session->userdata( 'user_name' );
		$this->load->model('common/m_common','',TRUE);
        $this->m_common->validateLogin();
        
		$condition = "(touserid={$this->user_id} and togarbage=0 and todelete=0)";
		
		$this->load->model( 'member/members_profile_model', '', TRUE ); 
		$this->load->model( 'member/members_email_model', '', TRUE ); 
		$this->load->model( 'friend/friend_model', '', TRUE ); 
		
		$this->members_email_model->userid = $this->user_id;
		$this->email_num = $this->members_email_model->get_condition_email_num( $condition );
		$this->admin_email_num = $this->members_email_model->get_admin_email_num();  
		//$this->send_email_num = count( $this->members_email_model->get_send_email() );  
		$condition2 = "(fromuserid={$this->user_id} and fromgarbage=0 and fromdelete=0 and draft=0)";
		$this->send_email_num = $this->members_email_model->get_condition_email_num( $condition2 );
		
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
		
	}
	
	/**
	 * 站内收信箱邮件列表显示
	 * 
	 */
	public function index()
	{
		$offset = $this->uri->segment(5) == '' ? 0 : $this->uri->segment(5);
		$order_by = $this->uri->segment(4) == '' ? 'dateline' : $this->uri->segment(4);
		$data = $this->data;
		
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/member/my_email/index/'.$order_by;
	    $config['total_rows'] = $this->email_num;
	    $config['per_page'] = '8';
	    $config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 5;
	    $config['full_tag_open'] = '<p>';
	    $config['full_tag_close'] = '</p>';
	    
	    $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="curpage">';
	    $config['cur_tag_close'] = '</li>';
	
	    $this->pagination->initialize( $config );
		$list = $this->members_email_model->get_receive_email( $config['per_page'], $offset, $order_by ); 
		
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$education_array = $this->config->item( 'education' );
		$member_profile_info = array();
		
		foreach ( $list as $k=>$v )
		{
			$member_profile_info = $this->members_profile_model->get_member_profile( $v['fromuserid'] );
			$avatar_img = "/data/avatar/".get_avatar( $v['fromuserid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$list[$k]['urls'] = $avatar_img;
			
			$list[$k]['send_username'] = $member_profile_info['nickname'] == '' ? $member_profile_info['username'] : $member_profile_info['nickname'];
			$city_info = $this->m_common->get_city_info( "cityID='".$member_profile_info['regcity']."'" );
			$list[$k]['city'] = $city_info;
			$list[$k]['gender'] = $member_profile_info['gender'];
			$list[$k]['work'] = $member_profile_info['work'];
			$list[$k]['age'] = $member_profile_info['birthyear'] == '' ? '' : ( date("Y") - $member_profile_info['birthyear'] );
			$list[$k]['education'] = $member_profile_info['education'] == '' ? '暂无学历' : $education_array[$member_profile_info['education']];
		}
		
		$data['page'] = $this->pagination->create_links();
		$data['emailList'] = $list;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;
		$data['send_email_num'] = $this->send_email_num;
		
		
		$this->parser->parse( 'member/mp_my_receive_email.tpl', $data );
	}
	
	/**
	 * 发送站内邮件
	 *
	 */
	function send_email()
	{
		if( !$this->input->post( 'act' ) )
		{
			$userid = $this->uri->segment(4);
			$data = $this->data;
			$data['email_num'] = $this->email_num;
			$data['admin_email_num'] = $this->admin_email_num;
			$data['send_email_num'] = $this->send_email_num;
			
			//找好友 暂时用 会员表信息
			$member_profile_info = $this->members_profile_model->get_member_profile( $userid );
			$avatar_img = "/data/avatar/".get_avatar( $userid, 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			
			$avatar_img2 = "/data/avatar/".get_avatar( $this->user_id, 'small' );
			$avatar_img2 = file_exists( '.'.$avatar_img2 ) ? $avatar_img2 : '/static/images/avatar/noavatar_big.gif';
			$member_profile_info['urls'] = $avatar_img;
			$member_profile_info['urls2'] = $avatar_img2;
			$city_info = $this->m_common->get_city_info( "cityID='".$member_profile_info['regcity']."'" );
			$member_profile_info['city'] = $city_info;
			$member_profile_info['age'] = $member_profile_info['birthyear'] == '' ? '' : ( date("Y") - $member_profile_info['birthyear'] );
			
			$data['member_profile_info'] = $member_profile_info;
			$this->parser->parse( 'member/mp_send_my_email.tpl', $data );
		} 
		else
		{
			$touserid_array = array();
			$touserid_array = $this->input->post( 'touserid' );
			//$subject = $this->input->post( 'SUBJECT' );
			$data['fromuserid'] = $this->user_id;
			$data['fromusername'] = $this->session->userdata( 'user_name' );
			$data['folder'] = "outbox";
			$data['NEW'] = 0;
			//$data['SUBJECT'] = $subject;
			$data['message'] = $this->input->post( 'message' );
			$data['dateline'] = time();
			
			
			//判断是否进草稿箱
			if( $this->input->post( 'draft' ) == "保存至草稿箱" )
			{
				if( $subject != '' and  $data['message'] != '' )
				{
					$data['draft'] = 1;
					$this->set_draft_email( $data );
				}
			}
			else 
			{
				if( $touserid_array == '' )
				{
					return showmessage( '请选择收件人', $url_forward = '/index.php/member/my_email/send_email', $ms = 1250 );
				}
				else 
				{	
		  			/*if( $_FILES['urls']['size'] > 0 ) 
		  			{
		  				$date = date( 'Ym', time() );
		  				$config['upload_path'] = APPPATH.'../www/data/attachment/'.$date."/";
		  				$config['allowed_types'] = 'gif|jpg|png|zip|doc|xls';
		  				$config['max_size'] = '100';
		  				
			  			$this->load->library( 'upload', $config );
			  			
						if ( !$this->upload->do_upload( 'urls' ) )
						{
							return showmessage( '附近发送失败', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
						}
						else 
						{
							$info = array();
							$info = $this->upload->data();
							$info_ = explode( '/', $info['full_path'] );
							$data['urls'] = $info_[count($info_)-2]."/".$info_[count($info_)-1];
							unset( $info );
						}
		  			}*/
		  			
		  			//加载表单认证类  后期制作
				
		  			foreach ( $touserid_array as $k=>$v )
		  			{
		  				$data['touserid'] = $touserid_array[$k];
						$email_id = $this->members_email_model->create( 'pms', $data );
		  			}
		  			
					if( $email_id )
					{
						return showmessage( '信息发送成功', $url_forward = '/index.php/member/my_email/get_send_email', $ms = 1250 );
					}
					else
					{
						return showmessage( '信息发送失败', $url_forward = '/index.php/member/my_email/get_send_email', $ms = 1250 );
					}
				}
			}	
		}
	}
	
	/**
	 * 回复站内邮件
	 *
	 */
	function send_back_email( $key, $email_id )
	{
		$data = $this->data;
		$email_id = intval( $email_id );
		if( !$email_id )
		{
			return showmessage( '您回复的邮件不存在', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
		}
		
		$member_acce_info = array();
		$result = $this->members_email_model->get_email_info( $email_id );  
		$member_acce_info = $this->members_profile_model->get_member_profile( $result['touserid'] );
		
		$times = date( 'Y-m-d', $result['dateline'] );
		$data['acce_username'] = $member_acce_info['nickname'] == '' ? $member_acce_info['username'] : $member_acce_info['nickname'];
		
		$SUBJECT = $result['SUBJECT'];
		$result['SUBJECT'] = "回复：".$SUBJECT;
		$result['message'] = "------------------ 原始站内信 ------------------
		发件人: \"{$result['fromusername']}\";
		发送时间: {$times}
		收件人: \"{$data['acce_username']}\";
		主题: {$SUBJECT}
		".$result['message']."
		------------------ 原始站内信 ------------------<br />";
		
		$data['email_info'] = $result;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;

		$this->parser->parse( 'member/send_back_email.tpl', $data );
	}
	
	function send_back_email_action()
	{
		$fromuserid = intval( $this->input->post( 'fromuserid' ) );
		$email_refuse_num = $this->members_email_model->get_email_refuse_num( $this->user_id, $fromuserid );
		if ( $email_refuse_num == 0 ) 
		{
			if( $fromuserid != 0 and $this->session->userdata( 'user_id' ) != '' )
			{
				$data['fromuserid'] = $this->user_id;
				$data['fromusername'] = $this->session->userdata( 'user_name' );
				$data['touserid'] = $fromuserid;
				$data['folder'] = "outbox";
		
				$data['NEW'] = 0;
				$data['SUBJECT'] = $this->input->post( 'SUBJECT' );
				$data['message'] = $this->input->post( 'message' )."<br />";
				$data['dateline'] = time();
				
				/*if( $_FILES['urls']['size'] > 0 ) 
	  			{
	  				$date = date( 'Ym', time() );
	  				$config['upload_path'] = APPPATH.'../www/data/attachment/'.$date."/";
	  				$config['allowed_types'] = 'gif|jpg|png|zip|doc|xls';
	  				$config['max_size'] = '100';
	  				
		  			$this->load->library( 'upload', $config );
		  			
					if ( !$this->upload->do_upload( 'urls' ) )
					{
						return showmessage( '附近发送失败', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
					}
					else 
					{
						$info = array();
						$info = $this->upload->data();
						$info_ = explode( '/', $info['full_path'] );
						$data['urls'] = $info_[count($info_)-2]."/".$info_[count($info_)-1];
						unset( $info );
					}
	  			}*/
				
				//加载表单认证类  后期制作
		
				$email_id = $this->members_email_model->create( 'pms', $data );
		
				if( $email_id )
				{
					return showmessage( '信息发送成功', $url_forward = '/index.php/member/my_email/get_send_email', $ms = 1250 );
				}
				else
				{
					return showmessage( '信息发送失败', $url_forward = '/index.php/member/my_email/get_send_email', $ms = 1250 );
				}
			}
			else 
			{
				return showmessage( '信息发送失败', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
			}
		}
		else 
		{
			return showmessage( '对不起，您已被对方阻止发信！', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
		}
	}
	
	/**
	 * 显示站内信内容
	 * 
	 */
	function show_email( $key, $email_id )
	{
		if( $email_id > 0 )
		{
			$data = $this->data;
			$this->config->load( 'member_profile_config', FALSE, TRUE ); 
			$education_array = $this->config->item( 'education' );
			
			$member_send_info = array();
			$member_acce_info = array();
			$email_refuse_num = '';
			$result = $this->members_email_model->get_email_info( $email_id );  
			$member_send_info = $this->members_profile_model->get_member_profile( $result['fromuserid'] );
			$member_acce_info = $this->members_profile_model->get_member_profile( $result['touserid'] );
			$email_refuse_num = $this->members_email_model->get_email_refuse_num( $result['fromuserid'], $this->user_id );
			
			$avatar_img = "/data/avatar/".get_avatar( $result['fromuserid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$data['urls'] = $avatar_img;
			
			$avatar_img_2 = "/data/avatar/".get_avatar( $result['touserid'], 'small' );
			$avatar_img_2 = file_exists( '.'.$avatar_img_2 ) ? $avatar_img_2 : '/static/images/avatar/noavatar_big.gif';
			$data['urls_2'] = $avatar_img_2;
			
			$data['send_username'] = $member_send_info['nickname'] == '' ? $member_send_info['username'] : $member_send_info['nickname'];
			$data['email_info'] = $result;
			$data['acce_username'] = $member_acce_info['nickname'] == '' ? $member_acce_info['username'] : $member_acce_info['nickname'];
			$member_send_info['age'] = date( 'Y', time() ) - $member_send_info['birthyear'];
			$member_send_info['education'] = $member_send_info['education'] == '' ? '暂无学历' : $education_array[$member_send_info['education']];
			$city_info = $this->m_common->get_city_info( "cityID='".$member_send_info['regcity']."'" );
			$member_send_info['city'] = $city_info;
			
			$data['email_num'] = $this->email_num;
			$data['admin_email_num'] = $this->admin_email_num;
			$data['send_email_num'] = $this->send_email_num;
			$data['member_send_info'] = $member_send_info;
			$data['email_refuse'] = $email_refuse_num == 1 ? 1 : 0;
			
			if( $result['touserid'] == $this->user_id )
			{
				$data['backmess'] = 1;   							//有回信的权限
				$this->members_email_model->set_email_read( $email_id );
			}
			
			$this->parser->parse( 'member/mp_my_email_show.tpl', $data );
			
		}
		else
		{
			return showmessage( '不存在这条站内信', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
		}
	}
	
	/**
	 * 获取会员垃圾箱邮件列表
	 * 
	 */
	function get_garbage_email()
	{
		$data = $this->data;
		$list = $this->members_email_model->get_garbage_email(); 
		 
		$data['emailList'] = $list;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;
		
		$this->parser->parse( 'member/my_garbage_email.tpl', $data );
	}
	
	/**
	 * 获取会员发件箱邮件列表
	 * 
	 */
	function get_send_email()
	{
		$offset = $this->uri->segment(5) == '' ? 0 : $this->uri->segment(5);
		$order_by = $this->uri->segment(4) == '' ? 'dateline' : $this->uri->segment(4);
		$data = $this->data;
		
		$condition = "(fromuserid={$this->user_id} and fromgarbage=0 and fromdelete=0 and draft=0)";
		$this->load->library( 'pagination' );
	    $config['base_url'] = '/index.php/member/my_email/get_send_email/'.$order_by;
	    $config['total_rows'] = $this->send_email_num;
	    
	    $config['per_page'] = '8';
	    $config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['uri_segment'] = 5;
		$config['num_links'] = 2;
	    $config['full_tag_open'] = '<p>';
	    $config['full_tag_close'] = '</p>';
	   
	    $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="curpage">';
	    $config['cur_tag_close'] = '</li>';
	
	    $this->pagination->initialize($config);
		$list = $this->members_email_model->get_send_email( $config['per_page'], $offset, $order_by ); 
		
		$this->config->load( 'member_profile_config', FALSE, TRUE ); 
		$education_array = $this->config->item( 'education' );
		$member_profile_info = array();
		
		foreach ( $list as $k=>$v )
		{
			$touserid = $list[$k]['touserid'];
			$member_profile_info = $this->members_profile_model->get_member_profile( $touserid );
			
			$avatar_img = "/data/avatar/".get_avatar( $touserid, 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$list[$k]['urls'] = $avatar_img;
			
			$list[$k]['send_username'] = $member_profile_info['username'];
			$city_info = $this->m_common->get_city_info( "cityID='".$member_profile_info['regcity']."'" );
			$list[$k]['city'] = $city_info;
			$list[$k]['gender'] = $member_profile_info['gender'];
			$list[$k]['work'] = $member_profile_info['work'];
			$list[$k]['age'] = $member_profile_info['birthyear'] == '' ? '' : ( date("Y") - $member_profile_info['birthyear'] );
			$list[$k]['education'] = $member_profile_info['education'] == '' ? '暂无学历' : $education_array[$member_profile_info['education']];
		}
		
		$data['page'] = $this->pagination->create_links();
		//echo $this->pagination->create_links();exit;
		$data['emailList'] = $list;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;
		$data['send_email_num'] = $this->send_email_num;
		$data['send_email_num'] = $this->send_email_num;
		
		$this->parser->parse( 'member/mp_my_send_email.tpl', $data );
	}
	
	/**
	 * 获取会员草稿箱邮件列表
	 * 
	 */
	function get_draft_email()
	{
		$data = $this->data;
		$list = $this->members_email_model->get_draft_email();  
		$data['emailList'] = $list;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;
		
		$this->parser->parse( 'member/my_draft_email.tpl', $data );
	}
	
	/**
	 * 设置会员邮件为草稿箱邮件  
	 * @param $data  信件内容
	 * 
	 */
	function set_draft_email( $data )
	{
		$result = $this->members_email_model->set_draft_email( 'pms', $data );  
		if( $result )
		{
			return showmessage( '存入草稿箱成功', $url_forward = '/index.php/member/my_email/get_draft_email', $ms = 1250 );
		} 
		else 
		{
			return showmessage( '存入草稿箱失败', $url_forward = '/index.php/member/my_email/get_draft_email', $ms = 1250 );
		}
	}
	
	/**
	 * 阻止发信人发信
	 * @throws ajax
	 * 
	 */
	function set_refuse_email()
	{
		$status = intval( $this->uri->segment(4) );                     //1为进行阻止，2为解除阻止
		$touserid = intval( $this->uri->segment(5) );                 //被阻止的会员id
		$userid = $this->user_id;
		
		if( $status == 1 )
		{
			$result = $this->members_email_model->set_email_refuse( 1, $touserid );  
			if( $result )
			{
				$data['message'] = "阻止发信成功";
			}
			else 
			{
				$data['message'] = "阻止发信失败";
			}
		}
		
		if ( $status == 2 )
		{
			$result = $this->members_email_model->set_email_refuse( 2, $touserid );  
			if( $result )
			{
				$data['message'] = "解除阻止发信成功";
			}
			else 
			{
				$data['message'] = "解除阻止发信失败";
			}	
		}
        
		$this->parser->parse( 'common/mp_message.tpl', $data );
	}
	
	
	/**
	 * 删除会员邮件进垃圾箱
	 * 
	 * @param  $type 1收件箱邮件 2发件箱邮件
	 * 
	 */
	function set_garbage_email( $type, $email_id )
	{
		$type = intval( $type );
		if( $email_id == '' )
		{
			return showmessage( '请选择要删除的站内信', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
		}
		
		$email_id = explode( '-', $email_id );
		if( $type == 1 ) 
		{
			$result = $this->members_email_model->set_receive_garbage_email( $email_id );  
			$localfile = "index";
		}
			
		if( $type == 2 ) 
		{
			$result = $this->members_email_model->set_send_garbage_email( $email_id );  
			$localfile = "get_send_email";
		}
		
		if( $result )
		{
			return showmessage( '删除成功', $url_forward = '/index.php/member/my_email/'.$localfile, $ms = 1250 );
		} 
		else 
		{
			return showmessage( '删除失败', $url_forward = '/index.php/member/my_email/'.$localfile, $ms = 1250 );
		}
	}
	
	/**
	 * 彻底删除会员邮件
	 * 
	 * @param  $type 1草稿箱邮件 2垃圾箱邮件 3管理员的系统信
	 * 
	 */
	function delete_email()
	{
		$type = intval( $this->input->post( 'type' ) );
		$email_id = $this->input->post( 'mailOpt' );
		
		
		if( $email_id == '' )
		{
			return showmessage( '请选择要删除的站内信', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
		}
		
		if( $type == 1 ) 
		{
			$result = $this->members_email_model->delete_email( $email_id );  
			$localfile = "get_draft_email";
		}
			
		if( $type == 2 ) 
		{
			foreach ( $email_id as $key=>$v ) {
				$email_info = $this->members_email_model->get_email_info( $v );
				if( $email_info['fromuserid'] == $this->user_id ) 
				{
					if( $email_info['todelete'] == 1 )
					{
						$result = $this->members_email_model->delete_email( $v );
					}
					else 
					{
						$result = $this->members_email_model->set_send_email_detele( $v );
					}
					$localfile = "get_send_email";
				}
				
				if( $email_info['touserid'] == $this->user_id ) 
				{
					if( $email_info['fromdelete'] == 1 )
					{
						$result = $this->members_email_model->delete_email( $v );
					}
					else 
					{
						$result = $this->members_email_model->set_receive_email_detele( $v );
					}
					$localfile = "index";
				}
			}
		}
		
		if( $type == 3 ) 
		{
			$result = $this->members_email_model->delete_email( $email_id );  
			$localfile = "get_admin_send_email";
		}
			
		if( $result )
		{
			return showmessage( '删除成功', $url_forward = '/index.php/member/my_email/'.$localfile, $ms = 1250 );
		} 
		else 
		{
			return showmessage( '删除失败', $url_forward = '/index.php/member/my_email/'.$localfile, $ms = 1250 );
		}
	}
	
	/**
	 * 获取管理员通知列表
	 * 
	 */
	function get_admin_send_email()
	{
		$data = $this->data;
		$list = $this->members_email_model->get_admin_send_email();  
		$avatar_img = "/data/avatar/".get_avatar( $this->user_id, 'small' );
		$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
		
		$data['emailList'] = $list;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;
		$data['send_email_num'] = $this->send_email_num;
		$data['urls'] = $avatar_img;
		$data['userid'] = $this->user_id;
		
		$this->parser->parse( 'member/mp_admin_send_email.tpl', $data );
	}
	
	/**
	 * 标记邮件已读
	 * 
	 */
	function set_email_read( $type, $email_id )
	{
		if( $email_id == '' )
		{
			return showmessage( '请选择要标记的站内信', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
		}
		else 
		{
			if( $type == 1 ) 
			{
				$localfile = "index";
			}
				
			if( $type == 2 ) 
			{
				$localfile = "get_admin_send_email";
			}
			
			$email_id = explode( '-', $email_id );
			$result = $this->members_email_model->set_email_read( $email_id );
		
			if( $result )
			{
				return showmessage( '标记成功', $url_forward = '/index.php/member/my_email/'.$localfile, $ms = 1250 );
			} 
			else 
			{
				return showmessage( '标记失败', $url_forward = '/index.php/member/my_email/'.$localfile, $ms = 1250 );
			}
		}
	}
	
	/**
	 * 获取收件箱未读邮件
	 * 
	 */
	function get_email_read()
	{
		$data = $this->data;
		$list = $this->members_email_model->get_email_read();  
		
		$member_profile_info = array();
		foreach ( $list as $k=>$v )
		{
			$member_profile_info = $this->members_profile_model->get_member_profile( $v['fromuserid'] );
			$avatar_img = "/data/avatar/".get_avatar( $v['fromuserid'], 'big' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$list[$k]['urls'] = $avatar_img;
			
			$list[$k]['send_username'] = $member_profile_info['nickname'] == '' ? $member_profile_info['username'] : $member_profile_info['nickname'];
			$list[$k]['regprovince'] = $member_profile_info['regprovince'] ;
			$list[$k]['age'] = $member_profile_info['birthyear'] == '' ? '' : ( date("Y") - $member_profile_info['birthyear'] )."歲";
		}
		
		$data['emailList'] = $list;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;
		
		$this->parser->parse( 'member/my_receive_email.tpl', $data );
	}
	
	/**
	 * 获取管理員通知未读邮件
	 * 
	 */
	function get_admin_email_read()
	{
		$data = $this->data;
		$list = $this->members_email_model->get_admin_email_read();  
		$data['emailList'] = $list;
		$data['email_num'] = $this->email_num;
		$data['admin_email_num'] = $this->admin_email_num;
		
		$this->parser->parse( 'member/admin_send_email.tpl', $data );
	}
	
	/**
	 * 获取邮件附件
	 * 
	 */
	function get_email_attach( $key, $email_id )
	{
		if( $email_id == 0 ) exit;
		$result = $this->members_email_model->get_email_info( $email_id ); 
		if( empty( $result ) ) exit;
			 
		header( "content-type:text/html; charset=utf-8" );
		$file_name = $result['urls']; //服务器的真实文件名
		$file_dir = APPPATH.'../www/data/attachment/';

		header('Content-Description: File Transfer');     
		header('Content-Type: application/octet-stream');     
		header('Content-Disposition: attachment; filename='.basename( $file_name ));     
		header('Content-Transfer-Encoding: binary');     
		header('Expires: 0');     
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');     
		header('Pragma: public');     
		header('Content-Length: ' . filesize( $file_dir.$file_name ));     
		
		readfile( $file_dir.$file_name );     
		exit; 
	}
	
	function show_send_email( $key, $email_id )
	{
		if( $email_id > 0 )
		{
			$data = $this->data;
			$this->config->load( 'member_profile_config', FALSE, TRUE ); 
			$education_array = $this->config->item( 'education' );
			
			$member_send_info = array();
			$member_acce_info = array();
			$result = $this->members_email_model->get_email_info( $email_id );  
			$member_send_info = $this->members_profile_model->get_member_profile( $result['fromuserid'] );
			$member_acce_info = $this->members_profile_model->get_member_profile( $result['touserid'] );
			$email_refuse_num = $this->members_email_model->get_email_refuse_num( $result['touserid'], $this->user_id );
			
			$avatar_img = "/data/avatar/".get_avatar( $result['fromuserid'], 'small' );
			$avatar_img = file_exists( '.'.$avatar_img ) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
			$data['urls'] = $avatar_img;
			
			$avatar_img_2 = "/data/avatar/".get_avatar( $result['touserid'], 'small' );
			$avatar_img_2 = file_exists( '.'.$avatar_img_2 ) ? $avatar_img_2 : '/static/images/avatar/noavatar_big.gif';
			$data['urls_2'] = $avatar_img_2;
			$data['send_username'] = $member_send_info['nickname'] == '' ? $member_send_info['username'] : $member_send_info['nickname'];
			$data['email_info'] = $result;
			$data['acce_username'] = $member_acce_info['nickname'] == '' ? $member_acce_info['username'] : $member_acce_info['nickname'];
			$member_acce_info['age'] = date( 'Y', time() ) - $member_acce_info['birthyear'];
			$member_acce_info['education'] = $member_acce_info['education'] == '' ? '暂无学历' : $education_array[$member_acce_info['education']];
			
			$data['email_num'] = $this->email_num;
			$data['admin_email_num'] = $this->admin_email_num;
			$data['send_email_num'] = $this->send_email_num;
			$data['member_acce_info'] = $member_acce_info;
			$data['email_refuse'] = $email_refuse_num == 1 ? 1 : 0;
			
			if( $result['touserid'] == $this->user_id )
			{
				$data['backmess'] = 1;   							//有回信的权限
				$this->members_email_model->set_email_read( $email_id );
			}
			
			$this->parser->parse( 'member/mp_my_send_email_show.tpl', $data );
			
		}
		else
		{
			return showmessage( '不存在这条站内信', $url_forward = '/index.php/member/my_email/index', $ms = 1250 );
		}
	}
}

/* End of file my_email.php */
/* Location: ./application/controllers/my_email.php */