<?php
session_start();
$multipleautocomplete_field_name = $_SESSION['field_name'];
$multipleautocomplete_table_name = $_SESSION['table_name'];
$sitepath = $_SESSION['site_path'];
$multipleautocomplete_database = parse_ini_file($sitepath."/config.dbc");

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
    $row_array['id'] = $row['id'];
    $row_array['value'] = $row[$multipleautocomplete_field_name];
    array_push($return_arr, $row_array);
  }
}

echo json_encode($return_arr);
?>