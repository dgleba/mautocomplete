<?php
session_start();

$multipleautocomplete_field_name = $_POST['fname'];
$multipleautocomplete_table_name = $_POST['tname'];
$table_exist = false;

$given = parse_ini_file('../../../tables/'. $multipleautocomplete_table_name .'/multipleautocomplete.txt');

foreach ($given as $key => $value)
{
  if ($key == $multipleautocomplete_field_name)
  {
    $multipleautocomplete_table_name = $value;
    $table_exist = true;
  }
}

if(!$table_exist)
  $multipleautocomplete_table_name = $multipleautocomplete_table_name.'_tags';
  
$_SESSION['field_name'] = $multipleautocomplete_field_name;
$_SESSION['table_name'] = $multipleautocomplete_table_name;
?>