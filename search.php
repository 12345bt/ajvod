<?php
/**
 * search.php
 * ==============================================
 * Copy right 2013-2014 http://www.80aj.com
 * ----------------------------------------------
 * This is not a free software, without any authorization is not allowed to use and spread.
 * ==============================================
 * @param unknowtype
 * @return return_type
 * @author: 80aj
 * @date: 2014-2-13
 * @version: v1.0.0
 */
// if (is_file ( $_SERVER ['DOCUMENT_ROOT'] . '/360safe/360webscan.php' )) {
// 	require_once ($_SERVER ['DOCUMENT_ROOT'] . '/360safe/360webscan.php');
// }

if ($_REQUEST ['keyword']) {
	$str = $_REQUEST ['keyword'];
	$post = trim ( $str );
	$post = strip_tags ( $post, "" ); // 清除HTML等代码
	$post = ereg_replace ( "\t", "", $post ); // 去掉制表符号
	$post = ereg_replace ( "\r\n", "", $post ); // 去掉回车换行符号
	$post = ereg_replace ( "\r", "", $post ); // 去掉回车
	$post = ereg_replace ( "\n", "", $post ); // 去掉换行
	$post = ereg_replace ( " ", "", $post ); // 去掉空格
	$str = ereg_replace ( "'", "", $post ); // 去掉单引号
} else {
	Header ( "HTTP/1.1 301 Moved Permanently" );
	Header ( "Location: index.php" );
	exit ();
}
$url = 'http://www.torrentkitty.com/search/';
$keyword = urlencode ( $str );
include 'config.php';
include 'cURL.php';
include 'mysql.php';

$db = new sql_db ( $db_host, $db_user, $db_pass, $db_name );

$db->sql_query ( "insert into video_tags (tags) values('$str')" );

$curl = new cURL ();
$content = $curl->get ( $url . $keyword );

preg_match_all ( "/<tr><td class=\"name\">(.+?)<\/td><\/tr>/ms", $content, $list );
$lu_list = array ();
if (is_array ( $list [0] )) {
	foreach ( $list [0] as $video_list ) {
		preg_match_all ( "/<td(.[^>]*)>(.+?)<\/td>/ms", $video_list, $video_info );
		preg_match ( "/href=\"magnet:(.+?)\"/ms", $video_info [2] [3], $magnet_infos );
		$magnet_url = "magnet:" . $magnet_infos [1];
		$video = array ();
		$video ['name'] = $video_info [2] [0];
		$video ['size'] = $video_info [2] [1];
		$video ['date'] = $video_info [2] [2];
		$video ['url'] = $magnet_url;
		$db->sql_query ( "insert into video (vod_name,vod_size,vod_date,tag,url) values('" . $video ['name'] . "','" . $video ['size'] . "','" . $video ['date'] . "','$str','" . $video ['url'] . "')" );
	}
}

Header ( "HTTP/1.1 301 Moved Permanently" );
Header ( "Location: index.php?keyword=$str" );
exit ();