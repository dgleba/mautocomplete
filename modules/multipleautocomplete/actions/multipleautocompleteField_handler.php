<?php
$multipleautocomplete_field_name = $_POST['fname'];
$multipleautocomplete_table_name = $_POST['tname'];
$site_path = $_COOKIE['app_path'];

if(file_exists($site_path."/tables/". $multipleautocomplete_table_name ."/valuelists.ini"))
{
  
  $table_exist = false;
  $file_array = file($site_path."/tables/". $multipleautocomplete_table_name ."/valuelists.ini");
  
  $column_table_php_index = 1;
  $valueindex = 1;
  
  foreach ($file_array as $line_num => $line)
  {
    if (strpos ($line, "SELECT"))
    {
      $column_table_php = explode("SELECT", $line);
      $column_table_php_list[$column_table_php_index] = $column_table_php[1];
  	$column_table_php_index = $column_table_php_index + 1;
    }
  }
  
  foreach ($column_table_php_list as $key => $value)
  {
    if (strpos ($value, "FROM"))
    {
      $column_table = explode("FROM", $value);
      $columnlist[$valueindex] = trim($column_table[0]);
      $table_roughlist[$valueindex] = $column_table[1];
  	$valueindex = $valueindex + 1;
    }
  }
  
  foreach ($table_roughlist as $key => $value)
  {
    $table_templist = explode('"', $value);
    $tablelist[$key] = trim($table_templist[0]);
    $index = $key;
  }
  
  $multipleautocomplete_field_name = $columnlist[$index];
  $multipleautocomplete_table_name = $tablelist[$index];
  
}
else
{
  $multipleautocomplete_table_name = $multipleautocomplete_table_name.'_tags';
}

setcookie("field_name", $multipleautocomplete_field_name);
setcookie("table_name", $multipleautocomplete_table_name);
