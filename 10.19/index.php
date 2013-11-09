<?php 
    session_start();
    //temp
    $user['name'] = "Username";
    $user['indivoduce'] = "自我介绍";
    $user['last_login'] = "2013-10-20 20:20:17";
    $tongji['today_num'] = "100";
    $tongji['yesterday_num'] = "200";
    $tongji['all_member'] = "200";
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <title>
            Welcome to β_TieBa.
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="http://wssgcg1213.qiniudn.com/jquery.min.js"></script>
        <script>
        jQuery(document).ready(function(){
        var first = 0;var speed = 700;var pause = 3500;
        function removeFirst(){
            first = jQuery('ul#newstopics li:first').html();
            jQuery('ul#newstopics li:first')
            .animate({opacity: 0}, speed)
            .fadeOut('slow', function() {jQuery(this).remove();});
            addLast(first);
        }
        function addLast(first){
            last = '<li style="display:none">'+first+'</li>';
            jQuery('ul#newstopics').append(last)
            jQuery('ul#newstopics li:last')
            .animate({opacity: 1}, speed)
            .fadeIn('slow')
        }
        interval = setInterval(removeFirst, pause);
        });


        function show_reg(){
           document.getElementById("reg").className = "reg_show";
           document.getElementById("reg").style.display = "block";
           document.getElementById("flow").className = "flow_show";
           document.getElementById("reg").style.left = (document.body.clientWidth-500) /2 +"px";
        }
        function hide_reg(){
            document.getElementById("reg").className = "";
           document.getElementById("reg").style.display = "none";
           document.getElementById("flow").className = "";
        }
        function show_login(){
           document.getElementById("login").className = "reg_show";
           document.getElementById("login").style.display = "block";
           document.getElementById("flow").className = "flow_show";
           document.getElementById("login").style.left = (document.body.clientWidth-500) /2 +"px";
        }
        function hide_login(){
            document.getElementById("login").className = "";
           document.getElementById("login").style.display = "none";
           document.getElementById("flow").className = "";
        }
        function check_reg(){
            var username = document.getElementById('username').value;
            var pwd = document.getElementById("pwd").value;
            var regu = "^[0-9a-zA-Z]+$"; 
            var re = new RegExp(regu);
            if(!re.test(username)){
                alert("用户名不合法");
            }
            if(!re.test(pwd)){
                alert("密码不合法");
            }
            document.getElementById("reg_form").submit();
        }
        </script>
    </head>
    
    <body>
        <div id="flow" ></div>

        <div id="header">
            <div class="wrap s_clear">
                <h2 class="logo">β_TieBa</h2>
                <div id="umenu">
                <?php //判断登录 ?>
                  	<a href="##" onclick="show_login()">登录</a>
                    <a href="##" onclick="show_reg()">注册</a>
                    <a href="##">登出</a>
                </div>
            </div>
        </div>
        <div id="wrap" class="wrap s_clear">
            <div id="reg">
                    <span id="reg_zc"><h1>注册</h1></span>
                    <span id="reg_close" onclick="hide_reg()"></span>
                    <form id="reg_form" action='checkreg.php' method='post'>
                        <lable>用户名:&nbsp;&nbsp;&nbsp;&nbsp;</lable>
                        <input type='text' id="username" name='username' value='' maxlength="15"  />
                        <hr>
                        <lable>输入密码:</lable>
                        <input type='password' id="pwd" name='pwd' value='' maxlength="15" />
                        <hr>
                        <lable>重复密码:</lable>
                        <input type='password' name='pwd2' value='' maxlength="15"  />
                        <hr>
                        <lable>输入邮箱:</lable>
                        <input type="text" maxlength="50" name="email"/>
                        <hr>
                        <lable>您的性别:</lable>
                        <lable>男<input type='radio' name='sex' value='male' checked /></lable>
                        <lable>女<input type='radio' name='sex' value='female' /></lable>
                        <hr>
                        <lable>出生年月</lable>
                        <select name='birthday_year' >
                            <option value='1990'>1990</option>
                            <option value='1990'>1991</option>
                            <option value='1990'>1992</option>
                            <option value='1990'>1993</option>
                            <option value='1990'>1994</option>
                            <option value='1990'>1995</option>
                            <option value='1990'>1996</option>
                        </select> 
                        <select name='birthday_yue'>
                            <option value='1'>1月</option>
                            <option value='2'>2月</option>
                            <option value='3'>3月</option>
                            <option value='4'>4月</option>
                            <option value='5'>5月</option>
                            <option value='6'>6月</option>
                            <option value='7'>7月</option>
                            <option value='8'>8月</option>
                            <option value='9'>9月</option>
                            <option value='10'>10月</option>
                            <option value='11'>11月</option>
                            <option value='12'>12月</option>
                        </select>
                          <hr>
                                <a class="btn" onclick="check_reg()">注册</a>
                    </form>
            </div><!--  REG END -->
            <div id="login">
                    <span id="login_dl"><h1>登录</h1></span>
                    <span id="login_close" onclick="hide_login()"></span>
                    <form id="login_form" action='checklogin.php' method='post'>
                        <br><br><br>
                        <lable>用户名:&nbsp;&nbsp;&nbsp;&nbsp;</lable>
                        <input type='text' name='username' value='' maxlength="15"  />
                        <br><br>
                        <lable>输入密码:</lable>
                        <input type='password' name='pwd' value='' maxlength="15" />
                        <br><br>
                        <a class="btn" onclick="loginin()">点击登录</a>
                    </form>
            </div>
            <div id="nav">β &raquo; 首页</div>
            <div class="main">
                <div class="content_nopadding">
                    <div class="newsheadline">
                        <div id="headingwrap">
                            <div class="headline">
                                <div class="headingimage">
                                    <a href="thread-146796-1-1.html"><img src="http://wssgcg1213.qiniudn.com/qiniu_test.jpg" /></a>
                                </div>
                                <div class="heading">
                                    <div class="subject">
                                        <h6><?php echo $user['name']; ?></h6>
                                    </div>
                                    <p id="self">
                                       <?php echo $user['indivoduce'];?>
                                    </p>
                                    <p style="margin-top:4px">
                                        <span style="color: #717C84;">
                                           <?php echo $user['last_login'];?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="hseparator">
                            </div>
                            <div id="newstopic">
                                <ul id="newstopics">
                                    <?php //循环输出li?>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title1
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title2
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title3
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title4
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title5
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title6
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title7
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title8
                                        </a>
                                    </li>
                                    <li class="newssubjects">
                                        <a href='' title=''>
                                            title9
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="foruminfowrap">
                        <div class="foruminfo s_clear">
                            <div style="float:left">
                                欢迎 <?php echo $user['name'];?>·
                                <a href="" class="lightlink">我的帖子</a>·<a href="" class="lightlink">查看新帖</a>
                            </div>
                            <div class="right forumcount" style="float:right">今日:<em>
                                    <?php echo $tongji['today_num'];?>
                                </em>, 昨日:<em>
                                    <?php echo $tongji['yesterday_num'];?>
                                </em>, 会员:<em>
                                    <?php echo $tongji['all_member'];?>
                                </em>
                            </div>
                        </div>
                    </div>
                    <div class="mainbox list">
                        <h3>β &raquo; 贴文目录</h3>
<ul>
    <li class="post_lists">
        <h2><a href=""><span class="newsection">贴文标题</span></a><span class="todayposts"><?php echo "回复数" ;?></span></h2>
          <div id="postcontent">
          <p>
                                                正文内容啊啊啊啊啊啊啊收拾收拾是寿司寿司是事实等等等等....ass但是对的锕.大湿.打杀对的
                                               
            </p>
      

         
                                    <div class="forumnums">
                                         点击:<em>123456</em>次
                                    </div>
                                    <div class="forumlast">
                                        <cite>
                                            <a href="">作者</a>-<span title="13/10/20 03:22 PM">5&nbsp;秒前</span>
                                        </cite>
                                    </div>
        </div>
    </li>
    <li class="post_lists" id="list_double">
        <h2><a href=""><span class="newsection">贴文标题</span></a><span class="todayposts"><?php echo "回复数" ;?></span></h2>
          <div id="postcontent">
          <p>
                                                正文内容啊啊啊啊啊啊啊收拾收拾是寿司寿司是事实等等等等....ass但是对的锕.大湿.打杀对的
                                          
            </p>
      

         
                                    <div class="forumnums">
                                         点击:<em>123456</em>次
                                    </div>
                                    <div class="forumlast">
                                        <cite>
                                            <a href="">作者</a>-<span title="13/10/20 03:22 PM">5&nbsp;秒前</span>
                                        </cite>
                                    </div>
        </div>
    </li>
    <li class="post_lists">
        <h2><a href=""><span class="newsection">贴文标题</span></a><span class="todayposts"><?php echo "回复数" ;?></span></h2>
          <div id="postcontent">
          <p>
                                                正文内容啊啊啊啊啊啊啊收拾收拾是寿司寿司是事实等等等等....ass但是对的锕.大湿.打杀对的
                                                1正文内容啊啊啊啊啊啊啊收拾收拾是寿司寿司是事实等等等等....ass但是对的锕.大湿.打杀对的
                                                
            </p>
      

         
                                    <div class="forumnums">
                                         点击:<em>123456</em>次
                                    </div>
                                    <div class="forumlast">
                                        <cite>
                                            <a href="">作者</a>-<span title="13/10/20 03:22 PM">5&nbsp;秒前</span>
                                        </cite>
                                    </div>
        </div>
    </li>
    <li class="post_lists" id="list_double">
        <h2><a href=""><span class="newsection">贴文标题</span></a><span class="todayposts"><?php echo "回复数" ;?></span></h2>
          <div id="postcontent">
          <p>
                                                正文内容啊啊啊啊啊啊啊收拾收拾是寿司寿司是事实等等等等....ass但是对的锕.大湿.打杀对的
                                                1正文内容啊啊啊啊啊啊啊收拾收拾是寿司寿司是事实等等等等....ass但是对的锕.大湿.打杀对的
                                            
            </p>
      

         
                                    <div class="forumnums">
                                         点击:<em>123456</em>次
                                    </div>
                                    <div class="forumlast">
                                        <cite>
                                            <a href="">作者</a>-<span title="13/10/20 03:22 PM">5&nbsp;秒前</span>
                                        </cite>
                                    </div>
        </div>
    </li>
</ul>
 
                      
                                    <div id="f_post" class="mainbox">
                                        <form method="post" id="fastpostform" action="post.php" >
                                            <input type="hidden" name="userid" value="0">
                                            <textarea name="message" id="fastpostmessage"></textarea>
                                            <p id = "post">
                                                <button name="postsubmit" id="fastpostsubmit" onclick="check()">发表回复</button>
                                            </p>
                                        </form>
                                    </div>  
                          </div>
                        </div>
                    </div>
             </div>
        </div>
        <div id="footer">
            <div class="wrap s_clear">
                <div id="footlink">
                    <p>
                        <sdivong><a href="http://tieba.Treeforests.com/" target="_blank">Tieba</a></sdivong>   
                        <span class="pipe">|</span>
                        <a href="http://test.Treeforests.com/" target="_blank">Treeforests</a>
                    </p>
                    <p class="smalltext">ReDesign &copy; 2013,<a href="http://treeforests.com/" target="_blank">Lcl (B1ackRainFlake)</a>。允许修改、传播或使用,但请通知作者.
                    </p>
                </div>
                <div id="rightinfo">
                    <p>Powered by PHP.</p>
                    <p class="smalltext">&copy; 2013, TreeForests.用戶言论不代表本站立场。</p>
                </div>
            </div>
        </div>
    </body>

</html>