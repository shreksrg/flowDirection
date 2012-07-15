<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//身高
$height = '';
$min_h = 140;
$max_h = 190;
$height[139] = "请选择";
for ( $i = $min_h; $i < $max_h + 1 ; $i++ )
{
	if( $i == $max_h )
	{
		$limi = "厘米及以上";
	}
	else
	{
		if( $i == $min_h )
		{
			$limi = "厘米及以下";
		}
		else
		{
			$limi = "厘米";
		}
	}
	
	$height[$i] = $i.$limi;
}

//体重
$weight = '';
$min_w = 40;
$max_w = 120;
$weight[39] = "请选择";
for ( $t = $min_w; $t < $max_w + 1 ; $t++ )
{
	if( $t == $max_w )
	{
		$kg = "公斤及以上";
	}
	else
	{
		if( $t == $min_w )
		{
			$kg = "公斤及以下";
		}
		else
		{
			$kg = "公斤";
		}
	}
	
	$weight[$t] = $t.$kg;
}

//学历
$education[0] = "请选择";
$education[1] = "小学";
$education[2] = "初中";
$education[3] = "高中";
$education[4] = "大专";
$education[5] = "本科";
$education[6] = "硕士";
$education[7] = "博士";

//婚姻状况
$marital[0] = "请选择";
$marital[1] = "未婚";
$marital[2] = "已婚";
$marital[3] = "离异";
$marital[4] = "丧偶";

//民族
$nation[0] = "请选择";
$nation[1] = "汉族";
$nation[2] = "蒙古族";
$nation[3] = "回族";
$nation[4] = "藏族";
$nation[5] = "维吾尔族";
$nation[6] = "苗族";
$nation[7] = "彝族";
$nation[8] = "壮族";
$nation[9] = "布依族";
$nation[10] = "朝鲜族";
$nation[11] = "满族";
$nation[12] = "其它民族";

//生活作息
	//生活作息
	$habits_life[0] = "请选择";
	$habits_life[1] = "早睡早起很规律";
	$habits_life[2] = "经常夜猫子";
	$habits_life[3] = "总是早起鸟";
	$habits_life[4] = "偶尔懒散一下";
	$habits_life[5] = "没有规律";
	
	//锻炼习惯
	$habits_yd[0] = "请选择";
	$habits_yd[1] = "每天锻炼";
	$habits_yd[2] = "每周至少一次";
	$habits_yd[3] = "每月几次";
	$habits_yd[4] = "没时间锻炼";
	$habits_yd[5] = "集中时间锻炼";
	$habits_yd[6] = "不喜欢锻炼";
	
	//吸烟
	$habits_smoke[0] = "请选择";
	$habits_smoke[1] = "不吸，很反感吸烟";
	$habits_smoke[2] = "不吸，但不反感";
	$habits_smoke[3] = "社交时偶尔吸";
	$habits_smoke[4] = "每周吸几次";
	$habits_smoke[5] = "每天都吸";
	$habits_smoke[6] = "有烟瘾";
	
	//喝酒
	$habits_drink[0] = "请选择";
	$habits_drink[1] = "不喝";
	$habits_drink[2] = "社交需要时喝";
	$habits_drink[3] = "有兴致时喝";
	$habits_drink[4] = "每天都离不开酒";
	
	//家务
	$habits_housework[0] = "请选择";
	$habits_housework[1] = "任劳任怨";
	$habits_housework[2] = "希望对方承担家务";
	$habits_housework[3] = "一起分工合作";
	$habits_housework[4] = "看各自闲忙，协商分担";
	
	//厨艺
	$habits_cooking[0] = "请选择";
	$habits_cooking[1] = "色香味俱";
	$habits_cooking[2] = "全能";
	$habits_cooking[3] = "做几样可口的小菜";
	$habits_cooking[4] = "不太会，但愿为心爱的人学习";
	
	//生活技能
	$habits_skills[0] = "程序设计";
	$habits_skills[1] = "维护朋友圈关系";
	$habits_skills[2] = "装修房屋";
	$habits_skills[3] = "志愿者/义工";
	$habits_skills[4] = "热衷电脑";
	$habits_skills[5] = "保持生活条理";
	$habits_skills[6] = "理财";
	$habits_skills[7] = "在家款待朋友";
	$habits_skills[8] = "抚养或照顾孩子";
	$habits_skills[9] = "制造浪漫";
	$habits_skills[10] = "社交活动";
	$habits_skills[11] = "谈生意";
	$habits_skills[12] = "保持健康";
	$habits_skills[13] = "解决冲突";
	$habits_skills[14] = "博闻强识";
	$habits_skills[15] = "对自我长期规划";
	$habits_skills[16] = "在简单中寻求快乐与满足";
	$habits_skills[17] = "文化和艺术";
	$habits_skills[18] = "结交新朋友";
	$habits_skills[19] = "烹饪";
	$habits_skills[20] = "赚钱养家";
	$habits_skills[21] = "保养、修理汽车";
	$habits_skills[22] = "其他";
	
//兴趣爱好
	//体育活动
	$love_yd[0] = "请选择";
	$love_yd[1] = "足球";
	$love_yd[2] = "篮球";
	$love_yd[3] = "排球";
	$love_yd[4] = "网球";
	$love_yd[5] = "羽毛球";
	$love_yd[6] = "乒乓球";
	$love_yd[7] = "壁球";
	$love_yd[8] = "保龄球";
	$love_yd[9] = "手球";
	$love_yd[10] = "橄榄球";
	$love_yd[11] = "棒球";
	$love_yd[12] = "高尔夫";
	$love_yd[13] = "健身";
	$love_yd[14] = "跑步";
	$love_yd[15] = "自行车";
	$love_yd[16] = "摩托车";
	$love_yd[17] = "汽车";
	$love_yd[18] = "舞蹈";
	$love_yd[19] = "体操";
	$love_yd[20] = "跆拳道";
	$love_yd[21] = "柔道";
	$love_yd[22] = "空手道";
	$love_yd[23] = "潜水";
	$love_yd[24] = "水上运动";
	$love_yd[25] = "航海";
	$love_yd[26] = "滑雪/滑冰";
	$love_yd[27] = "拳击";
	$love_yd[28] = "钓鱼";
	$love_yd[29] = "瑜珈";
	$love_yd[30] = "武术";
	$love_yd[31] = "游泳";
	$love_yd[32] = "其它";
	$love_yd[33] = "不喜欢运动";
	

	//食物
	$love_fd[0] = "请选择";
	$love_fd[1] = "印度菜";
	$love_fd[2] = "泰国菜";
	$love_fd[3] = "法国菜";
	$love_fd[4] = "意大利菜";
	$love_fd[5] = "俄罗斯菜";
	$love_fd[6] = "日本菜";
	$love_fd[7] = "烧烤";
	$love_fd[8] = "健康食品";
	$love_fd[9] = "素食";
	$love_fd[10] = "快餐";
	$love_fd[11] = "巧克力和甜点";
	$love_fd[12] = "中国菜";
	$love_fd[13] = "其他";
	$love_fd[14] = "无特别爱好";
	
	//书籍
	$love_sj[0] = "请选择";
	$love_sj[1] = "文学";
	$love_sj[2] = "艺术与摄影";
	$love_sj[3] = "励志与成功";
	$love_sj[4] = "动漫与幽默";
	$love_sj[5] = "政治与军事";
	$love_sj[6] = "哲学与宗教";
	$love_sj[7] = "历史传记";
	$love_sj[8] = "运动健身";
	$love_sj[9] = "健康与养生";
	$love_sj[10] = "烹饪与饮食";
	$love_sj[11] = "旅游";
	$love_sj[12] = "投资理财";
	$love_sj[13] = "婚恋与家庭";
	$love_sj[14] = "期刊杂志";
	$love_sj[15] = "娱乐时尚";
	$love_sj[16] = "人文社科";
	$love_sj[17] = "自然科学";
	$love_sj[18] = "收藏与鉴赏";
	$love_sj[19] = "校园青春";
	$love_sj[20] = "其他";
	
	//影视
	$love_ys[0] = "请选择";
	$love_ys[1] = "喜剧";
	$love_ys[2] = "动作冒险";
	$love_ys[3] = "古装武侠";
	$love_ys[4] = "科幻魔幻";
	$love_ys[5] = "悬疑推理";
	$love_ys[6] = "惊悚恐怖";
	$love_ys[7] = "动画";
	$love_ys[8] = "战争";
	$love_ys[9] = "音乐歌舞";
	$love_ys[10] = "纪录片";
	$love_ys[11] = "剧情";
	$love_ys[12] = "历史传记";
	$love_ys[13] = "政治事件";
	$love_ys[14] = "娱乐八卦";
	$love_ys[15] = "体育赛事";
	$love_ys[16] = "理财投资";
	$love_ys[17] = "相声曲艺";
	$love_ys[18] = "海选活动";
	$love_ys[19] = "畅销书";
	$love_ys[20] = "影视热片";
	$love_ys[21] = "休闲生活";
	$love_ys[22] = "行业发展";
	$love_ys[23] = "爱情";
	$love_ys[24] = "其他";
	$love_ys[25] = "暂无";
	
	//娱乐
	$love_yl[0] = "请选择";
	$love_yl[1] = "商场";
	$love_yl[2] = "剧院";
	$love_yl[3] = "酒吧";
	$love_yl[4] = "电影院";
	$love_yl[5] = "音乐会";
	$love_yl[6] = "迪斯科";
	$love_yl[7] = "网吧";
	$love_yl[8] = "温泉";
	$love_yl[9] = "图书馆/书店";
	$love_yl[10] = "咖啡厅";
	$love_yl[11] = "游乐场";
	$love_yl[12] = "卡拉OK";
	$love_yl[13] = "体育馆";
	$love_yl[14] = "逛街";
	$love_yl[15] = "饭店";
	$love_yl[16] = "在自己或朋友家里";
	$love_yl[17] = "其它";
	
	//爱好
	$love_ah[0] = "棋牌";
	$love_ah[1] = "汽车";
	$love_ah[2] = "动物";
	$love_ah[3] = "摄影";
	$love_ah[4] = "影视";
	$love_ah[5] = "音乐";
	$love_ah[6] = "写作";
	$love_ah[7] = "购物";
	$love_ah[8] = "手工艺";
	$love_ah[9] = "园艺";
	$love_ah[10] = "舞蹈";
	$love_ah[11] = "展览";
	$love_ah[12] = "烹饪";
	$love_ah[13] = "读书";
	$love_ah[14] = "绘画";
	$love_ah[15] = "计算机";
	$love_ah[16] = "体育运动";
	$love_ah[17] = "旅游";
	$love_ah[18] = "网络";
	$love_ah[19] = "电子游戏";
	$love_ah[20] = "其它";
	
	//旅游地
	$love_lyd[0] = "请选择";
	$love_lyd[1] = "名山古刹";
	$love_lyd[2] = "繁华都市";
	$love_lyd[3] = "风情名城";
	$love_lyd[4] = "广袤森林";
	$love_lyd[5] = "高原雪域";
	$love_lyd[6] = "秀美山水";
	$love_lyd[7] = "历史遗迹";
	$love_lyd[8] = "江河大川";
	$love_lyd[9] = "峻秀峡谷";
	$love_lyd[10] = "小桥流水人家";
	$love_lyd[11] = "惬意海岛";
	$love_lyd[12] = "其他选择";
	$love_lyd[13] = "还没想好";

	//个性
	$gx[0] = "请选择";
	$gx[1] = "文静优雅";
	$gx[2] = "沉着慎重";
	$gx[3] = "和蔼大方";
	$gx[4] = "活泼可爱";
	$gx[5] = "其他";

//全国省份
$province[0] = "北京市";	
$province[1] = "天津市";	
$province[2] = "河北省";	
$province[3] = "山西省";	
$province[4] = "内蒙古区";	
$province[5] = "辽宁省";	
$province[6] = "吉林省";	
$province[7] = "黑龙江省";	
$province[8] = "上海市";	
$province[9] = "江苏省";	
$province[10] = "浙江省";	
$province[11] = "安徽省";	
$province[12] = "福建省";	
$province[13] = "江西省";	
$province[14] = "山东省";	
$province[15] = "河南省";	
$province[16] = "湖北省";	
$province[17] = "湖南省";	
$province[18] = "广东省";	
$province[19] = "广西区";	
$province[20] = "海南省";	
$province[21] = "重庆市";	
$province[22] = "四川省";	
$province[23] = "贵州省";	
$province[24] = "云南省";	
$province[25] = "西藏区";	
$province[26] = "陕西省";	
$province[27] = "甘肃省";	
$province[28] = "青海省";	
$province[29] = "宁夏区";	
$province[30] = "新疆区";	
$province[31] = "台湾省";	
$province[32] = "香港特区";	
$province[33] = "澳门特区";	

//生肖
$sx[0] = '请选择';
$sx[1] = '鼠';
$sx[2] = '牛';
$sx[3] = '虎';
$sx[4] = '兔';
$sx[5] = '龙';
$sx[6] = '蛇';
$sx[7] = '马';
$sx[8] = '羊';
$sx[9] = '猴';
$sx[10] = '鸡';
$sx[11] = '狗';
$sx[12] = '猪';

//星座
$sz[0] = '请选择';
$sz[1] = '白羊座';
$sz[2] = '金牛座';
$sz[3] = '双子座';
$sz[4] = '巨蟹座';
$sz[5] = '狮子座';
$sz[6] = '处女座';
$sz[7] = '天秤座';
$sz[8] = '天蝎座';
$sz[9] = '射手座';
$sz[10] = '摩羯座';
$sz[11] = '水瓶座';
$sz[12] = '双鱼座';

//职业
$career[0] = "请选择";
$career[1] = "法官";
$career[2] = "工程师";
$career[3] = "教师";
$career[4] = "厨师";
$career[5] = "警察";
$career[6] = "解放军";
$career[7] = "记者";
$career[8] = "老板";
$career[9] = "公司职员";
$career[10] = "政府官员";
$career[11] = "律师";
$career[12] = "其他";

$email['protocol'] = "smtp";
$email['smtp_host'] = "smtp.163.com";
$email['smtp_user'] = "taylorchen@163.com";
$email['smtp_pass'] = "taylor7758258";
$email['smtp_port'] = "25";
$email['mailtype'] = "html";
$email['charset'] = "utf-8";
$email['wordwrap'] = TRUE;
$email['validate'] = TRUE;
	
$config['height'] = $height;
$config['weight'] = $weight;
$config['education'] = $education;
$config['marital'] = $marital;
$config['nation'] = $nation;
$config['habits_life'] = $habits_life;
$config['habits_yd'] = $habits_yd;
$config['habits_smoke'] = $habits_smoke;
$config['habits_drink'] = $habits_drink;
$config['habits_housework'] = $habits_housework;
$config['habits_cooking'] = $habits_cooking;
$config['habits_skills'] = $habits_skills;
$config['lyd'] = $love_yd;
$config['lfd'] = $love_fd;
$config['lsj'] = $love_sj;
$config['lys'] = $love_ys;
$config['lyl'] = $love_yl;
$config['lah'] = $love_ah;
$config['llyd'] = $love_lyd;
$config['province'] = $province;
$config['sx'] = $sx;
$config['sz'] = $sz;
$config['career'] = $career;
$config['gx'] = $gx;
$config['email'] = $email;
					

/* End of file member_profile_config.php */
/* Location: ./application/config/member_profile_config.php */