<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set('display_errors', '0');
error_reporting(E_ALL | E_STRICT);

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
{
  require_once "C:\\p2\\xampp\\htdocs\\xataface\\dataface-public-api.php";
}
else
{
  echo 'This is a server not using Windows!';
  require_once "../xataface/dataface-public-api.php";
}

df_init(__FILE__, "/xataface");
$app = & Dataface_Application::getInstance();
$app->display();
?>