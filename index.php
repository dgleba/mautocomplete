<?php

//report all errors for debugging...
error_reporting(E_ALL);
ini_set('display_errors', 'on');
//don't show strict warnings.  xataface group.. Re: Getting messages: Strict Standards: Only variables should be assigned by reference errors
ini_set('display_errors', '0');     # don't show any errors...
error_reporting(E_ALL | E_STRICT);  # ...but do log them

//Main Application access point
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    //echo 'This is a server using Windows!';
    require_once "C:\\p2\\xampp\\htdocs\\xataface\\dataface-public-api.php";
} else {
    echo 'This is a server not using Windows!';
    require_once "../xataface/dataface-public-api.php";
}

df_init(__FILE__, "/xataface");
$app = & Dataface_Application::getInstance();
$app->display();
