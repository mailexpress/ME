<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lulzgotskill
 */

require_once("lib/db/dblib.php");
require_once("lib/db/settings.php");
require_once("lib/db/settings.php");

$res = mysql_query("SELECT id FROM users WHERE name = '$_POST['user']' AND password = MD5('$_POST['password']')")
if(null != $res)
    $row = mysql_fetch_row($res);
if(null != $row[0])
{
    session_start();
    $_SESSION['user'] = $row[0];
    //header("Location: куда нам надо ")
} else
    //header ("Location: index.php&bad=1");
?>