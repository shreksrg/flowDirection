<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 会员积分模型
 * @author floy
 * @date 2011-11-21 
 *
 */
class Credit extends CI_Model{
	var $rules;
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->set_rule();
    }
    
    function update_credit($act,$userid){
    	if(!isset($this->rules[$act])) return false;//未配置的积分规则
    	
    	$this->load->model('member/members_model',m);
    	$user = $this->m->get_member($userid);
    	
    	//更新用户积分
    	$credit = $this->rules[$act]['credit'];
    	$this->db->set('credits',"credits + $credit");
    	$this->db->where('userid',$userid);
    	$this->db->update('members',array('credits'=>$credit+$user['credits']));
    	
    	//添加积分记录
    	$setarr = array(
    		'userid'	=> $userid,
    		'total'		=> $user['credits'],
    		'credit'	=> $credit,
    		'dateline'	=> time(),
    		'memo'		=> $this->rules[$act]['name'],
    	);
    	$this->db->insert('creditlog',$setarr);
    	return true;
    }
    
    private function set_rule()
    {
    	$this->rule = $this->config->item('credit_rule');
    }    
    
}

/* End of file credit.php */
/* Location: ./application/models/credit.php */