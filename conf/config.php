<?php

date_default_timezone_set('EST');
//session_id();
if (!isset($_SESSION)) {
    session_start();
}
#set_time_limit(20);
#ini_set('max_execution_time', 0);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

#==================== Database Config ============================#
define('DB_HOST', 'localhost');
//define('DB_HOST_IP', '192.168.1.192'); //optional
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'timeshare'); //'infinity_vet_admin ');
define('DB_PORT', '3306');
#==============================================================#

define('VAC_FOLDER', '/timeshare');
define('VAC_ROOT', $_SERVER['DOCUMENT_ROOT'] . VAC_FOLDER . '/');
define('BASEPATH', str_replace("\\", "/", VAC_ROOT));
//define('DEFAULT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . VAC_FOLDER);
define('DEFAULT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/timeshare');
define('ADMIN_URL', DEFAULT_URL . '/admin');
define('ADMIN_ROOT', VAC_ROOT . 'admin/');

#==================== SMTP Setting ============================#
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', '465');
define('SMTP_SECURE', 'ssl');
define('SMTP_AUTH', TRUE);
define('SMTP_USER', 'prosmtp@prologictechnologies.in');
define('SMTP_PWD', '!@#prologictech!@#');
define('GOOGLE_API_ZIPCODE_LOCATION_URL', 'https://maps.googleapis.com/maps/api/geocode/json?address=');
include_once ('auto_load.php');

load_class(array('custom_exception', 'db', 'model'));
#=================== First Connection With DB =================#
$obj_db = new db();
$obj_db->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
