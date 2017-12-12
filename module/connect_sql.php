<?php
$db=array(
    'server'=>'localhost',
    'user'=>'root',
    'password'=>'',
    'database'=>'webbanhang'
);
$link=  mysqli_connect($db['server'], $db['user'],$db['password'], $db['database']);
?>
