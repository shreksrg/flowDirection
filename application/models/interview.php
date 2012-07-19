<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Interview extends CI_model
{
    var $user_id;
    var $levels;

    public function __construct()
    {
        parent::__construct();

    }

    public function getSumGross($arr)
    {
        //  $arr = array('二级', '三级', 'ka', '医院', '药店', '第三终端', '连锁药店');
        $row = array();
        if ($arr[0] == "0级") {
            for ($i = 1; $i < count($arr); $i++) {
                if ($i <= 3) {
                    $sql = "SELECT SUM(gross) AS gross FROM pharm WHERE levels = '" . $arr[$i] . "'";
                } else {
                    $sql = "SELECT SUM(gross) AS gross FROM pharm WHERE rolename ='" . $arr[$i] . "'";
                }
                $row[] = $this->db->query($sql)->first_row('array');
            }
        } else {
            $arrlen = count($arr);
            for ($i = 0; $i < count($arr); $i++) {
                if ($i == 0) {
                    $sql = "SELECT SUM(gross) AS gross FROM pharm WHERE levels = '" . $arr[0] . "'";

                } else {
                    $sql = "SELECT SUM(gross) AS gross FROM pharm WHERE  levels='" . $arr[0] . "' and rolename = '" . $arr[$i] . "'";
                }
                $row[] = $this->db->query($sql)->first_row('array');
            }
        }


        return $row;
    }


    function  getInitCount()
    {
        $rowsCount = array();
        $sql = "SELECT levels AS counter ,SUM(gross) as totality FROM pharm  GROUP BY levels UNION SELECT rolename AS counter, SUM(gross) as totality FROM pharm  WHERE rolename NOT IN('一级','二级','三级') GROUP BY rolename ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $rowsCount[] = array('role' => $row['counter'], 'gross' => $row['totality']);
            }
        }

        $percent = array();
        //计算二，三级商，ka总部占一级商的销售占比
        $csql = "SELECT SUM(gross) as gross FROM pharm WHERE levels = '一级'";

        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename = '二级' AND levels = '一级'";
        $percent[] = $this->figurepercent($csql, $dsql, '2PL1');

        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename = '三级' AND levels = '一级'";
        $percent[] = $this->figurePercent($csql, $dsql, '3PL1');

        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename = 'ka' AND levels = '一级'";
        $percent[] = $this->figurePercent($csql, $dsql, 'kaPL1');

        //计算三级商，ka总部占二级商的销售占比
        $csql = "SELECT SUM(gross) as gross FROM pharm WHERE levels = '二级'";

        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename = '三级' AND levels = '二级'";
        $percent[] = $this->figurePercent($csql, $dsql, '3PL2');

        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename = 'ka' AND levels = '二级'";
        $percent[] = $this->figurePercent($csql, $dsql, 'kaPL2');

        //计算ka总部占三级商的销售占比
        $csql = "SELECT SUM(gross) as gross FROM pharm WHERE levels = '三级'";
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename = 'ka' AND levels = '三级'";
        $percent[] = $this->figurePercent($csql, $dsql, 'kaPL3');


        //计算一级的终端销售占比
        $csql = "SELECT SUM(gross) as gross FROM pharm WHERE levels = '一级'";
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename IN ('连锁药店','药店','第三终端','无性质','医院')   AND levels = '一级'";
        $percent[] = $this->figurePercent($csql, $dsql, 'tsPL1');

        //计算二级的终端销售占比
        $csql = "SELECT SUM(gross) as gross FROM pharm WHERE levels = '二级'";
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename IN ('连锁药店','药店','第三终端','无性质','医院')   AND levels = '二级'";
        $percent[] = $this->figurePercent($csql, $dsql, 'tsPL2');

        //计算三级的终端销售占比
        $csql = "SELECT SUM(gross) as gross FROM pharm WHERE levels = '三级'";
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename IN ('连锁药店','药店','第三终端','无性质','医院')   AND levels = '三级'";
        $percent[] = $this->figurePercent($csql, $dsql, 'tsPL3');

        //计算各终端所占终端销售占比
        $csql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename IN ('连锁药店','药店','第三终端','无性质','医院')";
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename ='医院'";
        $percent[] = $this->figurePercent($csql, $dsql, 'hosPLts');
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename ='连锁药店'";
        $percent[] = $this->figurePercent($csql, $dsql, 'linkPLts');
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename ='药店'";
        $percent[] = $this->figurePercent($csql, $dsql, 'druPLts');
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename ='第三终端'";
        $percent[] = $this->figurePercent($csql, $dsql, 'thdPLts');
        $dsql = "SELECT SUM(gross) as gross FROM pharm WHERE rolename ='无性质'";
        $percent[] = $this->figurePercent($csql, $dsql, 'unsPLts');

        return array($rowsCount, $percent);

    }

    private function figurePercent($csql, $dsql, $name)
    {
        $cardinality = $this->db->query($csql)->first_row('array');
        $divisor = $this->db->query($dsql)->first_row('array');
        $percent = $divisor['gross'] / $cardinality['gross'] * 100;
        return array('name' => $name, 'percent' => $percent);
    }


    public function get_friends_list($num, $offset, $order_by = 'username desc')
    {
        $sql = "SELECT a.*, b.birthyear, b.gender, b.nickname, b.regprovince,b.regcity,b.work,b.description,b.userid FROM {$this->db->dbprefix}{$this->tableName} a left join {$this->db->dbprefix}{$this->relevanceName} b ON a.fusuerid = b.userid WHERE a.userid={$this->user_id} and a.STATUS=1 ORDER BY b.{$order_by} LIMIT {$offset},{$num}";
        return $this->db->query($sql)->result_array();
    }

    public function get_attention_list($num, $offset, $order_by = 'username desc')
    {
        $sql = "SELECT a.*, b.birthyear, b.gender, b.nickname, b.regprovince,b.regcity,b.work,b.description, b.userid FROM {$this->db->dbprefix}friend_attention a left join {$this->db->dbprefix}{$this->relevanceName} b ON a.fuserid = b.userid WHERE a.userid = {$this->user_id} ORDER BY b.{$order_by}";
        return $this->db->query($sql)->result_array();
    }

    public function get_friends_detail($userid)
    {
        $sql = "SELECT * FROM {$this->db->dbprefix}{$this->relevanceName} WHERE userid = {$userid}";
        return $this->db->query($sql)->row_array();
    }

    public function delete_friends($friendid, $userid, $keyid = false)
    {
        $sql = "DELETE FROM {$this->db->dbprefix}{$this->tableName} WHERE fusuerid = {$friendid} AND userid = {$userid}";
        if ($keyid) {
            $sql = " DELETE FROM {$this->db->dbprefix}friend_attention WHERE fuserid = {$friendid} AND userid = {$userid} ";
        }
        return $this->db->query($sql);
    }

    public function get_friends_attention_list($userid, $order = 'dateline DESC')
    {
        $sql = "SELECT * FROM paliie_friend_attention  WHERE userid={$userid} ORDER BY {$order} limit 9";
        return $this->db->query($sql)->result_array();
    }


    public function relation_deal($userId, $friendId, $friendName, $status)
    {
        $time = time();
        $sql = "select * from {$this->db->dbprefix}{$this->tableName} where userid={$userId} and fusuerid={$friendId}";
        $result = $this->db->query($sql)->row_array();

        if (!empty($result) && (int)$status == (int)$result['STATUS']) {
            return false;
        } elseif (empty($result)) {
            $sql = " insert into {$this->db->dbprefix}{$this->tableName} (userid,fusuerid,fusername,STATUS,dateline) values ($userId,$friendId,'$friendName',$status,$time)";
            return $this->db->query($sql);
        }
        else {
            $sql = " update {$this->db->dbprefix}{$this->tableName} set STATUS={$status}";
            return $this->db->query($sql);
        }


    }

    public function attention_deal($userId, $friendId, $friendName)
    {
        $time = time();
        $sql = "select * from paliie_friend_attention  where userid={$userId} and fuserid={$friendId}";
        $result = $this->db->query($sql)->row_array();

        if (!empty($result)) {
            return false;
        } else {
            $sql = " insert into paliie_friend_attention (userid,fuserid,fusername,dateline) values ($userId,$friendId,'$friendName',$time)";
            return $this->db->query($sql);
        }
    }

    /**
     * 获取分页好友总数
     * @param $condition  array  查找条件
     * @param $table  string  表名
     * @return $num_rows
     *
     */
    function get_condition_friend_num($table, $condition)
    {
        $this->db->where($condition);
        $this->db->from($table);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        return $num_rows;
    }
}