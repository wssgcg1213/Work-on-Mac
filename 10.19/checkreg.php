<?php
$user=$_POST['username'];
$pwd=$_POST['pwd'];
$pwd2=$_POST['pwd2'];
$pwdmd5 = md5($pwd2);
if($_POST['sex']=="male"){
	$sex="male";
}
else{
	$sex="female";
}
$birthday=$_POST['birthday_year']."x".$_POST['birthday_yue'];

	if(!checkuser($user)){
		echo "0";
	}
	if(!checkpwd($pwd,$pwd2)){
		echo "0";
	}
if($_POST['email']!=""){
$email=$_POST['email'];   //检查 email 还没写
}else{
	echo "0";
}
$connect= mysql_connect('localhost',"treefore_lcl","6884650")or die('0');
mysql_query("SET NAMES 'UTF8'");//防止编码出错
$db='treefore_tieba';
mysql_select_db($db) or die('0');

$sql='SELECT COUNT(*) FROM user';
$res=mysql_query($sql);
list($cnt)=mysql_fetch_row($res);
$cnt=$cnt+1;
$query = "INSERT INTO user (UID, username, password, sex, email, birth) VALUES ('$cnt', '$user', '$pwdmd5', '$sex', '$email', '$birthday')" ;
mysql_query($query) or die('0');
mysql_close($connect);
echo("1");


function checkuser($username){
	$connect= mysql_connect('localhost',"treefore_lcl","6884650")or die('0');
	mysql_query("SET NAMES 'UTF8'");//防止编码出错
	$db='treefore_tieba';
	mysql_select_db($db) or die('0');
	$q="SELECT username FROM user WHERE name = ".'$user';
	$result = mysql_query($q);
	if(mysql_num_rows($result)>=1){
		return false;
	}
	else{
		return ture;
	}
	mysql_free_result($result);
	mysql_close($connect);  //SQL检查重名
}


function checkpwd($pwd,$pwd2){
	if($pwd==$pwd2){
    	return true;
	}else{
		return flase;
	}
}



?>