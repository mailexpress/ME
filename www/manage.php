<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lulzgotskill
 *
 * Сюда может зайти только менеджер
 */
require_once("lib/security.php");
session_start();
if(null == $_SESSION['user'] || $_SESSION['user'] < 1 )
{
    //header("Location: index.php");
    exit;
}
checkRoles($_SESSION['user'], array('manager'));


// содержимое страницы для менеджеров
?>
