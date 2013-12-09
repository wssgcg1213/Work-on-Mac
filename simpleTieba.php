<?php
header("charset=utf-8");
$a=@file_get_contents(l);
($p=$_POST[s])&&file_put_contents(l,$a='<hr>'.htmlspecialchars($p).@date(' Y-m-d H:i').$a);
echo '<form method=post><input name=s></form>'.$a;
?>