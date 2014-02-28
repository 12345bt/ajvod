<?php
/**
 * index.php
 * ==============================================
 * Copy right 2013-2014 http://www.80aj.com
 * ----------------------------------------------
 * This is not a free software, without any authorization is not allowed to use and spread.
 * ==============================================
 *
 * @param
 *        	采集tt资源并且在线播放
 * @return return_type
 * @author : 80aj
 *         @date: 2014-2-13
 * @version : v1.0.0
 */
// if (is_file ( $_SERVER ['DOCUMENT_ROOT'] . '/360safe/360webscan.php' )) {
// 	require_once ($_SERVER ['DOCUMENT_ROOT'] . '/360safe/360webscan.php');
// }
$keyword = '泷泽萝拉';
if ($_REQUEST ['keyword']) {
	$keyword = $_REQUEST ['keyword'];
	$where = " and vod_name like '%" . $keyword . "%'";
}

include 'config.php';
include 'db_mysql.php';
$db = new mysql ( $db_host, $db_user, $db_pass, $db_name );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
                              _.._        ,------------.
                           ,'      `.    ( We want you! )
                          /  __) __` \    `-,----------'
                         (  (`-`(-')  ) _.-'
                         /)  \  = /  (
                        /'    |--' .  \
                       (  ,---|  `-.)__`
                        )(  `-.,--'   _`-.
                       '/,'          (  Uu",
                        (_       ,    `/,-' )
                        `.__,  : `-'/  /`--'
                          |     `--'  |
                          `   `-._   /
                           \        (
                           /\ .      \.  80aj
                          / |` \     ,-\
                         /  \| .)   /   \
                        ( ,'|\    ,'     :
                        | \,`.`--"/      }
                        `,'    \  |,'    /
                       / "-._   `-/      |
                       "-.   "-.,'|     ;
                      /        _/["---'""]
                     :        /  |"-     '
                     '           |      /
                                 `      |
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>磁力种子采集站 - vod.80aj.com</title>
<meta name="keywords"
	content="BT,BT种子,种子,种子搜索,BT搜索,资源搜索,云点播,云播放,云播,火焰云点播,音符云点播,小二云点播,彩虹云点播," />
<meta name="description"
	content="磁力种子,提供影片搜索、BT种子、视频下载链接在线快速播放，手机云点播,iPad云点播,免费云点播，支持多浏览器、苹果和安卓系统、ipad等移动设备" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="stylesheet"
		href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet"
			href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap-theme.min.css">
			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
			<link href="justified-nav.css" rel="stylesheet">

</head>
<body>

	<div class="container">

		 <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://vod.80aj.com">Vod.80aj.com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://vod.80aj.com">首页</a></li>
          
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
      <?php 
      	$search_list = $db->fetch_sql ( "select distinct(tags) as tags from video_tags order by id desc limit 60" );
      ?>
      <div class="row">
      	<div class="col-lg-12">
      		<h3>最近搜过:</h3>
      		<?php 
      		foreach($search_list as $word){
      			echo '<a href="index.php?keyword='.$word->tags.'" class="btn btn-info" target="_blank">'.$word->tags.'</a>';
      		}
      		?>
      	</div>      
      </div>
      
		
		
		<div class="row">
			<div class="col-lg-12">
				<h3>最近有萌货XX们访问过:</h3>
				<ul class="ds-recent-visitors" data-num-items="61"></ul>
			</div>
		</div>
		<script type="text/javascript">
		var duoshuoQuery = {short_name:"80aj"};
		(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
		})();
		</script>
		<div class="row">
			<div class="col-lg-12">
				<h3>喜欢就分享:</h3>

				<div class="bdsharebuttonbox">
					<a class="bds_qzone"></a>
					<a class="bds_tqq"></a>
					<a class="bds_renren"></a>
					<a class="bds_t163"></a>
					<a class="bds_mshare"></a>
					<a class="bds_sqq"></a>
					<a class="bds_xg"></a>
					<a class="bds_tqf"></a>
					<a class="bds_douban"></a>
					<a class="bds_bdxc"></a>
					<a class="bds_bdhome"></a>
					<a class="bds_taobao"></a>
					<a class="bds_huaban"></a>
					<a class="bds_kaixin001"></a>
					<a class="bds_tieba"></a>
					<a class="bds_hi"></a>
					<a class="bds_meilishuo"></a>
					<a class="bds_duitang"></a>
					<a href="#" class="bds_more" data-cmd="more"></a>
					<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
					<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
					<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
					<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"> </a>
					<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
				</div>
			</div>
		</div>
		<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
		<form class="navbar-form navbar-left" role="search" method="post"
			action="search.php">
			<div class="form-group">
				<input type="text" class="form-control"
					placeholder="<?php echo htmlspecialchars($keyword);?>" name="keyword">
			
			</div>
			<button type="submit" class="btn btn-default">搜索</button>
		</form>
	<?php
	
	$lu_list = $db->fetch_sql ( "select * from video where status=1 {$where} order by tid desc limit 60" );
	
	$header_url = array (
			'http://www.m7766.com/yundianbo/index.php#!u=',
			'http://www.huoyan.tv/api.php#!u=',
			'http://www.ruyiba.cn/index.php#!u=',
			'http://www.weivod.com/?u=',
			'http://bbs.xzrj.cc/yun/vod.html?url=',
			'http://www.vodzx.com/#!u=',
			'http://www.clsydb.com/yundianbo/index.php#!u=' 
	);
	
	$count = count ( $header_url ) - 1;
	echo "<table class=\"table table-bordered\" border=\"1\"><tr><th>影片名字</th><th>种子大小</th><th>上传日期</th><th>磁力种子</th><th>在线观看</th></tr>";
	foreach ( $lu_list as $lu ) {
		
		echo "<tr>";
		echo "<td>" . $lu->vod_name . "</td>";
		echo "<td>" . $lu->vod_size . "</td>";
		echo "<td>" . $lu->vod_date . "</td>";
		echo "<td><a href=\"" . $lu->url . "\" target=\"_blank\">查看种子<a></td>";
		echo "<td>";
		$n = 1;
		foreach ( $header_url as $head_url ) {
			echo "<a class=\"btn btn-info\" href=\"" . $head_url . $lu->url . "\" target=\"_blank\">$n</a>";
			$n ++;
		}
		echo "</td></tr>";
	}
	echo "</table>";
	?>

	<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3fd34e621df89f730a01cfb5f4e00de9' type='text/javascript'%3E%3C/script%3E"));
</script>
	
	</div>


</body>
</html>