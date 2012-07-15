<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['memcache_ip']		= '127.0.0.1';
$config['memcache_port']	= '11211';

$config['site_name']		= '奇遇网';

//积分规则设置
$config['credit_rule']		= array(
    'blog_add'		=> array('name'=>'发布一篇博客','credit'=>2),
    'blog_del'		=> array('name'=>'删除一篇博客','credit'=>2),
    'album_add'		=> array('name'=>'创建一个相册','credit'=>5),
    'album_del'		=> array('name'=>'删除一个相册','credit'=>-5),
    'pic_add'		=> array('name'=>'上传一张照片','credit'=>2),
    'pic_del'		=> array('name'=>'删除一张照片','credit'=>-2),
    'comment_post'	=> array('name'=>'发表一次评论','credit'=>1),
    'comment_get'	=> array('name'=>'得到一次评论','credit'=>1),
    'comment_del'	=> array('name'=>'删除一条评论','credit'=>-1),
);
/* End of file paliie.php */
/* Location: ./application/config/paliie.php */