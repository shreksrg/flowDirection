<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /*
     * 会员积分操作模型
     * author : loso
     * date   : 2012/2/9
     */
class Credit_model extends CI_model
{
      public function __construct()
      {
           parent :: __construct();
           $this->tableName = 'creditlog';
      }
  
      public function credit_opertion($user_id,$type,$much)
      {
          $sql = "SELECT * FROM {$this->db->dbprefix}{$this->tableName} WHERE userid = $user_id AND type = $type";
          $data = $this->db->query($sql)->row_array();
          if(!empty($data) && isset($data['logid']))
          {
             $sql = " UPDATE {$this->db->dbprefix}{$this->tableName} SET total = total +$much WHERE logid = {$data['logid']}";
             return $this->db->query($sql);
          }
          else
          {
          	 $time = time();
             $sql = " INSERT INTO {$this->db->dbprefix}{$this->tableName} VALUES('',$user_id, $much, $much, $time,'',$type) ";
             return $this->db->query($sql);
          }
      }    

}     
