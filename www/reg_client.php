<?php
/**
* Created by JetBrains PhpStorm.
* User: lulzgotskill
*/
        
// registration
    
require_once("lib/db/settings.php");
require_once("Classes/class_registration");
include("forms/reg_form.php");

$db_connection = mysql_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD');
$db_selection = mysql_select_db('DB_NAME', $db_connection);

if(isset($_GET['module']) && ($_GET['module'] == "registration"))
{
   $registration = new Registration();
   $registration->setDatabaseUserTable('me_users');
   $registration->setCryptMethod('md5');
   $registration->setShowMessage(true);

   $registration->setUserRegistration();
}
// html registration form

