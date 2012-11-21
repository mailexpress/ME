<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lulzgotskill
 */

require_once("db/dblib.php");

function checkRoles($user, $roles)
{
    foreach($roles as $role)
        if(!hasRole($user, $role))
        {
            //header("Location: index.php");
            exit;
        }
}