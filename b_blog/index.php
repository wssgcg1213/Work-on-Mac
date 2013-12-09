<?php
session_start(); 
include("config.php");
include("mysql.php");		
include("function.php");
$index_content_length = 500;//主页正文内容长度
$mysql = new mysql();

$comments = 'NaN';//temp
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$siteTitle?>|<?=$author?></title>
	<meta charset="utf-8" />
	<meta description="" content="" />
	<meta property="og:image" content="image/icon.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet/less" type="text/css" href="style.less">
	<script src="js/common.js"></script>
	<script src="js/less-1.5.0.min.js"></script>
</head>
<body>
	<div id="wrap">
		<div id="header">
			<div class="row">
				<div id="logo" class="floatleft">
					<h1><?=$siteTitle?></h1>
					<h2><?=$siteSubTitle?></h2>
				</div>
				<div id="nav">
					<ul>
					<?php
						//输出categroys
						//if(login) echo 注销
						//else echo 登陆
						
						/**
						 * cate
						 */
						$mysql->query("SELECT * FROM `categroy`");
						$cate_num = $mysql->num_rows();
						 for($i = 0; $i < $cate_num; $i++){
						 	$cate = $mysql->fetch_array();
						 	echo '<a id="categroy_'.$i.'" href="##"><li>'.$cate['categroy_name'].'</li></a>';
						 }
						
						 /**
						  * 登录行为
						  */
						echo '<a id="login" href="##"><li>登陆</li></a>';
				
					?>
					</ul>
				</div>
			</div>
		</div>
		<div id="main">
			<ul>
				<?php
					$mysql->query('SELECT * FROM `posts`');
					while($arr = $mysql->fetch_array()){
							echo '<li class="posts" id="post_'.$arr['post_id'].'">';
							echo "<h3>".$arr['post_title']."</h3>";
							echo "<p>".cut_str($arr['post_content'], $index_content_length)."</p>";
							echo '<div class="info">';
							echo '<div class="postinfo">&#xe08a;:'.$arr['post_author'].'&nbsp;&#xe014;:'.$arr['post_date'].'&nbsp;&#xe076;:'.$arr['categroy'].'&nbsp;&#xe090;:'.$arr['tags'].'</div>';
							echo '<div class="commentinfo">&#xe000;:'.$comments.'Comments</div>';
							echo '</div></li>';
					}  
				?>
			</ul>
			<div id="more">
				More...
			</div>
		</div>
		<div id="footer">
            <div id="footlink" class="floatleft">
                <p class="smalltext"><a href="http://test.Treeforests.com/" target="_blank">Treeforests</a>&nbsp;ReDesign © 2013</p>
            </div>
            <div id="rightinfo" class="floatright">
                <p>Powered by PHP&nbsp;© 2013, TreeForests.</p>
            </div>
        </div>
	</div>

</body>
</html>
