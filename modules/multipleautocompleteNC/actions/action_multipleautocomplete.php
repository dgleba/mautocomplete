<?php
$multipleautocomplete_field_name = $_COOKIE["field_name"];
$multipleautocomplete_table_name = $_COOKIE["table_name"];
$site_path = $_COOKIE["app_path"];

$multipleautocomplete_database = parse_ini_file($site_path."/config.dbc");

foreach ($multipleautocomplete_database as $key => $value)
{
  if ($key == 'host')
    $dbhost = $value;
  elseif ($key == 'user')
    $dbuser = $value;
  elseif ($key == 'password')
    $dbpass = $value;
  elseif ($key == 'name')
    $dbname = $value;
}

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);
$return_arr = array();

if ($conn)
{
  $fetch = mysql_query("SELECT * FROM ". $multipleautocomplete_table_name ." WHERE ". $multipleautocomplete_field_name ." like '%" . mysql_real_escape_string($_GET['term']) . "%'");

  while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC))
  {
    $row_array['value'] = $row[$multipleautocomplete_field_name];
    array_push($return_arr, $row_array);
  }
}

echo json_encode($return_arr);
