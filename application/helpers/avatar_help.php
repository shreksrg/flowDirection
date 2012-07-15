<?php
function get_avatar($userid, $size = 'middle', $type = '') {
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
	$userid = abs(intval($userid));
	$userid = sprintf("%09d", $userid);
	$dir1 = substr($userid, 0, 3);
	$dir2 = substr($userid, 3, 2);
	$dir3 = substr($userid, 5, 2);
	$typeadd = $type == 'real' ? '_real' : '';
	return $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($userid, -2).$typeadd."_avatar_$size.jpg";
}