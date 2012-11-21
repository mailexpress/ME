<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lulzgotskill
 */
require_once("settings.php");

$db_connection = mysql_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD');
$db_selection = mysql_select_db('DB_NAME', $db_connection);

/*
function getDB()
{
    global $db;
    return $db;
}*/

function getRoleId($role)
{
    //global $db;
    $res = mysql_query("SELECT id FROM roles WHERE name = '$role'");
    if(null != $res)
    {
        $row = mysql_fetch_row($res);
        return $row[0];
    }
    return null;
}

function hasRole($user, $role)
{
    //global $db;
    $role_id =getRoleId($role);
    $res = mysql_query("SELECT user_id FROM user_role WHERE user_id = '$user' AND role_id ='$role_id'");
    if(null != $res)
    {
        $row = mysql_fetch_row($res);
        return ((int)$row[0] == (int)$user) ? true:false;
    }
    return false;
}
?>