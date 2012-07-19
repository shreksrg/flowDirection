<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * 网站一级栏目入口
 * @author skii
 *
 */
class Skview extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }


    function  index()
    {
        $row = array();
        $this->load->model('interview', '', TRUE);
        $row = $this->interview->getReccount();
        echo $row['total'];
    }

    function  getReccount()
    {
        $param = $this->input->post();
        $row = array();
        $this->load->model('interview', '', TRUE);
        $row = $this->interview->getSumGross($param['roles']);
        //print_r($row);
        echo json_encode($row);
    }


    function getInitCount(){
        $row = array();
        $this->load->model('interview', '', TRUE);
        $row = $this->interview->getInitCount();
      //  print_r($row);
        echo json_encode($row);
    }


    /**
     * 根据区域来抓取会员信息列表
     * ajax 操作
     */
    function get_area_user_list()
    {
        $area = $_POST['code'];
        if ($area != '') {
            $user_list = array();
            $this->load->model('browse/index_model', 'idx', TRUE);
            $user_list = $this->idx->get_area_user_list($area, $limit = 10, $order_by = "a.userid desc");

            if (!empty($user_list)) {
                foreach ($user_list as $k => $v) {
                    $avatar_img = "/data/avatar/" . get_avatar($user_list[$k]['userid'], 'big');
                    $avatar_img = file_exists('.' . $avatar_img) ? $avatar_img : '/static/images/avatar/noavatar_big.gif';
                    $user_list[$k]['avatar_img'] = $avatar_img;
                    $user_list[$k]['age'] = date('Y') - $user_list[$k]['birthyear'];

                    if ($user_list[$k]['gender'] == 0) {
                        $user_list[$k]['sex'] = "男";
                    } else {
                        $user_list[$k]['sex'] = "女";
                    }

                    if ($user_list[$k]['work'] == '') $user_list[$k]['work'] = "未填";
                }
            } else {
                $rtnval = 0;
            }

            $return = array("rtnval" => $rtnval, "usrlst" => $user_list);

            echo json_encode($return);
        }
    }

}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */